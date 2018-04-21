(function(){
  /////////////////////////////
  /////// F U N G S I /////////

  // fungsi setting datatables
  function prettyTable(tableId, tableTitle){
    // Setup - add a text input to each footer cell
    $('#'+tableId+' tfoot td').each(function(){
      let title = $(this).text();
      $(this).html('<input type="text" placeholder="cari '+title+'" />' );
      // hapus fitur search di nomor sama action
      // cari input dengan placehoder 'cari '
      if($(this).children().attr('placeholder') == 'cari '){
        //jika ktemu lansung remove
        $(this).children().remove();
      }
    });
    // DataTable
    let table = $('#'+tableId).DataTable({
      // ilangin sort dan search pada kolom
      "columnDefs": [
        {
          'targets': ['action'],
          'searchable': false,
          'sortable': false
        }
      ],
      // munculin export ke excel
      dom: 'Bfrtip',
      buttons: [
        'pdf', 'excel',
        {//ganti print title
          extend: 'print',
          title: function(){
            return tableTitle
          }
        }
      ]
    });
    // Apply the search
    table.columns().every(function(){
      var that = this;

      $('input', this.footer()).on('keyup change', function() {
        if(that.search() !== this.value){
          that
          .search(this.value)
          .draw();
        }
      });
    });
  }

  // peringatan saat menghapus data
  function peringatanSaatHapusData(){
    $('.btnhapus').on('click', function(event){
      event.preventDefault();
      let link = $(this).attr('href');
      if(confirm('Anda yakin ingin menghapus Data ini ?')){
        window.location = link;
      }
    })
  }

  // fungsi otomatis date hari ini
  function dateOtomatisHariIni(){
    let tanggal = new Date();
    let tahun = tanggal.getFullYear();
    let bulan = tanggal.getMonth()+1;
    bulan = bulan < 9 ? '0'+bulan : bulan;
    let hari = tanggal.getDate();
    hari = hari < 9 ? '0'+hari : hari;
    let time = tahun+'-'+bulan+'-'+hari;
    document.getElementById("datepembelian").defaultValue = time;
  }

  // fungsi hitung jumlah Item
  function hitungJumlahItem(){
    let sancu = document.getElementById('pembeliansancu');
    let boncu = document.getElementById('pembelianboncu');
    let pretty = document.getElementById('pembelianpretty');
    let xtreme = document.getElementById('pembelianxtreme');
    let totalItem = 0;
    function getAllValue(){
      totalItem = parseInt(sancu.value) + parseInt(boncu.value) + parseInt(pretty.value) + parseInt(xtreme.value);
    }
    let jumlahItem = document.getElementById('pembelianjumlahitem');
    sancu.addEventListener('change', function(){
      getAllValue();
      jumlahItem.value = totalItem;
    });
    boncu.addEventListener('change', function(){
      getAllValue();
      jumlahItem.value = totalItem;
    });
    pretty.addEventListener('change', function(){
      getAllValue();
      jumlahItem.value = totalItem;
    });
    xtreme.addEventListener('change', function(){
      getAllValue();
      jumlahItem.value = totalItem;
    });
  }

  // fungsi hitung sisa tagihan
  function hitungSisaTagihan(){
    let pembelianJumlah = document.getElementById('pembelianjumlah');
    let pembelianDibayar = document.getElementById('pembeliandibayar');
    let pembelianSisaTagihan = document.getElementById('pembeliansisatagihan');
    let sisa = 0;
    function sisaTagihan(){
      sisa = parseInt(pembelianJumlah.value) - parseInt(pembelianDibayar.value);
    }
    pembelianJumlah.addEventListener('change', function(){
      sisaTagihan();
      pembelianSisaTagihan.value = sisa;
    })

    pembelianDibayar.addEventListener('change', function(){
      sisaTagihan();
      pembelianSisaTagihan.value = sisa;
    })
  }

  function jumlahPembelian(){
    let pembelianJumlah = $('#pembelianjumlah');
    let pembelianHargaSancu = $('#pembelianhargasancu');
    let pembelianHargaBoncu = $('#pembelianhargaboncu');
    let pembelianHargaPretty = $('#pembelianhargapretty');
    let pembelianHargaXtreme = $('#pembelianhargaxtreme');

    let jumlah = 0;
    function jumlahPembelian(){
      jumlah = parseInt(pembelianHargaSancu.val()) +
      parseInt(pembelianHargaBoncu.val()) +
      parseInt(pembelianHargaPretty.val()) +
      parseInt(pembelianHargaXtreme.val());
    }

    pembelianHargaSancu.on('change', () => {
      jumlahPembelian();
      pembelianJumlah.val(jumlah);
    });
    pembelianHargaBoncu.on('change', () => {
      jumlahPembelian();
      pembelianJumlah.val(jumlah);
    });
    pembelianHargaPretty.on('change', () => {
      jumlahPembelian();
      pembelianJumlah.val(jumlah);
    });
    pembelianHargaXtreme.on('change', () => {
      jumlahPembelian();
      pembelianJumlah.val(jumlah);
    });

  }


  //////////////////////////////////////////////////
  //////////////////////////////////////////////////
  ////// Panggil Fungsi general ////////////////////

  //datatables agen
  prettyTable('datatableagen', 'Info Agen');
  //datatables pembelian
  prettyTable('datatablepembelian', 'Info Pembelian');
  // peringatan saat menghapus data
  peringatanSaatHapusData();


  //////////////////////////////////////////////////
  //////////////////////////////////////////////////
  ////// Fungsi tambah pembelian ///////////////////

  // fungsi otomatis date hari ini
  dateOtomatisHariIni();
  // fungsi hitung jumlah Item
  hitungJumlahItem();
  // fungsi hitung sisa tagihan
  hitungSisaTagihan();
  // fungsi hitung jumlah pembelian
  jumlahPembelian();

}(jQuery))
