<h1 class="text-center">Detail Pembayaran</h1>
<div class="row">
  <div class="col-xs-12">
    <table class="table table-condensed table-borderd table-striped table-hover" id="datatablepembayarandetail">
      <thead>
        <tr>
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
          <tr>
            <td><?php echo $pembayaran['kode_pembayaran'] ?></td>
            <td><?php echo $pembayaran['tanggal_pembayaran'] ?></td>
            <td><?php echo $pembayaran['tagihan_sebelumnya'] ?></td>
            <td><?php echo $pembayaran['nominal_pembayaran'] ?></td>
            <td><?php echo $pembayaran['sisa_tagihan'] ?></td>
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
