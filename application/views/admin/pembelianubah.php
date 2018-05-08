<?php

  $itemSancu = 0;
  $hargaSancu = 0;
  $itemBoncu = 0;
  $hargaBoncu = 0;
  $itemPretty = 0;
  $hargaPretty = 0;
  $itemXtreme = 0;
  $hargaXtreme = 0;

  for($i=0; $i<count($pembelian); $i++){
    // sancu
    if($pembelian[$i]['kode_item'] == 'sancu'){
      $itemSancu = $pembelian[$i]['jumlah_item'];
      $hargaSancu = $pembelian[$i]['total_harga_item'];
    }
    // boncu
    if($pembelian[$i]['kode_item'] == 'boncu'){
      $itemBoncu = $pembelian[$i]['jumlah_item'];
      $hargaBoncu = $pembelian[$i]['total_harga_item'];
    }
    // pretty
    if($pembelian[$i]['kode_item'] == 'pretty'){
      $itemPretty = $pembelian[$i]['jumlah_item'];
      $hargaPretty = $pembelian[$i]['total_harga_item'];
    }
    // xtreme
    if($pembelian[$i]['kode_item'] == 'xtreme'){
      $itemXtreme = $pembelian[$i]['jumlah_item'];
      $hargaXtreme = $pembelian[$i]['total_harga_item'];
    }

  }

?>


<h1 class="text-center">Pembelian Ubah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/pembelianubah/'.$pembelian[0]['kode_pembelian']) ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Kode Pembelian: </label>
        <input type="text" name="kodepembelian" value="<?php echo $pembelian[0]['kode_pembelian'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('kodepembelian') ?></span>
      </div>
      <div class="form-group">
        <label>Nama Agen: </label>
        <input type="text" name="nama" value="<?php echo $pembelian[0]['nama'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Tanggal Pembelian: </label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $pembelian[0]['tanggal_pembelian'] ?>">
        <span class="text-danger"><?php echo form_error('tanggal') ?></span>
      </div>

      <!-- item -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- sancu -->
        <div class="form-group">
          <!-- item -->
          <label>Sancu: </label>
          <input type="number" name="sancu" value="<?php echo $itemSancu ?>" class="form-control" id="pembeliansancu">
          <span class="text-danger"><?php echo form_error('sancu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="sancuharga" value="<?php echo $hargaSancu ?>" class="form-control" id="pembelianhargasancu">
          <span class="text-danger"><?php echo form_error('sancuharga') ?></span>
        </div>
        <!-- boncu -->
        <div class="form-group">
          <!-- item -->
          <label>Boncu: </label>
          <input type="number" name="boncu" value="<?php echo $itemBoncu ?>" class="form-control" id="pembelianboncu">
          <span class="text-danger"><?php echo form_error('boncu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="boncuharga" value="<?php echo $hargaBoncu ?>" class="form-control" id="pembelianhargaboncu">
          <span class="text-danger"><?php echo form_error('boncuharga') ?></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- pretty -->
        <div class="form-group">
          <!-- item -->
          <label>Pretty: </label>
          <input type="number" name="pretty" value="<?php echo $itemPretty ?>" class="form-control" id="pembelianpretty">
          <span class="text-danger"><?php echo form_error('pretty') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="prettyharga" value="<?php echo $hargaPretty ?>" class="form-control" id="pembelianhargapretty">
          <span class="text-danger"><?php echo form_error('prettyharga') ?></span>
        </div>
        <!-- xtreme -->
        <div class="form-group">
          <!-- item -->
          <label>Xtreme: </label>
          <input type="number" name="xtreme" value="<?php echo $itemXtreme ?>" class="form-control" id="pembelianxtreme">
          <span class="text-danger"><?php echo form_error('xtreme') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="xtremeharga" value="<?php echo $hargaXtreme ?>" class="form-control" id="pembelianhargaxtreme">
          <span class="text-danger"><?php echo form_error('xtremeharga') ?></span>
        </div>
      </div>
      <!-- ======================================== -->
      <!-- hitung jumlah item -->
      <div class="form-group">
        <label>Jumlah Item: </label>
        <input type="number" name="pembelianjumlahitem" value="<?php echo $pembelian[0]['total_item'] ?>" class="form-control" id="pembelianjumlahitem" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlahitem') ?></span>
      </div>
      <!-- ======================================== -->
      <div class="form-group">
        <label>Jumlah Pembelian: </label>
        <input type="number" name="pembelianjumlah" value="<?php echo $pembelian[0]['total_pembelian'] ?>" class="form-control" id="pembelianjumlah" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlah') ?></span>
      </div>
      <!-- <div class="form-group">
        <label>Jumlah Dibayar: </label>
        <input type="number" name="pembeliandibayar" value="<?php echo $pembelian['jumlah_dibayar'] ?>" class="form-control" id="pembeliandibayar">
        <span class="text-danger"><?php echo form_error('pembeliandibayar') ?></span>
      </div> -->
      <!-- perhitungan sisa pembayaran -->
      <!-- <div class="form-group">
        <label>Sisa Tagihan: </label>
        <input type="number" name="pembeliansisatagihan" value="<?php echo $pembelian['sisa_tagihan'] ?>" class="form-control" id="pembeliansisatagihan" readonly="true">
        <span class="text-danger"><?php echo form_error('pembeliansisatagihan') ?></span>
      </div> -->
      <!-- ==================================== -->
      <div class="form-group">
        <button type="submit" class="btn btn-info">Ubah</button>
        <a class="btn btn-default" href="<?php echo base_url() ?>admin/pembelian">Batal</a>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
