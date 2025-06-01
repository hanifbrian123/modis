<!-- SESUIKAN UKURAN BOX MAIN -->
<main class="m-6 p-8 flex-1 bg-[#ffffff] place-self-center rounded-3xl shadow-lg/25 sm:w-auto md:w-md xl:w-3xl">
  <div class="mb-10">
    <h1 class="text-2xl font-bold place-self-center">Kirim Pesan</h1>
  </div>

  <form action="<?= BASEURL ?>/siswa/kirimpesan" method="post">

    <input type="text" name="nis" value="<?= $_SESSION['nis'] ?>" hidden>
    <!-- Topik Pesan -->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Pilih Topik Pesan <span class="text-red-500">*</span></label>
      <select name="topikpesan" required
        class="w-full bg-blue-200 text-black px-4 py-3 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
      
        <option value="Akademik" >Akademik</option>
        <option value="Pribadi dan Sosial" >Pribadi dan Sosial</option>
        <option value="Karir dan Masa Depan" >Karir dan Masa Depan</option>
        <option value="Lain - lain" >Lain - lain</option>

      </select>
    </div>
    <!-- Deskripsi Pesan-->
    <div class="mb-6">
      <label class="block font-semibold mb-2">Pesan</label>
      <textarea rows="10" name="isi_pesan" placeholder="Tulis Pesan Anda di sini..."
        class="w-full bg-blue-200 text-black px-4 py-3 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-end">
      <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">
        Kirim Pesan
      </button>
    </div>
  </form>
</main>