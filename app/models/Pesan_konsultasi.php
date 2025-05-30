<?php
class Pesan_konsultasi
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getPesanById($nis){
    $this->db->query(
      "SELECT 
        p.nis,
        p.isi_pesan,
        p.balasan,
        p.waktu_kirim,
        p.topikpesan
      FROM 
        pesan_konsultasi p
      WHERE 
        p.nis = :nis"
    );
    $this->db->bind(':nis', $nis);
    return $this->db->resultSet();
  }

  public function kirimPesan($data)
  {
    $this->db->query(
      "INSERT INTO pesan_konsultasi (nis, isi_pesan, topikpesan) 
       VALUES (:nis, :isi_pesan, :topikpesan)"
    );
    $this->db->bind(':nis', $data['nis']);
    $this->db->bind(':isi_pesan', $data['isi_pesan']);
    $this->db->bind(':topikpesan', $data['topikpesan']);
    
    return $this->db->execute();
  }


}
