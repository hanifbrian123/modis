<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class="my-40 mx-80 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25 ">
    <div>
        <h1 class="text-2xl font-bold">Buat Akun Guru BK</h1>
        <br>
        <form class="space-y-6" id="akunForm" onsubmit="return validateForm()" action="<?= BASEURL ?>/admin/buat_akun_bk" method="post">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" id="nama" name="Nama" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">NIP</label>
            <input type="text" id="nip" name="NIP" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>
        <div>
           
            <input type="hidden" name="Role" value="BK">
            
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" id="password" name="Password" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-8 py-3 rounded-lg transition duration-200">
                Buat
            </button>
        </div>
    </form>
    </div>
</main>

<script>

function validateForm() {
    const nama = document.getElementById('nama').value.trim();
    const nip = document.getElementById('nip').value.trim();
    const password = document.getElementById('password').value;

    // Validasi nama: hanya huruf dan spasi
    if (!/^[a-zA-Z\s]+$/.test(nama)) {
        alert('Nama hanya boleh berisi huruf dan spasi.');
        return false;
    }

    // Validasi NIP: hanya angka, panjang 12 karakter
    

    
    if (!/^\d{12}$/.test(nip)) {
        alert('NIP harus terdiri dari 12 angka.');
        return false;
    }

    // Validasi password: minimal 8 karakter, mengandung setidaknya 1 angka atau 1 huruf
    if (password.length < 8 || !(/\d/.test(password))) {
    alert('Password minimal 8 karakter dan harus mengandung setidaknya 1 angka.');
    return false;
}

    return true;
}

// ...existing code...
</script>