<?php
class Pengaduan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDaftarLaporan()
    {
        $this->db->query(
            "SELECT 
            s.nama AS nama,
            pel.NamaPelanggaran jenis_pelanggaran,
            p.deskripsi,
            p.status
            FROM 
                pengaduan p
            JOIN 
                siswa s ON p.nis_terlapor = s.nis
            LEFT JOIN 
                pelanggaran pel ON pel.ID = p.IDPelanggaran"
        );
        return $this->db->resultSet();
    }
}
