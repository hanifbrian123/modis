<?php
// require 'C:\xampp\htdocs\modis\vendor\autoload.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class Admin extends Controller
{
    // Controller untuk menu home
    public function index()
    {
        requireRole('Admin');
        $data['title'] = 'Home';
        $data['all_user'] = $this->model('User')->getAllUsers();
        $this->view('templates/header_admin', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu buat akun siswa
    public function buat_akun_siswa()
    {
        requireRole('Admin');
        $data['title'] = 'Buat Akun Siswa';
        $model = $this->model('User');
        $data['angkatan_error'] = '';
        $data['file_error'] = '';

        // Proses form jika ada POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $angkatan = isset($_POST['angkatan']) ? trim($_POST['angkatan']) : '';

            // Reset error angkatan
            $data['angkatan_error'] = '';

            // Validasi angkatan
            if ($model->angkatanSudahAda($angkatan)) {
                $data['angkatan_error'] = 'Angkatan sudah tersedia';
                $this->view('templates/header_admin', $data);
                $this->view('admin/buat_akun_siswa', $data);
                $this->view('templates/footer');
                return;
            }

            // Validasi file
            if (!isset($_FILES['excel_file']) || $_FILES['excel_file']['error'] !== UPLOAD_ERR_OK) {
                $data['file_error'] = 'Silakan pilih file data siswa terlebih dahulu.';
                // Pastikan error angkatan tetap kosong jika sudah valid
                $this->view('templates/header_admin', $data);
                $this->view('admin/buat_akun_siswa', $data);
                $this->view('templates/footer');
                return;
            }

            $fileTmpPath = $_FILES['excel_file']['tmp_name'];
            $fileName = $_FILES['excel_file']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('xlsx', 'xls');

            if (in_array($fileExtension, $allowedfileExtensions)) {
                if ($fileExtension == 'xlsx') {
                    $reader = new Xlsx();
                } elseif ($fileExtension == 'xls') {
                    $reader = new Xls();
                } else {
                    die("Ekstensi file tidak didukung.");
                }

                try {
                    $spreadsheet = $reader->load($fileTmpPath);
                    $sheet = $spreadsheet->getActiveSheet();
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();

                    for ($row = 2; $row <= $highestRow; $row++) {
                        $dataRow = $sheet->rangeToArray(
                            'A' . $row . ':' . $highestColumn . $row,
                            NULL,
                            TRUE,
                            FALSE
                        );
                        $pass = random_bytes(8);
                        $kolom_value['NIS'] = $dataRow[0][0];
                        $kolom_value['Nama'] = $dataRow[0][1];
                        $kolom_value['Kelas'] = $dataRow[0][2];
                        $kolom_value['NamaOrtu'] = $dataRow[0][3];
                        $kolom_value['NoTelOrtu'] = $dataRow[0][4];
                        $kolom_value['Password'] = bin2hex($pass);
                        $kolom_value['Angkatan'] = $angkatan;

                        $model->buatAkunSiswa($kolom_value);
                    }
                } catch (Exception $e) {
                    die("Error membaca file Excel: " . $e->getMessage());
                }
            } else {
                $data['file_error'] = "Ekstensi file tidak valid. Hanya .xlsx dan .xls yang diizinkan.";
                $this->view('templates/header_admin', $data);
                $this->view('admin/buat_akun_siswa', $data);
                $this->view('templates/footer');
                return;
            }

            header('Location: ' . BASEURL . '/admin');
            exit;
        }

        $this->view('templates/header_admin', $data);
        $this->view('admin/buat_akun_siswa', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu buat akun guru bk
    public function buat_akun_bk()
    {
        requireRole('Admin');
        // Mengatur judul halaman
        $data['title'] = 'Buat Akun BK';

        // Memproses form jika metode request adalah POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nip = trim($_POST['NIP']);
            $nama = trim($_POST['Nama']);
            $role = 'BK';
            $password = trim($_POST['Password']);

            $dataUser = [
                'IDPengenal' => $nip,
                'Role' => $role,
                'Password' => $password
            ];

            $dataBK = [
                'NIP' => $nip,
                'Nama' => $nama
            ];

            $this->model('User')->createBK($dataUser, $dataBK);
            header('Location: ' . BASEURL . '/admin/index');
            exit;
        }
        $this->view('templates/header_admin', $data);
        $this->view('admin/buat_akun_bk', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu hapus angkatan
    public function hapus_angkatan()
    {
        requireRole('Admin');
        $data['title'] = 'Hapus Angkatan';
        $model = $this->model('User');

        // Jika ada request POST untuk hapus
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['angkatan'])) {
            $angkatan = $_POST['angkatan'];
            $model->hapusAngkatan($angkatan);
            header('Location: ' . BASEURL . '/admin/hapus_angkatan');
            exit;
        }

        // Ambil daftar angkatan unik dari tabel Siswa
        $data['angkatan'] = $model->getAllAngkatan();
        $this->view('templates/header_admin', $data);
        $this->view('admin/hapus_angkatan', $data);
        $this->view('templates/footer');
    }
}
