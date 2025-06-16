<?php 
class Laporan
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function simpan($data, $file)
{
    $errors = [];

    // Validasi NIS Terlapor
    if (empty($data['nis_terlapor'])) {
        $errors[] = "Nama pelanggar harus dipilih.";
    }

    // Validasi Jenis Pelanggaran
    if (empty($data['jenis']) || !is_numeric($data['jenis'])) {
        $errors[] = "Jenis pelanggaran tidak valid.";
    }

    // Validasi Deskripsi (jika ingin wajib)
    if (empty($data['deskripsi']) || strlen(trim($data['deskripsi'])) < 10) {
        $errors[] = "Deskripsi pelanggaran minimal 10 karakter.";
    }

    // Validasi File Gambar
    if (!isset($file['bukti']) || $file['bukti']['error'] != 0) {
        $errors[] = "Gagal mengunggah gambar bukti.";
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
        $maxSize = 3 * 1024 * 1024;

        if (!in_array($file['bukti']['type'], $allowedTypes)) {
            $errors[] = "Jenis file tidak didukung. Hanya gambar yang diizinkan.";
        }

        if ($file['bukti']['size'] > $maxSize) {
            $errors[] = "Ukuran file terlalu besar. Maksimal 3MB.";
        }
    }

    // Jika ada error, hentikan dan tampilkan
    if (!empty($errors)) {
        die(implode("<br>", $errors));
    }

    // Upload file
    $file = $file['bukti'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $namaFile = uniqid() . '.' . $ext;
    move_uploaded_file($file['tmp_name'], __DIR__ . '/../../public/uploads/' . $namaFile);

    // Insert ke database
    $this->db->query("INSERT INTO pengaduan (nis_pelapor, nis_terlapor, idpelanggaran, deskripsi, bukti, status) 
        VALUES (:pelapor, :terlapor, :idpelanggaran, :deskripsi, :bukti, 'Pending')");

    $this->db->bind(':pelapor', $_SESSION['IDPengenal']);
    $this->db->bind(':terlapor', $data['nis_terlapor']);
    $this->db->bind(':idpelanggaran', $data['jenis']);
    $this->db->bind(':deskripsi', $data['deskripsi']);
    $this->db->bind(':bukti', $namaFile);

    $this->db->execute();
    return $this->db->rowCount();
}

    
}