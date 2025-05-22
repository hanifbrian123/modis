<?php
$current_page = $data['title'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title'] ?></title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css">
</head>

<body class="bg-[url('<?= BASEURL; ?>/img/bg-all.png')] bg-cover bg-center min-h-screen flex flex-col">

  <nav class="bg-[#294A70]">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-20 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex h-full items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 h-full items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex shrink-0 items-center">
            <img class="h-14 w-auto" src="<?= BASEURL; ?>/img/logo.png" alt="logo SMAN 1 Gresik" />
          </div>
          <div class="hidden h-full sm:ml-6 sm:block">
            <div class="flex items-center h-full space-x-4">
              <a href="<?= BASEURL; ?>/guru/laporan" class="px-3 py-2 text-base font-bold text-white hover:underline hover:underline-offset-8 hover:decoration-2 <?= ($current_page == 'Laporan') ? 'underline decoration-2 underline-offset-8' : '' ?>" aria-current="page">Laporan</a>
              <a href="<?= BASEURL; ?>/guru/pelanggaran" class="px-3 py-2 text-base font-bold text-white hover:underline hover:underline-offset-8 hover:decoration-2 <?= ($current_page == 'Pelanggaran') ? 'underline decoration-2 underline-offset-8' : '' ?>">Pelanggaran</a>
              <a href="<?= BASEURL; ?>/guru/pemanggilan" class="px-3 py-2 text-base font-bold text-white hover:underline hover:underline-offset-8 hover:decoration-2 <?= ($current_page == 'Pemanggilan') ? 'underline decoration-2 underline-offset-8' : '' ?>">Pemanggilan</a>
              <a href="<?= BASEURL; ?>/guru/konseling" class="px-3 py-2 text-base font-bold text-white hover:underline hover:underline-offset-8 hover:decoration-2 <?= ($current_page == 'Konseling') ? 'underline decoration-2 underline-offset-8' : '' ?>">Konseling</a>
            </div>
          </div>
        </div>
        <div class="absolute h-full inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="size-10 rounded-full" src="<?= BASEURL; ?>/img/profile-icon.png" alt="icon-profile" />
              </button>
            </div>

            <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->

          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <a href="#" class="block rounded-md bg-[#1A2F47] px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-[#345E8E] hover:text-white">Pelanggaran</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-[#345E8E] hover:text-white">Laporan</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-[#345E8E] hover:text-white">Daftar Ortu</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-[#345E8E] hover:text-white">Konseling</a>
      </div>
    </div>
  </nav>

<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
