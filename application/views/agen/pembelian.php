<div class="row">
  <div class="col-xs-12" style="padding: 0% 15%;">
    <?php echo form_open('agen/pembelian') ?>
      <h3 class="text-center">Cari Transaksi</h3>
      <br>
      <!-- //////////////////// -->
      <!-- checkboxes -->
      <div class="col-xs-4">
        <div class="form-check">
          <label class="form-check-label">semua </label>
          <input type="checkbox" name="semua" value="semua" class="form-check-input" id="pembeliansemuacheck">
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-check">
          <label class="form-check-label">Sancu </label>
          <input type="checkbox" name="sancu" value="sancu" class="form-check-input" id="pembeliansancucheck">
        </div>
        <div class="form-check">
          <label class="form-check-label">Boncu </label>
          <input type="checkbox" name="boncu" value="boncu" class="form-check-input" id="pembelianboncucheck">
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-check">
          <input type="checkbox" name="pretty" value="pretty" class="form-check-input" id="pembelianprettycheck">
          <label class="form-check-label">Pretty </label>
        </div>
        <div class="form-check">
          <input type="checkbox" name="xtreme" value="xtreme" class="form-check-input" id="pembelianxtremecheck">
          <label class="form-check-label">Xtreme </label>
        </div>
      </div>
      <!-- end of checkboxes -->

      <!-- tanggal -->
      <div class="form-group">
        <label>Dari: </label>
        <input type="date" name="tanggaldari" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggaldari') ?></span>
      </div>
      <div class="form-group">
        <label>Sampai: </label>
        <input type="date" name="tanggalsampai" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <!-- end of tanggal -->

      <div class="form-group">
        <button type="submit" name="button" class="btn btn-warning btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>
  </div>
</div>

<?php $totalPembelian = 0; $totalTagihan = 0; $totalPembayaran = 0; $totalItem = 0;?>
<?php foreach($datapembelian as $pembelian) : ?>
<div class="row" style="padding: 0 20px">
  <div class="col-xs-12 table-responsive">
    <table class="table table-bordered table-condensed">
      <thead class="thead-dark">
        <tr class="info">
          <th class="text-center" colspan="5"><?php echo $pembelian['tanggal_pembelian'] ?></th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><strong>Item</strong></td>
          <td>Sancu</td>
          <td>Boncu</td>
          <td>Pretty</td>
          <td>Extreme</td>
        </tr>
        <tr class="text-center">
          <td><strong>Jumlah</strong></td>
          <td><?php echo $pembelian['sancu'] ?></td>
          <td><?php echo $pembelian['boncu'] ?></td>
          <td><?php echo $pembelian['pretty'] ?></td>
          <td><?php echo $pembelian['xtreme'] ?></td>
        </tr>
        <tr class="text-center">
          <td><strong>Total Item</strong></td>
          <td colspan="4"><?php echo $pembelian['jumlah_item'] ?></td>
        </tr>
        <tr class="text-center warning">
          <td><strong>Total Harga</strong></td>
          <td colspan="4"><?php echo 'Rp '.number_format($pembelian['jumlah_pembelian'], 0, ',', '.') ?></td>
        </tr>
        <tr class="text-center success">
          <td><strong>Dibayar</strong></td>
          <td colspan="4"><?php echo 'Rp '.number_format($pembelian['jumlah_dibayar'], 0, ',', '.') ?></td>
        </tr>
        <tr class=" text-center danger">
          <td><strong>Kekurangan</strong></td>
          <td colspan="4"><?php echo 'Rp '.number_format($pembelian['sisa_tagihan'], 0, ',', '.') ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php $totalItem += $pembelian['jumlah_item']; ?>
<?php $totalPembelian += $pembelian['jumlah_pembelian']; ?>
<?php $totalPembayaran += $pembelian['jumlah_dibayar']; ?>
<?php $totalTagihan += $pembelian['sisa_tagihan']; ?>
<?php endforeach ?>

<div class="row">
  <h5 class="text-center">Total Item: <?php echo number_format($totalItem, 0, ',', '.') ?></h5>
  <h5 class="text-center">Total Pembelian: <?php echo 'Rp '.number_format($totalPembelian, 0, ',', '.') ?></h5>
  <h5 class="text-center">Total Pembayaran: <?php echo 'Rp '.number_format($totalPembayaran, 0, ',', '.') ?></h5>
  <h5 class="text-center">Total Hutang: <?php echo 'Rp '.number_format($totalTagihan, 0, ',', '.') ?></h5>
</div>

<div class="row">
  <div class="col-xs-12">
    <p class="text-center">
      <a class="btn btn-info" href="<?php echo base_url() ?>agen">kembali</a>
    </p>
  </div>
</div>
