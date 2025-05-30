<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold">Detail Pelanggaran </h1> <br>
      <div class="mb-4">
        <p><strong>Nama</strong> : Budi Santoso</p>
        <p><strong>Kelas</strong> : X IPA 1</p>
        <p><strong>NIS</strong> : 123456</p>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full table-auto min-w-[600px]">
          <thead>
            <tr class="text-left border-y">
              <th class="p-2">No</th>
              <th class="p-2">Jenis Pelanggaran</th>
              <th class="p-2">Tanggal</th>
              <th class="p-2">Poin</th>
            </tr>
          </thead>
          <tbody>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">1</td>
                <td class="p-2">Terlambat Masuk Sekolah</td>
                <td class="p-2">2025-05-20</td>
                <td class="p-2">
                  <span class="bg-red-600 text-white px-3 py-1 rounded text-sm font-bold">10</span>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">2</td>
                <td class="p-2">Tidak Memakai Seragam</td>
                <td class="p-2">2025-05-22</td>
                <td class="p-2">
                  <span class="bg-red-600 text-white px-3 py-1 rounded text-sm font-bold">5</span>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

      <div class="text-right font-bold mb-6">
        Total Poin: <span class="text-red-500 text-xl">15</span>
      </div>

      <form method="post" action="#">
        <input type="hidden" name="nis" value="123456">
        <input type="hidden" name="pemanggilan_id" value="1">

        <div class="flex justify-between">
          <a href="<?= BASEURL ?>/guru/pemanggilan" class="bg-gray-500 text-white px-5 py-2 rounded">Kembali</a>
          <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded">Kirim</button>
        </div>
      </form>

    </div>
  </div>
</main>