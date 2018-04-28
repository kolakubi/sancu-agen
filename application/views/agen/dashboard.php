  <h3 class="text text-center">Selamat Datang</h3>
  <h5 class="text text-center"><?php echo $nama; ?></h5>
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
        <strong>Profil</strong>
      </a>
    </div>
    <!-- transaksi -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/pembelian">
        <!-- <span class="glyphicon glyphicon-stats" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br> -->
        <img src="<?php base_url() ?>asset/image/pembelian.png" alt="pembelian" class="img-responsive" style="margin: 0 auto;">
        <br>
        <strong>Pembelian</strong>
      </a>
    </div>
    <!-- saldo -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/saldo">
        <!-- <span class="glyphicon glyphicon-shopping-cart" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span> -->
        <img src="<?php base_url() ?>asset/image/pembayaran.png" alt="pembayaran" class="img-responsive" style="margin: 0 auto;">
        <br>
        <!-- Saldo -->
        <strong>History Pembayaran</strong>
      </a>
    </div>
  </div>
  <hr>
  <!-- baris 2 -->
  <div class="row">
    <!-- bonus -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php echo base_url() ?>agen/bonus">
        <!-- <span class="glyphicon glyphicon-heart-empty" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span> -->
        <img src="<?php base_url() ?>asset/image/bonus.png" alt="bonus" class="img-responsive" style="margin: 0 auto;">
        <br>
        <strong>Bonus</strong>
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

    <!-- kosong -->
    <div class="col-sm-4 col-xs-4 text-center">

    </div>
  </div>
