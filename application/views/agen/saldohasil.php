<?php
  $totalDebet = 0;
  $totalKredit = 0;
  $totalSaldo = 0;
  $index = 0;
?>

<h3 class="text-center text-info">Saldo Anda</h3>
<h5 class="text-center text-info">berdasarkan tanggal</h5>

<div class="row" style="font-size: 12px">
  <div class="col-xs-12">

    <table class="table table-condensed table-hover table-bordered table-striped">
      <thead>
        <tr class="info">
          <th style="text-align: center">Tgl</th>
          <th style="text-align: center">Ket</th>
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
          <?php 
            $totalSaldo += $datasaldo[$i]['debet'];
            $totalSaldo -= $datasaldo[$i]['kredit'];
          ?>
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
              <td><?php echo number_format($totalSaldo*-1, 0, ',', '.') ?></td>
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
          <td><?php echo number_format($totalSaldo*-1, 0, ',', '.') ?></td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<div class="row">
  <!-- jika saldo surplus -->
  <?php if(($totalSaldo*(-1)) > 0) : ?>
    <p class="text-center text-info text-uppercase">
      <strong>lebih bayar: <?php echo number_format(($totalSaldo*(-1)), 0, ',', '.') ?></strong>
    </p>
  <?php elseif(($totalSaldo*(-1)) < 0 ) : ?>
    <p class="text-center text-danger text-uppercase">
      <strong>kurang bayar: <?php echo number_format(($totalSaldo*(-1)), 0, ',', '.') ?></strong>
    </p>
  <?php endif ?>
</div>

<div class="row">
  <p class="text-center">
    <a href="<?php echo base_url() ?>agen/saldo" class="btn btn-info">Kembali</a>
  </p>
</div>
<br><br>
