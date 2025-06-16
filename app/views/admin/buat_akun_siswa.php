<main class="bg-white rounded-3xl shadow-lg/25 p-6 max-w-2xl mx-auto my-auto ">
    <div>
        <h1 class="text-2xl font-bold">Buat Akun Siswa</h1>
    </div>

    <form id="akunForm" class="space-y-6" method="post" action="<?= BASEURL ?>/admin/buat_akun_siswa" enctype="multipart/form-data">
        <div>
            <label for="angkatan" class="block text-gray-700 font-semibold mb-2">Angkatan</label>
            <input type="text" placeholder="2025" value="<?php echo $_POST['angkatan'] ?? ''; ?>" name="angkatan"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
            <?php if (!empty($data['angkatan_error'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $data['angkatan_error'] ?></p>
            <?php endif; ?>
            <p id="angkatanError" class="text-red-500 text-sm mt-1 hidden"></p>
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
            <?php if (!empty($data['file_error'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $data['file_error'] ?></p>
            <?php endif; ?>
            <p id="fileError" class="text-red-500 text-sm mt-1 hidden"></p>
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
    const akunForm = document.getElementById('akunForm');
    const fileError = document.getElementById('fileError');
    const angkatanInput = akunForm.elements['angkatan'];
    const angkatanError = document.getElementById('angkatanError');

    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            fileStatus.textContent = `File dipilih: ${fileInput.files[0].name}`;
            fileError.classList.add('hidden');
        } else {
            fileStatus.textContent = 'Tidak ada file yang dipilih.';
        }
    });

    akunForm.addEventListener('submit', function (e) {
        let valid = true;

        // Validasi file
        if (fileInput.files.length === 0) {
            fileError.textContent = 'Silakan pilih file data siswa terlebih dahulu.';
            fileError.classList.remove('hidden');
            valid = false;
        } else {
            fileError.classList.add('hidden');
        }

        // Validasi angkatan tidak boleh kosong
        if (angkatanInput.value.trim() === '') {
            angkatanError.textContent = 'Angkatan tidak boleh kosong.';
            angkatanError.classList.remove('hidden');
            valid = false;
        } 
        // Validasi angkatan hanya angka
        else if (!/^\d+$/.test(angkatanInput.value.trim())) {
            angkatanError.textContent = 'Angkatan hanya boleh berisi angka.';
            angkatanError.classList.remove('hidden');
            valid = false;
        } else {
            angkatanError.classList.add('hidden');
        }

        if (!valid) {
            e.preventDefault();
        }
    });
</script>