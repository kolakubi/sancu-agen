<h3 class="text-center">History Pembelian</h3>
<br>

<?php
  $totalPembelian = 0;
  $totalTagihan = 0;
  $totalPembayaran = 0;
  $totalItem = 0;
  $totalItemSancu = 0;
  $totalItemBoncu = 0;
  $totalItemPretty = 0;
  $totalItemXtreme = 0;
?>
<?php foreach($datapembelian as $pembelian) : ?>
<div class="row" style="padding: 0 15px; font-size: 12px">
  <div class="col-xs-12">
    <table class="table table-bordered table-condensed">
      <thead>
        <tr class="info">
          <th class="text-center" colspan="5"><?php echo $pembelian['tanggal_pembelian'] ?></th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" style="font-size: 12px">
          <!-- cek checkbox sancu -->
          <!-- tampilin judul -->
          <!-- Judul sancu -->
          <td><strong>Item Produk</strong></td>
          <?php if(in_array($defaultitem[0], $item)) : ?>
            <td>Sancu</td>
          <?php endif ?>
          <!-- Judul boncu -->
          <?php if(in_array($defaultitem[1], $item)) : ?>
            <td>Boncu</td>
          <?php endif ?>
          <!-- Judul pretty -->
          <?php if(in_array($defaultitem[2], $item)) : ?>
            <td>Pretty</td>
          <?php endif ?>
          <!-- Judul xtreme -->
          <?php if(in_array($defaultitem[3], $item)) : ?>
            <td>Xtreme</td>
          <?php endif ?>
        </tr>
        <tr class="text-center">
          <td><strong>Jumlah</strong></td>
          <!-- cek checkbox sancu -->
          <!-- tampilin jumlah item -->
          <!-- jumlah sancu -->
          <?php if(in_array($defaultitem[0], $item)) : ?>
            <td>
              <?php echo $pembelian['sancu'] ?>
            </td>
          <?php else : ?>
            <?php $pembelian['sancu'] = 0; ?>
          <?php endif ?>

          <!-- jumlah boncu -->
          <?php if(in_array($defaultitem[1], $item)) : ?>
            <td>
              <?php echo $pembelian['boncu'] ?>
            </td>
          <?php else : ?>
            <?php $pembelian['boncu'] = 0; ?>
          <?php endif ?>

          <!-- jumlah pretty -->
          <?php if(in_array($defaultitem[2], $item)) : ?>
            <td>
              <?php echo $pembelian['pretty'] ?>
            </td>
          <?php else : ?>
            <?php $pembelian['pretty'] = 0; ?>
          <?php endif ?>

          <!-- jumlah xtreme -->
          <?php if(in_array($defaultitem[3], $item)) : ?>
            <td>
              <?php echo $pembelian['xtreme'] ?>
            </td>
          <?php else : ?>
            <?php $pembelian['xtreme'] = 0; ?>
          <?php endif ?>
        </tr>
        <tr class="text-center">
          <td><strong>Harga Item (Rp)</strong></td>
          <!-- cek checkbox sancu -->
          <!-- tampilin total harga -->
          <?php if(in_array($defaultitem[0], $item)) : ?>
            <td>
              <?php echo number_format($pembelian['total_harga_sancu'], 0, ',', '.') ?>
            </td>
          <?php else : ?>
              <?php $pembelian['total_harga_sancu'] = 0; ?>
          <?php endif ?>
          <!-- cek checkbox boncu -->
          <?php if(in_array($defaultitem[1], $item)) : ?>
            <td>
              <?php echo number_format($pembelian['total_harga_boncu'], 0, ',', '.') ?>
            </td>
          <?php else : ?>
              <?php $pembelian['total_harga_boncu'] = 0; ?>
          <?php endif ?>
          <!-- cek checkbox pretty -->
          <?php if(in_array($defaultitem[2], $item)) : ?>
            <td>
              <?php echo number_format($pembelian['total_harga_pretty'], 0, ',', '.') ?>
            </td>
          <?php else : ?>
              <?php $pembelian['total_harga_pretty'] = 0; ?>
          <?php endif ?>
          <!-- cek checkbox xtreme -->
          <?php if(in_array($defaultitem[3], $item)) : ?>
            <td>
              <?php echo number_format($pembelian['total_harga_xtreme'], 0, ',', '.') ?>
            </td>
          <?php else : ?>
              <?php $pembelian['total_harga_xtreme'] = 0; ?>
          <?php endif ?>
        </tr>
        <tr class="text-center">
          <td><strong>Total Item</strong></td>
          <td colspan="4">
            <?php echo number_format((
              $pembelian['sancu']+
              $pembelian['boncu']+
              $pembelian['pretty']+
              $pembelian['xtreme']
            ), 0, ',', '.') ?></td>
          </td>
        </tr>
        <tr class="text-center warning">
          <td><strong>Total Harga</strong></td>
          <td colspan="4">
            <?php echo 'Rp '.number_format((
              $pembelian['total_harga_sancu']+
              $pembelian['total_harga_boncu']+
              $pembelian['total_harga_pretty']+
              $pembelian['total_harga_xtreme']
            ), 0, ',', '.') ?>
          </td>
        </tr>
        </tr>
        <!-- klo ga semua item dipilih -->
        <!-- ga usah tampilin info dibayar sama kekurangan -->
        <!-- <?php if(in_array($defaultitem[0], $item) && in_array($defaultitem[1], $item) && in_array($defaultitem[2], $item) && in_array($defaultitem[3], $item)) : ?>
          <tr class="text-center success">
            <td><strong>Dibayar</strong></td>
            <td colspan="4"><?php echo 'Rp '.number_format($pembelian['jumlah_dibayar'], 0, ',', '.') ?></td>
          </tr>
          <tr class=" text-center danger">
            <td><strong>Kekurangan</strong></td>
            <td colspan="4"><?php echo 'Rp '.number_format($pembelian['sisa_tagihan'], 0, ',', '.') ?></td>
          </tr>
        <?php endif ?> -->
      </tbody>
    </table>
  </div>
