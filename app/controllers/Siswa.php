<?php
class Siswa extends Controller
{
  // KONTROLER UNTUK MENU HOME
  public function index()
  {
    requireRole('User');
    $data['title'] = 'Home';
    $data['daftar_pengaduan'] = $this->model('Pengaduan')->getDaftarLaporanByNIS($_SESSION['IDPengenal']);
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/home/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU LAPOR BK
  public function lapor_bk()
  {
    requireRole('User');
    if (!isset($_SESSION)) session_start();
    $_SESSION['user'] = [
      'nis' => '001',
      'nama' => 'Andi'
    ];
    $data['siswa'] = $this->model('SiswaModel')->getNisNamaSiswa();
    $data['pelanggaran'] = $this->model('PelanggaranModel')->getJenis();
    $data['title'] = 'Lapor BK';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/lapor_bk/index', $data);
    $this->view('templates/footer');
  }

  // SIMPAN LAPORAN
  public function simpan_laporan()
  {
    requireRole('User');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->model('LaporanModel')->simpan($_POST, $_FILES) > 0) {
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
    requireRole('User');
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/index', $data);
    $this->view('templates/footer');
  }

  public function kirim_pesan()
  {
    requireRole('User');
    $data['title'] = 'Konsultasi';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/kirim_pesan', $data);
    $this->view('templates/footer');
  }

  public function kirimPesan()
  {
    requireRole('User');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $this->model('Pesan_konsultasi')->kirimPesan($_POST);
      header('Location: ' . BASEURL . '/siswa/konsultasi');
      exit;
    }
  }

  public function lihat_pesan()
  {
    requireRole('User');
    $data['title'] = 'Konsultasi';
    $data['pesan_pribadi'] = $this->model('Pesan_konsultasi')->getPesanByNIS($_SESSION['IDPengenal']);
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/konsultasi/lihat_pesan', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran()
  {
    requireRole('User');
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/edit_pelanggaran', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    requireRole('User');
    $data['pelanggaran'] = $this->model('PelanggaranModel')->getByNIS($_SESSION['IDPengenal']);
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/pelanggaran/index', $data);
    $this->view('templates/footer');
  }
}
