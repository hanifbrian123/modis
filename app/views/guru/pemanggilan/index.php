<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold">Daftar Pemanggilan</h1>
    <p class="text-gray-600 mt-1 mb-4">Daftar siswa yang orang tuanya perlu dihubungi</p>
    <div class="p-6">
      <div class="overflow-x-auto">
        <table class="w-full table-auto min-w-[600px]">
          <thead>
            <tr class="text-left border-y">
              <th class="p-2">NO</th>
              <th class="p-2">NAMA</th>
              <th class="p-2">Nama ortu</th>
              <th class="p-2">No telp</th>
              <th class="p-2">Aksi</th>
              <th class="p-2">Total Point</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($data['pemanggilan'] as $p): ?>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2"><?= $no++ ?></td>
                <td class="p-2"><?= $p['NamaSiswa'] ?></td>
                <td class="p-2"><?= $p['NamaOrtu'] ?></td>
                <td class="p-2"><?= $p['NoTelOrtu'] ?></td>
                <td class="p-2">
                  <?php if ($p['Status_Pemanggilan'] == 'Terkirim'): ?>
                    <span class="inline-block bg-green-500 text-white px-5 py-1 rounded text-sm font-semibold">Terkirim</span>
                  <?php else: ?>
                    <a href="<?= BASEURL ?>/guru/detail_pemanggilan/<?= $p['PemanggilanID'] ?>"
                      class="inline-block bg-yellow-400 text-white px-5 py-1 rounded text-sm font-semibold hover:bg-yellow-500 transition">
                      Kirim Pesan
                    </a>
                  <?php endif; ?>
                </td>
                <td class="p-2">
                  <span class="bg-red-600 text-white px-3 py-1 rounded text-sm font-bold"><?= $p['TotalPoin'] ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</main>

<!-- PAKE ALERT BUAT NAMPILIN POP UP MEMBUAT PESAN UNTUK WALI MURID -->