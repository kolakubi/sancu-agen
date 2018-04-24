

  <h3 class="text text-center">Selamat Datang</h3>
  <h5 class="text text-center"><?php echo $nama; ?></h5>

  <!-- baris 1 -->
  <div class="row" style="padding: 10px 15px;">
    <!-- profil -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/profil">
        <span class="glyphicon glyphicon-user" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br>
        Profil
      </a>
    </div>
    <!-- transaksi -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/pembelian">
        <span class="glyphicon glyphicon-stats" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br>
        Pembelian
      </a>
    </div>
    <!-- bonus -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php echo base_url() ?>agen/bonus">
        <span class="glyphicon glyphicon-heart-empty" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br>
        Bonus
      </a>
    </div>
  </div>
  <hr>
  <!-- baris 2 -->
  <div class="row" style="padding: 10px 15px;">
    <!-- history pembayaran -->
    <div class="col-sm-4 col-xs-4 text-center">
      <a href="<?php base_url() ?>agen/pembayaran">
        <span class="glyphicon glyphicon-time" style="font-size:50px; color: #00abc5;" aria-hidden="true"></span>
        <br>
        History Pembayaran
      </a>
    </div>
    <!-- kosong -->
    <div class="col-sm-4 col-xs-4 text-center">

    </div>
    <!-- kosong -->
    <div class="col-sm-4 col-xs-4 text-center">

    </div>
  </div>
