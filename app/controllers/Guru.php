<?php
class Guru extends Controller
{
  // KONTROLER UNTUK MENU LAPORAN
  public function index()
  {
    requireRole('BK');
    $data['title'] = 'Laporan';
    $data['laporan'] = $this->model('Pengaduan')->getAllLaporan(); // Ambil semua laporan
    $this->view('templates/header_guru', $data);
    $this->view('guru/laporan/index', $data);
    $this->view('templates/footer');
  }

  public function tolak_laporan($id)
  {
    requireRole('BK');
    $this->model('Pengaduan')->tolakLaporan($id);
    header('Location: ' . BASEURL . '/guru/laporan');
    exit;
  }
  public function terima_laporan($id)
  {
    requireRole('BK');
    $this->model('Pengaduan')->terimaLaporan($id);
    header('Location: ' . BASEURL . '/guru/laporan');
    exit;
  }

  // KONTROLER UNTUK MENU PELANGGARAN
  public function pelanggaran()
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $data['siswa'] = $this->model('Pelanggaran')->getAkumulasiPelanggaran();

    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/index', $data);
    $this->view('templates/footer');
  }

  public function tambah_pelanggaran()
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $data['siswa'] = $this->model('Siswa_model')->getNisNamaSiswa(); // list siswa
    $data['pelanggaran'] = $this->model('Pelanggaran')->getJenis(); // list pelanggaran
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/tambah_pelanggaran', $data);
    $this->view('templates/footer');
  }

  public function daftar_pelanggaran($nis = null)
  {
    requireRole('BK');
    $data['title'] = 'Pelanggaran';
    $data['siswa'] = $this->model('Siswa_model')->getSiswaByNIS($nis);
    $data['daftar_pelanggaran'] = $this->model('Detail_pelanggaran')->getAllPelanggaranByNIS($nis);
    $this->view('templates/header_guru', $data);
    $this->view('guru/pelanggaran/daftar_pelanggaran', $data);
    $this->view('templates/footer');
  }

  public function edit_pelanggaran($nis = null, $id = null)
  {
    requireRole('BK');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($this->model('Detail_pelanggaran')->editPelanggaranById($_POST) > 0) {
        Flasher::setFlash('Pelanggaran berhasil diperbarui', 'success');

        // Cek data pemanggilan dan update otomatis
        $this->model('Pemanggilan')->periksaDanAturPemanggilan($nis);

        header('Location: ' . BASEURL . '/guru/daftar_pelanggaran/' . $nis);
        exit;
      } else {
        Flasher::setFlash('Pelanggaran gagal diperbarui', 'error');
        header('Location: ' . BASEURL . '/guru/daftar_pelanggaran/' . $nis);
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

  public function hapus_pelanggaran($nis, $id)
  {
    requireRole('BK');
    if ($this->model('Detail_pelanggaran')->deletePelanggaranById($id) > 0) {
      Flasher::setFlash('Pelanggaran berhasil dihapus', 'success');

      // Cek data pemanggilan dan update otomatis
      $this->model('Pemanggilan')->periksaDanAturPemanggilan($nis);

      header('Location: ' . BASEURL . '/guru/daftar_pelanggaran/' . $nis);
      exit;
    } else {
      Flasher::setFlash('Pelanggaran berhasil dihapus', 'error');
      header('Location: ' . BASEURL . '/guru/daftar_pelanggaran/' . $nis);
      exit;
    }
  }

  // KONTROLER UNTUK MENU PEMANGGILAN
  public function pemanggilan()
  {
    requireRole('BK');
    $data['title'] = 'Pemanggilan';
    $data['pemanggilan'] = $this->model('Pelanggaran')->getDaftarPemanggilan();
    $this->view('templates/header_guru', $data);
    $this->view('guru/pemanggilan/index', $data);
    $this->view('templates/footer');
  }

  public function detail_pemanggilan($id)
  {
    $data['title'] = 'Detail Pemanggilan';
    $data['detail'] = $this->model('Pemanggilan')->getDetailPemanggilan($id);
    $data['pelanggaran'] = $this->model('Pemanggilan')->getPelanggaranByPemanggilan($id);
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

  public function simpan()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nis = $_POST['nis'];
      $pelanggaranID = $_POST['pelanggaran'];
      $deskripsi = $_POST['deskripsi'];

      // handle file upload
      $bukti = null;
      if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['bukti'];
        $namaSementara = $file['tmp_name'];
        $namaAsli = basename($file['name']);
        $ext = pathinfo($namaAsli, PATHINFO_EXTENSION);
        $namaFile = uniqid() . '.' . $ext;
        move_uploaded_file($namaSementara, __DIR__ . '/../../public/uploads/' . $namaFile);
        $bukti = $namaFile;
      } else {
        die('error saat upload!');
      }

      $this->model('Pelanggaran')->insert([
        'nis' => $nis,
        'pelanggaran' => $pelanggaranID,
        'deskripsi' => $deskripsi,
        'bukti' => $bukti,
      ]);

      // Cek data pemanggilan dan update otomatis
      $this->model('Pemanggilan')->periksaDanAturPemanggilan($nis);

      header('Location: ' . BASEURL . '/guru/pelanggaran'); // kembali ke daftar
      exit;
    }
  }



  public function kirim_pemanggilan()
  {
    // Ambil data dari POST
    $nis = $_POST['nis'];
    $pemanggilan_id = $_POST['pemanggilan_id'];

    // Ambil data siswa dan ortu dari database
    $detail = $this->model('Pemanggilan')->getSiswaOrtuByNIS($nis);

    // Buat pesan WhatsApp
    $pesan = "Yth. " . $detail['NamaOrtu'] . ",\n"
      . "Ananda " . $detail['Nama'] . " kelas " . $detail['Kelas'] . " telah melanggar tata tertib sekolah. "
      . "Mohon kehadiran Bapak/Ibu ke sekolah untuk konsultasi lebih lanjut.";

    // Kirim ke WhatsApp via Fonnte API
    $token = 'HLWHiQzENf1Snsb1B2Rr'; // Ganti dengan token asli Anda
    $target = $detail['NoTelOrtu'];
    $target = preg_replace('/^0/', '62', $target); // Pastikan format nomor Indonesia

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.fonnte.com/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'target' => $target,
        'message' => $pesan,
        'countryCode' => '62',
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: ' . $token
      ),
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
      $error_msg = curl_error($curl);
    }
    curl_close($curl);

    // Update status pemanggilan jika perlu
    $this->model('Pemanggilan')->setStatusTerkirim($pemanggilan_id);

    // Redirect kembali ke halaman pemanggilan dengan pesan sukses/gagal
    if (isset($error_msg)) {
      Flasher::setFlash("Gagal mengirim WhatsApp: {$error_msg}", 'error');
    } else {
      Flasher::setFlash("Pesan berhasil terkirim!", 'success');
    }
    header('Location: ' . BASEURL . '/guru/pemanggilan');
    exit;
  }
}
