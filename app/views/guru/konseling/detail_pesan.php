<main class="m-6 flex-1 bg-[#ffffff] place-self-center rounded-3xl shadow-lg/25 lg:w-3xl xl:w-5xl ">
    <div>
        <h1 class="text-2xl text-center font-bold ms-5 mt-5 mb-10">Detail Pesan</h1>
    </div>

    <form action="<?= BASEURL ?>/guru/kirimBalasan" method="POST">
        <input type="text" name="id_pesan" value="<?php echo $data['satu_pesan']['id'] ?>" hidden>
    <div class="bg-[#3e70b2] rounded-lg shadow-md p-4 m-6">

        <div class="pl-4 grid grid-cols-8 py-4">
            <span class="text-left col-start-1 col-end-3 text-white pl-4">
                Nama Siswa
            </span>
            <span class="text-left col-span-4 text-white">
                : <?php echo $data['satu_pesan']['nama'] ?>
            </span>
        </div>
        
        <div class="pl-4 grid grid-cols-8 py-4">
            <span class="text-left col-start-1 col-end-3 text-white pl-4">
                Topik Pesan
            </span>
            <span class="text-left col-span-4 text-white">
                : <?php echo $data['satu_pesan']['TopikPesan'] ?>
            </span>
        </div>
        
        <div class="p-4">
            <div name="isi_pesan" class="bg-[#ffffff] rounded-lg p-4 ">
                <?php echo $data['satu_pesan']['Isi_Pesan'] ?>
            </div>
        </div>

        <div class="w-full p-4">
            <textarea name="balasan" class="bg-[#ffffff] rounded-lg p-4 box-border w-full md:h-36 lg:h-48" placeholder="Balas Disini..."></textarea>
        </div>

        <div class="justify-self-center col-span-2 p-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded">Kirim Pesan</button>
        </div>
    </div>
    </form>
</main>