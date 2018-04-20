<h1 class="text-center">Detail Pembelian</h1>

<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="datatablepembelian">
  <thead>
    <tr>
      <th>Kode Pembelian</th>
      <th>Nama Agen</th>
      <th>Tgl Pembelian</th>
      <th>Sancu</th>
      <th>Boncu</th>
      <th>Pretty</th>
      <th>Xtreme</th>
      <th>Jumlah Item</th>
      <th>Jumlah Pembelian</th>
      <th>Jumlah Dibayar</th>
      <th>Sisa Tagihan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $datapembelian['kode_pembelian'] ?></td>
      <td><?php echo $datapembelian['nama'] ?></td>
      <td><?php echo $datapembelian['tanggal_pembelian'] ?></td>
      <td><?php echo $datapembelian['sancu'] ?></td>
      <td><?php echo $datapembelian['boncu'] ?></td>
      <td><?php echo $datapembelian['pretty'] ?></td>
      <td><?php echo $datapembelian['xtreme'] ?></td>
      <td><?php echo $datapembelian['jumlah_item'] ?></td>
      <td><?php echo 'Rp '.number_format($datapembelian['jumlah_pembelian'], 0, ',', '.') ?></td>
      <td><?php echo 'Rp '.number_format($datapembelian['jumlah_dibayar'], 0, ',', '.') ?></td>
      <td><?php echo 'Rp '.number_format($datapembelian['sisa_tagihan'], 0, ',', '.') ?></td>
    </tr>
  </tbody>
</table>
<br>
<p class="text-center">
  <a href="<?php echo base_url() ?>admin/pembelian" class="btn btn-info btn-lg">Kembali</a>
</p>
