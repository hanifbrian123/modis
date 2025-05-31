<main class="m-6 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold ms-5 mt-5">Daftar Pesan</h1>
  </div>

  <?php foreach ($data['pesan_konsultasi'] as $pesan): ?>
    <form action="<?= BASEURL ?>/guru/detail_pesan" method="post">
    <input type="text" name="id_pesan" value="<?php echo $pesan['id'] ?>" hidden>
    <div class="grid grid-cols-1 gap-6">
      <div class="bg-[#3e70b2] rounded-lg grid grid-cols-2 shadow-md p-4 m-6">
        <span class="text-left text-white font-semibold p-4"><?php echo $pesan['TopikPesan'] ?></span>
        <span class="text-right text-white font-semibold p-4"><?php echo $pesan['nama'] ?></span>

        <div class="col-span-2 p-4">
          <div class="bg-[#ffffff] rounded-lg p-4">
            <?php echo $pesan['Isi_Pesan'] ?>
          </div>
        </div>

        <?php if (!empty($pesan['Balasan'])): ?>
          <!-- Ini Div untuk Balasan -->
          <div class="col-span-2 p-4">
            <div class="bg-[#ffffff] col-span-2 rounded-lg p-4 ">
              <?php echo $pesan['Balasan'] ?>
            </div>
          </div>
        <?php else: ?>
          <!-- Ini Div untuk Tombol Balasan -->
          <div class="justify-self-center col-span-2 p-4">
            <button type="submit" class="bg-[#f4a024] hover:bg-[#a76d18] text-white px-10 py-2 rounded">Balas Pesan</button>
          </div>
        <?php endif; ?>
      </div>

    </div>
    </form>
  <?php endforeach; ?>
</main>