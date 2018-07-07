  <h5 class="text text-center">Selamat Datang</h5>
  <h4 class="text text-center" style="text-transform: uppercase; font-weight: bold"><?php echo $nama; ?></h4>
  <br><br>

  <!-- baris 1 -->
  <div class="row">
    <!-- profil -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/profil">
        <!-- <span class="glyphicon glyphicon-user" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br> -->
        <img src="<?php base_url() ?>asset/image/user.png" alt="user" class="img-responsive" style="margin: 0 auto;">
        <br>
        <p>Profil</p>
      </a>
    </div>
    <!-- ganti password -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/gantipassword">
        <!-- <span class="glyphicon glyphicon-user" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br> -->
        <img src="<?php base_url() ?>asset/image/ganti-password.png" alt="ganti-password" class="img-responsive" style="margin: 0 auto;">
        <br>
        <p>Ganti Password</p>
      </a>
    </div>
    <!-- transaksi -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/pembelian">
        <!-- <span class="glyphicon glyphicon-stats" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br> -->
        <img src="<?php base_url() ?>asset/image/pembelian.png" alt="pembelian" class="img-responsive" style="margin: 0 auto;">
        <br>
        <p>Pembelian</p>
      </a>
    </div>

  </div>
  <br>
  <!-- baris 2 -->
  <div class="row">
    <!-- saldo -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/saldo">
        <!-- <span class="glyphicon glyphicon-shopping-cart" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span> -->
        <img src="<?php base_url() ?>asset/image/pembayaran.png" alt="pembayaran" class="img-responsive" style="margin: 0 auto;">
        <br>
        <!-- Saldo -->
        <p>History Pembayaran</p>
      </a>
    </div>
    <!-- bonus -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php echo base_url() ?>agen/bonus">
        <!-- <span class="glyphicon glyphicon-heart-empty" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span> -->
        <img src="<?php base_url() ?>asset/image/bonus.png" alt="bonus" class="img-responsive" style="margin: 0 auto;">
        <br>
        <p>Bonus</p>
      </a>
    </div>
    <!-- history pembayaran -->
    <div class="col-sm-4 col-xs-4 text-center">
      <!-- <a href="<?php base_url() ?>agen/pembayaran">
        <span class="glyphicon glyphicon-time" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br>
        History Pembayaran
      </a> -->
    </div>
  </div>
<br><br>
