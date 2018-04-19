<h1 class="text-center">Pembelian Tambah</h1>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
    <!-- form tambah agen -->
    <?php echo form_open('admin/pembeliantambah') ?>
      <span class="text-danger text-center"><?php echo validation_errors(); ?></span>
      <div class="form-group">
        <label>Nama Agen: </label>
        <select type="text" name="kodeagen" class="form-control">
          <?php foreach ($agen as $detailagen) : ?>
          <option value="<?php echo $detailagen['kode_agen'] ?>">
            <?php echo $detailagen['nama'] ?>
          </option>
          <?php endforeach ?>
        </select>
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <!-- ============================================ -->
      <!-- hari ini -->
      <div class="form-group">
        <label>Tanggal Pembelian: </label>
        <input type="date" name="tanggal" class="form-control" id="datepembelian">
        <span class="text-danger"><?php echo form_error('tanggal') ?></span>
      </div>
      <script type="text/javascript">
        let tanggal = new Date();
        let tahun = tanggal.getFullYear();
        let bulan = tanggal.getMonth()+1;
        bulan = bulan < 9 ? '0'+bulan : bulan;
        let hari = tanggal.getDate();
        hari = hari < 9 ? '0'+hari : hari;
        let time = tahun+'-'+bulan+'-'+hari;
        "2014-02-09"
        document.getElementById("datepembelian").defaultValue = time;
      </script>
      <!-- ================================================ -->
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <label>Sancu: </label>
          <input type="number" name="sancu" value="0" class="form-control" id="pembeliansancu">
          <span class="text-danger"><?php echo form_error('sancu') ?></span>
        </div>
        <div class="form-group">
          <label>Boncu: </label>
          <input type="number" name="boncu" value="0" class="form-control" id="pembelianboncu">
          <span class="text-danger"><?php echo form_error('boncu') ?></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <label>Pretty: </label>
          <input type="number" name="pretty" value="0" class="form-control" id="pembelianpretty">
          <span class="text-danger"><?php echo form_error('pretty') ?></span>
        </div>
        <div class="form-group">
          <label>Xtreme: </label>
          <input type="number" name="xtreme" value="0" class="form-control" id="pembelianxtreme">
          <span class="text-danger"><?php echo form_error('xtreme') ?></span>
        </div>
      </div>
      <!-- ======================================== -->
      <!-- hitung jumlah item -->
      <div class="form-group">
        <label>Jumlah Item: </label>
        <input type="number" name="pembelianjumlahitem" value="0" class="form-control" id="pembelianjumlahitem" readonly="true">
        <span class="text-danger"><?php echo form_error('pembelianjumlahitem') ?></span>
      </div>
      <script type="text/javascript">
        let sancu = document.getElementById('pembeliansancu');
        let boncu = document.getElementById('pembelianboncu');
        let pretty = document.getElementById('pembelianpretty');
        let xtreme = document.getElementById('pembelianxtreme');
        let totalItem = 0;
        function getAllValue(){
          totalItem = parseInt(sancu.value) + parseInt(boncu.value) + parseInt(pretty.value) + parseInt(xtreme.value);
        }
        let jumlahItem = document.getElementById('pembelianjumlahitem');
        sancu.addEventListener('change', function(){
          getAllValue();
          jumlahItem.value = totalItem;
        });
        boncu.addEventListener('change', function(){
          getAllValue();
          jumlahItem.value = totalItem;
        });
        pretty.addEventListener('change', function(){
          getAllValue();
          jumlahItem.value = totalItem;
        });
        xtreme.addEventListener('change', function(){
          getAllValue();
          jumlahItem.value = totalItem;
        });
      </script>
      <!-- ======================================== -->
      <div class="form-group">
        <label>Jumlah Pembelian: </label>
        <input type="number" name="pembelianjumlah" value="0" class="form-control" id="pembelianjumlah">
        <span class="text-danger"><?php echo form_error('pembelianjumlah') ?></span>
      </div>
      <div class="form-group">
        <label>Jumlah Dibayar: </label>
        <input type="number" name="pembeliandibayar" value="0" class="form-control" id="pembeliandibayar">
        <span class="text-danger"><?php echo form_error('pembeliandibayar') ?></span>
      </div>
      <!-- perhitungan sisa pembayaran -->
      <div class="form-group">
        <label>Sisa Tagihan: </label>
        <input type="number" name="pembeliansisatagihan" value="0" class="form-control" id="pembeliansisatagihan" readonly="true">
        <span class="text-danger"><?php echo form_error('pembeliansisatagihan') ?></span>
      </div>
      <script type="text/javascript">
        let pembelianJumlah = document.getElementById('pembelianjumlah');
        let pembelianDibayar = document.getElementById('pembeliandibayar');
        let pembelianSisaTagihan = document.getElementById('pembeliansisatagihan');
        let sisa = 0;
        function sisaTagihan(){
          sisa = parseInt(pembelianJumlah.value) - parseInt(pembeliandibayar.value);
        }
        pembelianDibayar.addEventListener('change', function(){
          sisaTagihan();
          pembelianSisaTagihan.value = sisa;
        })
      </script>
      <!-- ==================================== -->
      <div class="form-group">
        <button type="submit" class="btn btn-info">Simpan</button>
      </div>
    <?php echo form_close() ?>
  </div>
</div>
