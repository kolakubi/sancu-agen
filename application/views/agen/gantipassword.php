<div class="row">
  <div class="col-xs-12">
    <?php echo form_open('agen/gantipassword') ?>
      <h3 class="text-center">Ganti Password</h3>
      <br>

      <!-- notif error -->
      <?php if($error['passwordbarutdksama']) : ?>
        <p class="text-center" style="color: white; background-color: #f44242"><?php echo 'Password baru tidak sama' ?></p>
      <?php endif ?>
      <?php if($error['passwordsalah']) : ?>
        <p class="text-center" style="color: white; background-color: #f44242"><?php echo 'Password salah' ?></p>
      <?php endif ?>
      <?php if($error['suseskubahpassword']) : ?>
        <p class="text-center" style="color: white; background-color: #18bc1b"><?php echo 'Ubah Password Berhasil' ?></p>
      <?php endif ?>


      <!-- tanggal -->
      <div class="form-group">
        <input type="text" name="passwordlama" class="form-control" placeholder="password lama">
        <span class="text-danger"><?php echo form_error('passwordlama') ?></span>
      </div>
      <div class="form-group">
        <input type="text" name="passwordbaru" class="form-control" placeholder="password baru">
        <span class="text-danger"><?php echo form_error('passwordbaru') ?></span>
      </div>
      <div class="form-group">
        <input type="text" name="passwordbaru2" class="form-control" placeholder="password baru">
        <span class="text-danger"><?php echo form_error('passwordbaru2') ?></span>
      </div>
      <!-- end of tanggal -->

      <div class="form-group">
        <button type="submit" name="button" class="btn btn-warning btn-block" id="btnsubmitpembayaran">Ubah</button>
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
