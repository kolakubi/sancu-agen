<h3 class="text text-center">Selamat Datang</h3>
<h5 class="text text-center"><?php echo $nama; ?></h5>

<div class="row" style="padding: 30px 10px">

  <!-- profil -->
  <div class="col-sm-4 col-xs-4 text-center">
    <a href="<?php base_url() ?>agen/profilview">
      <span class="glyphicon glyphicon-user" style="font-size:50px;" aria-hidden="true"></span>
      <br>
      Profil
    </a>
  </div>
  <!-- transaksi -->
  <div class="col-sm-4 col-xs-4 text-center">
    <a href="#">
      <span class="glyphicon glyphicon-stats" style="font-size:50px;" aria-hidden="true"></span>
      <br>
      Transaksi
    </a>
  </div>
  <!-- bonus -->
  <div class="col-sm-4 col-xs-4 text-center">
    <a href="#">
      <span class="glyphicon glyphicon-heart-empty" style="font-size:50px;" aria-hidden="true"></span>
      <br>
      Bonus
    </a>
  </div>

</div>
