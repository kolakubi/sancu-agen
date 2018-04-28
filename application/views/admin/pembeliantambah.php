<h1 class="text-center">Pembelian Tambah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/pembeliantambah') ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Nama Agen: </label>
        <select type="text" name="kodeagen" class="form-control">
          <?php foreach ($agen as $detailagen) : ?>
          <option value="<?php echo $detailagen['kode_agen'] ?>">
            <?php echo $detailagen['nama'] ?>
          </option>
          <?php endforeach ?>
        </select>
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <!-- ============================================ -->
      <!-- date -->
      <div class="form-group">
        <label>Tanggal Pembelian: </label>
        <input type="date" name="tanggal" class="form-control" id="datepembelian">
        <span class="text-danger"><?php echo form_error('tanggal') ?></span>
      </div>
      <!-- ================================================ -->
      <!-- item -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- sancu -->
        <div class="form-group">
          <!-- item -->
          <label>Sancu: </label>
          <input type="number" name="sancu" value="0" class="form-control" id="pembeliansancu">
          <span class="text-danger"><?php echo form_error('sancu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="sancuharga" value="0" class="form-control" id="pembelianhargasancu">
          <span class="text-danger"><?php echo form_error('sancuharga') ?></span>
        </div>
        <hr>
        <!-- boncu -->
        <div class="form-group">
          <!-- item -->
          <label>Boncu: </label>
          <input type="number" name="boncu" value="0" class="form-control" id="pembelianboncu">
          <span class="text-danger"><?php echo form_error('boncu') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="boncuharga" value="0" class="form-control" id="pembelianhargaboncu">
          <span class="text-danger"><?php echo form_error('boncuharga') ?></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <!-- pretty -->
        <div class="form-group">
          <!-- item -->
          <label>Pretty: </label>
          <input type="number" name="pretty" value="0" class="form-control" id="pembelianpretty">
          <span class="text-danger"><?php echo form_error('pretty') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="prettyharga" value="0" class="form-control" id="pembelianhargapretty">
          <span class="text-danger"><?php echo form_error('prettyharga') ?></span>
        </div>
        <hr>
        <!-- xtreme -->
        <div class="form-group">
          <!-- item -->
          <label>Xtreme: </label>
          <input type="number" name="xtreme" value="0" class="form-control" id="pembelianxtreme">
          <span class="text-danger"><?php echo form_error('xtreme') ?></span>
          <!-- harga -->
          <label>Harga: </label>
          <input type="number" name="xtremeharga" value="0" class="form-control" id="pembelianhargaxtreme">
          <span class="text-danger"><?php echo form_error('xtremeharga') ?></span>
        </div>
      </div>
      <!-- ======================================== -->
      <!-- jumlah item -->
      <div class="form-group">
        <label>Jumlah Item: </label>
        <input type="number" name="pembelianjumlahitem" value="0" class="form-control" id="pembelianjumlahitem" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlahitem') ?></span>
      </div>
      <!-- jumlah pembelian -->
      <div class="form-group">
        <label>Jumlah Pembelian: </label>
        <input type="number" name="pembelianjumlah" value="0" class="form-control" id="pembelianjumlah" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlah') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="<?php echo base_url() ?>admin/pembelian" class="btn btn-default">Kembali</a>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
