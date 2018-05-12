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
    bulan = bulan <= 9 ? '0'+bulan : bulan;
    let hari = tanggal.getDate();
    hari = hari <= 9 ? '0'+hari : hari;
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

  function jumlahPembelian(){
    let pembelianJumlah = $('#pembelianjumlah');
    let pembelianHargaSancu = $('#pembelianhargasancu');
    let pembelianHargaBoncu = $('#pembelianhargaboncu');
    let pembelianHargaPretty = $('#pembelianhargapretty');
    let pembelianHargaXtreme = $('#pembelianhargaxtreme');

    let jumlah = 0;
    function totalPembelian(){
      jumlah = parseInt(pembelianHargaSancu.val()) +
      parseInt(pembelianHargaBoncu.val()) +
      parseInt(pembelianHargaPretty.val()) +
      parseInt(pembelianHargaXtreme.val());
    }

    pembelianHargaSancu.on('change', () => {
      totalPembelian();
      pembelianJumlah.val(jumlah);
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    });
    pembelianHargaBoncu.on('change', () => {
      totalPembelian();
      pembelianJumlah.val(jumlah);
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    });
    pembelianHargaPretty.on('change', () => {
      totalPembelian();
      pembelianJumlah.val(jumlah);
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    });
    pembelianHargaXtreme.on('change', () => {
      totalPembelian();
      pembelianJumlah.val(jumlah);
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    });

    let pembelianDibayar = $('#pembeliandibayar');
    let pembelianSisaTagihan = $('#pembeliansisatagihan');
    let sisa = 0;
    function sisaTagihan(){
      sisa = parseInt(pembelianJumlah.val()) - parseInt(pembelianDibayar.val());
    }
    pembelianJumlah.on('change', function(){
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    })

    pembelianDibayar.on('change', function(){
      sisaTagihan();
      pembelianSisaTagihan.val(sisa);
    })

  }

  ////////////////////////////////////////
  ///////// Fungsi Pembayaran ////////////

  function autoSisaTagihan(){
    let tagihanSebelumnya = $('#bayartagihansebelumnya');
    let dibayar = $('#bayardibayar');
    let sisaTagihan = $('#bayarsisatagihan');

    let selisih = 0;
    function sisaTagihanFunc(){
      selisih = parseInt(tagihanSebelumnya.val()) - parseInt(dibayar.val());
    }

    dibayar.on('change', function(){
      sisaTagihanFunc();
      sisaTagihan.val(selisih);
    })
  }


  //////////////////////////////////////////////////
  //////////////////////////////////////////////////
  ////// Panggil Fungsi general ////////////////////

  //datatables agen
  prettyTable('datatableagen', 'Info Agen');
  //datatables pembelian
  prettyTable('datatablepembelian', 'Info Pembelian');
  //datatables pembayaran
  prettyTable('datatablepembayaran', 'Pembayaran');
  //datatables pembayaran Detail
  prettyTable('datatablepembayarandetail', 'Detail Pembayaran');
  // peringatan saat menghapus data
  peringatanSaatHapusData();


  //////////////////////////////////////////////////
  //////////////////////////////////////////////////
  ////// Fungsi tambah pembelian ///////////////////

  // jika ada di halaman agen/pembelian
  let kodeHalaman = window.location.pathname.split("/").pop();
  if(window.location.pathname == "/sancu-agen/admin/pembeliantambah"){
    // fungsi otomatis date hari ini
    dateOtomatisHariIni();
    // fungsi hitung jumlah Item
    hitungJumlahItem();
    // fungsi hitung jumlah pembelian
    jumlahPembelian();
  }
  else if(window.location.pathname == "/sancu-agen/admin/pembelianubah/"+kodeHalaman){
    // fungsi hitung jumlah Item
    hitungJumlahItem();
    // fungsi hitung jumlah pembelian
    jumlahPembelian();
  }

  //////////////////////////////////////////////////
  //////////////////////////////////////////////////
  ////// Fungsi pembayaran ///////////////////
  autoSisaTagihan();

}(jQuery))
