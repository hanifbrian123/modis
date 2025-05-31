<?php
class Detail_pelanggaran
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPelanggaranByNIS($nis)
  {
    $this->db->query(
      "SELECT
        dp.ID AS id,
        p.NamaPelanggaran AS jenis_pelanggaran, 
        dp.Deskripsi AS deskripsi
      FROM
        detailpelanggaran AS dp
      JOIN siswa AS s
      ON
        (dp.NIS = s.NIS)
      JOIN
        pelanggaran p
      ON
        (dp.PelanggaranID = p.ID) 
      WHERE 
        s.nis = :nis;"
    );
    $this->db->bind(":nis", $nis);
    return $this->db->resultSet();
  }
}
