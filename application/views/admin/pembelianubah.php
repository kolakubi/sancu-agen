<h1 class="text-center">Pembelian Ubah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/pembelianubah/'.$pembelian['kode_pembelian']) ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Kode Pembelian: </label>
        <input type="text" name="kodepembelian" value="<?php echo $pembelian['kode_pembelian'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('kodepembelian') ?></span>
      </div>
      <div class="form-group">
        <label>Nama Agen: </label>
        <input type="text" name="nama" value="<?php echo $pembelian['nama'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Tanggal Pembelian: </label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $pembelian['tanggal_pembelian'] ?>">
        <span class="text-danger"><?php echo form_error('tanggal') ?></span>
      </div>

      <!-- item -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- sancu -->
        <div class="form-group">
          <!-- item -->
          <label>Sancu: </label>
          <input type="number" name="sancu" value="<?php echo $pembelian['sancu'] ?>" class="form-control" id="pembeliansancu">
          <span class="text-danger"><?php echo form_error('sancu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="sancuharga" value="<?php echo $pembelian['total_harga_sancu'] ?>" class="form-control" id="pembelianhargasancu">
          <span class="text-danger"><?php echo form_error('sancuharga') ?></span>
        </div>
        <!-- boncu -->
        <div class="form-group">
          <!-- item -->
          <label>Boncu: </label>
          <input type="number" name="boncu" value="<?php echo $pembelian['boncu'] ?>" class="form-control" id="pembelianboncu">
          <span class="text-danger"><?php echo form_error('boncu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="boncuharga" value="<?php echo $pembelian['total_harga_boncu'] ?>" class="form-control" id="pembelianhargaboncu">
          <span class="text-danger"><?php echo form_error('boncuharga') ?></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- pretty -->
        <div class="form-group">
          <!-- item -->
          <label>Pretty: </label>
          <input type="number" name="pretty" value="<?php echo $pembelian['pretty'] ?>" class="form-control" id="pembelianpretty">
          <span class="text-danger"><?php echo form_error('pretty') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="prettyharga" value="<?php echo $pembelian['total_harga_pretty'] ?>" class="form-control" id="pembelianhargapretty">
          <span class="text-danger"><?php echo form_error('prettyharga') ?></span>
        </div>
        <!-- xtreme -->
        <div class="form-group">
          <!-- item -->
          <label>Xtreme: </label>
          <input type="number" name="xtreme" value="<?php echo $pembelian['xtreme'] ?>" class="form-control" id="pembelianxtreme">
          <span class="text-danger"><?php echo form_error('xtreme') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="xtremeharga" value="<?php echo $pembelian['total_harga_xtreme'] ?>" class="form-control" id="pembelianhargaxtreme">
          <span class="text-danger"><?php echo form_error('xtremeharga') ?></span>
        </div>
      </div>
      <!-- ======================================== -->
      <!-- hitung jumlah item -->
      <div class="form-group">
        <label>Jumlah Item: </label>
        <input type="number" name="pembelianjumlahitem" value="<?php echo $pembelian['jumlah_item'] ?>" class="form-control" id="pembelianjumlahitem" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlahitem') ?></span>
      </div>
      <!-- ======================================== -->
      <div class="form-group">
        <label>Jumlah Pembelian: </label>
        <input type="number" name="pembelianjumlah" value="<?php echo $pembelian['jumlah_pembelian'] ?>" class="form-control" id="pembelianjumlah" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlah') ?></span>
      </div>
      <div class="form-group">
        <label>Jumlah Dibayar: </label>
        <input type="number" name="pembeliandibayar" value="<?php echo $pembelian['jumlah_dibayar'] ?>" class="form-control" id="pembeliandibayar">
        <span class="text-danger"><?php echo form_error('pembeliandibayar') ?></span>
      </div>
      <!-- perhitungan sisa pembayaran -->
      <div class="form-group">
        <label>Sisa Tagihan: </label>
        <input type="number" name="pembeliansisatagihan" value="<?php echo $pembelian['sisa_tagihan'] ?>" class="form-control" id="pembeliansisatagihan" readonly="true">
        <span class="text-danger"><?php echo form_error('pembeliansisatagihan') ?></span>
      </div>
      <!-- ==================================== -->
      <div class="form-group">
        <button type="submit" class="btn btn-info">Ubah</button>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
