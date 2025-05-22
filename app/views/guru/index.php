    <div class="mb-6">
        <h1 class="text-2xl font-bold">Laporan pelanggaran</h1>
    </div>
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