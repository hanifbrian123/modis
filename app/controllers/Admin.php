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
        // Memproses form jika metode request adalah POST
        if (isset($_FILES['excel_file'])) {
            // Cek apakah masuk ke kondisi ini
            if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['excel_file']['tmp_name'];
                $fileName = $_FILES['excel_file']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                $allowedfileExtensions = array('xlsx', 'xls');

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // Tentukan reader berdasarkan ekstensi file
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

                        // Looping untuk membaca data dari setiap baris
                        // Asumsi baris pertama adalah header, jadi mulai dari baris kedua (index 2)
                        
                        for ($row = 2; $row <= $highestRow; $row++) {
                            // Ambil data dari sel-sel di baris ini
                            // Sesuaikan indeks kolom (A=1, B=2, dst.) dengan struktur Excel Anda
                            $data = $sheet->rangeToArray(
                                'A' . $row . ':' . $highestColumn . $row,
                                NULL,
                                TRUE,
                                FALSE
                            );
                            $pass = random_bytes(8);
                            // Ambil nilai dari array $data (misalnya, jika kolom A adalah nama, kolom B adalah usia)
                            $kolom_value['NIS'] = $data[0][0]; // Kolom A
                            $kolom_value['Nama'] = $data[0][1]; // Kolom B
                            $kolom_value['Kelas'] = $data[0][2]; // Kolom C
                            $kolom_value['NamaOrtu'] = $data[0][3]; // Kolom D
                            $kolom_value['NoTelOrtu'] = $data[0][4]; // Kolom E
                            $kolom_value['Password'] = bin2hex($pass); //password acak
                            $kolom_value['Angkatan'] = $_POST['angkatan']; // Ambil dari input form

                            $model->buatAkunSiswa($kolom_value);
                        }
                    } catch (Exception $e) {
                        die("Error membaca file Excel: " . $e->getMessage());
                    }
                } else {
                    echo "Ekstensi file tidak valid. Hanya .xlsx dan .xls yang diizinkan.";
                }
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
