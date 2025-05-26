<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25 max-sm:hidden">
  <!-- Profile Header -->
  <div class="mb-6">
    <h2 class="text-2xl font-bold mb-4">Profile siswa</h2>
    <div class="grid grid-cols-1 gap-1 text-sm">
      <div class="flex">
        <span class="font-medium w-16">Nama</span>
        <span class="mx-2">:</span>
        <span>Lorem ipsum sit dolor</span>
      </div>
      <div class="flex">
        <span class="font-medium w-16">Kelas</span>
        <span class="mx-2">:</span>
        <span>12 - 4</span>
      </div>
      <div class="flex">
        <span class="font-medium w-16">NIS</span>
        <span class="mx-2">:</span>
        <span>231338136123</span>
      </div>
    </div>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full border-collapse">
      <!-- Table Header -->
      <thead>
        <tr class="border-b-2 border-gray-300">
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-12">No</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700">Jenis Pelanggaran</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-24">Gambar</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700">Deskripsi</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-32">Aksi</th>
        </tr>
      </thead>
      <!-- Table Body -->
      <tbody>
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <!-- Row -->
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-4 px-2 text-center"><?= $i ?></td>
            <td class="py-4 px-2">Telat</td>
            <td class="py-4 px-2">
              <img src="<?= BASEURL ?>/img/pelanggaran.png"
                alt="Gambar pelanggaran"
                class="w-24 h-16 object-cover rounded-xl">
            </td>
            <td class="py-4 px-2">Deskripsi singkat tentang pelanggaran</td>
            <td class="py-4 px-2">
              <div class="flex flex-col sm:flex-row gap-2">
                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                  Ubah
                </button>
                <button class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </button>
              </div>
            </td>
          </tr>

        <?php endfor; ?>
      </tbody>
    </table>
  </div>

</main>

<!-- Mobile Card View (Hidden on desktop) -->
<div class="bg-white rounded-lg shadow-md p-6 mx-auto max-w-6xl mt-4 blocl md:hidden">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile siswa</h2>
  <div class="space-y-2 text-sm mb-6">
    <div class="flex">
      <span class="font-medium w-16">Nama</span>
      <span class="mx-2">:</span>
      <span>Lorem ipsum sit dolor</span>
    </div>
    <div class="flex">
      <span class="font-medium w-16">Kelas</span>
      <span class="mx-2">:</span>
      <span>12 - 4</span>
    </div>
    <div class="flex">
      <span class="font-medium w-16">NIS</span>
      <span class="mx-2">:</span>
      <span>231338136123</span>
    </div>
  </div>

  <!-- Mobile Cards -->
  <div class="space-y-4">
    <!-- Card -->
    <?php for ($i = 1; $i <= 5; $i++): ?>

      <div class="border border-gray-200 rounded-lg p-4">

        <div class="flex justify-between items-start mb-3">
          <span class="text-lg font-semibold text-gray-800"><?= "#" . $i ?></span>
          <div class="flex gap-2">
            <button class="text-blue-600 text-sm font-medium">Ubah</button>
            <button class="text-red-600 text-sm font-medium">Hapus</button>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
          <div>
            <p class="text-xs text-gray-500 mb-1">Jenis</p>
            <p class="text-sm font-medium">Telat</p>
          </div>
          <div>
            <p class="text-xs text-gray-500 mb-1">Gambar</p>
            <img src="<?= BASEURL ?>/img/pelanggaran.png"
              alt="Gambar Pelanggaran"
              class="w-20 h-16 object-cover rounded-xl">
          </div>
          <div>
            <p class="text-xs text-gray-500 mb-1">Deskripsi</p>
            <p class="text-sm">Deskripsi singkat tentang pelanggaran</p>
          </div>
        </div>
      </div>

    <?php endfor; ?>
  </div>
</div>