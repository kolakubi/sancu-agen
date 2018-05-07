<h3 class="text-center text-info">Bonus Anda</h3>
<h5 class="text-center text-info">berdasarkan tanggal</h5>

<div class="row" style="padding: 0 2px; font-size: 12px;">
  <div class="col-xs-12">

    <table class="table table-condensed table-bordered table-striped table-hover">
      <thead class="text-center">
        <tr class="info">
          <th>Tgl Beli</th>
          <th>Jumlah Item</th>
          <th>Akumulasi</th>
          <th>Bonus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($databonus as $bonus) : ?>
          <tr>
            <td><?php echo $bonus['tanggal_pembelian'] ?></td>
            <td><?php echo number_format($bonus['jumlah_item'], 0, ',', '.') ?></td>
            <td><?php echo number_format($bonus['history_item'], 0, ',', '.') ?></td>
            <td><?php echo 'Rp'.number_format($bonus['bonus'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <p class="text-center">
      <a href="<?php echo base_url() ?>agen/bonus" class="btn btn-info">Kembali</a>
    </p>
  </div>
</div>
