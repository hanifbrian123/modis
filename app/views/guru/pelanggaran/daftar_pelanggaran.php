<?= Flasher::flash(); ?>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 shadow-xl">
    <div class="text-center">
      <!-- Warning Icon -->
      <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full border-4 border-black mb-4">
        <span class="text-3xl font-bold text-black">!</span>
      </div>

      <!-- Modal Text -->
      <h3 class="text-xl font-semibold text-gray-900 mb-2">
        Apakah anda yakin ingin menghapus pelanggaran ini?
      </h3>

      <!-- Action Buttons -->
      <div class="flex gap-3 justify-center mt-6">
        <button onclick="closeDeleteModal()"
          class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition-colors">
          Tidak
        </button>
        <button onclick="confirmDelete()"
          class="px-8 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition-colors">
          Iya
        </button>
      </div>
    </div>
  </div>
</div>

<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25 max-sm:hidden">
  <!-- Profile Header -->
  <div class="mb-6">
    <h2 class="text-2xl font-bold mb-4">Profile siswa</h2>
    <div class="grid grid-cols-1 gap-1 text-sm">
      <div class="flex">
        <span class="font-medium w-16">Nama</span>
        <span class="mx-2">:</span>
        <span><?= $data['siswa']['Nama'] ?></span>
      </div>
      <div class="flex">
        <span class="font-medium w-16">Kelas</span>
        <span class="mx-2">:</span>
        <span><?= $data['siswa']['Kelas'] ?></span>
      </div>
      <div class="flex">
        <span class="font-medium w-16">NIS</span>
        <span class="mx-2">:</span>
        <span><?= $data['siswa']['NIS'] ?></span>
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
        <?php foreach ($data['daftar_pelanggaran'] as $no => $pelanggaran): ?>
          <!-- Row -->
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-4 px-2 text-center"><?= $no + 1 ?></td>
            <td class="py-4 px-2"><?= $pelanggaran['jenis_pelanggaran'] ?></td>
            <td class="py-4 px-2">
              <img src="<?= BASEURL ?>/img/pelanggaran.png"
                alt="Gambar pelanggaran"
                class="w-24 h-16 object-cover rounded-xl">
            </td>
            <td class="py-4 px-2"><?= $pelanggaran['deskripsi'] ?></td>
            <td class="py-4 px-2">
              <div class="flex flex-col sm:flex-row gap-2">
                <a href="<?= BASEURL; ?>/guru/edit_pelanggaran/<?= $pelanggaran['id'] ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1 font-semibold">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                  Ubah
                </a>
                <a href="<?= BASEURL; ?>/guru/hapus_pelanggaran/<?= $pelanggaran['id'] ?>" id="hapus" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1 font-semibold">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </a>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</main>

<!-- Mobile Card View (Hidden on desktop) -->
<div class="bg-white rounded-lg p-6 mx-auto max-w-6xl block md:hidden h-screen">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile siswa</h2>
  <div class="space-y-2 text-sm mb-6">
    <div class="flex">
      <span class="font-medium w-16">Nama</span>
      <span class="mx-2">:</span>
      <span><?= $data['siswa']['Nama'] ?></span>
    </div>
    <div class="flex">
      <span class="font-medium w-16">Kelas</span>
      <span class="mx-2">:</span>
      <span><?= $data['siswa']['Kelas'] ?></span>
    </div>
    <div class="flex">
      <span class="font-medium w-16">NIS</span>
      <span class="mx-2">:</span>
      <span><?= $data['siswa']['NIS'] ?></span>
    </div>
  </div>

  <!-- Mobile Cards -->
  <div class="space-y-4">
    <!-- Card -->
    <?php foreach ($data['daftar_pelanggaran'] as $no => $pelanggaran): ?>

      <div class="bg-[#ffffff] rounded-lg p-4 shadow-md/15">

        <div class="flex justify-between items-start mb-3">
          <span class="text-lg font-semibold text-gray-800"><?= "#" . $no + 1 ?></span>
          <div class="flex gap-2">
            <a class="text-blue-600 text-sm font-medium">Ubah</a>
            <button onclick="showDeleteModal(1)" class="text-red-600 text-sm font-medium">Hapus</button>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
          <div>
            <p class="text-xs text-gray-500 mb-1">Jenis</p>
            <p class="text-sm font-medium"><?= $pelanggaran['jenis_pelanggaran'] ?></p>
          </div>
          <div>
            <p class="text-xs text-gray-500 mb-1">Gambar</p>
            <img src="<?= BASEURL ?>/img/pelanggaran.png"
              alt="Gambar Pelanggaran"
              class="w-20 h-16 object-cover rounded-xl">
          </div>
          <div class="text-wrap">
            <p class="text-xs text-gray-500 mb-1">Deskripsi</p>
            <p class="text-sm overflow-hidden text-ellipsis whitespace-wrap"><?= $pelanggaran['deskripsi'] ?></p>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
</div>

<script>
  const deleteModal = document.getElementById('deleteModal');

  const showDeleteModal = (e) => {
    e.preventDefault();
    deleteModal.classList.remove('hidden');
  }
  const deleteButton = document.getElementById('hapus');
  deleteButton.addEventListener('click', showDeleteModal);

  function closeDeleteModal() {
    deleteModal.classList.add('hidden');
  }

  const confirmDelete = () => {
    deleteModal.classList.add('hidden');
    window.location.href = deleteButton.href;
  }

  // Close modal when clicking outside
  deleteModal.addEventListener('click', function(e) {
    if (e.target === this) {
      closeDeleteModal();
    }
  });
</script>