<?php
class Siswa_model
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

  public function getNisNamaSiswa()
  {
    $this->db->query("SELECT nis, nama FROM siswa");
    return $this->db->resultSet();
  }
}
