<?php
class Guru extends Controller
{
  public function index()
  {
    $data['title'] = 'Laporan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/index', $data);
    $this->view('templates/footer');
  }
  public function pelanggaran()
  {
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran', $data);
    $this->view('templates/footer');
  }
  public function pemanggilan()
  {
    $data['title'] = 'Pemanggilan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pemanggilan', $data);
    $this->view('templates/footer');
  }
  public function konseling()
  {
    $data['title'] = 'Konseling';
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling', $data);
    $this->view('templates/footer');
  }
}