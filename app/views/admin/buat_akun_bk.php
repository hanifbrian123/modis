<!-- SESUAIKAN UKURAN BOX MAIN DENGAN DESIGN UI -->

<main class="my-40 mx-80 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25 ">
    <div>
        <h1 class="text-2xl font-bold">Buat Akun Guru BK</h1>
        <br>
        <form class="space-y-6" action="<?= BASEURL ?>/admin/buat_akun_bk" method="post">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">NIP</label>
            <input type="text" name="NIP" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="Nama" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
        </div>
        <div>
           
            <input type="hidden" name="Role" value="BK">
            
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" name="Password" required
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