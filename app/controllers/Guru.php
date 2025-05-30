<?php
class Guru extends Controller
{
  // KONTROLER UNTUK MENU LAPORAN
  public function index()
  {
    $data['title'] = 'Laporan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/laporan/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/index', $data);
    $this->view('templates/footer');
  }

  public function tambah_pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/tambah_pelanggaran', $data);
    $this->view('templates/footer');
  }

  public function daftar_pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/daftar_pelanggaran', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/edit_pelanggaran', $data);
    $this->view('templates/footer');
  }


  // KONTROLER UNTUK MENU PEMANGGILAN
  public function pemanggilan()
  {
    $data['title'] = 'Pemanggilan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pemanggilan/index', $data);
    $this->view('templates/footer');
  }


  public function detail_pemanggilan()
  {
      $data['title'] = 'Pemanggilan';
      $this->view('templates/header_guru', $data);
      $this->view('guru/pemanggilan/detail_pemanggilan', $data);
      $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU KONSELING
  public function konseling()
  {
    $data['title'] = 'Konseling';
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling/index', $data);
    $this->view('templates/footer');
  }

  public function detail_pesan()
  {
    $data['title'] = 'Konseling';
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling/detail_pesan', $data);
    $this->view('templates/footer');
  }
}
