<?php $index=0; ?>

<h1 class="text-center">Detail Pembayaran</h1>
<div class="row">
  <div class="col-xs-12">
    <table class="table table-condensed table-borderd table-striped table-hover" id="datatablepembayarandetail">
      <thead>
        <tr class="info">
          <th>Kode</th>
          <th>Tgl Pembayaran</th>
          <th>Tagihan Sebelumnya</th>
          <th>Nominal</th>
          <th>Sisa Tagihan</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dataPembayaran as $pembayaran) : ?>
          <?php $index++; ?>
          <?php echo $index; ?>
          <tr>
            <td><?php echo $pembayaran['kode_pembayaran'] ?></td>
            <td><?php echo $pembayaran['tanggal_pembayaran'] ?></td>
            <td><?php echo 'Rp'.number_format($pembayaran['tagihan_sebelumnya'], 0, ',', '.')?></td>
            <td><?php echo 'Rp'.number_format($pembayaran['nominal_pembayaran'], 0, ',', '.')?></td>
            <td><?php echo 'Rp'.number_format($pembayaran['sisa_tagihan'], 0, ',', '.')?></td>
            <td><?php echo $pembayaran['keterangan'] ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
          <td></td>
          <td>tanggal</td>
          <td></td>
          <td></td>
          <td></td>
          <td>keterangan</td>
      </tfoot>
    </table>
    <p class="text-center">
      <a href="<?php echo base_url() ?>admin/pembayaran" class="btn btn-info">kembali</a>
    </p>
  </div>
</div>
