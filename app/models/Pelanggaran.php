<?php
class Pelanggaran
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
}
