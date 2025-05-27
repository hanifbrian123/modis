<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class="bg-white rounded-3xl shadow-lg/25 p-6 max-w-2xl mx-auto my-auto ">
    <div>
        <h1 class="text-2xl font-bold">Buat Akun Siswa</h1>
    </div>

    <form class="space-y-6">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Angkatan</label>
            <input type="text" value="2025"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Insert data siswa</label>
            <div class="border border-gray-300 rounded-lg p-4">
                <input type="file" id="fileInput" class="hidden" accept=".csv,.xlsx,.xls">
                <label for="fileInput"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded border cursor-pointer hover:bg-gray-300">
                    Choose File
                </label>
                <span id="fileName" class="ml-3 text-gray-500">No file chosen</span>
            </div>
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-8 py-3 rounded-lg transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</main>