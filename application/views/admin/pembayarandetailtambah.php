<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <h1 class="text-center">Bayar</h1>
    <?php echo form_open('admin/pembayarandetailtambah/'.$dataPembayaran['kode_pembayaran'].'', array('id' => 'formdisable')) ?>
      <!-- kode pembelian -->
      <div class="form-group">
        <label>Kode Pembayaran: </label>
        <input type="text" name="kodepembayaran" value="<?php echo $dataPembayaran['kode_pembayaran'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('kodepembayaran') ?></span>
      </div>
      <!-- Tanggal Pembelian -->
      <div class="form-group">
        <label>Tanggal Pembelian: </label>
        <input type="date" name="tanggalpembelian" value="<?php echo $dataPembayaran['tanggal_pembelian'] ?>" class="form-control" readonly="true">
        <span class="text-danger"><?php echo form_error('tanggalpembelian') ?></span>
      </div>
      <hr>
      <!-- Tagihan Sebelumnya -->
      <div class="form-group">
        <label>Tagihan Sebelumnya: </label>
        <input type="number" name="tagihansebelumnya" value="<?php echo $dataPembayaran['sisa_tagihan'] ?>" class="form-control" readonly="true" id="bayartagihansebelumnya">
        <span class="text-danger"><?php echo form_error('tagihansebelumnya') ?></span>
      </div>
      <!-- Detail Pembayaran -->
      <!-- Tanggal Pembayaran -->
      <div class="form-group">
        <label>Tanggal Pembayaran: </label>
        <input type="date" name="tanggalpembayaran" value="" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggalpembayaran') ?></span>
      </div>
      <!-- Dibayar -->
      <div class="form-group">
        <label>Dibayar: </label>
        <input type="number" name="dibayar" value="" class="form-control" id="bayardibayar">
        <span class="text-danger"><?php echo form_error('dibayar') ?></span>
      </div>
      <!-- Sisa Tagihan -->
      <div class="form-group">
        <label>Sisa tagihan: </label>
        <input type="number" name="sisatagihan" class="form-control" readonly="true" id="bayarsisatagihan">
        <span class="text-danger"><?php echo form_error('sisatagihan') ?></span>
      </div>
      <!-- keterangan pembayaran -->
      <div class="form-group">
        <label>Keterangan: </label>
        <textarea type="text" name="keterangan" class="form-control"></textarea>
        <span class="text-danger"><?php echo form_error('keterangan') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Bayar</button>
        <a class="btn btn-default" href="<?php echo base_url() ?>admin/pembayaran">Batal</a>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
