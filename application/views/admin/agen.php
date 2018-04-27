<h1 class="text-center">Info Agen</h1>

<a href="<?php echo base_url() ?>admin/agentambah" class="btn btn-info">Tambah Agen +</a>
<br><br><br>

<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="datatableagen">
  <thead>
    <tr class="info">
      <th>No</th>
      <th>Kode Agen</th>
      <th>Nama</th>
      <th>Lokasi</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($agen as $agenDetail) : ?>
      <tr>
        <td><?php echo $i+=1;?></td>
        <td><?php echo $agenDetail['kode_agen']?></td>
        <td><?php echo $agenDetail['nama']?></td>
        <td><?php echo $agenDetail['kota']?></td>
        <td>
          <a href="<?php echo base_url() ?>admin/agendetail/<?php echo $agenDetail['kode_agen'] ?>" class="btn btn-info">View</a>
          <a href="<?php echo base_url() ?>admin/agenubah/<?php echo $agenDetail['kode_agen'] ?>" class="btn btn-success">Edit</a>
          <a href="<?php echo base_url() ?>admin/agenhapus/<?php echo $agenDetail['kode_agen'] ?>" class="btn btn-danger btnhapus">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
  <tfoot>
    <td></td>
    <td>Kode Agen</td>
    <td>Nama</td>
    <td>Lokasi</td>
    <td></td>
  </tfoot>
</table>
