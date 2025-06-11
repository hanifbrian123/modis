<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function isLoggedIn(): ?bool
{
  return (isset($_SESSION['login']) && $_SESSION['login'] === true);
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
    routingRole();
    exit;
  }
}

function routingRole()
{
  switch (currentUserRole()) {
    case 'Admin':
      header('Location: ' . BASEURL . '/admin');
      break;
    case 'BK':
      header('Location: ' . BASEURL . '/guru');
      break;
    case 'Siswa':
      header('Location: ' . BASEURL . '/siswa');
      break;
    default:
      header('Location: ' . BASEURL . '/');
  }
}
