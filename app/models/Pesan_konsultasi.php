<?php
class Pesan_konsultasi
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getPesanByNIS($nis)
  {
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

  public function getAllPesan()
  {
    $this->db->query(
      "SELECT 
      pk.id,
      pk.nis,
      s.nama,
      pk.TopikPesan,
      pk.Isi_Pesan,
      pk.Balasan 
      FROM `pesan_konsultasi` pk 
        JOIN siswa s ON s.nis = pk.nis
      ORDER BY 
        pk.Balasan IS NULL DESC,
        pk.waktu_kirim DESC
      "
    );
    return $this->db->resultSet();
  }

  public function getPesanByIdPesan($id)
  {
    $this->db->query(
      "SELECT 
        pk.id,
        pk.nis,
        s.nama,
        pk.TopikPesan,
        pk.Isi_Pesan,
        pk.Balasan 
      FROM `pesan_konsultasi` pk 
        JOIN siswa s ON s.nis = pk.nis
      WHERE 
        pk.id = :id
      ORDER BY 
        pk.waktu_kirim DESC"
    );
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function kirimBalasan($data)
  {
    $this->db->query(
      "UPDATE pesan_konsultasi 
       SET Balasan = :balasan 
       WHERE id = :id"
    );
    $this->db->bind(':balasan', $data['balasan']);
    $this->db->bind(':id', $data['id_pesan']);

    return $this->db->execute();
  }

}
