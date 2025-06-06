<?php 
class Laporan
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function simpan($data,$file)
    {
        $namaFile = null;

        // Handle Upload Gambar
        // die(print_r($file['bukti'],true));
        if (isset($file['bukti']) && $file['bukti']['error'] == 0) {
            $file = $file['bukti'];
            $namaSementara = $file['tmp_name'];
            $namaAsli = basename($file['name']);
            $ext = pathinfo($namaAsli, PATHINFO_EXTENSION);
            $namaFile = uniqid() . '.' . $ext;
            move_uploaded_file($namaSementara, __DIR__ . '/../../public/uploads/' . $namaFile);
        }else{
            die('Error saat upload!');
        }
        // die($namaFile);
        // die(print_r($data,true));
        $this->db->query("INSERT INTO pengaduan (nis_pelapor, nis_terlapor, idpelanggaran, deskripsi, bukti, status) 
        VALUES (:pelapor, :terlapor, :idpelanggaran, :deskripsi, :bukti, 'Pending')");

        $this->db->bind(':pelapor', $_SESSION['IDPengenal']);
        $this->db->bind(':terlapor', $data['nis_terlapor']);
        $this->db->bind(':idpelanggaran', $data['jenis']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':bukti', $namaFile);

        $this->db->execute();
        return ($this->db->rowCount());
    }
    
}