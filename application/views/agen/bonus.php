<div class="row">
  <div class="col-xs-12">
    <?php echo form_open('agen/bonus') ?>
      <h3 class="text-center">Cari History Bonus</h3>
      <h5 class="text-center">berdasarkan tanggal pembelian</h5>
      <br>
      <div class="well well-sm">
        <p class="text text-info">Ketentuan Bonus</p>
        <ul class="list-group">
          <li class="list-group-item">Bonus diberikan hanya untuk pembelian Sancu dan Boncu</li>
          <li class="list-group-item">Pembelian kelipatan 1.000(seribu) mendapatkan Rp.300.000</li>
          <li class="list-group-item">Pembelian langsung 1.000(seribu) item mendapatakan tambahan Rp.50.000</li>
          <li class="list-group-item">Pembelian kelipatan 10.000(sepuluh ribu) mendapatkan Rp.1.000.000</li>
        </ul>
        <p class="text text-info"></p>
      </div>

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
        <button type="submit" name="button" class="btn btn-warning btn-block" id="btnsubmitbonus">Cari</button>
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
