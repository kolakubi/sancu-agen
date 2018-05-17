<?php

  $index = 1;
  $kodeagen = '';
  $itemsancu = 0;
  $itemboncu = 0;
  $itempretty = 0;
  $itemxtreme = 0;
  $grandtotalitem = 0;

  // inisiasi $kodeagen
  if(!empty($datapembelian[0]['kode_agen'])){
    $kodeagen = $datapembelian[0]['kode_agen'];
  }else{
    $kodeagen = '';
  }
?>


<h1 class="text-center">Laporan Pembelian</h1>
<h4 class="text-center">Cari Berdasarkan Tanggal</h4>

<div class="row">
  <div class="col-xs-12 col-md-4 col-md-offset-4">

    <?php echo form_open() ?>
      <div class="form-group">
        <label>Dari: </label>
        <input type="date" name="tanggaldari" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggaldari') ?></span>
      </div>
      <div class="form-group">
        <label>Sampai: </label>
        <input type="date" name="tanggalsampai" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>

  </div>
</div>
<br><br>

<div class="row">
  <div class="col-xs-12">

    <table class="table table-condensed table-bordered table-striped table-hover" id="datatablepembayaran">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Sancu</th>
          <th>Boncu</th>
          <th>Pretty</th>
          <th>Xtreme</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0; $i<count($datapembelian); $i++) : ?>

          <!-- jumlahin semua item -->
          <?php
            if($datapembelian[$i]['kode_item'] == 'sancu'){
              $itemsancu += $datapembelian[$i]['jumlah_item'];
            }
            if($datapembelian[$i]['kode_item'] == 'boncu'){
              $itemboncu += $datapembelian[$i]['jumlah_item'];
            }
            if($datapembelian[$i]['kode_item'] == 'pretty'){
              $itempretty += $datapembelian[$i]['jumlah_item'];
            }
            if($datapembelian[$i]['kode_item'] == 'xtreme'){
              $itemxtreme += $datapembelian[$i]['jumlah_item'];
            }
            $grandtotalitem = $itemsancu+$itemboncu+$itempretty+$itemxtreme;
          ?>

          <!-- jika kodeagen sudah berbeda -->
          <?php if(!empty($datapembelian[$i+1])) : ?>
            <?php if($datapembelian[$i+1]['kode_agen'] != $kodeagen) : ?>
              <tr>
                  <td><?php echo $index ?></td>
                  <td><?php echo $datapembelian[$i]['nama'] ?></td>
                  <td><?php echo $itemsancu ?></td>
                  <td><?php echo $itemboncu ?></td>
                  <td><?php echo $itempretty ?></td>
                  <td><?php echo $itemxtreme ?></td>
                  <td><?php echo $grandtotalitem ?></td>
              </tr>
              <?php
                $index++;
                $itemsancu = 0;
                $itemboncu = 0;
                $itempretty = 0;
                $itemxtreme = 0;
                $grandtotalitem = 0;
              ?>
            <?php endif ?>
          <?php endif ?>

          <!-- jika array sudah terakhir  -->
          <?php if(empty($datapembelian[$i+1])) : ?>
            <tr>
                <td><?php echo $index ?></td>
                <td><?php echo $datapembelian[$i]['nama'] ?></td>
                <td><?php echo $itemsancu ?></td>
                <td><?php echo $itemboncu ?></td>
                <td><?php echo $itempretty ?></td>
                <td><?php echo $itemxtreme ?></td>
                <td><?php echo $grandtotalitem ?></td>
            </tr>
            <?php
              $index++;
              $itemsancu = 0;
              $itemboncu = 0;
              $itempretty = 0;
              $itemxtreme = 0;
              $grandtotalitem = 0;
            ?>
          <?php endif ?>

          <!-- perubahan kodeagen -->
          <?php
            if(!empty($datapembelian[$i+1])){
              $kodeagen = $datapembelian[$i+1]['kode_agen'];
            }else{
              $kodeagen = $datapembelian[$i]['kode_agen'];
            }
          ?>
        <?php endfor ?>
      </tbody>
      <tfoot>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tfoot>
    </table>

  </div>
</div>
