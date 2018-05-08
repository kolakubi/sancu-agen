<h3 class="text-center">History Pembelian</h3>
<br>

<?php
  $totalPembelian = 0;
  $totalTagihan = 0;
  $totalPembayaran = 0;
  $totalItem = 0;
  $grandTotalItem = 0;
  $total_harga_item = 0;
  $totalItemSancu = 0;
  $totalItemBoncu = 0;
  $totalItemPretty = 0;
  $totalItemXtreme = 0;
  $i = 0;
?>
<div class="row">
  <div class="col-xs-12">

    <?php $tanggal = $datapembelian[0]['tanggal_pembelian'] ?>
    <table class="table table-striped table-condensed table-hovered table-bordered">
      <thead>
        <tr class="info">
          <td colspan="3" class="text-center"><?php echo $tanggal ?></td>
        </tr>
        <tr>
          <th>Item</th>
          <th>jumlah</th>
          <th>Harga(Rp)</th>
        </tr>
      </thead>
    <?php foreach($datapembelian as $pembelian) : ?>

    <!-- ===================================== -->
    <!-- grand total -->
    <!-- item -->
    <?php $grandTotalItem += $pembelian['jumlah_item'] ?>
    <!-- harga -->
    <?php $total_harga_item += $pembelian['total_harga_item'] ?>
    <!-- ===================================== -->


    <!-- ===================================== -->
    <!-- jumlahin item -->
    <!-- sancu -->
    <?php if($pembelian['kode_item'] == 'sancu'){
      $totalItemSancu += $pembelian['jumlah_item'];
    } ?>
    <!-- boncu -->
    <?php if($pembelian['kode_item'] == 'boncu'){
      $totalItemBoncu += $pembelian['jumlah_item'];
    } ?>
    <!-- pretty -->
    <?php if($pembelian['kode_item'] == 'pretty'){
      $totalItemPretty += $pembelian['jumlah_item'];
    } ?>
    <!-- xtreme -->
    <?php if($pembelian['kode_item'] == 'xtreme'){
      $totalItemXtreme += $pembelian['jumlah_item'];
    } ?>
    <!-- ===================================== -->



    <!-- jika tanggal sudah berbeda -->
    <!-- buat tabel baru -->
    <?php if($pembelian['tanggal_pembelian'] != $tanggal) : ?>
    <table class="table table-striped table-condensed table-hovered table-bordered">
      <thead>
        <tr class="info">
          <td colspan="3" class="text-center"><?php echo $pembelian['tanggal_pembelian'] ?></td>
        </tr>
        <tr>
          <th>Item</th>
          <th>jumlah</th>
          <th>Harga(Rp)</th>
        </tr>
      </thead>
      <!-- reset total harga dan total item -->
      <?php $totalItem=0; ?>
      <?php $totalPembelian=0 ?>
      <?php endif ?>
      <tbody>
        <!-- tampilin Produk -->
        <tr>
          <td><?php echo $pembelian['kode_item'] ?></td>
          <td><?php echo number_format($pembelian['jumlah_item'], 0, ',', '.') ?></td>
          <td><?php echo number_format($pembelian['total_harga_item'], 0, ',', '.') ?></td>
        </tr>
        <?php $totalItem += $pembelian['jumlah_item'] ?>
        <?php $totalPembelian += $pembelian['total_harga_item'] ?>

        <!-- total semua produk -->
        <!-- jika item adalah trakhir dalam array -->
        <!-- artinya sudah baris terakhir -->
        <!-- tampilkan jumlah -->
        <?php if($pembelian['kode_item'] == end($item)) : ?>
          <tr class="success">
            <td>Jumlah produk</td>
            <td colspan="2" class="text-center"><?php echo $totalItem ?></td>
          </tr>
          <!-- total semua harga -->
          <tr class="warning">
            <td>Jumlah harga</td>
            <td colspan="2" class="text-center"><?php echo 'Rp '.number_format($totalPembelian, 0, ',', '.') ?></td>
          </tr>
        <?php endif ?>
        <?php $tanggal = $pembelian['tanggal_pembelian'] ?>
        <?php endforeach ?>
        <hr>
      </tbody>
    </table>
  </div>
</div>

<!-- grand total item -->
<div class="row">
  <div class="col-xs-12">
    <?php if(in_array($defaultitem[0], $item)) : ?>
      <p class="text-center text-info" style="font-weight: bold">Total Item Sancu: <?php echo $totalItemSancu.' pasang' ?></p>
    <?php endif ?>
    <?php if(in_array($defaultitem[1], $item)) : ?>
      <p class="text-center text-info" style="font-weight: bold">Total Item Boncu: <?php echo $totalItemBoncu.' pasang' ?></p>
    <?php endif ?>
    <?php if(in_array($defaultitem[2], $item)) : ?>
      <p class="text-center text-info" style="font-weight: bold">Total Item Pretty: <?php echo $totalItemPretty.' pasang' ?></p>
    <?php endif ?>
    <?php if(in_array($defaultitem[3], $item)) : ?>
      <p class="text-center text-info" style="font-weight: bold">Total Item Xtreme: <?php echo $totalItemXtreme.' pasang' ?></p>
    <?php endif ?>
  </div>
</div>
<hr>
<!-- grand total harga -->
<div class="row">
  <div class="col-xs-12">
    <p class="text-center text-warning" style="font-weight: bold">Total Seluruh Item: <?php echo number_format($grandTotalItem, 0, ',', '.').' pasang' ?></p>
    <p class="text-center text-warning" style="font-weight: bold">Total Seluruh Pembelian: <?php echo 'Rp '.number_format($total_harga_item, 0, ',', '.') ?></p>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <p class="text-center">
      <a class="btn btn-info" href="<?php echo base_url() ?>agen">kembali</a>
    </p>
  </div>
</div>
<br><br>
