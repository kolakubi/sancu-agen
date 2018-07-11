<?php

  $index = 1;
  $kodeagen = '';
  $itemsancu = 0;
  $itemboncu = 0;
  $itempretty = 0;
  $itemxtreme = 0;
  $grandtotalitem = 0;
  $totalitemsancu = 0;
  $totalitemboncu = 0;
  $totalitempretty = 0;
  $totalitemxtreme = 0;
  $totalseluruhitem = 0;

  // inisiasi $kodeagen
  if(!empty($datapembelian[0]['kode_agen'])){
    $kodeagen = $datapembelian[0]['kode_agen'];
  }else{
    $kodeagen = '';
  }
?>

<h1 class="text-center text-uppercase">Laporan Pembelian</h1>
<h4 class="text-center">Cari Berdasarkan Tanggal</h4>

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
              $totalitemsancu += $datapembelian[$i]['jumlah_item'];;
            }
            if($datapembelian[$i]['kode_item'] == 'boncu'){
              $itemboncu += $datapembelian[$i]['jumlah_item'];
              $totalitemboncu += $datapembelian[$i]['jumlah_item'];
            }
            if($datapembelian[$i]['kode_item'] == 'pretty'){
              $itempretty += $datapembelian[$i]['jumlah_item'];
              $totalitempretty += $datapembelian[$i]['jumlah_item'];
            }
            if($datapembelian[$i]['kode_item'] == 'xtreme'){
              $itemxtreme += $datapembelian[$i]['jumlah_item'];
              $totalitemxtreme = $datapembelian[$i]['jumlah_item'];
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

    <!-- Info Pembelian -->
    <h4 class="text-center">Summary</h4>
    <p class="text-center">Total Item Sancu: <?php echo number_format($totalitemsancu, 0, ',', '.') ?></p>
    <p class="text-center">Total Item Boncu: <?php echo number_format($totalitemboncu, 0, ',', '.') ?></p>
    <p class="text-center">Total Item Pretty: <?php echo number_format($totalitempretty, 0, ',', '.') ?></p>
    <p class="text-center">Total Item Xtreme: <?php echo number_format($totalitemxtreme, 0, ',', '.') ?></p>
    <p class="text-center text-warning">Total Seluruh Item: <?php echo number_format($totalitemsancu+$totalitemboncu+$totalitempretty+$totalitemxtreme, 0, ',', '.') ?></p>

  </div>
</div>
