<div class="row">
  <div class="col-xs-12">
    <?php echo form_open('agen/pembelian') ?>
      <h3 class="text-center">Cari Pembelian</h3>
      <h5 class="text-center">berdasarkan tanggal pembelian dan item</h5>
      <br>
      <!-- //////////////////// -->
      <!-- checkboxes -->
      <p><strong>Item: </strong></p>
      <div class="well well-sm">
        <div class="row">
          <div class="col-xs-4">
            <div class="form-check">
              <label class="form-check-label">semua </label>
              <input type="checkbox" name="semua" value="semua" class="form-check-input" id="pembeliansemuacheck">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-check">
              <label class="form-check-label">Sancu </label>
              <input type="checkbox" name="item[]" value="sancu" class="form-check-input" id="pembeliansancucheck">
            </div>
            <div class="form-check">
              <label class="form-check-label">Boncu </label>
              <input type="checkbox" name="item[]" value="boncu" class="form-check-input" id="pembelianboncucheck">
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-check">
              <input type="checkbox" name="item[]" value="pretty" class="form-check-input" id="pembelianprettycheck">
              <label class="form-check-label">Pretty </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="item[]" value="xtreme" class="form-check-input" id="pembelianxtremecheck">
              <label class="form-check-label">Xtreme </label>
            </div>
          </div>
        </div>
        <!-- notif checkbox untuk tampilin jumlah tagihan -->
        <h5 class="text-center text-info">*Klik semua item untuk menampilkan <br>jumlah yang dibayar dan <br>kekurangan pembayaran</h5>
        <!-- ==================================== -->
      </div>
      <span class="text-danger"><?php echo form_error('item[]') ?></span>
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
        <button type="submit" name="button" class="btn btn-warning btn-block" id="btnsubmitpembelian">Cari</button>
      </div>
    <?php echo form_close() ?>
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
