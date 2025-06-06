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

    public function periksaDanAturPemanggilan($nis)
    {
        // Ambil detail pelanggaran yang belum punya PemanggilanID
        $this->db->query("
            SELECT dp.ID, p.Bobot
            FROM DetailPelanggaran dp
            JOIN Pelanggaran p ON dp.PelanggaranID = p.ID
            WHERE dp.NIS = :nis AND dp.PemanggilanID IS NULL
        ");
        $this->db->bind('nis', $nis);
        $detailBelumDipanggil = $this->db->resultSet();

        // Hitung total bobot pelanggaran
        $totalPoin = array_sum(array_column($detailBelumDipanggil, 'Bobot'));

        // Cek apakah sudah ada pemanggilan aktif yang belum dikirim
        $this->db->query("
            SELECT ID FROM Pemanggilan 
            WHERE ID IN (
                SELECT DISTINCT PemanggilanID FROM DetailPelanggaran 
                WHERE NIS = :nis AND PemanggilanID IS NOT NULL
            ) AND Status_Pemanggilan = 'BelumTerkirim'
        ");
        $this->db->bind('nis', $nis);
        $pemanggilanAktif = $this->db->single();

        // ==== CASE 1: poin cukup & belum ada pemanggilan aktif → buat baru ====
        if ($totalPoin >= 3 && !$pemanggilanAktif) {
            // Buat pemanggilan baru
            $this->db->query("INSERT INTO Pemanggilan (Status_Pemanggilan) VALUES ('BelumTerkirim')");
            $this->db->execute();
            $pemanggilanBaruID = $this->db->lastInsertId();

            // Update semua detail yang belum punya PemanggilanID
            foreach ($detailBelumDipanggil as $dp) {
                $this->db->query("UPDATE DetailPelanggaran SET PemanggilanID = :pid WHERE ID = :id");
                $this->db->bind('pid', $pemanggilanBaruID);
                $this->db->bind('id', $dp['ID']);
                $this->db->execute();
            }

        // ==== CASE 2: poin tidak cukup & ada pemanggilan belum terkirim → batalkan ====
        } elseif ($totalPoin < 3 && $pemanggilanAktif) {
            $idPemanggilan = $pemanggilanAktif['ID'];

            // Reset PemanggilanID di detail pelanggaran
            $this->db->query("UPDATE DetailPelanggaran SET PemanggilanID = NULL WHERE PemanggilanID = :pid AND NIS = :nis");
            $this->db->bind('pid', $idPemanggilan);
            $this->db->bind('nis', $nis);
            $this->db->execute();

            // Hapus pemanggilan
            $this->db->query("DELETE FROM Pemanggilan WHERE ID = :pid");
            $this->db->bind('pid', $idPemanggilan);
            $this->db->execute();
        }

        // Tidak ada aksi jika poin < 3 tapi tidak ada pemanggilan, atau poin >=3 tapi sudah pernah dikirim
    }


}
