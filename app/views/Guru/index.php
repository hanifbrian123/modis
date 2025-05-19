<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pelanggaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <style>
        body {
            background-image: url('bg-all.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style> -->
</head>
<body class="bg-[url('<?= BASEURL; ?>/img/bg-all.png')] bg-cover bg-center min-h-screen">
    <!-- Overlay Container -->
    <div class="bg-white/80 min-h-screen">
        <!-- Navbar -->
        <nav class="bg-blue-900 text-white p-4 flex justify-between items-center">
    <div class="flex items-center w-full">
        <img src="<?= BASEURL; ?>/img/logo.png" alt="Logo" class="w-12 h-12">
        <div class="flex-1 flex justify-center">
            <ul class="flex space-x-[200px] font-semibold">
                <li><a href="#" class="border-b-2 border-white pb-1">Laporan</a></li>
                <li><a href="#">Pelanggaran</a></li>
                <li><a href="#">Pemanggilan</a></li>
                <li><a href="#">Konseling</a></li>
            </ul>
        </div>
    </div>
    <div>
        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-900" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-3 0-9 1.5-9 4.5V18h18v-1.5c0-3-6-4.5-9-4.5z" />
            </svg>
        </div>
    </div>
</nav>

        <!-- Konten -->
        <section class="p-8">
            <div class="bg-white rounded-xl shadow-xl p-6">
                <h1 class="text-2xl font-bold mb-6">Laporan pelanggaran</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php for ($i = 0; $i < 6; $i++): ?>
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <img src="<?= BASEURL; ?>/img/pelanggaran.png" alt="Pelanggaran" class="rounded-md h-56 w-full object-cover">
                            <div class="mt-4 text-center">
                                <h2 class="font-bold text-lg">Lorem Ipsum</h2>
                                <p class="text-gray-600 font-semibold">Terlambat</p>
                                <p class="text-sm text-gray-500 mt-1">Deskripsi singkat tentang pelanggaran</p>
                                <div class="mt-4 flex justify-center space-x-4">
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">Tolak</button>
                                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded">Terima</button>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>