<?php
class Admin extends Controller
{
    // Controller untuk menu home
    public function index()
    {
        $data['title'] = 'Home';
        $this->view('templates/header_admin', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu buat akun siswa
    public function buat_akun_siswa()
    {
        $data['title'] = 'Buat Akun Siswa';
        $this->view('templates/header_admin', $data);
        $this->view('admin/buat_akun_siswa', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu buat akun guru bk
    public function buat_akun_bk()
    {
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
                'Password' => password_hash($password, PASSWORD_DEFAULT) 
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
