<main class="m-6 p-8 bg-[#ffffff] rounded-3xl shadow-lg/25 max-w-xl mx-auto w-full">
  <!-- Header -->
  <h2 class="text-xl font-semibold text-gray-800 text-center mb-6">Edit Pelangggaran</h2>

  <!-- Form -->
  <form class="space-y-4">
    <!-- Pilih Jenis Pelangggaran -->
    <div>
      <label for="jenis-pelanggaran" class="block text-sm font-medium font-semibold mb-2">
        Pilih Jenis Pelangggaran <span class="text-red-500">*</span>
      </label>
      <div class="relative">
        <select id="jenis-pelanggaran"
          class="w-full px-4 py-1 bg-blue-200 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none cursor-pointer shadow-md">
          <option value="terlambat">Terlambat</option>
          <option value="tidak-hadir">Tidak Hadir</option>
          <option value="tidak-berseragam">Tidak Berseragam</option>
          <option value="melanggar-tata-tertib">Melanggar Tata Tertib</option>
          <option value="merokok">Merokok</option>
        </select>
        <!-- Dropdown Arrow -->
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
          <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </div>
      </div>
    </div>

    <!-- Deskripsi Pelangggaran -->
    <div>
      <label for="deskripsi" class="block text-sm font-medium font-semibold mb-2">
        Deskripsi Pelangggaran
      </label>
      <textarea id="deskripsi"
        rows="4"
        placeholder="Tambahkan Deskripsi Pelanggan"
        class="w-full px-4 py-3 bg-blue-200 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none placeholder-gray-500 shadow-md"></textarea>
    </div>

    <!-- Update Button -->
    <div class="flex justify-end">
      <button
        class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition">
        Edit
      </button>
    </div>
  </form>
</main>