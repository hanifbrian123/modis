<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css">
</head>

<body class="bg-[url('<?= BASEURL; ?>/img/bg-login.png')] bg-cover bg-center min-h-screen">
  <nav class="bg-white p-4">
    <div class="flex items-center space-x-4">
      <img src="<?= BASEURL; ?>/img/logo.png" alt="Logo SMAN 1 Gresik" class="w-16 h-16 object-contain">
      <div>
        <h1 class="text-lg font-bold text-yellow-500">SMAN 1 GRESIK</h1>
        <p class="text-sm">WE HAVE PRIDE</p>
      </div>
    </div>
  </nav>

  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-3xl">
      <h2 class="text-center text-4xl font-black tracking-tight text-white text-shadow-lg/30">SISTEM MONITORING <br>AKTIVITAS DAN PELANGGARAN</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-1/2 sm:max-w-sm bg-white rounded-lg shadow-lg/30 p-6">
      <h4 class="text-2xl font-bold text-center mb-8">Login</h4>
      <form class="space-y-6" action="#" method="POST">
        <div>
          <label for="nis" class="block text-sm/6 font-medium text-gray-900">NIS/NIP</label>
          <div class="mt-2">
            <input type="text" name="nis" id="nis" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-dark placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-yellow-500 sm:text-sm/6">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-dark placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-yellow-500 sm:text-sm/6">
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-yellow-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500">Sign in</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>