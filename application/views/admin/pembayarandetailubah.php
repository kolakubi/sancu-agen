<h1 class="text text-center">Edit Pembayaran</h1>
<br><br>
<div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
        
        <?php echo form_open('admin/pembayarandetailubah/'.$dataPembayaranDetail['kode_pembayaran_detail']) ?>
            
            <div class="form-group">
                <label>Kode Pembayaran</label>
                <input type="text" class="form-control" value="<?php echo $dataPembayaranDetail['kode_pembayaran_detail'] ?>" readonly name="kodepembayarandetail">
            </div>
            <div class="form-group">
                <label>Nominal Pembayaran</label>
                <input type="number" class="form-control" value="<?php echo $dataPembayaranDetail['nominal_pembayaran'] ?>" name="nominalpembayaran">
            </div>

            <!-- button -->
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-warning btn-block" type="submit">Ubah</button>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo base_url() ?>admin/pembayarandetail/<?php echo $dataPembayaranDetail['kode_pembayaran'] ?>" class="btn btn-info btn-block">Kembali</a>
                </div>
            </div>

        <?php echo form_close() ?>

    </div>
</div>