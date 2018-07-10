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
            'nik' => $_SESSION['username']
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
            'nik' => $_SESSION['username']
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

    public function updatePembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $kodepembelian){
      //update detail pembelian
      //=============================================
      //sancu
      $dataSancu = array(
        'kode_pembelian' => $kodepembelian,
        'kode_item' => 'sancu',
        'jumlah_item' => $dataPembelianDetail['sancu'],
        'total_harga_item' => $dataPembelianDetail['total_harga_sancu']
        );
      $this->db->set($dataSancu);
      $this->db->where('kode_item', 'sancu');
      $this->db->update('pembelian_detail');
      //Boncu
      $dataBoncu = array(
        'kode_pembelian' => $kodepembelian,
        'kode_item' =>  'boncu',
        'jumlah_item' => $dataPembelianDetail['boncu'],
        'total_harga_item' => $dataPembelianDetail['total_harga_boncu']
        );
      $this->db->set($dataBoncu);
      $this->db->where('kode_item', 'boncu');
      $this->db->update('pembelian_detail');
      //Pretty
      $dataPretty = array(
        'kode_pembelian' => $kodepembelian,
        'kode_item' =>  'pretty',
        'jumlah_item' => $dataPembelianDetail['pretty'],
        'total_harga_item' => $dataPembelianDetail['total_harga_pretty']
        );
      $this->db->set($dataPretty);
      $this->db->where('kode_item', 'pretty');
      $this->db->update('pembelian_detail');
      //Xtreme
      $dataXtreme = array(
        'kode_pembelian' => $kodepembelian,
        'kode_item' =>  'xtreme',
        'jumlah_item' => $dataPembelianDetail['xtreme'],
        'total_harga_item' => $dataPembelianDetail['total_harga_xtreme']
        );
      $this->db->set($dataXtreme);
      $this->db->where('kode_item', 'xtreme');
      $this->db->update('pembelian_detail');
      //==============================================
      //Update Pembayaran
      $this->db->set($dataPembayaran);
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->update('pembayaran');
      //update pembelian
      $this->db->set($dataPembelian);
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->update('pembelian');

      return true;
    }

    public function deletePembelian($kodepembelian){
      // exe H A P U S   S A L D O
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->delete('saldo');

      // Ambil data BONUS_DETAIL
      $dataBonusDetail = $this->db->get_where('bonus_detail', array('kode_pembelian' => $kodepembelian))->row_array();

      // ambil value bonus
      $bonus = $dataBonusDetail['bonus'];
      $bonuslama = 0;

      // jika tertera bonus
      if($bonus > 0){
      
        // ambil data BONUS JOIN BONUS_DETAIL
        // berdasarkan KODE_PEMBELIAN
        $this->db->select('*');
        $this->db->from('bonus_detail');
        $this->db->join('bonus', 'bonus_detail.kode_bonus = bonus.kode_bonus');
        $this->db->where('bonus_detail.kode_pembelian', $kodepembelian);
        $dataBonus = $this->db->get()->row_array();

        // ambil KODE_BONUS
        $kodebonus = $dataBonus['kode_bonus'];
        $bonuslama = $dataBonus['jumlah_bonus'];

        // jika bonus tidak nol
        if($bonuslama > 0){

          // exe U P D A T E   B O N U S
          $this->db->set(array(
            'jumlah_bonus' => $bonuslama - $bonus
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

      // exe I N S E R T   HISTORY_DELETE
      $this->db->insert('history_delete', array(
        'kode_admin' => $_SESSION['username'],
        'keterangan' => 'hapus data pembelian '.$kodepembelian
      ));


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
      $this->db->from('pembayaran_detail');
      $this->db->join('pembayaran', 'pembayaran.kode_pembayaran = pembayaran_detail.kode_pembayaran');
      $this->db->join('pembelian', 'pembelian.kode_pembelian = pembayaran.kode_pembelian');
      $this->db->where('pembayaran.kode_pembayaran', $kodePembayaran);
      $result = $this->db->get()->result_array();

      return $result;
    }

    public function insertPembayaranDetail($dataPembayaran, $dataSaldo){

      // I N S E R T   P E M B E L I A N   D E T A I L
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

      // U P D A T E   P E M B E L I A N
      // update status edit pembelian sebelumnya
      
      $kodepembayaran = $this->db->get_where('pembayaran', array('kode_pembayaran' => $dataPembayaran['kode_pembayaran']))->row_array();
      $kodepembelian = $kodepembayaran['kode_pembelian'];

      // ambil semua data pembelian berdasarkan kode_pembelian
      $pembelianTerakhir = $this->db->get_where('pembelian', array('kode_pembelian' => $kodepembelian))->row_array();
      $kodePembelianTerakhir = $pembelianTerakhir['kode_pembelian'];
      

      // cek pembelian sebelumnya
      if(!empty($pembelianTerakhir)){

        // ex UPDATE STATUS EDIT PEMBELIAN TERAKHIR
        $this->db->set('status_no_edit', 1);
        $this->db->where('kode_pembelian', $kodePembelianTerakhir);
        $this->db->update('pembelian');

      } // => end of cek pembelian sebelumnya

      ///////////////////////////////////////////////

      return true;
    }

    public function deletePembayaranDetail($kodepembayarandetail){

      // Ambil data PEMBAYARAN INDUK
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran');
      $this->db->where('pembayaran_detail.kode_pembayaran', $kodepembayarandetail);
      $dataPembayaran = $this->db->get()->row_array();

      // ambil value bonus
      $sisatagihanlama = $dataPembayaran['sisa_tagihan'];

      // Ambil nominal pembayaran_detail yang ingin dihapus
      $nominalpembayaran = $this->db->get_where('pembayaran_detail', array('kode_pembayaran_detail', $kodepembayarandetail))->row_array();
      $nominalpembayaran = $nominalpembayaran['nominal_pembayaran'];

      // exe U P D A T E   P E M B A Y A R A N
      $this->db->set('sisa_tagihan', $sisatagihanlama+$nominalpembayaran);
      $this->db->where('kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->update('pembayaran');

      // exe H A P U S  BONUS_DETAIL
      $this->db->where('kode_pembelian', $kodepembelian);
      $this->db->delete('bonus_detail');
      
      // exe H A P U S   S A L D O
      $this->db->where('kode_pembayaran_detail', $kodepembayarandetail);
      $this->db->delete('saldo');

      // exe I N S E R T   HISTORY_DELETE
      $this->db->insert('history_delete', array(
        'kode_admin' => $_SESSION['username'],
        'keterangan' => 'hapus data pembelian '.$kodepembayarandetail
      ));


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

      // ambil data saldo 1 hari sebelumnya
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('tgl_perubahan', $kemarin);
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
    }
    ///////////////////////////////////////////////

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
