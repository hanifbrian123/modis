<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class="bg-white rounded-3xl shadow-lg/25 p-6 max-w-2xl mx-auto my-auto ">
    <div>
        <h1 class="text-2xl font-bold">Buat Akun Siswa</h1>
    </div>

    <form class="space-y-6" method="post" action="<?= BASEURL ?>/admin/buat_akun_siswa" enctype="multipart/form-data">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Angkatan</label>
            <input type="text" value="2025" name="angkatan"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>

        <div>
            <label for="fileInput" class="block text-gray-700 font-semibold mb-2">Insert data siswa</label>
            <div class="border border-gray-300 rounded-lg p-4">
                <input type="file" id="fileInput" name="excel_file" class="hidden" accept=".csv,.xlsx,.xls">
                <label for="fileInput"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded border cursor-pointer hover:bg-gray-300">
                    Choose File
                </label>
                <span id="fileName" class="ml-3 text-gray-500">Tidak ada file yang terpilih</span>
            </div>
        </div>

        <div class="text-center">
            <input type="submit" value="Buat Akun Siswa"
                class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-8 py-3 rounded-lg transition duration-200">
        </div>
    </form>
</main>
<script>
    const fileInput = document.getElementById('fileInput');
    const fileStatus = document.getElementById('fileName');

    fileInput.addEventListener('change', function () {
        // Memeriksa apakah ada file yang dipilih
        if (fileInput.files.length > 0) {
            fileStatus.textContent = `File dipilih: ${fileInput.files[0].name}`;
        } else {
            fileStatus.textContent = 'Tidak ada file yang dipilih.';
        }
    });
</script>