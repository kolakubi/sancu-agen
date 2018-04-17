<h1 class="text-center">Agen Tambah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <?php echo form_open('admin/tambahagen') ?>
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
        <label>Tanggal Bergabung: </label>
        <input type="date" name="joindate" class="form-control">
        <span class="text-danger"><?php echo form_error('joindate') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
