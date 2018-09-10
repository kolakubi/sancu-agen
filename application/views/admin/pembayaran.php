<h1 class="text-center text-uppercase">Info Pembayaran</h1>

<div class="row">
  <div class="col-xs-12 col-md-4 col-md-offset-4">

    <?php echo form_open() ?>
      <div class="form-group">
        <label>Nama Agen:</label>
        <div class="input-group">
          <input type="text" value="" class="form-control" name="kodeagen" id="ajaxNamaAgen">
          <span class="input-group-addon" style="cursor: pointer;" id="btnajaxNamaAgen"><i class="glyphicon glyphicon-search"></i></span>
        </div>
        <div class="list-group" id="ulajaxNamaAgen">
          <!-- <li class="list-group-item"></li> -->
        </div>
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Dari: </label>
        <input type="date" name="tanggaldari" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggaldari') ?></span>
      </div>
      <div class="form-group">
        <label>Sampai: </label>
        <input type="date" name="tanggalsampai" class="form-control" id="datepembelian">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>

  </div>
</div>

<!-- info tanggal pencarian -->
<?php if(!empty($tanggal)) : ?>
  <div class="well" style="margin-bottom: -20px;">
    <p class="text-center"><strong>Menampilkan pencarian tanggal</strong></p>
    <p style="font-size: 18px; margin-top: -10px;" class="text-center text-success"><strong><?php echo $tanggal['dari']?> <span style="color: #555555">s/d</span> <?php echo $tanggal['sampai']?></strong></p>
  </div>
<?php endif ?>
<br><br>

<!-- table hasil pencarian -->
<div class="row">
  <div class="col-xs-12">
    <table class="table table-condensed table-bordered table-striped table-hover" id="datatablepembayaran">
      <thead class="text-center">
        <tr class="info">
          <th>Kode Pembayaran</th>
          <th>Kode Pembelian</th>
          <th>Nama Agen</th>
          <th>Tanggal Pembelian</th>
          <th>Jumlah Pembelian</th>
          <th>Sisa Tagihan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $jumlahIndex = count($dataPembayaran)-1;
          $sisaTagihan = 0;
          $totalCicilan = 0;
        ?>
        
        <!-- loop data pembayaran -->
        <?php for($i=0; $i<=$jumlahIndex; $i++) : ?>
          <?php 

            $totalCicilan += $dataPembayaran[$i]['nominal_pembayaran'];
            $sisaTagihan = $dataPembayaran[$i]['jumlah_pembelian'] - $totalCicilan;
            // echo '$i = '.$i;
            // echo '$jumlahIndex ='.$jumlahIndex;

            if(!empty($dataPembayaran[$i+1])){
              // jika kodePembayaran selanjutnya berbeda
              if($dataPembayaran[$i+1]['kode_pembelian'] != $dataPembayaran[$i]['kode_pembelian']){
                ?>
                  <!-- tampilkan data paling akhir sesuai kodePembayaran -->
                  <tr>
                    <td><?php echo $dataPembayaran[$i]['kode_pembayaran'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['kode_pembelian'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['nama'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['tanggal_pembelian'] ?></td>
                    <td><?php echo 'Rp'.number_format($dataPembayaran[$i]['jumlah_pembelian'], 0, ',', '.') ?></td>
                    <td><?php echo 'Rp'.number_format($sisaTagihan, 0, ',', '.') ?></td>
                    <!-- button action -->
                    <td>
                      <div class="btn-group">
                        <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $dataPembayaran[$i]['kode_pembayaran'] ?>" class="btn btn-info">
                          lihat
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        <?php if($sisaTagihan > 0) : ?>
                          <a href="<?php echo base_url() ?>admin/pembayarandetailtambah/<?php echo $dataPembayaran[$i]['kode_pembayaran'] ?>" class="btn btn-success">
                            Bayar
                            <span class="glyphicon glyphicon-edit"></span>
                          </a>
                        <?php endif ?>
                      </div>
                    </td>
                  </tr> <!-- end of data paling akhir -->

                <?php
                // reset sisa tagihan
                $sisaTagihan = 0;
                $totalCicilan = 0;
              } // end of jika kode Pembayaran tidak cocok
            } // end of jika dataPembayaran tidak kosong
            else{
              // tampilkan akhir array
              if($i == $jumlahIndex){
                ?>
                  <tr>
                    <td><?php echo $dataPembayaran[$i]['kode_pembayaran'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['kode_pembelian'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['nama'] ?></td>
                    <td><?php echo $dataPembayaran[$i]['tanggal_pembelian'] ?></td>
                    <td><?php echo 'Rp'.number_format($dataPembayaran[$i]['jumlah_pembelian'], 0, ',', '.') ?></td>
                    <td><?php echo 'Rp'.number_format($sisaTagihan, 0, ',', '.') ?></td>
                    <!-- button action -->
                    <td>
                      <div class="btn-group">
                        <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $dataPembayaran[$i]['kode_pembayaran'] ?>" class="btn btn-info">
                          lihat
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        <?php if($sisaTagihan > 0) : ?>
                          <a href="<?php echo base_url() ?>admin/pembayarandetailtambah/<?php echo $dataPembayaran[$i]['kode_pembayaran'] ?>" class="btn btn-success">
                            Bayar
                            <span class="glyphicon glyphicon-edit"></span>
                          </a>
                        <?php endif ?>
                      </div>
                    </td>
                  </tr>
                <?php
              }
              // reset sisa tagihan
              $sisaTagihan = 0;
              $totalCicilan = 0;
            } // end of tampilkan akhir array
          ?>
          
        <?php endfor ?>
      </tbody>
      <tfoot>
        <td></td>
        <td></td>
        <td>Nama</td>
        <td>Tgl Pembelian</td>
        <td></td>
        <td></td>
        <td></td>
      </tfoot>
    </table>
  </div>
</div>
