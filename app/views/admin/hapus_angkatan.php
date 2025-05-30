<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/75 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 shadow-xl">
    <div class="text-center">
      <!-- Warning Icon -->
      <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full border-4 border-black mb-4">
        <span class="text-3xl font-bold text-black">!</span>
      </div>

      <!-- Modal Text -->
      <h3 class="text-xl font-semibold text-gray-900 mb-2">
        Apakah anda yakin ingin menghapus angkatan ini?
      </h3>

      <!-- Action Buttons -->
      <div class="flex gap-3 justify-center mt-6">
        <button onclick="closeDeleteModal()"
          class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition-colors">
          Tidak
        </button>
        <button onclick="confirmDelete()"
          class="px-8 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition-colors">
          Iya
        </button>
      </div>
    </div>
  </div>
</div>


<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class="bg-white rounded-3xl shadow-lg/25 p-6 max-w-2xl mx-auto my-auto ">
    <div>
        <h1 class="text-2xl font-bold">Daftar Angkatan</h1> <br>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto min-w-[600px]">
          <thead>
            <tr class="text-left border-y">
              <th class="p-2">No</th>
              <th class="p-2">Angkatan</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">1</td>
                <td class="p-2">2020</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(1)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus
                    </button>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">2</td>
                <td class="p-2">2021</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(2)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </button>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">3</td>
                <td class="p-2">2022</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(3)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus
                    </button>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">4</td>
                <td class="p-2">2023</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(4)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </button>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">5</td>
                <td class="p-2">2024</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(5)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </button>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 border-y">
                <td class="p-2">6</td>
                <td class="p-2">2025</td>
                <td class="p-2">
                    <button onclick="showDeleteModal(6)" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Hapus
                </button>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

</main>

<script>
  let currentDeleteId = null;

  function showDeleteModal(id) {
    currentDeleteId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
  }

  function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    currentDeleteId = null;
  }

  function confirmDelete() {
    if (currentDeleteId) {
      // Hapus row berdasarkan ID
      // Untuk desktop table
      const rows = document.querySelectorAll('tbody tr');
      if (rows[currentDeleteId - 1]) {
        rows[currentDeleteId - 1].remove();
      }

      // Untuk mobile cards
      const cards = document.querySelectorAll('.space-y-4 > div');
      if (cards[currentDeleteId - 1]) {
        cards[currentDeleteId - 1].remove();
      }

      closeDeleteModal();
    }
  }

  // Close modal when clicking outside
  document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
      closeDeleteModal();
    }
  });
</script>