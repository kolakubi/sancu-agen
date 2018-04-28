<h1 class="text-center">Agen Ubah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/agenubah/'.$agen['kode_agen']) ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Kode Agen: </label>
        <input type="text" name="kodeagen" class="form-control" value="<?php echo $agen['kode_agen'] ?>" readonly="true">
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Nama: </label>
        <input type="text" name="nama" class="form-control" value="<?php echo $agen['nama'] ?>">
        <span class="text-danger"><?php echo form_error('nama') ?></span>
      </div>
      <div class="form-group">
        <label>Alamat: </label>
        <textarea name="alamat" class="form-control"><?php echo $agen['alamat'] ?></textarea>
        <span class="text-danger"><?php echo form_error('alamat') ?></span>
      </div>
      <div class="form-group">
        <label>Kota: </label>
        <input type="text" name="kota" class="form-control" value="<?php echo $agen['kota'] ?>">
        <span class="text-danger"><?php echo form_error('kota') ?></span>
      </div>
      <div class="form-group">
        <label>Telepon: </label>
        <input type="text" name="telepon" class="form-control" value="<?php echo $agen['telepon'] ?>">
        <span class="text-danger"><?php echo form_error('telepon') ?></span>
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" value="<?php echo $agen['email'] ?>">
        <span class="text-danger"><?php echo form_error('email') ?></span>
      </div>
      <div class="form-group">
        <label>Kelamin: </label>
        <select name="kelamin" class="form-control">
          <?php $kelamin = array('-', 'Laki-laki', 'Perempuan'); $selected = '';?>
          <?php foreach($kelamin as $gender): ?>
          <option value="<?php echo $gender ?>"
            <?php $selected = $gender==$agen['kelamin'] ? "selected" : '' ?>
            <?php echo $selected ?>>
            <?php echo $gender ?>
          </option>
          <?php endforeach ?>
        </select>
        <span class="text-danger"><?php echo form_error('email') ?></span>
      </div>
      <div class="form-group">
        <label>Tanggal Bergabung: </label>
        <input type="date" name="joindate" class="form-control" value="<?php echo $agen['tgl_gabung'] ?>">
        <span class="text-danger"><?php echo form_error('joindate') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Ubah</button>
        <a class="btn btn-default" href="<?php echo base_url() ?>admin/agen">Batal</a>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
