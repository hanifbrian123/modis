<?php 
class PelanggaranModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getJenis()
    {
        $this->db->query("SELECT DISTINCT ID, NamaPelanggaran FROM pelanggaran");
        return $this->db->resultSet();
    }
}