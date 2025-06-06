<?php
class Login extends Controller
{
  public function index()
  {
    requireRole('');
    $this->view('login/index');
  }

  public function auth()
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    $id = $_POST['IDPengenal'];
    $password = $_POST['password'];

    $user = $this->model('User')->login($id, $password);

    if ($user) {
      $_SESSION['login'] = true;
      $_SESSION['IDPengenal'] = $user['IDPengenal'];
      $_SESSION['role'] = $user['Role'];

      // Redirect berdasarkan role
      switch ($user['Role']) {
        case 'Admin':
          header('Location: ' . BASEURL . '/admin');
          break;
        case 'BK':
          header('Location: ' . BASEURL . '/guru');
          break;
        case 'User':
          header('Location: ' . BASEURL . '/siswa');
          break;
        default:
          logout();
          break;
      }
    } else {
      $_SESSION['IDPengenal'] = $id;
      Flasher::setFlash('NIS/NIP atau Password salah', 'error');
      header('Location: ' . BASEURL . '/');
      exit;
    }
  }
}
