<?php
class Pemanggilan
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPemanggilan()
    {
        $query = "SELECT 
                    s.NIS, s.Nama AS nama_siswa, s.NamaOrtu, s.NoTelOrtu,
                    p.Status_Pemanggilan, 
                    IFNULL(tp.total_point, 0) AS total_point,
                    p.ID AS pemanggilan_id
                  FROM Siswa s
                  LEFT JOIN Pemanggilan p ON s.NIS = s.NIS
                  LEFT JOIN (
                      SELECT NIS, SUM(Bobot) AS total_point
                      FROM DetailPelanggaran dp
                      JOIN Pelanggaran pl ON dp.PelanggaranID = pl.ID
                      GROUP BY NIS
                  ) tp ON tp.NIS = s.NIS
                  ORDER BY s.Nama ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDetailPemanggilan($pemanggilan_id)
{
    $query = "SELECT s.Nama, s.Kelas, s.NIS, p.ID AS pemanggilan_id
              FROM Pemanggilan p
              JOIN DetailPelanggaran dp ON dp.PemanggilanID = p.ID
              JOIN Siswa s ON dp.NIS = s.NIS
              WHERE p.ID = :id
              LIMIT 1";
    $this->db->query($query);
    $this->db->bind('id', $pemanggilan_id);
    return $this->db->single();
}

    public function getPelanggaranByPemanggilan($pemanggilan_id)
    {
        $query = "SELECT pl.NamaPelanggaran, dp.Tgl, pl.Bobot
                  FROM DetailPelanggaran dp
                  JOIN Pelanggaran pl ON dp.PelanggaranID = pl.ID
                  WHERE dp.PemanggilanID = :pemanggilan_id
                  ORDER BY dp.Tgl ASC";
        $this->db->query($query);
        $this->db->bind('pemanggilan_id', $pemanggilan_id);
        return $this->db->resultSet();
    }

    public function getSiswaOrtuByNIS($nis)
    {
        $this->db->query("SELECT Nama, Kelas, NamaOrtu, NoTelOrtu FROM Siswa WHERE NIS = :nis");
        $this->db->bind('nis', $nis);
        return $this->db->single();
    }

    public function setStatusTerkirim($pemanggilan_id)
    {
        $this->db->query("UPDATE Pemanggilan SET Status_Pemanggilan = 'Terkirim' WHERE ID = :id");
        $this->db->bind('id', $pemanggilan_id);
        return $this->db->execute();
    }

}
