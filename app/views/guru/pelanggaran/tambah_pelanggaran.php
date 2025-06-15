<form action="<?= BASEURL ?>/guru/simpan" method="POST" enctype="multipart/form-data">
  <!-- SESUAIKAN UKURAN BOX MAIN -->
  <main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
    <div>
      <h1 class="text-2xl font-bold text-center mb-8">Tambah Pelanggaran</h1>
    </div>

    <!-- Nama Pelanggar (Dropdown Searchable) -->
<div x-data="dropdown()" class="relative mb-6">
  <label class="block font-semibold mb-2">Nama Pelanggar <span class="text-red-500">*</span></label>
  <input
    type="text"
    x-model="search"
    @click="open = true"
    @keydown.escape="open = false"
    @click.away="open = false"
    placeholder="Cari nama siswa..."
    class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
    required
  >
  
  <input type="hidden" name="nis" :value="selectedNis" />

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
      <label class="block font-semibold mb-2">Pilih Jenis Pelanggaran <span class="text-red-500">*</span></label>
      <select name="pelanggaran" required
        class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Pilih jenis pelanggaran</option>
        <?php foreach ($data['pelanggaran'] as $p): ?>
          <option value="<?= $p['ID'] ?>"><?= $p['NamaPelanggaran'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Bukti Gambar -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Bukti Gambar</label>
      <input type="file" name="bukti" accept="image/*"
        class="block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-[#bbcde4] file:text-black
              hover:file:bg-blue-300 transition" required/>
    </div>

    <!-- Deskripsi -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Deskripsi Pelanggaran</label>
      <textarea name="deskripsi" rows="5" placeholder="Tambahkan Deskripsi Pelanggaran"
        class="w-full bg-[#bbcde4] text-black px-4 py-3 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-end">
      <button type="submit"
        class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">
        Tambah
      </button>
    </div>
  </main>
</form>
<script>
  function dropdown() {
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
</script>
