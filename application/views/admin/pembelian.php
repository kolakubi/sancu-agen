<h1 class="text-center">Info Pembelian</h1>

<a href="<?php echo base_url() ?>admin/pembeliantambah" class="btn btn-info">Tambah Pembelian +</a>
<br><br><br>

<table class="table table-striped" id="datatablepembelian">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Pembelian</th>
      <th>Tgl Pembelian</th>
      <th>Jumlah Item</th>
      <th>Jumlah Pembelian</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($pembelian as $pembelianDetail) : ?>
      <tr>
        <td><?php echo $i+=1;?></td>
        <td><?php echo $pembelianDetail['kode_pembelian']?></td>
        <td><?php echo $pembelianDetail['tanggal_pembelian']?></td>
        <td><?php echo $pembelianDetail['jumlah_item']?></td>
        <td><?php echo 'Rp'.number_format($pembelianDetail['jumlah_pembelian'], 0, ',', '.')?></td>
        <td>
          <a href="#" class="btn btn-info">View</a>
          <a href="#" class="btn btn-success">Edit</a>
          <a href="#" class="btn btn-danger btnhapus">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    <td></td>
    <td>Kode Pembelian</td>
    <td>Tgl Pembelian</td>
    <td>Jumlah Item</td>
    <td>Jumlah Pembelian</td>
    <td></td>
  </tfoot>
</table>
