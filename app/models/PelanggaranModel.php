<?php 
class PelanggaranModel{
    private $db;
    // private $pemanggilanModel;

    public function __construct()
    {
        $this->db = new Database;
        // $this->pemanggilanModel = new Pemanggilan;
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
    public function insert($data)
    {
        $this->db->query("
            INSERT INTO DetailPelanggaran (NIS, PelanggaranID, Deskripsi, Tgl, bukti)
            VALUES (:nis, :pelanggaran, :deskripsi, CURRENT_DATE, :bukti)
        ");
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('pelanggaran', $data['pelanggaran']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('bukti', $data['bukti']);
        $this->db->execute();

        // Otomatis periksa dan atur pemanggilan
        // $this->pemanggilanModel->periksaDanAturPemanggilan($data['nis']);

        return ($this->db->rowCount());
    }

    public function getDaftarPemanggilan()
    {
        $this->db->query("
            SELECT 
                s.Nama AS NamaSiswa,
                s.NamaOrtu,
                s.NoTelOrtu,
                s.NIS,
                p.ID AS PemanggilanID,
                p.Status_Pemanggilan,
                COALESCE(SUM(pg.Bobot), 0) AS TotalPoin
            FROM Pemanggilan p
            JOIN DetailPelanggaran dp ON dp.PemanggilanID = p.ID
            JOIN Siswa s ON dp.NIS = s.NIS
            JOIN Pelanggaran pg ON dp.PelanggaranID = pg.ID
            GROUP BY s.NIS, p.ID
            ORDER BY p.Tanggal DESC
        ");
        return $this->db->resultSet();
    }

}