<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Laporan pelanggaran</h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($data['laporan'] as $satu_laporan): ?>
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="<?= BASEURL; ?>/uploads/<?=$satu_laporan['bukti'] ?>" alt="Pelanggaran" class="rounded-md h-56 w-full object-cover">
                <div class="mt-4 text-center">
                    <h2 class="font-bold text-lg"><?= $satu_laporan['Nama_Terlapor']  ?></h2>
                    <p class="text-gray-600 font-semibold">Oleh : <?= $satu_laporan['Nama_Pelapor'] ?> </p>
                    <p class="text-gray-600 font-semibold"><?= $satu_laporan['Jenis_Pelanggaran'] ?></p>
                    <p class="text-sm text-gray-500 mt-1"><?= $satu_laporan['Deskripsi'] ?></p>
                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="<?= BASEURL ?>/guru/tolak_laporan/<?= $satu_laporan['ID'] ?>">
                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">Tolak</button>
                        </a>
                        <a href="<?= BASEURL ?>/guru/terima_laporan/<?= $satu_laporan['ID'] ?>">
                            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded">Terima</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>