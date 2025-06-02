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

    public function getAllLaporan()
    {
        $this->db->query(
            "SELECT 
                p.ID AS ID,
                s.Nama AS Nama_Terlapor,
                sp.Nama AS Nama_Pelapor,
                p.Deskripsi,
                p.bukti,
                pel.NamaPelanggaran AS Jenis_Pelanggaran
                
            FROM pengaduan p 
            JOIN siswa s ON s.NIS = p.NIS_Terlapor
            JOIN siswa sp ON sp.NIS = p.NIS_Pelapor
            JOIN pelanggaran pel ON pel.ID = p.IDPelanggaran
            
            WHERE p.Status = 'Pending'
            ");
        return $this->db->resultSet();
    }

    public function tolakLaporan($id)
    {
        $this->db->query("UPDATE pengaduan SET status = 'Rejected' WHERE ID = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function terimaLaporan($id)
    {
        $this->db->query("UPDATE pengaduan SET status = 'Accepted' WHERE ID = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
