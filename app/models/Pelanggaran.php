<?php
class Pelanggaran
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPelanggaran()
  {
    $statement = "SELECT * FROM pelanggaran;";
    $this->db->query($statement);
    return $this->db->resultSet();
  }
}
