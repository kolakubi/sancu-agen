<h1 class="text-center">Info Pembayaran</h1>

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
        <?php foreach($dataPembayaran as $pembayaran) : ?>
          <tr>
            <td><?php echo $pembayaran['kode_pembayaran'] ?></td>
            <td><?php echo $pembayaran['kode_pembelian'] ?></td>
            <td><?php echo $pembayaran['nama'] ?></td>
            <td><?php echo $pembayaran['tanggal_pembelian'] ?></td>
            <td><?php echo 'Rp'.number_format($pembayaran['jumlah_pembelian'], 0, ',', '.') ?></td>
            <td><?php echo 'Rp'.number_format($pembayaran['sisa_tagihan'], 0, ',', '.') ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-info">View</a>
                <?php if($pembayaran['sisa_tagihan'] > 0) : ?>
                  <a href="<?php echo base_url() ?>admin/pembayarandetailtambah/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-success">Bayar</a>
                <?php endif ?>

                <a href="#" class="btn btn-danger btnhapus">Delete</a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
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
