<div class="row" style="padding: 30px 10px">
  <p class="text text-center">
    <img src="<?php echo base_url().$agen['fotoprofil'] ?>" class="img-circle img-responsive" alt="profil" style="margin: 0 auto;">
  </p>
  <h4 class="text-center"><?php echo $agen['nama'] ?></h4>
  <h4 class="text-center"><?php echo $agen['kota'] ?></h4>
  <p class="text-center">
    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $agen['alamat'] ?><br>
    <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> <?php echo $agen['telepon'] ?><br>
    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php echo $agen['email'] ?><br>
  </p>
</div>
<p class="text-center">

  <a type="button" class="btn btn-info">Edit</a>
  <a type="button" class="btn btn-danger">Delete</a>

</p>
