<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black/75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 shadow-xl">
    <div class="text-center">
      <!-- Success Icon -->
      <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full border-4 border-green-600 mb-4">
        <span class="text-3xl font-bold text-green-600">&#10003;</span>
      </div>
      <!-- Modal Text -->
      <h3 class="text-xl font-semibold text-gray-900 mb-2">
        Pesan berhasil terkirim!
      </h3>
      <div class="flex gap-3 justify-center mt-6">
        <button onclick="submitKirimForm()"
          class="px-8 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition-colors">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold">Detail Pelanggaran </h1> <br>
      <div class="mb-4">
        <p><strong>Nama</strong> : <?= htmlspecialchars($data['detail']['Nama']); ?></p>
        <p><strong>Kelas</strong> : <?= htmlspecialchars($data['detail']['Kelas']); ?></p>
        <p><strong>NIS</strong> : <?= htmlspecialchars($data['detail']['NIS']); ?></p>
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
            <?php
              $total = 0; $no = 1;
              foreach ($data['pelanggaran'] as $row):
                $total += $row['Bobot'];
            ?>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2"><?= $no++; ?></td>
                <td class="p-2"><?= htmlspecialchars($row['NamaPelanggaran']); ?></td>
                <td class="p-2"><?= htmlspecialchars($row['Tgl']); ?></td>
                <td class="p-2">
                  <span class="bg-red-600 text-white px-3 py-1 rounded text-sm font-bold"><?= $row['Bobot']; ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="text-right font-bold mb-6">
        Total Poin: <span class="text-red-500 text-xl"><?= $total; ?></span>
      </div>

      <form method="post" action="<?= BASEURL ?>/guru/kirim_pemanggilan">
        <input type="hidden" name="nis" value="<?= htmlspecialchars($data['detail']['NIS']); ?>">
        <input type="hidden" name="pemanggilan_id" value="<?= htmlspecialchars($data['detail']['pemanggilan_id']); ?>">

        <div class="flex justify-between">
          <a href="<?= BASEURL ?>/guru/pemanggilan" class="bg-gray-500 text-white px-5 py-2 rounded">Kembali</a>
          <button type="button" id="btnKirim" class="bg-green-600 text-white px-5 py-2 rounded">Kirim</button>
        </div>
      </form>
  </div>
</main>

<script>
  
  

  // Modal Kirim
  document.getElementById('btnKirim').addEventListener('click', function(e) {
    document.getElementById('successModal').classList.remove('hidden');
  });

  function submitKirimForm() {
    document.getElementById('successModal').classList.add('hidden');
    document.querySelector('form[action*="kirim_pemanggilan"]').submit();
  }
</script>