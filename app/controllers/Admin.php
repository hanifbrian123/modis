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
        $data['title'] = 'Buat Akun BK';
        $this->view('templates/header_admin', $data);
        $this->view('admin/buat_akun_bk', $data);
        $this->view('templates/footer');
    }

    //  Controller untuk menu hapus angkatan
    public function hapus_angkatan()
    {
        $data['title'] = 'Hapus Angkatan';
        $this->view('templates/header_admin', $data);
        $this->view('admin/hapus_angkatan', $data);
        $this->view('templates/footer');
    }
}
