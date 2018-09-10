<?php 
  $index = 0;
  $jumlahNominal = 0; 
?>

<h1 class="text-center">Detail Pembayaran</h1>
<div class="row">
  <div class="col-xs-12">
    <table class="table table-condensed table-borderd table-striped table-hover" id="datatablepembayarandetail">
      <thead>
        <tr class="info">
          <th>Kode</th>
          <th>Tgl Pembayaran</th>
          <!-- <th>Tagihan Sebelumnya</th> -->
          <th>Nominal</th>
          <!-- <th>Sisa Tagihan</th> -->
          <th>keterangan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dataPembayaran as $pembayaran) : ?>

          <?php $jumlahNominal += $pembayaran['nominal_pembayaran'] ?>

          <tr>
            <td><?php echo $pembayaran['kode_pembayaran_detail'] ?></td>
            <td><?php echo $pembayaran['tanggal_pembayaran'] ?></td>
            <!-- <td><?php echo 'Rp'.number_format($pembayaran['tagihan_sebelumnya'], 0, ',', '.')?></td> -->
            <td><?php echo 'Rp'.number_format($pembayaran['nominal_pembayaran'], 0, ',', '.')?></td>
            <!-- <td><?php echo 'Rp'.number_format($pembayaran['sisa_tagihan'], 0, ',', '.')?></td> -->
            <td><?php echo $pembayaran['keterangan'] ?></td>
            <td>
            <?php if($pembayaran['nominal_pembayaran'] > 0) : ?>
              <a href="<?php echo base_url() ?>admin/pembayarandetailubah/<?php echo $pembayaran['kode_pembayaran_detail'] ?>" class="btn btn-warning">Ubah <span class="glyphicon glyphicon-edit"></span>
              <?php if(!$pembayaran['status_no_edit']) : ?>
                <a href="<?php echo base_url() ?>admin/pembayarandetailhapus/<?php echo $pembayaran['kode_pembayaran_detail'] ?>" class="btn btn-danger btnhapus">Hapus<span class="glyphicon glyphicon-trash"></span>
                </a>
              <?php endif ?>
            <?php endif ?>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
          <td></td>
          <td>tanggal</td>
          <td></td>
          <!-- <td></td> -->
          <!-- <td></td> -->
          <td>keterangan</td>
          <td></td>
      </tfoot>
    </table>
    <div class="row">
      <div class="well col-md-6 col-md-offset-3">
        <h4 class="text-center text-info">
          Jumlah Pembelian: <?php echo 'Rp'.number_format($dataPembayaran[0]['jumlah_pembelian'], 0, ',', '.') ?>
        </h4>
        <h4 class="text-center text-success">
          Jumlah Nominal Pembayaran: <?php echo 'Rp'.number_format($jumlahNominal, 0, ',', '.') ?>
        </h4>
        <h4 class="text-center text-danger">
          Sisa Tagihan: <?php echo 'Rp'.number_format(($dataPembayaran[0]['jumlah_pembelian']) - $jumlahNominal, 0, ',', '.') ?>
        </h4>
      </div>
    </div>
    
    <p class="text-center">
      <a href="<?php echo base_url() ?>admin/pembayaran" class="btn btn-info">kembali</a>
    </p>
  </div>
</div>
