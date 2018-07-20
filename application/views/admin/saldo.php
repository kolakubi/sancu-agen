<?php
  $totalDebet = 0;
  $totalKredit = 0;
  $totalSaldo = 0;
  $index = 0;
?>

<h1 class="text-center text-uppercase">Saldo</h1>

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

<div class="row">
  <div class="col-xs-12">

    <table class="table table-condensed table-hover table-bordered table-striped">
      <thead>
        <tr class="info">
          <th style="text-align: center">Tanggal</th>
          <th style="text-align: center">Keterangan</th>
          <th style="text-align: center">Debet(Rp)</th>
          <th style="text-align: center">Kredit(Rp)</th>
          <th style="text-align: center">Saldo(Rp)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td>saldo awal</td>
          <td></td>
          <td></td>
          <td><?php echo number_format(($datasaldo[0]['nominal']*(-1)), 0, ',', '.') ?></td>
        </tr>

        <?php for($i=0; $i<count($datasaldo); $i++) : ?>
          <?php if($i > 0) : ?>
            <?php $index++ ?>
            <?php
              $totalDebet += $datasaldo[$i]['debet'];
              $totalKredit += $datasaldo[$i]['kredit'];
            ?>
            <tr>
              <td><?php echo $datasaldo[$i]['tgl_perubahan'] ?></td>
              <td><?php echo $datasaldo[$i]['keterangan'] ?></td>
              <td><?php echo number_format($datasaldo[$i]['debet'], 0, ',', '.') ?></td>
              <td><?php echo number_format($datasaldo[$i]['kredit'], 0, ',', '.') ?></td>
              <td><?php echo number_format(($datasaldo[$i]['nominal']*(-1)), 0, ',', '.') ?></td>
            </tr>
          <?php endif ?>
        <?php endfor ?>
      </tbody>
      <tfoot>
        <tr class="success">
          <td></td>
          <td></td>
          <td><?php echo number_format($totalDebet, 0, ',', '.')?></td>
          <td><?php echo number_format($totalKredit, 0, ',', '.')?></td>
          <td><?php echo number_format(($datasaldo[$index]['nominal']*(-1)), 0, ',', '.') ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>


<div class="row">
  <div class="col-xs-12">
    <p class="text-center">
      <a href="<?php echo base_url() ?>admin" class="btn btn-info">Kembali</a>
    </p>
  </div>
</div>
