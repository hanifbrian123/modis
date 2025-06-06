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
            "
        );
        return $this->db->resultSet();
    }

    public function getLaporanById($id)
    {
        $this->db->query(
            "SELECT 
                p.ID AS ID,
                s.NIS AS NIS_Terlapor,
                s.Nama AS Nama_Terlapor,
                sp.Nama AS Nama_Pelapor,
                p.Deskripsi,
                p.bukti,
                pel.NamaPelanggaran AS Jenis_Pelanggaran,
                pel.ID AS PelanggaranID
            FROM pengaduan p 
            JOIN siswa s ON s.NIS = p.NIS_Terlapor
            JOIN siswa sp ON sp.NIS = p.NIS_Pelapor
            JOIN pelanggaran pel ON pel.ID = p.IDPelanggaran
            WHERE p.ID = :id
        "
        );
        $this->db->bind(':id', $id);
        return $this->db->single();
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
        $this->db->execute();

        $laporan = $this->getLaporanById($id);
        $this->db->query(
            "INSERT INTO `detailpelanggaran`
            (`Deskripsi`, `NIS`, `PelanggaranID`, `PemanggilanID`, `bukti`) VALUES (:deskripsi, :nis, :pelanggaranID, NULL, :bukti) "
        );
        $this->db->bind(':deskripsi', $laporan['Deskripsi']);
        $this->db->bind(':nis', $laporan['NIS_Terlapor']);
        $this->db->bind(':pelanggaranID', $laporan['PelanggaranID']);
        $this->db->bind(':bukti', $laporan['bukti']);
        $this->db->execute();
    }
}
