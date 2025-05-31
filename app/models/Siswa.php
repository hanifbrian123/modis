<?php
class Siswa
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getSiswaByNIS($nis)
  {
    $this->db->query(
      "SELECT * FROM `siswa` WHERE NIS = :nis;"
    );
    $this->db->bind(":nis", $nis);
    return $this->db->single();
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
