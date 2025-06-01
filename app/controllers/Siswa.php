<?php
class Siswa extends Controller
{
  // KONTROLER UNTUK MENU HOME
  public function index()
  {
    $data['title'] = 'Home';
    $data['daftar_pengaduan'] = $this->model('Pengaduan')->getDaftarLaporan();
    $this->view('templates/header_siswa', $data);
    $this->view('siswa/home/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU LAPOR BK
  public function lapor_bk()
  {
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->model('LaporanModel')->simpan($_POST,$_FILES) > 0) {
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
