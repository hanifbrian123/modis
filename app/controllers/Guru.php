<?php
class Guru extends Controller
{
  // KONTROLER UNTUK MENU LAPORAN
  public function index()
  {
    requireRole('BK');
    $data['title'] = 'Laporan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/laporan/index', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $data['siswa'] = $this->model('PelanggaranModel')->getAkumulasiPelanggaran();

    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/index', $data);
    $this->view('templates/footer');
  }

  public function tambah_pelanggaran()
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/tambah_pelanggaran', $data);
    $this->view('templates/footer');
  }

  // MASIH MENGGUNAKAN STATIC NIS (siswa001)
  public function daftar_pelanggaran($nis = "siswa001")
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $data['siswa'] = $this->model('Siswa')->getSiswaByNIS($nis);
    $data['daftar_pelanggaran'] = $this->model('Detail_pelanggaran')->getAllPelanggaranByNIS($nis);
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/daftar_pelanggaran', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran($id = null)
  {
    requireRole('BK');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($this->model('Detail_pelanggaran')->editPelanggaranById($_POST) > 0) {
        Flasher::setFlash('Pelanggaran berhasil diperbarui', 'success');
        header('Location: ' . BASEURL . '/guru/daftar_pelanggaran');
        exit;
      } else {
        Flasher::setFlash('Pelanggaran gagal diperbarui', 'error');
        header('Location: ' . BASEURL . '/guru/daftar_pelanggaran');
        exit;
      }
    } else {
      $data['title'] = 'Pelanggaran';
      $data['jenis_pelanggaran'] = $this->model('Pelanggaran')->getAllPelanggaran();
      $data['pelanggaran'] = $this->model('Detail_pelanggaran')->getPelanggaranById($id);
      $this->view('templates/header_guru', $data);
      $this->view('guru/pelanggaran/edit_pelanggaran', $data);
      $this->view('templates/footer');
    }
  }

  public function hapus_pelanggaran($id)
  {
    requireRole('BK');
    if ($this->model('Detail_pelanggaran')->deletePelanggaranById($id) > 0) {
      Flasher::setFlash('Pelanggaran berhasil dihapus', 'success');
      header('Location: ' . BASEURL . '/guru/daftar_pelanggaran');
      exit;
    } else {
      Flasher::setFlash('Pelanggaran berhasil dihapus', 'error');
      header('Location: ' . BASEURL . '/guru/daftar_pelanggaran');
      exit;
    }
  }

  // KONTROLER UNTUK MENU PEMANGGILAN
  public function pemanggilan()
  {
    requireRole('BK');
    $data['title'] = 'Pemanggilan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pemanggilan/index', $data);
    $this->view('templates/footer');
  }


  public function detail_pemanggilan()
  {
    requireRole('BK');
    $data['title'] = 'Pemanggilan';
    $this->view('templates/header_guru', $data);
    $this->view('guru/pemanggilan/detail_pemanggilan', $data);
    $this->view('templates/footer');
  }

  // KONTROLER UNTUK MENU KONSELING
  public function konseling()
  {
    requireRole('BK');
    $data['title'] = 'Konseling';
    $data['pesan_konsultasi'] = $this->model('Pesan_konsultasi')->getAllPesan();
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling/index', $data);
    $this->view('templates/footer');
  }

  public function detail_pesan()
  {
    requireRole('BK');
    $data['title'] = 'Konseling';
    $data['satu_pesan'] = $this->model('Pesan_konsultasi')->getPesanByIdPesan($_POST['id_pesan']);
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling/detail_pesan', $data);
    $this->view('templates/footer');
  }

  public function balas_pesan()
  {
    requireRole('BK');
    $data['title'] = 'Konseling';
    $this->view('templates/header_guru', $data);
    $this->view('guru/konseling/balas_pesan', $data);
    $this->view('templates/footer');
  }

  public function kirimBalasan()
  {
    requireRole('BK');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Validasi input
      if (!empty($_POST['balasan'])) {
        $this->model('Pesan_konsultasi')->kirimBalasan($_POST);
        // Redirect or show an error message
      }
      header('Location: ' . BASEURL . '/guru/konseling');
      exit;
    }
  }
}
