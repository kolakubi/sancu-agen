<h3 class="text text-center">Selamat Datang Admin</h3>
<!-- <h5 class="text text-center"><?php echo $nama; ?></h5> -->
<br><br>

<!-- baris 1 -->
<div class="row">
  <!-- profil -->
  <div class="col-sm-3 col-xs-3 text-center">
    <a href="<?php base_url() ?>admin/profil">
      <img src="<?php base_url() ?>asset/image/user.png" alt="user" class="img-responsive" style="margin: 0 auto;">
      <strong class="text-uppercase">Profil</strong>
      <br>
    </a>
  </div>
  <!-- transaksi -->
  <div class="col-sm-3 col-xs-3 text-center">
    <a href="<?php base_url() ?>admin/pembelian">
      <img src="<?php base_url() ?>asset/image/pembelian.png" alt="pembelian" class="img-responsive" style="margin: 0 auto;">
      <br>
      <strong>Pembelian</strong>
    </a>
  </div>
  <!-- saldo -->
  <div class="col-sm-3 col-xs-3 text-center">
    <a href="<?php base_url() ?>admin/pembayaran">
      <img src="<?php base_url() ?>asset/image/pembayaran.png" alt="pembayaran" class="img-responsive" style="margin: 0 auto;">
      <br>
      <!-- Saldo -->
      <strong>Pembayaran</strong>
    </a>
  </div>
  <!-- bonus -->
  <div class="col-sm-3 col-xs-3 text-center">
    <a href="<?php echo base_url() ?>admin/bonus">
      <img src="<?php base_url() ?>asset/image/bonus.png" alt="bonus" class="img-responsive" style="margin: 0 auto;">
      <br>
      <strong>Bonus</strong>
    </a>
  </div>
</div>
