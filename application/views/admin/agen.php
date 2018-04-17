<h1 class="text-center">Halaman Agen</h1>

<a href="<?php echo base_url() ?>admin/tambahagen" class="btn btn-info">Tambah Agen +</a>
<br><br><br>

<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Agen</th>
      <th>Nama</th>
      <th>Lokasi</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($agen as $agenDetail) : ?>
      <tr>
        <td><?php echo '1'?></td>
        <td><?php echo $agenDetail['kode_agen']?></td>
        <td><?php echo $agenDetail['nama']?></td>
        <td><?php echo $agenDetail['kota']?></td>
        <td>
          <a href="#" class="btn btn-success">Edit</a>
          <a href="<?php echo base_url() ?>admin/agendetail/<?php echo $agenDetail['kode_agen'] ?>" class="btn btn-info">View</a>
          <a href="#" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
