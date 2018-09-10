<h1 class="text-center text-uppercase">Info Pembelian</h1>

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
        <input type="date" name="tanggalsampai" class="form-control" id="datepembelian">
        <span class="text-danger"><?php echo form_error('tanggalsampai') ?></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">Cari</button>
      </div>
    <?php echo form_close() ?>

  </div>
</div>

<!-- info tanggal pencarian -->
<?php if(!empty($tanggal)) : ?>
  <div class="well" style="margin-bottom: -20px;">
    <p class="text-center"><strong>Menampilkan pencarian tanggal</strong></p>
    <p style="font-size: 18px; margin-top: -10px;" class="text-center text-success"><strong><?php echo $tanggal['dari']?> <span style="color: #555555">s/d</span> <?php echo $tanggal['sampai']?></strong></p>
  </div>
<?php endif ?>

<br><br>

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
          <div class="btn-group">
            <a href="<?php echo base_url() ?>admin/pembeliandetail/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-info">
              lihat
              <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <a href="<?php echo base_url() ?>admin/pembelianubah/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-success">
              ubah
              <span class="glyphicon glyphicon-edit"></span>
            </a>
            <?php if(!$pembelianDetail['status_no_edit']) : ?>
              <a href="<?php echo base_url() ?>admin/pembelianhapus/<?php echo $pembelianDetail['kode_pembelian'] ?>" class="btn btn-danger btnhapus">
                hapus
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            <?php endif ?>
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
