<h1 class="text-center">Info Pembayaran</h1>

<div class="row">
  <div class="col-xs-12 col-md-4 col-md-offset-4">

    <?php echo form_open() ?>
      <div class="form-group">
        <label>Nama Agen:</label>
        <div class="input-group">
          <input type="text" value="" class="form-control" name="kodeagen" id="ajaxNamaAgen">
          <span class="input-group-addon" style="cursor: pointer;" id="btnajaxNamaAgen"><i class="glyphicon glyphicon-search"></i></span>
        </div>
        <div class="list-group" id="ulajaxNamaAgen">
          <!-- <li class="list-group-item"></li> -->
        </div>
        <span class="text-danger"><?php echo form_error('kodeagen') ?></span>
      </div>
      <div class="form-group">
        <label>Dari: </label>
        <input type="date" name="tanggaldari" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggaldari') ?></span>
      </div>
      <div class="form-group">
        <label>Sampai: </label>
        <input type="date" name="tanggalsampai" class="form-control">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>

  </div>
</div>
<br><br>

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
                <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-info">
                  lihat
                  <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <?php if($pembayaran['sisa_tagihan'] > 0) : ?>
                  <a href="<?php echo base_url() ?>admin/pembayarandetailtambah/<?php echo $pembayaran['kode_pembayaran'] ?>" class="btn btn-success">
                    Bayar
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                <?php endif ?>
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
