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
  <a href="<?php echo base_url() ?>admin/agen" class="btn btn-default">Back</a>
  <a class="btn btn-info" href="<?php echo base_url() ?>admin/agenubah/<?php echo $agen['kode_agen'] ?>">Edit</a>
  <a class="btn btn-danger btnhapus" href="<?php echo base_url() ?>admin/agenhapus/<?php echo $agen['kode_agen'] ?>">Delete</a>
</p>
