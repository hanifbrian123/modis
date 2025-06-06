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
        dp.NIS AS NIS,
        dp.ID AS ID,
        dp.bukti AS bukti,
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

  public function getPelanggaranById($id)
  {
    $statement = "SELECT dp.*, p.NamaPelanggaran FROM `detailpelanggaran` AS dp JOIN pelanggaran AS p ON (dp.PelanggaranID = p.ID) WHERE dp.ID = :id;";
    $this->db->query($statement);
    $this->db->bind(":id", $id);
    return $this->db->single();
  }

  public function deletePelanggaranById($id)
  {
    $this->db->query(
      "DELETE FROM `detailpelanggaran` WHERE ID = :id;"
    );
    $this->db->bind(":id", $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function editPelanggaranById($data)
  {
    $statement = "UPDATE `detailpelanggaran` SET `Deskripsi`= :deskripsi, `PelanggaranID`= (SELECT ID FROM pelanggaran WHERE NamaPelanggaran = :jenis_pelanggaran) WHERE ID = :id;";
    $this->db->query($statement);
    $this->db->bind(":deskripsi", $data['deskripsi']);
    $this->db->bind(":jenis_pelanggaran", $data['jenis_pelanggaran']);
    $this->db->bind(":id", $data['id']);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
