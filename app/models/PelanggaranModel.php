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
    public function getByNIS($nis)
    {
        $this->db->query(
            "SELECT dp.Tgl, dp.Deskripsi, p.NamaPelanggaran, p.Bobot, dp.bukti
            FROM DetailPelanggaran dp
            JOIN Pelanggaran p ON dp.PelanggaranID = p.ID
            WHERE dp.NIS = :nis
            ORDER BY dp.Tgl DESC"
        );
        $this->db->bind('nis', $nis);
        return $this->db->resultSet();
    }
    public function getAkumulasiPelanggaran()
    {
        $this->db->query("
            SELECT 
                s.NIS, s.Nama, 
                COALESCE(SUM(p.Bobot), 0) AS Poin
            FROM Siswa s
            LEFT JOIN DetailPelanggaran dp ON s.NIS = dp.NIS
            LEFT JOIN Pelanggaran p ON dp.PelanggaranID = p.ID
            GROUP BY s.NIS
            ORDER BY Poin DESC, s.Nama ASC
        ");
        return $this->db->resultSet();
    }

}