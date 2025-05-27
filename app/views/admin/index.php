<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class=" m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
    <div>
        <h1 class="text-2xl font-bold">Daftar Akun</h1>
        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <div class="flex-1">
                <input type="text" placeholder="Cari Akun..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="md:w-48">
                <select
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Semua Role</option>
                    <option>GURU</option>
                    <option>SISWA</option>
                </select>
            </div>
        </div>

        <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border border-gray-200 px-4 py-3 text-left font-semibold text-gray-700">NO</th>
                            <th class="border border-gray-200 px-4 py-3 text-left font-semibold text-gray-700">NAMA</th>
                            <th class="border border-gray-200 px-4 py-3 text-left font-semibold text-gray-700">NIS / NIP</th>
                            <th class="border border-gray-200 px-4 py-3 text-left font-semibold text-gray-700">ROLE</th>
                        </tr>
                    </thead>
                    <tbody id="accountTableBody">
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-3">1</td>
                            <td class="border border-gray-200 px-4 py-3">LOREM IPSUM</td>
                            <td class="border border-gray-200 px-4 py-3">393427348734954</td>
                            <td class="border border-gray-200 px-4 py-3">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">GURU</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-3">2</td>
                            <td class="border border-gray-200 px-4 py-3">LOREM IPSUM</td>
                            <td class="border border-gray-200 px-4 py-3">384729348734294</td>
                            <td class="border border-gray-200 px-4 py-3">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">GURU</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-3">3</td>
                            <td class="border border-gray-200 px-4 py-3">LOREM IPSUM</td>
                            <td class="border border-gray-200 px-4 py-3">349857395234</td>
                            <td class="border border-gray-200 px-4 py-3">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm font-medium">SISWA</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6">
                <div class="text-sm text-gray-600">Page 1 of 50</div>
                <div class="flex space-x-1">
                    <button class="px-3 py-2 text-sm bg-gray-200 text-gray-600 rounded hover:bg-gray-300">Prev</button>
                    <button class="px-3 py-2 text-sm bg-blue-500 text-white rounded">1</button>
                    <button class="px-3 py-2 text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">2</button>
                    <button class="px-3 py-2 text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">3</button>
                    <button class="px-3 py-2 text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">4</button>
                    <button class="px-3 py-2 text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Next</button>
                </div>
            </div>
        </div>


</main>