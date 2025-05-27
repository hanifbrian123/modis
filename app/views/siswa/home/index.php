<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25 max-sm:hidden">
  <div>
    <h2 class="text-2xl font-bold">Daftar Laporan</h2>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full border-collapse">
      <!-- Table Header -->
      <thead>
        <tr class="border-b-2 border-gray-300">
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-12">No</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700">Nama Siswa</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700">Jenis Pelanggaran</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-24">Gambar</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700">Deskripsi</th>
          <th class="text-left py-3 px-2 font-semibold text-gray-700 w-32">Status</th>
        </tr>
      </thead>
      <!-- Table Body -->
      <tbody>
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <!-- Row -->
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-4 px-2 text-center"><?= $i ?></td>
            <td class="py-4 px-2">Lorem, ipsum dolor.</td>
            <td class="py-4 px-2">Telat</td>
            <td class="py-4 px-2">
              <img src="<?= BASEURL ?>/img/pelanggaran.png"
                alt="Gambar pelanggaran"
                class="w-24 h-16 object-cover rounded-xl">
            </td>
            <td class="py-4 px-2">Deskripsi singkat tentang pelanggaran</td>
            <td class="py-4 px-2">
              <div class="flex flex-col sm:flex-row gap-2">
                <button
                  class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">
                  Diterima
                </button>

                <!-- Tombol Pending -->
                <!-- <button
                  class="bg-[#F4A024] text-white px-4 py-1 rounded-md hover:bg-[#D5830B] transition">
                  Pending
                </button> -->

                <!-- Tombol Ditolak -->
                <!-- <button
                  class="bg-[#FF0000] text-white px-4 py-1 rounded-md hover:bg-[#C70000] transition">
                  Ditolak
                </button> -->
              </div>
            </td>
          </tr>

        <?php endfor; ?>
      </tbody>
    </table>
  </div>

</main>

<!-- Mobile Card View (Hidden on desktop) -->
<div class="rounded-lg shadow-md p-6 mx-auto max-w-6xl blocl md:hidden">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Laporan</h2>

  <!-- Mobile Cards -->
  <div class="space-y-4">
    <!-- Card -->
    <?php for ($i = 1; $i <= 5; $i++): ?>

      <div class="border border-gray-200 bg-white shadow-md rounded-lg p-4">

        <div class="flex justify-between items-start mb-3">
          <span class="text-md font-semibold text-gray-800"><?= $i . "." ?> Gibran Gaming</span>
          <div class="flex">
            <button
              class="bg-green-500 text-white text-sm font-medium py-[2px] px-2 rounded-md hover:bg-green-600 transition">
              Diterima
            </button>

            <!-- Tombol Pending -->
            <!-- <button
              class="bg-[#F4A024] text-white text-sm font-medium py-[2px] px-2 rounded-md hover:bg-[#D5830B] transition">
              Pending
            </button> -->

            <!-- Tombol Ditolak -->
            <!-- <button
              class="bg-[#FF0000] text-white text-sm font-medium py-[2px] px-2 rounded-md hover:bg-[#C70000] transition">
              Ditolak
            </button> -->

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