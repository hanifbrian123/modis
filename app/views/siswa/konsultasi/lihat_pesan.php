<main class="m-6 p-8 flex-1 bg-[#ffffff] rounded-3xl shadow-lg/25">
  <div>
    <h1 class="text-2xl font-bold">Pesan</h1>
  </div>
  <?php foreach ($data['pesan_pribadi'] as $detail_pesan): ?>
    <!-- 1 Pesan -->
    <div class="grid grid-cols-1 gap-6">
      <div class="bg-[#3e70b2] rounded-lg grid grid-cols-2 shadow-md p-4 m-6">
        <span class="text-left text-white font-semibold p-4"><?php echo $detail_pesan['topikpesan'] ?></span>

        <div class="col-span-2 p-4">
          <div class="bg-[#ffffff] rounded-lg p-4 ">
            <?php echo $detail_pesan['isi_pesan'] ?>
          </div>
        </div>

        <?php if (!empty($detail_pesan['balasan'])): ?>
          <!-- Ini Div untuk Balasan -->
          <div class="col-span-2 p-4">
            <div class="bg-[#d9d9d9] col-span-2 rounded-lg p-4 ">
              <?php echo $detail_pesan['balasan']; ?>
            </div>
          </div>
        <?php else: ?>
          <!-- Ini Div untuk Balasan -->
          <div class="col-span-2 p-4">
            <div class="bg-[#a76d18] col-span-2 rounded-lg p-4 text-center text-white">
              Belum ada balasan
            </div>
          </div>
        <?php endif; ?>

      </div>
    <?php endforeach; ?>

  </div>



</main>