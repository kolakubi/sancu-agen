<div class="row">
  <div class="col-xs-12">
    <!-- tombol tambah -->
    <a href="<?php echo base_url() ?>admin/pembayarandetailtambah" class="btn btn-info">Tambah Pembayaran +</a>
    <br><br><br>

    <table class="table table-condensed table-borderd table-striped table-hover" id="datatablepembayaran">
      <thead>
        <tr>
          <th>Kode Pembayaran</th>
          <th>Kode Pembelian</th>
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
            <td><?php echo $pembayaran['tanggal_pembelian'] ?></td>
            <td><?php echo $pembayaran['jumlah_pembelian'] ?></td>
            <td><?php echo $pembayaran['sisa_tagihan'] ?></td>
            <td>
              <div class="btn-group">
                <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-info">View</a>
                <?php if($pembayaran['sisa_tagihan'] != 0) : ?>
                  <a href="<?php echo base_url() ?>admin/pembayarandetailtambah/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-success">Bayar</a>
                <?php endif ?>

                <a href="#" class="btn btn-danger btnhapus">Delete</a>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
