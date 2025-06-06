<main class="m-4 sm:m-6 p-4 sm:p-8 flex-1 bg-white rounded-3xl shadow-lg/25 overflow-x-auto">

  <!-- Header dan Search -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
    <h1 class="text-xl sm:text-2xl font-bold">Daftar Siswa</h1>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-1 md:gap-2 w-full md:w-auto">
      <div class="relative w-full sm:w-64">
        <input id="pencarianSiswa" type="text" placeholder="Cari Siswa..."
          class="w-full pl-10 pr-2 py-2 border-2 border-gray-950 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
          <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.6071 0C16.4653 0 21.2143 4.74898 21.2143 10.6071C21.2143 13.1891 20.2918 15.5556 18.7584 17.395L26.7176 25.3539C27.0941 25.7304 27.0941 26.341 26.7176 26.7176C26.3828 27.0523 25.8632 27.0895 25.4874 26.8291L25.3539 26.7176L17.395 18.7584C15.5556 20.2918 13.1891 21.2143 10.6071 21.2143C4.74898 21.2143 0 16.4653 0 10.6071C0 4.74898 4.74898 0 10.6071 0ZM10.6071 1.92857C5.8141 1.92857 1.92857 5.8141 1.92857 10.6071C1.92857 15.4002 5.8141 19.2857 10.6071 19.2857C15.4002 19.2857 19.2857 15.4002 19.2857 10.6071C19.2857 5.8141 15.4002 1.92857 10.6071 1.92857Z" fill="black" fill-opacity="0.4"/></svg>
        </div>
      </div>
      <button
        class="w-full sm:w-auto border-2 border-gray-950 bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600">
        <a href="<?= BASEURL ?>/guru/tambah_pelanggaran/" class="btn">Tambah Pelanggaran</a>
      </button>
    </div>
  </div>

  <!-- Table Wrapper untuk scroll horizontal di mobile -->
  <div class="overflow-x-auto">
    <table class="w-full table-auto min-w-[600px]">
      <thead>
        <tr class="text-left border-y">
          <th class="p-2">NO</th>
          <th class="p-2">NAMA</th>
          <th class="p-2">NIS</th>
          <th class="p-2">Poin</th>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody id="tabelSiswa">
        <?php $no = 1; foreach ($data['siswa'] as $s): ?>
        <tr class="hover:bg-gray-50 border-y">
          <td class="p-2"><?= $no++; ?></td>
          <td class="p-2"><?= $s['Nama']; ?></td>
          <td class="p-2"><?= $s['NIS']; ?></td>
          <td class="p-2"><?= $s['Poin']; ?></td>
          <td class="p-2">
            <button class="bg-orange-400 text-white px-3 py-1 rounded-lg hover:bg-orange-500">
              <a href="<?= BASEURL ?>/guru/daftar_pelanggaran/<?= $s['NIS'] ?>" class="btn">Lihat Profil</a>
            </button>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- Tambahkan baris lain -->
      </tbody>
    </table>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const inputPencarian = document.getElementById('pencarianSiswa');
      const tabelSiswa = document.getElementById('tabelSiswa');

      inputPencarian.addEventListener('input', function () {
        const searchTerm = inputPencarian.value.toLowerCase();

        Array.from(tabelSiswa.rows).forEach(row => {
          const nama = row.cells[1].textContent.toLowerCase();
          const nis = row.cells[2].textContent.toLowerCase();

          const cocok = nama.includes(searchTerm) || nis.includes(searchTerm);

          row.style.display = cocok ? '' : 'none';
        });
      });
    });
  </script>

</main>
