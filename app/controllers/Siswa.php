<?php
class Siswa extends Controller
{
  // KONTROLER UNTUK MENU HOME
  public function index()
  {
    requireRole('Siswa');
    $data['title'] = 'Home';
    $data['daftar_pengaduan'] = $this->model('Pengaduan')->getDaftarLaporanByNIS($_SESSION['IDPengenal']);
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/home/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU LAPOR BK
  public function lapor_bk()
  {
    requireRole('Siswa');

    $data['siswa'] = $this->model('Siswa_model')->getNisNamaSiswa();
    $data['pelanggaran'] = $this->model('Pelanggaran')->getJenis();
    $data['title'] = 'Lapor BK';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/lapor_bk/index', $data);
    $this->view('templates/footer');
  }

  // SIMPAN LAPORAN
  public function simpan_laporan()
  {
    requireRole('Siswa');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->model('Laporan')->simpan($_POST, $_FILES) > 0) {
        header('Location: ' . BASEURL . '/siswa/home');
        exit;
      } else {
        echo "Gagal menyimpan laporan.";
      }
    }
  }

  // KONTROLER UNTUK MENU KONSULTASI
  public function konsultasi()
  {
    requireRole('Siswa');
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/index', $data);
    $this->view('templates/footer');
  }

  public function kirim_pesan()
  {
    requireRole('Siswa');
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/kirim_pesan', $data);
    $this->view('templates/footer');
  }

  public function kirimPesan()
  {
    requireRole('Siswa');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->model('Pesan_konsultasi')->kirimPesan($_POST);
      header('Location: ' . BASEURL . '/siswa/konsultasi');
      exit;
    }
  }

  public function lihat_pesan()
  {
    requireRole('Siswa');
    $data['title'] = 'Konsultasi';
    $data['pesan_pribadi'] = $this->model('Pesan_konsultasi')->getPesanByNIS($_SESSION['IDPengenal']);
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/lihat_pesan', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran()
  {
    requireRole('Siswa');
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/edit_pelanggaran', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    requireRole('Siswa');
    $data['pelanggaran'] = $this->model('Pelanggaran')->getByNIS($_SESSION['IDPengenal']);
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/pelanggaran/index', $data);
    $this->view('templates/footer');
  }
}
