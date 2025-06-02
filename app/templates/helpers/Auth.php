<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function isLoggedIn(): bool
{
  return isset($_SESSION['login']) && $_SESSION['login'] === true;
}

function currentUserRole(): ?string
{
  return $_SESSION['role'] ?? null;
}

function currentUserId(): ?string
{
  return $_SESSION['IDPengenal'] ?? null;
}

function requireRole(string $role): void
{
  if (!isLoggedIn()) {
    header('Location: ' . BASEURL);
    exit;
  }

  if (currentUserRole() !== $role) {
    switch (currentUserRole()) {
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
    }
    exit;
  }
}

function logout(): void
{
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  session_unset();
  session_destroy();
  header('Location: ' . BASEURL);
  exit;
}
