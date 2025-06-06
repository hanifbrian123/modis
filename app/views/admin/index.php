<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class=" m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
    <div>
        <h1 class="text-2xl font-bold mb-4">Daftar Akun</h1>
        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <div class="flex-1">
                <input id="pencarian" type="text" placeholder="Cari Akun..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="md:w-48">
                <select id="roleFilter" name="roleFilter"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Semua Role</option>
                    <option>GURU</option>
                    <option>SISWA</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto min-w-[600px]">
                <thead>
                    <tr class="text-left border-y">
                        <th class="p-2">NO</th>
                        <th class="p-2">NAMA</th>
                        <th class="p-2">NIS / NIP
                        </th>
                        <th class="p-2">ROLE</th>
                    </tr>
                </thead>
                <tbody id="accountTableBody">
                    <?php $i = 1; ?>
                    <?php foreach ($data['all_user'] as $user): ?>
                        <tr class="hover:bg-gray-50 border-y">
                            <td class="p-2"><?php echo $i ?></td>
                            <td class="p-2"><?php echo $user['Nama_Lengkap'] ?></td>
                            <td class="p-2"><?php echo $user['ID_Spesifik'] ?></td>
                            <td class="p-2">
                                <span class="<?php classStatusUser($user['Role']) ?>"><?php echo $user['Role'] ?></span>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>


</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pencarianInput = document.getElementById('pencarian');
        const roleFilter = document.getElementById('roleFilter');
        const accountTableBody = document.getElementById('accountTableBody');

        pencarianInput.addEventListener('input', filterTable);
        roleFilter.addEventListener('change', filterTable);

        function filterTable() {
            const searchTerm = pencarianInput.value.toLowerCase();
            const selectedRole = roleFilter.value.toLowerCase();

            Array.from(accountTableBody.rows).forEach(row => {
                const namaCell = row.cells[1].textContent.toLowerCase();
                const idCell = row.cells[2].textContent.toLowerCase();
                const roleCell = row.cells[3].textContent.toLowerCase();

                const matchesSearch = namaCell.includes(searchTerm) || idCell.includes(searchTerm);
                const matchesRole = selectedRole === 'semua role' || roleCell.includes(selectedRole);

                if (matchesSearch && matchesRole) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    });
</script>