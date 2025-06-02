<form action="<?= BASEURL ?>/guru/simpan" method="POST" enctype="multipart/form-data">
  <!-- SESUAIKAN UKURAN BOX MAIN -->
  <main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
    <div>
      <h1 class="text-2xl font-bold text-center mb-8">Tambah Pelanggaran</h1>
    </div>

    <!-- Nama Pelanggar -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Nama Pelanggar <span class="text-red-500">*</span></label>
      <select name="nis" required
        class="w-full bg-blue-200 text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Pilih nama siswa</option>
        <?php foreach ($data['siswa'] as $s): ?>
          <option value="<?= $s['nis'] ?>"><?= $s['nama'] ?> (<?= $s['nis'] ?>)</option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Jenis Pelanggaran -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Pilih Jenis Pelanggaran <span class="text-red-500">*</span></label>
      <select name="pelanggaran" required
        class="w-full bg-blue-200 text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
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
              file:bg-blue-200 file:text-black
              hover:file:bg-blue-300 transition" />
    </div>

    <!-- Deskripsi -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Deskripsi Pelanggaran</label>
      <textarea name="deskripsi" rows="5" placeholder="Tambahkan Deskripsi Pelanggaran"
        class="w-full bg-blue-200 text-black px-4 py-3 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
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
