<?php 
class SiswaModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getNisNamaSiswa()
    {
        $this->db->query("SELECT nis, nama FROM siswa");
        return $this->db->resultSet();
    }
}