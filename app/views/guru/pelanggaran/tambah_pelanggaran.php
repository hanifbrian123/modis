<!-- SESUAIKAN UKURAN BOX MAIN -->
<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold text-center mb-8">Tambah Pelanggaran</h1>
  </div>

  <!-- Nama Pelanggar -->
  <div class="mb-6">
    <label class="block font-semibold mb-2">Nama Pelanggar <span class="text-red-500">*</span></label>
    <select
      class="w-full bg-blue-200 text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option>Pilih nama siswa</option>
    </select>
  </div>

  <!-- Jenis Pelanggaran -->
  <div class="mb-6">
    <label class="block font-semibold mb-2">Pilih Jenis Pelanggaran <span class="text-red-500">*</span></label>
    <select
      class="w-full bg-blue-200 text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
      <option>Terlambat</option>
    </select>
  </div>

  <!-- Bukti Gambar -->
  <div class="mb-6">
    <label class="block font-semibold mb-2">Bukti Gambar</label>
    <button
      class="bg-blue-200 text-black px-6 py-2 rounded-full shadow hover:bg-blue-300 transition">
      Tambah
    </button>
  </div>

  <!-- Deskripsi -->
  <div class="mb-6">
    <label class="block font-semibold mb-2">Deskripsi Pelanggaran</label>
    <textarea rows="5" placeholder="Tambahkan Deskripsi Pelanggaran"
      class="w-full bg-blue-200 text-black px-4 py-3 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
  </div>

  <!-- Tombol Submit -->
  <div class="flex justify-end">
    <button
      class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">
      Tambah
    </button>
  </div>
</main>