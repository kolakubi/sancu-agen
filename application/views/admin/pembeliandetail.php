<h1 class="text-center">Detail Pembelian</h1>
<h2 class="text-center"><?php echo $datapembelian[0]['tanggal_pembelian'] ?></h2>

<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="datatablepembelian">
  <thead>
    <tr class="info">
      <th>Produk</th>
      <th>Jumlah Item</th>
      <th>Total Harga Item</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datapembelian as $pembelian) : ?>
    <tr>
      <td><?php echo $pembelian['kode_item'] ?></td>
      <td><?php echo number_format($pembelian['jumlah_item'], 0, ',', '.') ?></td>
      <td><?php echo 'Rp '.number_format($pembelian['total_harga_item'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<h4 class="text-center text-success">Total Item: <?php echo $datapembelian[0]['total_item'] ?></h4>
<h4 class="text-center text-success">Total Pembelian: <?php echo 'Rp '.number_format($datapembelian[0]['total_pembelian'], 0, ',', '.')?></h4>
<br>
<p class="text-center">
  <a href="<?php echo base_url() ?>admin/pembelian" class="btn btn-danger btn-lg">Kembali</a>
</p>
