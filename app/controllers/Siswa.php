<?php
class Siswa extends Controller
{
  // KONTROLER UNTUK MENU HOME
  public function index()
  {
    $data['title'] = 'Home';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/home/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU LAPOR BK
  public function lapor_bk()
  {
    $data['title'] = 'Lapor BK';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/lapor_bk/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU KONSULTASI
  public function konsultasi()
  {
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/index', $data);
    $this->view('templates/footer');
  }

  public function kirim_pesan()
  {
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/kirim_pesan', $data);
    $this->view('templates/footer');
  }

  public function lihat_pesan()
  {
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/lihat_pesan', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/edit_pelanggaran', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/pelanggaran/index', $data);
    $this->view('templates/footer');
  }
}
