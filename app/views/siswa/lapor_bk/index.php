<!-- SESUAIKAN UKURAN BOX MAIN -->
<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold text-center mb-8">Laporankan Kepada BK</h1>
  </div>

  <form action="<?= BASEURL ?>/siswa/simpan_laporan" method="POST" enctype="multipart/form-data">
    <!-- Nama Pelanggar Searchable Dropdown -->
<div x-data="dropdownTerlapor()" class="relative mb-6">
  <label class="block font-semibold mb-2">Nama Pelanggar *</label>
  
  <input
    type="text"
    x-model="search"
    @click="open = true"
    @keydown.escape="open = false"
    @click.away="open = false"
    placeholder="Cari nama siswa..."
    class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
  
  >

  <input type="hidden" name="nis_terlapor" :value="selectedNis" />

  <ul
    x-show="open && filteredOptions.length > 0"
    class="absolute z-10 mt-2 w-full bg-white border border-gray-300 rounded-lg max-h-48 overflow-y-auto shadow-lg"
  >
    <template x-for="item in filteredOptions" :key="item.nis">
      <li
        @click="select(item)"
        class="px-4 py-2 hover:bg-blue-100 cursor-pointer"
        x-text="item.nama + ' (' + item.nis + ')'">
      </li>
    </template>
  </ul>
</div>


    <!-- Jenis Pelanggaran -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Pilih Jenis Pelanggaran *</label>
      <select name="jenis" class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php  foreach ($data['pelanggaran'] as $p): ?>
          <option value="<?= $p['ID'] ?>"><?= $p['NamaPelanggaran'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Bukti Gambar -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Bukti Gambar</label>
      <input type="file" name="bukti" accept="image/*" class="
              block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-[#bbcde4] file:text-black
              hover:file:bg-blue-300 transition">
    </div>

    <!-- Deskripsi -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Deskripsi Pelanggaran</label>
      <textarea name="deskripsi" id="txtarea" rows="5" class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Tambahkan Deskripsi Pelanggaran"></textarea>
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-end">
      <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">Kirim</button>
    </div>
  </form>
</main>

<script>
  function dropdownTerlapor() {
    return {
      open: false,
      search: '',
      selectedNis: '',
      options: <?= json_encode($data['siswa']) ?>,
      get filteredOptions() {
        if (this.search === '') return this.options;
        return this.options.filter(item =>
          item.nama.toLowerCase().includes(this.search.toLowerCase()) ||
          item.nis.toLowerCase().includes(this.search.toLowerCase())
        );
      },
      select(item) {
        this.search = `${item.nama} (${item.nis})`;
        this.selectedNis = item.nis;
        this.open = false;
      }
    }
  }
  document.querySelector('form').addEventListener('submit', function (e) {
    const selectedNis = document.querySelector('input[name="nis_terlapor"]').value.trim();
    const deskripsi = document.getElementById('txtarea').value.trim();
    const jenis = document.querySelector('select[name="jenis"]').value;
    const fileInput = document.querySelector('input[name="bukti"]');
    const file = fileInput.files[0];

    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
    const maxSize = 3 * 1024 * 1024; // 3MB

    // Validasi NIS terlapor
    if (!selectedNis) {
      e.preventDefault();
      alert('Silakan pilih nama pelanggar dari daftar.');
      return;
    }

    // Validasi jenis pelanggaran
    if (!jenis || isNaN(jenis)) {
      e.preventDefault();
      alert('Jenis pelanggaran tidak valid.');
      return;
    }

    // Validasi deskripsi
    if (deskripsi.length < 10) {
      e.preventDefault();
      alert('Deskripsi pelanggaran minimal 10 karakter.');
      return;
    }

    // Validasi file gambar
    if (!file) {
      e.preventDefault();
      alert('Bukti gambar wajib diunggah.');
      return;
    }

    if (!allowedTypes.includes(file.type)) {
      e.preventDefault();
      alert('Jenis file tidak didukung. Hanya gambar JPG, JPEG, PNG, atau WEBP yang diizinkan.');
      fileInput.value = '';
      return;
    }

    if (file.size > maxSize) {
      e.preventDefault();
      alert('Ukuran gambar maksimal 3MB.');
      fileInput.value = '';
      return;
    }
  });

</script>
