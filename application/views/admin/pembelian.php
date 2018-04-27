<h1 class="text-center">Info Pembelian</h1>

<a href="<?php echo base_url() ?>admin/pembeliantambah" class="btn btn-info">Tambah Pembelian +</a>
<br><br><br>

<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="datatablepembelian">
  <thead>
    <tr class="info">
      <th>No</th>
      <th>Kode Pembelian</th>
      <th>Nama Agen</th>
      <th>Tgl Pembelian</th>
      <th>Jumlah Item</th>
      <th>Jumlah Pembelian</th>
      <!-- <th>Sisa Tagihan</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($pembelian as $pembelianDetail) : ?>
      <tr>
        <td><?php echo $i+=1;?></td>
        <td><?php echo $pembelianDetail['kode_pembelian']?></td>
        <td><?php echo $pembelianDetail['nama'] ?></td>
        <td><?php echo $pembelianDetail['tanggal_pembelian']?></td>
        <td><?php echo number_format($pembelianDetail['total_item'], 0, ',', '.')?></td>
        <td><?php echo 'Rp'.number_format($pembelianDetail['total_pembelian'], 0, ',', '.')?></td>
        <!-- <td><?php echo 'Rp'.number_format($pembelianDetail['sisa_tagihan'], 0, ',', '.')?></td> -->
        <td>
          <div class="btn-group btn-group-justified">
            <a href="<?php echo base_url() ?>admin/pembeliandetail/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-info">View</a>
            <a href="<?php echo base_url() ?>admin/pembelianubah/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-success">Edit</a>
            <a href="<?php echo base_url() ?>admin/pembelianhapus/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-danger btnhapus">Delete</a>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    <td></td>
    <td>Kode</td>
    <td>Nama Agen</td>
    <td>Tgl Pembelian</td>
    <td>Jumlah Item</td>
    <td></td>
    <!-- <td></td> -->
    <td></td>
  </tfoot>
</table>
