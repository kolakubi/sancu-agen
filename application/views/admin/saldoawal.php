<h1 class="text-center text-uppercase">Tambah Saldo Awal</h1>
<br><br>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/saldoawal', array('id' => 'formdisable')) ?>

        <?php if($statusDataSaldo) : ?>
            <div style="background-color: #f44242; text-align: center;">
                <span style="color: white;">Agen Sudah Memiliki Saldo</span>
            </div>
        <?php endif ?>

      <!-- nama agen -->
      <div class="form-group">
        <label>Nama Agen:</label>
        <div class="input-group">
          <input type="text" value="" class="form-control" name="kodeagen" id="ajaxNamaAgen">
          <span class="input-group-addon" style="cursor: pointer;" id="btnajaxNamaAgen"><i class="glyphicon glyphicon-search"></i></span>
        </div>
        <div class="list-group" id="ulajaxNamaAgen">
          <!-- <li class="list-group-item"></li> -->
        </div>
        <div style="background-color: #f44242; text-align: center;">
            <span style="color: white;"><?php echo form_error('kodeagen') ?></span>
        </div>
      </div>

      <!-- Saldo -->
      <div class="form-group">
        <label>Saldo: </label>
        <input type="text" name="saldo" value="" class="form-control autonum" data-a-dec="," data-a-sep=".">
        <div style="background-color: #f44242; text-align: center;">
            <span style="color: white;"><?php echo form_error('saldo') ?></span>
        </div>
      </div>
      
      <!-- Radio Debet / Kredit -->
      <div class="form-group">
        <label>Sebelah: </label>
        <label class="checkbox-inline">
            <input type="radio" value="debet" name="sebelah">Debet</label>
        <label class="checkbox-inline">
            <input type="radio" value="kredit" name="sebelah">Kredit</label>
            <div style="background-color: #f44242; text-align: center;">
            <span style="color: white;"><?php echo form_error('sebelah') ?></span>
        </div>
      </div>

      <hr>

      <!-- item -->
      <div class="row">
        <h4 class="text-center text-uppercase">item yang sudah dibeli</h4>

        <!-- sancu -->
        <div class="col-xs-6">
          <div class="form-group">
            <label>Sancu:</label>
            <input type="text" class="form-control" name="sancu">
            <div style="background-color: #f44242; text-align: center;">
              <span style="color: white;"><?php echo form_error('sancu') ?></span>
            </div>
          </div>
        </div>

        <!-- boncu -->
        <div class="col-xs-6">
          <div class="form-group">
            <label>Boncu:</label>
            <input type="text" class="form-control" name="boncu">
            <div style="background-color: #f44242; text-align: center;">
              <span style="color: white;"><?php echo form_error('boncu') ?></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Pretty -->
        <div class="col-xs-6">
          <div class="form-group">
            <label>Pretty:</label>
            <input type="text" class="form-control" name="pretty">
            <div style="background-color: #f44242; text-align: center;">
              <span style="color: white;"><?php echo form_error('pretty') ?></span>
            </div>
          </div>
        </div>

        <!-- Xtreme -->
        <div class="col-xs-6">
          <div class="form-group">
            <label>Xtreme:</label>
            <input type="text" class="form-control" name="xtreme">
            <div style="background-color: #f44242; text-align: center;">
              <span style="color: white;"><?php echo form_error('xtreme') ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- ================ end of item -->

      <!-- button -->
      <div class="form-group">
        <div class="col-xs-6">
            <button type="submit" class="btn btn-info btn-block">Simpan</button>
        </div>
        <div class="col-xs-6">
            <a href="<?php echo base_url() ?>admin/pembelian" class="btn btn-default btn-block">Kembali</a>
        </div>
      </div>
    <?php echo form_close() ?>
  </div>
</div>