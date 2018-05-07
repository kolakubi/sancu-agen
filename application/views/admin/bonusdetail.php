<h1 class="text-center">Bonus Detail</h1>

<div class="row">
  <div class="col-xs-12">

    <table class="table table-condensed table-bordered table-striped table-hover" id="datatablepembayaran">
      <thead class="text-center">
        <tr class="info">
          <th>Tanggal Beli</th>
          <th>Jumlah Item</th>
          <th>Akumulasi</th>
          <th>Bonus</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($databonusdetail as $bonus) : ?>
          <tr>
            <td><?php echo $bonus['tanggal_pembelian'] ?></td>
            <td><?php echo number_format($bonus['jumlah_item'], 0, ',', '.') ?></td>
            <td><?php echo number_format($bonus['history_item'], 0, ',', '.') ?></td>
            <td><?php echo 'Rp'.number_format($bonus['bonus'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <td>tgl beli</td>
        <td></td>
        <td></td>
        <td></td>
      </tfoot>
    </table>
  </div>
</div>

<div class="row">
  <p class="text-center">
    <a href="<?php echo base_url() ?>admin/bonus" class="btn btn-danger">Kembali</a>
  </p>
</div>
