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
}
