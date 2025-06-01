<?php
class Flasher
{
  public static function setFlash($message, $type)
  {
    $_SESSION['flash'] = [
      'message' => $message,
      'type' => $type
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo "<script>
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: '{$_SESSION['flash']['type']}',
          title: '{$_SESSION['flash']['message']}',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
        });
      </script>";
      unset($_SESSION['flash']);
    }
  }
}
