<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
    <title>Dashboard</title>
  </head>
  <body>


    <div class="container">

      <div class="row">
        <h1>Perhitungan Bonus</h1>
      </div>

      <div class="row">
        <form id="formbonus">
          <div class="form-group">
            <label>Pembelian: </label>
            <input type="number" class="form-control" id="inputbonus">
          </div>
          <div class="form-group">
            <button type="submit" id="btnsubmitbonus" class="btn btn-info">Hitung</button>
          </div>
        </form>
      </div>

      <div class="row">
        <p>Bonus = <span id="spanjumlahbonus"></span></p>
        <p>ribuan = <span id="spanribuan"></span></p>
        <p>puluhanribu = <span id="spanpuluhanribu"></span></p>
        <p>totalPembelian = <span id="spantotalpembelian"></span></p>
      </div>

    </div>

    <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
      (function($){
        let btnSubmitBonus = $("#btnsubmitbonus");
        let inputBonus = $("#inputbonus");
        let spanJumlahBonus = $("#spanjumlahbonus");
        let spanRibuan = $("#spanribuan");
        let spanPuluhanRibu = $("#spanpuluhanribu");
        let spanTotalPembelian = $("#spantotalpembelian");
        let pembelianValue = 0;
        let bonus = 0;
        let ribuan = 0;
        let puluhanRibu = 0;
        let totalPembelian = 0;
        let selisihRibuan = 0;
        let selisihPuluhanRibu = 0;

        btnSubmitBonus.on("click", (event) => {
          event.preventDefault();
          pembelianValue = inputBonus.val();
          // total semua pembelian
          totalPembelian += parseInt(pembelianValue);

          if(pembelianValue != null || pembelianValue==false || pembelianValue != 0){
            // pembelian keliapatan seribu
            if((totalPembelian/ribuan) >= 1){
              selisihRibuan = parseInt(totalPembelian) - ribuan;
              if((selisihRibuan/1000) >= 1){
                selisihRibuan = Math.floor(selisihRibuan / 1000);
                ribuan += (1000*selisihRibuan);
                bonus += (300000*selisihRibuan);
              }
              console.log('bonus ribuan');
            }
            // pembelian kelipatan sepuluh ribu
            if((totalPembelian/puluhanRibu) >= 1){
              selisihPuluhanRibu = parseInt(totalPembelian) - puluhanRibu;
              if((selisihPuluhanRibu/10000) >= 1){
                selisihPuluhanRibu = Math.floor(selisihPuluhanRibu / 10000);
                puluhanRibu += (10000*selisihPuluhanRibu);
                bonus += (800000*selisihPuluhanRibu);
              }
              console.log('bonus puluhan ribu');
            }
            // pembelian langsung 1000
            if((pembelianValue >= 1000)){
              bonus += 50000;
              console.log('bonus langsung beli 1000');
            }

            spanJumlahBonus.html(bonus);
            spanPuluhanRibu.html(puluhanRibu);
            spanRibuan.html(ribuan);
          }
          else{
            alert('mohon isi pembelian');
          }

          spanTotalPembelian.html(totalPembelian);

        })
      }(jQuery))
    </script>

  </body>
  </html>
