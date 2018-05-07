<h1 class="text-center">Info Bonus</h1>

<div class="row">
  <div class="col-xs-12">

    <table class="table table-condensed table-bordered table-striped table-hover" id="datatablepembayaran">
      <thead class="text-center">
        <tr class="info">
          <th>Kode Bonus</th>
          <th>Nama Agen</th>
          <th>Total Item</th>
          <th>Total Bonus</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dataBonus as $bonus) : ?>
          <tr>
            <td><?php echo $bonus['kode_bonus'] ?></td>
            <td><?php echo $bonus['nama'] ?></td>
            <td><?php echo number_format($bonus['total_item'], 0, ',', '.') ?></td>
            <td><?php echo 'Rp'.number_format($bonus['jumlah_bonus'], 0, ',', '.') ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url() ?>admin/bonus_detail/<?php echo $bonus['kode_bonus']  ?>" class="btn btn-info">View</a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <td></td>
        <td>Nama</td>
        <td></td>
        <td></td>
        <td></td>
      </tfoot>
    </table>
  </div>
</div>
