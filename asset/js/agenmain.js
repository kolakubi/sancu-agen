(function(){

  ///////////////////////////////
  /////// fungsi-fungsi /////////

  // footer tetap di bawah
  function fixedBottomFooter(){
    let docHeight = $(window).height();
    let footerHeight = $('#footer').height();
    let footerTop = $('#footer').position().top + footerHeight;
    if (footerTop < docHeight)
        $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
  }

  // fungsi checkbox
  function checkSemuaItem(){
    let pembeliansemuacheck = $('#pembeliansemuacheck');
    let pembeliansancucheck = $('#pembeliansancucheck');
    let pembelianboncucheck = $('#pembelianboncucheck');
    let pembelianprettycheck = $('#pembelianprettycheck');
    let pembelianxtremecheck = $('#pembelianxtremecheck');

    pembeliansemuacheck.on('change', function(){
      let status = $(this).prop('checked');
      pembeliansancucheck.prop('checked', status);
      pembelianboncucheck.prop('checked', status);
      pembelianprettycheck.prop('checked', status);
      pembelianxtremecheck.prop('checked', status);
    })
  }

  // submit form pembelian
  function submitFormPembelian(){
    let btnSubmit = $('#btnsubmitpembelian');
    btnSubmit.on('click', (event) => {
      event.preventDefault();

      let sancu = $('#pembeliansancucheck').prop('checked');
      let boncu = $('#pembelianboncucheck').prop('checked');
      let pretty = $('#pembelianprettycheck').prop('checked');
      let xtreme = $('#pembelianxtremecheck').prop('checked');

      if(sancu == false && boncu == false && pretty == false && xtreme == false){
        alert("pilih salah satu item");
      }
      else{
        window.location = 'pembelian';
      }


    })
  }

  ///////////////////////////////
  ////// manggil fungsi /////////

  fixedBottomFooter();
  checkSemuaItem();
  //submitFormPembelian();

}(jQuery))
