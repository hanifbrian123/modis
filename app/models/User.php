<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function createBK($dataUser, $dataBK)
  {
    // Insert ke tabel User
    $queryUser = "INSERT INTO User (IDPengenal, Role, Password) VALUES (:IDPengenal, :Role, :Password)";
    $this->db->query($queryUser);
    $this->db->bind('IDPengenal', $dataUser['IDPengenal']);
    $this->db->bind('Role', $dataUser['Role']);
    $this->db->bind('Password', $dataUser['Password']);
    $userResult = $this->db->execute();

    // Insert ke tabel Guru_BK
    $queryBK = "INSERT INTO Guru_BK (NIP, Nama) VALUES (:NIP, :Nama)";
    $this->db->query($queryBK);
    $this->db->bind('NIP', $dataBK['NIP']);
    $this->db->bind('Nama', $dataBK['Nama']);
    $bkResult = $this->db->execute();

    return $userResult && $bkResult;
  }

  public function getAllAngkatan()
  {
    $this->db->query("SELECT DISTINCT Angkatan FROM Siswa ORDER BY Angkatan ASC");
    $result = $this->db->resultSet(); // Ambil semua baris sebagai array asosiatif
    $angkatan = [];
    foreach ($result as $row) {
      $angkatan[] = $row['Angkatan'];
    }
    return $angkatan;
  }

  public function hapusAngkatan($angkatan)
  {
    // Ambil semua NIS siswa pada angkatan ini
    $this->db->query("SELECT NIS FROM Siswa WHERE Angkatan = :angkatan");
    $this->db->bind('angkatan', $angkatan);
    $siswaList = $this->db->resultSet();

    foreach ($siswaList as $siswa) {
      $nis = $siswa['NIS'];

      // Hapus data detail pelanggaran terkait siswa ini
      $this->db->query("DELETE FROM DetailPelanggaran WHERE NIS = :nis");
      $this->db->bind('nis', $nis);
      $this->db->execute();

      // Hapus pesan konsultasi terkait siswa ini
      $this->db->query("DELETE FROM Pesan_Konsultasi WHERE NIS = :nis");
      $this->db->bind('nis', $nis);
      $this->db->execute();

      // Hapus pengaduan terkait siswa ini (baik sebagai pelapor maupun terlapor)
      $this->db->query("DELETE FROM Pengaduan WHERE NIS_Terlapor = :nis OR NIS_Pelapor = :nis");
      $this->db->bind('nis', $nis);
      $this->db->execute();
    }

    // Setelah itu baru hapus siswa
    $this->db->query("DELETE FROM Siswa WHERE Angkatan = :angkatan");
    $this->db->bind('angkatan', $angkatan);
    return $this->db->execute();
  }

  public function getAllUsers()
  {
    $this->db->query("SELECT 
          s.Nama AS Nama_Lengkap,
          'Siswa' AS Role,
          s.NIS AS ID_Spesifik
      FROM user u 
        LEFT JOIN siswa s 
          ON u.IDPengenal = s.NIS
          WHERE s.NIS is not NULL

      UNION ALL

      SELECT 
          g.Nama AS Nama_Lengkap,
          'Guru' AS Role,
          g.Nip AS ID_Spesifik
      FROM user u 
        LEFT JOIN guru_bk g 
          ON u.IDPengenal = g.NIP
          WHERE g.NIP is not NULL");
    return $this->db->resultSet();
  }

  public function buatAkunSiswa($data)
  {
    $this->db->query(
      "INSERT INTO `user` (IDPengenal, Role, Password) 
       VALUES (:IDPengenal, 'User', :Password);

       INSERT INTO `siswa` (NIS, Nama, Kelas, Angkatan, NamaOrtu, NoTelOrtu)
       VALUES (:IDPengenal, :Nama, :Kelas, :Angkatan, :NamaOrtu, :NoTelOrtu)"
    );
    $this->db->bind(':IDPengenal', $data['NIS']);
    $this->db->bind(':Nama', $data['Nama']);
    $this->db->bind(':Kelas', $data['Kelas']);
    $this->db->bind(':NamaOrtu', $data['NamaOrtu']);
    $this->db->bind(':NoTelOrtu', $data['NoTelOrtu']);
    $this->db->bind(':Password', $data['Password']);
    $this->db->bind(':Angkatan', $data['Angkatan']);
    return $this->db->execute();
  }
}
