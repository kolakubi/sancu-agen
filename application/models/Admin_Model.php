<?php

  class Admin_model extends CI_Model{

    public function __construct(){
      // load database
      $this->load->database();
    }

    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    /////////////////// A D M I N ///////////////////
    public function getDataAdmin($nik){
      $result = $this->db->get_where('admin', array('nik' => $nik))->row_array();

      return $result;
    }

    /////////////////////////////////////////////////
    /////////////////////////////////////////////////
    //////////////// A G E N ////////////////////////

    public function getDataAgen($kodeagen=null){
      // ambil data agen
      if($kodeagen){
        // jika ada kode agen, ambil data menurut kode agen
        $result = $this->db->get_where('agen', array('kode_agen'=>$kodeagen));
        return $result->row_array();
      }
      else{
        // jika tidak ada kode agen, ambil semua data agen
        $result = $this->db->get('agen')->result_array();
        return $result;
      }
    }

    public function insertAgen($dataInput){
      $result = array('status' => false, 'cekkode' => '');
      //cek apakah kode agen sudah dipakai
      $kodeagen = $dataInput['kode_agen'];
      $cekkode = $this->db->get_where('agen', array('kode_agen' => $kodeagen))->num_rows();
      // jika sudh dipakai, return false + pesan
      if($cekkode > 0){
        $result['cekkode'] = 'kode agen sudah dipakai, ganti dengan kode lain';
        return $result;
      }
      else{
        // jika valid, insert data ke database
          if($this->db->insert('agen', $dataInput)){
            $result['status'] = true;
            return $result;
          }
      }
    }

    public function updateAgen($dataInput, $kodeagen){
      // update database
      $this->db->set($dataInput);
      $this->db->where('kode_agen', $kodeagen);

      if($this->db->update('agen')){
          return true;
      }
      return false;
    }

    public function deleteAgen($kodeagen){
      // hapus data agen dari kodeagen
      $this->db->where('kode_agen', $kodeagen);
      if($this->db->delete('agen')){
        return true;
      }
      return false;
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B E L I A N ////////////////

    public function getDataPembelian($kodepembelian=null){
      // ambil data agen
      if($kodepembelian){
        // jika ada kode agen, ambil data menurut kode agen
        $result = $this->db->get_where('pembelian', array('kode_pembelian' => $kodepembelian));
        return $result->row_array();
      }
      else{
        // jika tidak ada kode agen, ambil semua data agen
        $result = $this->db->get('pembelian')->result_array();
        return $result;
      }
    }

    public function getDataPembelianJoin($dataAmbil=null){
        // ambil data agen join data agen
      if(!empty($dataAmbil)){
        // jika ada kode agen, ambil data menurut kode agen
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen');
        $this->db->where('pembelian.kode_agen', $dataAmbil['kode_agen']);
        $this->db->where('pembelian.tanggal_pembelian >=', $dataAmbil['dari']);
        $this->db->where('pembelian.tanggal_pembelian <=', $dataAmbil['sampai']);
        $result = $this->db->get()->result_array();
        return $result;
      }
      else{
        // jika tidak ada kode agen, ambil semua data agen
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen');
        $result = $this->db->get()->result_array();
        return $result;
      }
    }

    public function getDataPembelianDetail($kodepembelian){
      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->join('pembelian_detail', 'pembelian.kode_pembelian = pembelian_detail.kode_pembelian', 'inner');
      $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen', 'inner');
      $this->db->where('pembelian.kode_pembelian', $kodepembelian);
      $result = $this->db->get()->result_array();
      return $result;
    }

    public function getDataAgenJson($nama){
      $this->db->select('kode_agen, nama');
      $this->db->from('agen');
      $this->db->like('nama', $nama);
      $result = $this->db->get()->result_array();
      return $result;
    }

    public function insertPembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $dataSaldo, $dataBonus){
      // U P D A T E   P E M B E L I A N
      // update data pembelian sebelumnya

      // ambil semua data pembelian berdasarkan kode_pembelian
      $pembelianTerakhir = $this->db->get_where('pembelian', array(
          'kode_agen' => $dataPembelian['kode_agen']
        ))->result_array();

      // cek pembelian sebelumnya
      if(!empty($pembelianTerakhir)){
        $kodePembelianTerakhir = $pembelianTerakhir[0]['kode_pembelian'];

        // ex UPDATE STATUS EDIT PEMBELIAN TERAKHIR
        $this->db->set('status_no_edit', 1);
        $this->db->where('kode_pembelian', $kodePembelianTerakhir);
        $this->db->update('pembelian');

      } // => end of cek pembelian sebelumnya
      
      // I N S E R T   P E M B E L I A N
      // insert ke table pembelian
      $this->db->insert('pembelian', $dataPembelian);
      /////////////////////////////////////////////////////

      // I N S E R T   P E M B A Y A R A N
      // ambil id pembelian yg baru saja diinput
      $id_pembelian_baru_diinput = $this->db->insert_id();
      // insert data pembayaran dengan foreign key id pembelian
      $dataPembayaran['kode_pembelian'] = $id_pembelian_baru_diinput;
      $dataPembelianDetail['kode_pembelian'] = $id_pembelian_baru_diinput;
      $this->db->insert('pembayaran', $dataPembayaran);
      // ambil id Pembayaran baru diinput
      $id_pembayaran_baru_diinput = $this->db->insert_id();

      // I N S E R T   P E M B A Y A R A N   D E T A I L
      $dataBonusPembayaranDetail = array(
        'kode_pembayaran' => $id_pembayaran_baru_diinput,
        'tanggal_pembayaran' => $dataPembelian['tanggal_pembelian'],
        'tagihan_sebelumnya' => $dataPembelian['total_pembelian'],
        'nominal_pembayaran' => 0,
        'sisa_tagihan' => 0,
        'keterangan' => 'pembelian awal '.$dataPembelian['tanggal_pembelian'],
        'nik' => $_SESSION['username'],
        'status_no_edit' => 1
      );

      $this->db->insert('pembayaran_detail', $dataBonusPembayaranDetail);
      //////////////////////////////////////////////////////

      // I N S E R T   P E M B E L I A N   D E T A I L
      // fungsi insert berdasarkan nama item
      // inisiai $this
      $that = $this;
      function insert_item_detail_pembelian($item, $dataPembelianDetail, $that){
        $dataBaru = array(
          'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
          'kode_item' =>  $item,
          'jumlah_item' => $dataPembelianDetail[$item],
          'total_harga_item' => $dataPembelianDetail['total_harga_'.$item],
        );
        $that->db->insert('pembelian_detail', $dataBaru);
      }
      // pembelian sancu
      if($dataPembelianDetail['sancu'] != 0){
        insert_item_detail_pembelian('sancu', $dataPembelianDetail, $that);
      }
      // pembelian boncu
      if($dataPembelianDetail['boncu'] != 0){
        insert_item_detail_pembelian('boncu', $dataPembelianDetail, $that);
      }
      // pembelian pretty
      if($dataPembelianDetail['pretty'] != 0){
        insert_item_detail_pembelian('pretty', $dataPembelianDetail, $that);
      }
      // pembelian xtreme
      if($dataPembelianDetail['xtreme'] != 0){
        insert_item_detail_pembelian('xtreme', $dataPembelianDetail, $that);
      }
      ///////////////////////////////////////////////////////

      // I N S E R T   S A L D O
      // ambil data paling akhir saldo
      $this->db->where('kode_agen', $dataSaldo['kode_agen']);
      $this->db->order_by('kode_saldo', 'DESC');
      $this->db->limit(2);
      $saldoAkhir = $this->db->get('saldo')->result_array();
      if(!empty($saldoAkhir)){
        $saldoAkhir = $saldoAkhir[0]['nominal'];
      }
      else{
        $saldoAkhir = 0;
      }
      $dataSaldo['nominal'] = $saldoAkhir + $dataSaldo['debet'];
      // id pembelian terakhir
      $dataSaldo['kode_pembelian'] = $id_pembelian_baru_diinput;
      $dataSaldo['kode_pembayaran_detail'] = 0;
      // insert saldo
      $this->db->insert('saldo', $dataSaldo);
      //////////////////////////////////////////////////////

      // I N S E R T   B O N U S

      // inisiasi variabel
      $bonus = $dataBonus['jumlah_bonus'];
      $ribuan = 0;
      $puluhanribu = 0;
      $totalItem = ($dataPembelianDetail['sancu']+$dataPembelianDetail['boncu']);
      $selisihribuan = 0;
      $selisihpuluhanribu = 0;
      $totalbonus = 0;

      // ambil data bonus
      // per agen
      $this->db->select('*');
      $this->db->from('bonus');
      $this->db->where('kode_agen', $dataPembelian['kode_agen']);
      $dataBonusDb = $this->db->get()->row_array();

      // jika data ada
      // U P D A T E  T A B L E  B O N U S (bukan detail)
      if(!empty($dataBonusDb)){
        $totalItem += $dataBonusDb['total_item'];
        $kode_bonus = $dataBonusDb['kode_bonus'];
        $ribuan = $dataBonusDb['ribuan'];
        $puluhanribu = $dataBonusDb['puluhan_ribu'];
        $totalbonus = $dataBonusDb['jumlah_bonus'];

        $this->db->set(array(
          'jumlah_bonus' => ($totalbonus+$bonus),
          'ribuan' => $ribuan,
          'puluhan_ribu' => $puluhanribu,
          'total_item' => $totalItem
        ));

        // Exe U P D A T E  T A B L E  B O N U S
        $this->db->where('kode_agen', $dataPembelian['kode_agen']);
        $this->db->update('bonus');

        // Exe INSERT BONUS_DETAIL
        $this->db->insert('bonus_detail', array(
          'kode_bonus' => $kode_bonus,
          'jumlah_item' => ($dataPembelianDetail['sancu']+$dataPembelianDetail['boncu']),
          'history_item' => $totalItem,
          'tanggal_pembelian' => $dataPembelian['tanggal_pembelian'],
          'bonus' => $bonus,
          'kode_pembelian' => $id_pembelian_baru_diinput,
          'nik' => $_SESSION['username']
        ));

        // jika ada bonus
        // langsung masukin ke PEMBAYARAN
        if($bonus > 0){
          // U P D A T E   P E M B A Y A R A N
          // ambil saldo terakhir dari table pembayaran
          $tagihanSekarangArray = $this->db->get_where('pembayaran', array('kode_pembayaran' => $id_pembayaran_baru_diinput))->row_array();
          //$tagihanSekarang = $tagihanSekarangArray['jumlah_pembelian'];
          $sisaTagihanSekarang = $tagihanSekarangArray['sisa_tagihan'];
          $sisaTagihanKurangBonus = $sisaTagihanSekarang - $bonus;

          // update pembayaran
          $this->db->set('sisa_tagihan', $sisaTagihanKurangBonus);
          $this->db->where('kode_pembayaran', $id_pembayaran_baru_diinput);
          $this->db->update('pembayaran');
          //////////////////////////////////////////////////

          // I N S E R T   P E M B A Y A R A N   D E T A I L
          $dataBonusPembayaranDetail = array(
            'kode_pembayaran' => $id_pembayaran_baru_diinput,
            'tanggal_pembayaran' => $dataPembelian['tanggal_pembelian'],
            'tagihan_sebelumnya' => $sisaTagihanSekarang,
            'nominal_pembayaran' => $bonus,
            'sisa_tagihan' => $sisaTagihanKurangBonus,
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian'],
            'nik' => $_SESSION['username'],
            'status_no_edit' => 1
          );

          $this->db->insert('pembayaran_detail', $dataBonusPembayaranDetail);
          //////////////////////////////////////////////////

          // I N S E R T   S A L D O
          // ambil data paling akhir saldo
          $this->db->where('kode_agen', $dataSaldo['kode_agen']);
          $this->db->order_by('kode_saldo', 'DESC');
          $this->db->limit(2);
          $saldoAkhir = $this->db->get('saldo')->result_array();
          $saldoAkhir = $saldoAkhir[0]['nominal'];
          // kurangin saldo akhir dengan bonus
          $saldoBaru = $saldoAkhir-$bonus;
          // buat array input saldo
          $dataSaldoBonus = array(
            'kode_agen' => $dataPembelian['kode_agen'],
            'tgl_perubahan' => $dataPembelian['tanggal_pembelian'],
            'debet' => 0,
            'kredit' => $bonus,
            'nominal' => $saldoBaru,
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian'],
            'kode_pembelian' => $id_pembelian_baru_diinput,
          );
          // insert saldo
          $this->db->insert('saldo', $dataSaldoBonus);
          //////////////////////////////////////////////////
        } // => end of jika ada nominal bonus

        return true;
      } // => end of jika ada data bonus

      // jika data kosong
      else{

        //insert ke db
        // exe I N S E R T  B O N U S
        $this->db->insert('bonus', array(
          'kode_agen' => $dataPembelian['kode_agen'],
          'jumlah_bonus' => $totalbonus+$bonus,
          'ribuan' => $ribuan,
          'puluhan_ribu' => $puluhanribu,
          'total_item' => $totalItem
        ));
        // ambil id pembelian yg baru saja diinput
        $kode_bonus_baru_diinput = $this->db->insert_id();

        // exe I N S E R T  BONUS_DETAIL
        $this->db->insert('bonus_detail', array(
          'kode_bonus' => $kode_bonus_baru_diinput,
          'jumlah_item' => ($dataPembelianDetail['sancu']+$dataPembelianDetail['boncu']),
          'history_item' => ($dataPembelianDetail['sancu']+$dataPembelianDetail['boncu']),
          'tanggal_pembelian' => $dataPembelian['tanggal_pembelian'],
          'bonus' => $bonus,
          'nik' => $_SESSION['username'],
          'kode_pembelian' => $id_pembelian_baru_diinput
        ));

        // jika ada bonus
        // langsung masukin ke pembayaran
        if($bonus > 0){

          // U P D A T E   P E M B A Y A R A N
          // ambil saldo terakhir dari table pembayaran
          $tagihanSekarangArray = $this->db->get_where('pembayaran', array('kode_pembayaran' => $id_pembayaran_baru_diinput))->row_array();
          //$tagihanSekarang = $tagihanSekarangArray['jumlah_pembelian'];
          $sisaTagihanSekarang = $tagihanSekarangArray['sisa_tagihan'];
          $sisaTagihanKurangBonus = $sisaTagihanSekarang - $bonus;

          // update pembayaran
          $this->db->set('sisa_tagihan', $sisaTagihanKurangBonus);
          $this->db->where('kode_pembayaran', $id_pembayaran_baru_diinput);
          $this->db->update('pembayaran');
          //////////////////////////////////////////////////

          // I N S E R T   P E M B A Y A R A N   D E T A I L
          $dataBonusPembayaranDetail = array(
            'kode_pembayaran' => $id_pembayaran_baru_diinput,
            'tanggal_pembayaran' => $dataPembelian['tanggal_pembelian'],
            'tagihan_sebelumnya' => $sisaTagihanSekarang,
            'nominal_pembayaran' => $bonus,
            'sisa_tagihan' => $sisaTagihanKurangBonus,
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian'],
            'nik' => $_SESSION['username'],
            'status_no_edit' => 1
          );

          $this->db->insert('pembayaran_detail', $dataBonusPembayaranDetail);
          //////////////////////////////////////////////////

          // I N S E R T   S A L D O
          // ambil data paling akhir saldo
          $this->db->where('kode_agen', $dataSaldo['kode_agen']);
          $this->db->order_by('kode_saldo', 'DESC');
          $this->db->limit(2);
          $saldoAkhir = $this->db->get('saldo')->result_array();
          $saldoAkhir = $saldoAkhir[0]['nominal'];
          // kurangin saldo akhir dengan bonus
          $saldoBaru = $saldoAkhir-$bonus;
          // buat array input saldo
          $dataSaldoBonus = array(
            'kode_agen' => $dataPembelian['kode_agen'],
            'tgl_perubahan' => $dataPembelian['tanggal_pembelian'],
            'debet' => 0,
            'kredit' => $bonus,
            'nominal' => $saldoBaru,
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian'],
            'kode_pembelian' => 0,
            'kode_pembayaran_detail' => $id_pembelian_baru_diinput
          );
          // insert saldo
          $this->db->insert('saldo', $dataSaldoBonus);
          //////////////////////////////////////////////////

        } // => end of jika ada nominal bonus
        
        return true;
      } // => end of jika tidak ada data bonus

    } // => end of function tambah pembelian

    public function getPembelianDetail($kodePembelian){
      // ambil data pembelianDetail
      $this->db->select('*');
      $this->db->from('pembelian_detail');
      $this->db->where('kode_pembelian', $kodePembelian);
      $hasil = $this->db->get()->result_array();

      return $hasil;
    }

    public function updatePembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $kodePembelian){

      // ambil pembelian detail saat ini
      $hasil = $this->getPembelianDetail($kodePembelian); 

      //update detail pembelian
      //=============================================
      // fungsi update pembelian_detail
      $that = $this;
      function updateDB($that, $dataPembelianDetail, $kodePembelian, $item){

        $dataPembelianBaru = array(
          'kode_item' => $item,
          'jumlah_item' => $dataPembelianDetail[$item],
          'total_harga_item' => $dataPembelianDetail['total_harga_'.$item]
        );
        
        $that->db->set($dataPembelianBaru);
        $that->db->where('kode_item', $item);
        $that->db->where('kode_pembelian', $kodePembelian);
        $that->db->update('pembelian_detail');

      };

      //cek index
      for($i = 0; $i<count($hasil); $i++){

        // jika item sdh ada recordnya
        // maka update pembelian_detail
        if($hasil[$i]['kode_item'] == 'sancu'){
          //Sancu
          updateDB($that, $dataPembelianDetail, $kodePembelian, 'sancu');
        }
        elseif($hasil[$i]['kode_item'] == 'boncu'){
          //Boncu
          updateDB($that, $dataPembelianDetail, $kodePembelian, 'boncu');
        }
        elseif($hasil[$i]['kode_item'] == 'pretty'){
          //pretty
          updateDB($that, $dataPembelianDetail, $kodePembelian, 'pretty');
        }
        elseif($hasil[$i]['kode_item'] == 'xtreme'){
          //xtreme
          updateDB($that, $dataPembelianDetail, $kodePembelian, 'xtreme');
        }

      } // end of check index

      //--------------------------------------------------------
      // fungsi cek pembelian item baru
      function cekRecordBaru($that, $dataPembelianDetail, $hasil, $kodeItem, $kodePembelian){

        $recordAda = 0;
        $a = array();

        // cek apakah field diiput
        if($dataPembelianDetail[$kodeItem] > 0){

          for($i = 0; $i<count($hasil); $i++){
            // push kodeItem dari $hasil
            array_push($a, $hasil[$i]['kode_item']);
          } // end of for loop

          // jika ada kodeItem yang sama
          // ubah $recordAda jadi true
          if(in_array($kodeItem, $a)){
            $recordAda = 1;
          } // end of cek hasil

          // return $recordAda;

          // jika tdk ada kodeItem
          if($recordAda == 0){
            // insert record baru
            $that->db->insert('pembelian_detail', 
              array(
                'kode_pembelian' => $kodePembelian,
                'kode_item' => $kodeItem,
                'jumlah_item' => $dataPembelianDetail[$kodeItem],
                'total_harga_item' => $dataPembelianDetail['total_harga_'.$kodeItem]
              )
            ); // end of insert
          }
        } // end of cek pembelian sancu
      }

      // cek pembelian item baru
      cekRecordBaru($that, $dataPembelianDetail, $hasil, 'sancu', $kodePembelian);
      cekRecordBaru($that, $dataPembelianDetail, $hasil, 'boncu', $kodePembelian);
      cekRecordBaru($that, $dataPembelianDetail, $hasil, 'pretty', $kodePembelian);
      cekRecordBaru($that, $dataPembelianDetail, $hasil, 'xtreme', $kodePembelian);
      //--------------------------------------------------------

      //Update Pembayaran
      $this->db->set($dataPembayaran);
      $this->db->where('kode_pembelian', $kodePembelian);
      $this->db->update('pembayaran');
      
      //update pembelian
      $this->db->set($dataPembelian);
      $this->db->where('kode_pembelian', $kodePembelian);
      $this->db->update('pembelian');

      // update saldo
      $this->db->set(
        array(
          'debet' => $dataPembelian['total_pembelian'],
          'tgl_perubahan' => $dataPembelian['tanggal_pembelian']
        )
      );
      $this->db->limit(1);
      $this->db->where('kode_pembelian', $kodePembelian);
      $this->db->update('saldo');

      return true;
    }

    public function deletePembelian($kodepembelian){

      // exe I N S E R T   HISTORY_PEMBELIAN
      // ambil semua data terkait pemebayaran
      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->where('kode_pembelian', $kodepembelian);
      $datapembelian = $this->db->get()->row_array();
      $keterangan = 'hapus data pembelian '.$datapembelian["kode_pembelian"].' | '.$datapembelian["kode_agen"].' |  nominal pembayaran '.$datapembelian["total_pembelian"];

      $this->db->insert('history_delete', array(
        'kode_admin' => $_SESSION['username'],
        'keterangan' => $keterangan
      ));

      // exe H A P U S   S A L D O
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->delete('saldo');

      // Ambil data BONUS_DETAIL
      $dataBonusDetail = $this->db->get_where('bonus_detail', array('kode_pembelian' => $kodepembelian))->row_array();

      // ambil value bonus
      $bonus = $dataBonusDetail['bonus'];
      $jumlahItem = $dataBonusDetail['jumlah_item'];
      $bonuslama = 0;
      $jumlahItemLama = 0;

      // jika tertera bonus
      if($bonus > 0){
      
        // ambil data BONUS JOIN BONUS_DETAIL
        // berdasarkan KODE_PEMBELIAN
        $this->db->select('*');
        $this->db->from('bonus_detail');
        $this->db->join('bonus', 'bonus_detail.kode_bonus = bonus.kode_bonus');
        $this->db->where('bonus_detail.kode_pembelian', $kodepembelian);
        $dataBonus = $this->db->get()->row_array();

        //return $dataBonus;

        // ambil KODE_BONUS
        $kodebonus = $dataBonus['kode_bonus'];
        $bonuslama = $dataBonus['jumlah_bonus'];
        $jumlahItemLama = $dataBonus['total_item'];

        // jika bonus tidak nol
        if($bonuslama > 0){

          // exe U P D A T E   B O N U S
          $this->db->set(array(
            'jumlah_bonus' => $bonuslama - $bonus,
            'total_item' => $jumlahItemLama - $jumlahItem
          ));
          $this->db->where('kode_bonus', $kodebonus);
          $this->db->update('bonus');

        } // => end of jika bonus tidak nol

      } // => end of jika tertera bonus

      // exe H A P U S  BONUS_DETAIL
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->delete('bonus_detail');

      // exe H A P U S  P E M B E L I A N
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->delete('pembelian');

      return true;

    } // => end of function hapus pembelian

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B A Y A R A N //////////////

    public function getPembayaran($dataAmbil){
      // ambil data pembayaran
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembelian', 'pembelian.kode_pembelian = pembayaran.kode_pembelian');
      // tambahan ver 1.3
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran');
      $this->db->join('agen', 'agen.kode_agen = pembelian.kode_agen');
      $this->db->where('agen.kode_agen', $dataAmbil['kode_agen']);
      $this->db->where('pembelian.tanggal_pembelian >=', $dataAmbil['tanggaldari']);
      $this->db->where('pembelian.tanggal_pembelian <=', $dataAmbil['tanggalsampai']);
      $result = $this->db->get()->result_array();
      return $result;
    }

    public function getPembayaranKode($kodePembayaran = null){
      // ambil data pembayaran
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembelian', 'pembelian.kode_pembelian = pembayaran.kode_pembelian');
      $this->db->join('agen', 'agen.kode_agen = pembelian.kode_agen');
      if($kodePembayaran){
        // jika ada kode pembayaran
        // ambil data berdasarkan kode
        $this->db->where('kode_pembayaran', $kodePembayaran);
        $result = $this->db->get();
        return $result->row_array();
      }
      // jika tidak ada kode pembayaran
      $result = $this->db->get()->result_array();
      return $result;
    }

    public function getPembayaranDetail($kodePembayaran){
      // ambil data pembayaran detail sesuai kode pembayaran
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran');
      $this->db->where('pembayaran_detail.kode_pembayaran', $kodePembayaran);
      $result = $this->db->get()->result_array();

      return $result;
    }

    public function getPembayaranDetail2($kodePembayaranDetail){

      $this->db->select('*');
      $this->db->from('pembayaran_detail');
      $this->db->where('kode_pembayaran_detail', $kodePembayaranDetail);
      $result = $this->db->get()->row_array();

      return $result;

    } // end of function getPembayaranDetail2

    public function insertPembayaranDetail($dataPembayaran, $dataSaldo){

      // U P D A T E   P E M B E L I A N
      // update data pembelian sebelumnya

      // ambil semua data pembelian berdasarkan kode_pembayaran
      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->join('pembayaran', 'pembayaran.kode_pembelian = pembelian.kode_pembelian');
      $this->db->where('pembayaran.kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->order_by('pembayaran.kode_pembayaran', 'DESC');
      $this->db->limit(2);
      $pembelianterakhir = $this->db->get()->result_array();
      $pembelianterakhir = $pembelianterakhir[0];

      //return $pembelianterakhir;
      
      // cek pembelian sebelumnya
      if(!empty($pembelianterakhir)){
        $kodePembelianTerakhir = $pembelianterakhir['kode_pembelian'];

        // ex UPDATE STATUS EDIT PEMBELIAN TERAKHIR
        $this->db->set('status_no_edit', 1);
        $this->db->where('kode_pembelian', $kodePembelianTerakhir);
        $this->db->update('pembelian');

      } // => end of cek pembelian sebelumnya


      // U P D A T E   STATUS EDIT DETAIL PEMBAYARAN
      // update status edit detail pembayaran sebelumnya
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran');
      $this->db->where('pembayaran.kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->order_by('pembayaran_detail.kode_pembayaran_detail', 'DESC');
      $this->db->limit(2);
      $pembayarandetalterakhir = $this->db->get()->result_array();
      $pembayarandetalterakhir = $pembayarandetalterakhir[0];

      // return $pembayarandetalterakhir;

      $kodepembayarandetailterakhir = $pembayarandetalterakhir['kode_pembayaran_detail'];

      // cek pembayaran sebelumnya
      if(!empty($pembayarandetalterakhir)){

        // ex UPDATE STATUS EDIT pembayaran TERAKHIR
        $this->db->set('status_no_edit', 1);
        $this->db->where('kode_pembayaran_detail', $kodepembayarandetailterakhir);
        $this->db->update('pembayaran_detail');

      } // => end of cek pembayaran sebelumnya
      
      // I N S E R T   P E M B A Y A R A N   D E T A I L
      $this->db->insert('pembayaran_detail', $dataPembayaran);
      // ambil id pembayaran detail yg bru diinput
      $kode_pembayaran_detail_diinput = $this->db->insert_id();
      // update table pembayaran (sisa_tagihan)
      $tagihanBaru = array('sisa_tagihan' => $dataPembayaran['sisa_tagihan']);
      $this->db->set($tagihanBaru);
      $this->db->where('kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->update('pembayaran');
      ////////////////////////////////////////////////

      // I N S E R T   S A L D O
      // ambil data paling akhir saldo
      $this->db->where('kode_agen', $dataSaldo['kode_agen']);
      $this->db->order_by('kode_saldo', 'DESC');
      $this->db->limit(2);
      $saldoAkhir = $this->db->get('saldo')->result_array();
      $saldoAkhir = $saldoAkhir[0]['nominal'];
      $dataSaldo['nominal'] = $saldoAkhir - $dataSaldo['kredit'];

      // id pembayaran detail
      $datasaldo['kode_pembayaran_detail'] = $kode_pembayaran_detail_diinput;
      $datasaldo['kode_pembelian'] = 0;

      // insert saldo
      $dataSaldo['kode_pembayaran_detail'] = $kode_pembayaran_detail_diinput;
      $this->db->insert('saldo', $dataSaldo);

      return true;
    }

    public function pembayaranDetailUbah($dataPembayaranDetailUbah){

      // update pembayaran_detail
      $this->db->set(array(
        'nominal_pembayaran' => $dataPembayaranDetailUbah['nominal_pembayaran']
      ));
      $this->db->where('kode_pembayaran_detail', $dataPembayaranDetailUbah['kode_pembayaran_detail']);
      $this->db->update('pembayaran_detail');

      // update saldo
      $this->db->set(array(
        'kredit' => $dataPembayaranDetailUbah['nominal_pembayaran']
      ));
      $this->db->where('kode_pembayaran_detail', $dataPembayaranDetailUbah['kode_pembayaran_detail']);
      $this->db->update('saldo');

      return true;

    } // end of pembayaranDetailUbah

    public function deletePembayaranDetail($kodepembayarandetail){

      // exe I N S E R T   HISTORY_DELETE
      // ambil semua data terkait pemebayaran
      $this->db->select('*');
      $this->db->from('pembayaran_detail');
      $this->db->join('pembayaran', 'pembayaran.kode_pembayaran = pembayaran_detail.kode_pembayaran');
      $this->db->join('pembelian', 'pembelian.kode_pembelian = pembayaran.kode_pembelian');
      $this->db->where('pembayaran_detail.kode_pembayaran_detail', $kodepembayarandetail);
      $datalengkappembayaran = $this->db->get()->row_array();
      $keterangan = 'hapus data pembayaran '.$datalengkappembayaran["kode_pembayaran"].' | '.$datalengkappembayaran["kode_agen"].' |  nominal pembayaran '.$datalengkappembayaran["nominal_pembayaran"];

      $this->db->insert('history_delete', array(
        'kode_admin' => $_SESSION['username'],
        'keterangan' => $keterangan
      ));

      // Ambil data PEMBAYARAN INDUK
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran');
      $this->db->where('pembayaran_detail.kode_pembayaran_detail', $kodepembayarandetail);
      $dataPembayaran = $this->db->get()->row_array();

      // ambil kode pembelian
      $kodepembelian = $dataPembayaran['kode_pembelian'];

      // ambil value bonus
      $sisatagihanlama = $dataPembayaran['sisa_tagihan'];

      // Ambil nominal pembayaran_detail yang ingin dihapus
      $nominalpembayaran = $dataPembayaran['nominal_pembayaran'];

      // exe U P D A T E   P E M B A Y A R A N
      $this->db->set('sisa_tagihan', $sisatagihanlama+$nominalpembayaran);
      $this->db->where('kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->update('pembayaran');

      // exe H A P U S  PEMBAYARAN_DETAIL
      $this->db->where('kode_pembayaran_detail', $kodepembayarandetail);
      $this->db->delete('pembayaran_detail');
      
      // exe H A P U S   S A L D O
      $this->db->where('kode_pembayaran_detail', $kodepembayarandetail);
      $this->db->delete('saldo');

      return true;

    } // => end of function hapus pembayaran_detail

    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////
    ///////////////////// B O N U S //////////////////////

    public function getBonus(){
      $this->db->select('*');
      $this->db->from('bonus');
      $this->db->join('agen', 'bonus.kode_agen = agen.kode_agen');
      $data = $this->db->get()->result_array();

      return $data;
    }

    public function getBonusDetail($kode_bonus){
      $this->db->select('*');
      $this->db->from('bonus_detail');
      $this->db->where('kode_bonus', $kode_bonus);
      $data = $this->db->get()->result_array();

      return $data;
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////////// S A L D O ///////////////////
    public function getSaldo($dataAmbil, $kemarin){
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('tgl_perubahan >=', $dataAmbil['dari']);
      $this->db->where('tgl_perubahan <=', $dataAmbil['sampai']);
      $this->db->where('kode_agen', $dataAmbil['kodeagen']);
      //$this->db->order_by('tgl_perubahan', 'ASC');
      $result = $this->db->get()->result_array();

      //return $result;

      // ambil data saldo 1 hari sebelumnya
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('tgl_perubahan', $kemarin);
      $this->db->where('kode_agen', $dataAmbil['kodeagen']);
      $kemarinArr = $this->db->get()->result_array();
      $satuharilalu = array();
      if(!empty($kemarinArr)){
        // ambil index terakhir array
        $satuharilalu = end($kemarinArr);
        //tambah array ke index pertama
        array_unshift($result, $satuharilalu);
      }
      else{
        $kosong = array(
          'kode_saldo' => 0,
          'kode_agen' => 0,
          'tgl_perubahan' => '',
          'debet' => 0,
          'kredit' => 0,
          'nominal' => 0,
        );

        array_unshift($result, $kosong);
      }

      return $result;
    } // end of function getSaldo

    public function saldoAwal($dataSaldoAwal, $dataPembelian, $dataPembelianDetail, $dataPembayaran){

      $status = 0;

      // cek apakah agen sudah memiliki saldo
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('kode_agen', $dataSaldoAwal['kode_agen']);
      $hasil = $this->db->get()->row_array();

      // jika ada
      if(!empty($hasil)){
        $status = 0;
        return $status;
      }
      // jika tidak ada
      else{

        // insert data ke saldo
        $this->db->insert('saldo', $dataSaldoAwal);
        // insert ke table pembelian
        $this->db->insert('pembelian', $dataPembelian);
        // ambil id pembelian yg baru saja diinput
        $kodePembelianBaruDiinput = $this->db->insert_id();
        // insert data pembayaran dengan foreign key id pembelian
        $dataPembayaran['kode_pembelian'] = $kodePembelianBaruDiinput;
        $this->db->insert('pembayaran', $dataPembayaran);
        // ambil id Pembayaran baru diinput
        $kodePembayaranBaruDiinput = $this->db->insert_id();

        // I N S E R T   P E M B E L I A N   D E T A I L
        // fungsi insert berdasarkan nama item
        // inisiai $this
        $that = $this;
        $dataPembelianDetail['kode_pembelian'] = $kodePembelianBaruDiinput;
        function insert_item_detail_pembelian($item, $dataPembelianDetail, $that){
          $dataBaru = array(
            'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
            'kode_item' =>  $item,
            'jumlah_item' => $dataPembelianDetail[$item],
            'total_harga_item' => $dataPembelianDetail['total_harga_'.$item],
          );
          $that->db->insert('pembelian_detail', $dataBaru);
        }
        // pembelian sancu
        if($dataPembelianDetail['sancu'] != 0){
          insert_item_detail_pembelian('sancu', $dataPembelianDetail, $that);
        }
        // pembelian boncu
        if($dataPembelianDetail['boncu'] != 0){
          insert_item_detail_pembelian('boncu', $dataPembelianDetail, $that);
        }
        // pembelian pretty
        if($dataPembelianDetail['pretty'] != 0){
          insert_item_detail_pembelian('pretty', $dataPembelianDetail, $that);
        }
        // pembelian xtreme
        if($dataPembelianDetail['xtreme'] != 0){
          insert_item_detail_pembelian('xtreme', $dataPembelianDetail, $that);
        }
        ///////////////////////////////////////////////////////

        $status = 1;
        return $status;

      } // => end of cek data saldo agen

    } // => end of function saldoAwal

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ////////////// L A P O R A N //////////////////

    public function getLaporanPembelian($datalaporan){

      if(!empty($datalaporan['kodeagen'])){

        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('pembelian_detail', 'pembelian_detail.kode_pembelian = pembelian.kode_pembelian');
        $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen');
        $this->db->where('tanggal_pembelian >=', $datalaporan['dari']);
        $this->db->where('tanggal_pembelian <=', $datalaporan['sampai']);
        $this->db->where('pembelian.kode_agen', $datalaporan['kodeagen']);
        $this->db->order_by('pembelian.kode_agen');
        $result = $this->db->get()->result_array();

        return $result;

      }else{
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('pembelian_detail', 'pembelian_detail.kode_pembelian = pembelian.kode_pembelian');
        $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen');
        $this->db->where('tanggal_pembelian >=', $datalaporan['dari']);
        $this->db->where('tanggal_pembelian <=', $datalaporan['sampai']);
        $this->db->order_by('pembelian.kode_agen');
        $result = $this->db->get()->result_array();

        return $result;
      }

      

    }

  }