</div>
<!-- total item per produk -->
<?php
  $totalItemSancu = $totalItemSancu += $pembelian['sancu'];
  $totalItemBoncu = $totalItemBoncu += $pembelian['boncu'];
  $totalItemPretty = $totalItemPretty += $pembelian['pretty'];
  $totalItemXtreme = $totalItemXtreme += $pembelian['xtreme'];
?>
<!-- ============== -->
<?php $totalItem += ($pembelian['sancu']+$pembelian['boncu']+$pembelian['pretty']+$pembelian['xtreme']); ?>
<?php $totalPembelian += ($pembelian['total_harga_sancu']+$pembelian['total_harga_boncu']+$pembelian['total_harga_pretty']+$pembelian['total_harga_xtreme']); ?>
<?php $totalPembayaran += $pembelian['jumlah_dibayar']; ?>
<?php $totalTagihan += $pembelian['sisa_tagihan']; ?>
<?php endforeach ?>

<!-- grand total -->
<div class="row text-uppercase text-strong text-center" style="padding: 0% 7%; font-size: 12px">
  <!-- grand total item -->
  <!-- sancu -->
  <h5>
    <?php if(in_array($defaultitem[0], $item)) : ?>
      <td>
        <?php echo '<strong>Total Item Sancu: '.number_format($totalItemSancu, 0, ',', '.').'</strong>' ?>
      </td>
    <?php endif ?>
  </h5>
  <!-- boncu -->
  <h5>
    <?php if(in_array($defaultitem[1], $item)) : ?>
      <td>
        <?php echo '<strong>Total Item Boncu: '.number_format($totalItemBoncu, 0, ',', '.').'</strong>' ?>
      </td>
    <?php endif ?>
  </h5>
  <!-- pretty -->
  <h5>
    <?php if(in_array($defaultitem[2], $item)) : ?>
      <td>
        <?php echo '<strong>Total Item Pretty: '.number_format($totalItemPretty, 0, ',', '.').'</strong>' ?>
      </td>
    <?php endif ?>
  </h5>
  <!-- xtreme -->
  <h5>
    <?php if(in_array($defaultitem[3], $item)) : ?>
      <td>
        <?php echo '<strong>Total Item Xtreme: '.number_format($totalItemXtreme, 0, ',', '.').'</strong>' ?>
      </td>
    <?php endif ?>
  </h5>
  <hr>
  <!-- ========== -->
  <h5><strong>Grand Total Item:
    <?php echo number_format($totalItem, 0, ',', '.').' pasang' ?>
  </strong></h5>
  <h5><strong>Grand Total Pembelian:
    <?php echo 'Rp '.number_format($totalPembelian, 0, ',', '.') ?>
  </strong></h5>
  <!-- klo ga semua item dipilih -->
  <!-- ga usah tampilin info dibayar sama kekurangan -->
  <!-- <?php if(in_array($defaultitem[0], $item) && in_array($defaultitem[1], $item) && in_array($defaultitem[2], $item) && in_array($defaultitem[3], $item)) : ?>
    <h5><strong>Total Pembayaran: <?php echo 'Rp '.number_format($totalPembayaran, 0, ',', '.') ?>
    </strong></h5>
    <h5><strong>Total Hutang: <?php echo 'Rp '.number_format($totalTagihan, 0, ',', '.') ?>
    </strong></h5>
  <?php endif ?> -->
</div>

<div class="row">
  <div class="col-xs-12">
    <p class="text-center">
      <a class="btn btn-info" href="<?php echo base_url() ?>agen">kembali</a>
    </p>
  </div>
</div>
