<?php
class Pengaduan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDaftarLaporanByNIS($nis)
    {
        $this->db->query(
            "SELECT 
                s.nama AS nama,
                pel.NamaPelanggaran jenis_pelanggaran,
                p.deskripsi,
                p.status,
                p.bukti
            FROM 
                pengaduan p
            JOIN 
                siswa s ON p.nis_terlapor = s.nis
            LEFT JOIN 
                pelanggaran pel ON pel.ID = p.IDPelanggaran
            WHERE
            p.NIS_Pelapor = :nis"
        );
        $this->db->bind(':nis', $nis);
        return $this->db->resultSet();
    }
}
