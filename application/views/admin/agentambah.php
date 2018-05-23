<h1 class="text-center">Agen Tambah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/agentambah', array('id' => 'formdisable')) ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Kode Agen: </label>
        <input type="text" name="kodeagen" class="form-control">
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Nama: </label>
        <input type="text" name="nama" class="form-control">
        <span class="text-danger"><?php echo form_error('nama') ?></span>
      </div>
      <div class="form-group">
        <label>Alamat: </label>
        <textarea name="alamat" class="form-control"></textarea>
        <span class="text-danger"><?php echo form_error('alamat') ?></span>
      </div>
      <div class="form-group">
        <label>Kota: </label>
        <input type="text" name="kota" class="form-control">
        <span class="text-danger"><?php echo form_error('kota') ?></span>
      </div>
      <div class="form-group">
        <label>Telepon: </label>
        <input type="text" name="telepon" class="form-control">
        <span class="text-danger"><?php echo form_error('telepon') ?></span>
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control">
        <span class="text-danger"><?php echo form_error('email') ?></span>
      </div>
      <div class="form-group">
        <label>Kelamin: </label>
        <select name="kelamin" class="form-control">
          <option value="">-</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <span class="text-danger"><?php echo form_error('email') ?></span>
      </div>
      <div class="form-group">
        <label>Tanggal Bergabung: </label>
        <input type="date" name="joindate" class="form-control">
        <span class="text-danger"><?php echo form_error('joindate') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
        <a href="<?php echo base_url() ?>admin/agen" class="btn btn-default">Kembali</a>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
