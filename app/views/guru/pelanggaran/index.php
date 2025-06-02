<main class="m-4 sm:m-6 p-4 sm:p-8 flex-1 bg-white rounded-3xl shadow-lg/25 overflow-x-auto">

  <!-- Header dan Search -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
    <h1 class="text-xl sm:text-2xl font-bold">Daftar Siswa</h1>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 md:gap-4 w-full md:w-auto">
      <div class="relative w-full sm:w-64">
        <input type="text" placeholder="Cari Siswa..."
          class="w-full pl-10 pr-4 py-2 border-2 border-gray-950 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</div>
      </div>
      <button
        class="w-full sm:w-auto border-2 border-gray-950 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
        <a href="<?= BASEURL ?>/guru/tambah_pelanggaran/" class="btn">Tambah Pelanggaran</a>
      </button>
    </div>
  </div>

  <!-- Table Wrapper untuk scroll horizontal di mobile -->
  <div class="overflow-x-auto">
    <table class="w-full table-auto min-w-[600px]">
      <thead>
        <tr class="text-left border-y">
          <th class="p-2">NO</th>
          <th class="p-2">NAMA</th>
          <th class="p-2">NIS</th>
          <th class="p-2">Poin</th>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($data['siswa'] as $s): ?>
        <tr class="hover:bg-gray-50 border-y">
          <td class="p-2"><?= $no++; ?></td>
          <td class="p-2"><?= $s['Nama']; ?></td>
          <td class="p-2"><?= $s['NIS']; ?></td>
          <td class="p-2"><?= $s['Poin']; ?></td>
          <td class="p-2">
            <button class="bg-orange-400 text-white px-3 py-1 rounded-lg hover:bg-orange-500">
              <a href="<?= BASEURL ?>/guru_bk/daftar_pelanggaran/<?= $s['NIS'] ?>" class="btn">Lihat Profil</a>
            </button>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- Tambahkan baris lain -->
      </tbody>
    </table>
  </div>
</main>
