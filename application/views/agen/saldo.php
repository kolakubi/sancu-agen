<div class="row">
  <div class="col-xs-12" style="padding: 0% 15%;">
    <?php echo form_open('agen/saldo') ?>
      <h3 class="text-center">Cari History Saldo</h3>
      <h5 class="text-center">berdasarkan tanggal</h5>
      <br>

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
        <button type="submit" name="button" class="btn btn-warning btn-block" id="btnsubmitsaldo">Cari</button>
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
