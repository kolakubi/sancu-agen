<div class="row" style="padding: 0 30px;">
  <div class="col-xs-12">
    <h3 class="text-center">History Pembayaran</h3>.

    <!-- <table class="table table-bordered table-condensed table-responsive table-striped" style="font-size: 12px">
      <thead>
        <tr class="info">
          <th>Tgl Bayar</th>
          <th>Tagihan(Rp)</th>
          <th>Dibayar(Rp)</th>
          <th>Sisa(Rp)</th>
        </tr>
      </thead>
      <tbody> -->
        <?php $judul = $datapembayaran[0]['tanggal_pembelian']; ?>
        <!-- tampilin tanggal pembelian pertama -->
        <table class="table table-bordered table-condensed table-responsive table-striped" style="font-size: 12px">
          <thead>
            <tr class="text-center danger">
              <td colspan="5"><?php echo 'Pembelian</br>'.$datapembayaran[0]['tanggal_pembelian'] ?></td>
            </tr>
            <tr class="info">
              <th>Tgl Bayar</th>
              <th>Keterangan</th>
              <th>Tagihan(Rp)</th>
              <th>Dibayar(Rp)</th>
              <th>Sisa(Rp)</th>
            </tr>
          </thead>
          <tbody>
        <?php foreach($datapembayaran as $pembayaran) : ?>
        <!-- jika tanggal pembelian berbeda -->
        <!-- tampilkan tanggal baru -->
        <?php if($pembayaran['tanggal_pembelian'] != $judul) : ?>
          <table class="table table-bordered table-condensed table-responsive table-striped" style="font-size: 12px">
            <thead>
              <tr class="text-center danger">
                <td colspan="5"><?php echo 'Pembelian</br>'.$pembayaran['tanggal_pembelian'] ?></td>
              </tr>
              <tr class="info">
                <th>Tgl Bayar</th>
                <th>Keterangan</th>
                <th>Tagihan(Rp)</th>
                <th>Dibayar(Rp)</th>
                <th>Sisa(Rp)</th>
              </tr>
            </thead>
            <tbody>
        <?php endif ?>
        <tr>
          <td><?php echo $pembayaran['tanggal_pembayaran'] ?></td>
          <td><?php echo $pembayaran['keterangan'] ?></td>
          <td><?php echo number_format($pembayaran['tagihan_sebelumnya'], 0, ',', '.') ?></td>
          <td><?php echo number_format($pembayaran['nominal_pembayaran'], 0, ',', '.') ?></td>
          <td><?php echo number_format($pembayaran['sisa_tagihan'], 0, ',', '.') ?></td>
        </tr>
        <?php $judul = $pembayaran['tanggal_pembelian']; ?>
        <?php endforeach ?>
      </tbody>
    </table>

    <p class="text-center">
      <a href="<?php echo base_url() ?>agen/pembayaran" class="btn btn-info">Kembali</a>
    </p>
  </div>
</div>
