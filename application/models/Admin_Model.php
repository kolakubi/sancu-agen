<?php

  class Admin_model extends CI_Model{

    public function __construct(){
      // load database
      $this->load->database();
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
        $result = $this->db->get_where('pembelian', array('kode_pembelian'=>$kodepembelian));
        return $result->row_array();
      }
      else{
        // jika tidak ada kode agen, ambil semua data agen
        $result = $this->db->get('pembelian')->result_array();
        return $result;
      }
    }

    public function getDataPembelianJoin($kodepembelian=null){
        // ambil data agen join data agen
      if($kodepembelian){
        // jika ada kode agen, ambil data menurut kode agen
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('agen', 'pembelian.kode_agen = agen.kode_agen');
        $this->db->where('kode_pembelian', $kodepembelian);
        $result = $this->db->get()->row_array();
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
      return$result;
    }

    public function insertPembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $dataSaldo){
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
          'total_harga_item' => $dataPembelianDetail['total_harga_'.$item]
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
      // pembelian pretty
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
      // insert saldo
      $this->db->insert('saldo', $dataSaldo);
      //////////////////////////////////////////////////////

      // I N S E R T   B O N U S
      // inisiasi variabel
      $bonus = 0;
      $ribuan = 1;
      $puluhanribu = 1;
      $totalItem = $dataPembelian['total_item'];
      $selisihribuan = 0;
      $selisihpuluhanribu = 0;
      $totalbonus = 0;

      // ambil data bonus
      $this->db->select('*');
      $this->db->from('bonus');
      $this->db->where('kode_agen', $dataPembelian['kode_agen']);
      $dataBonus = $this->db->get()->row_array();
      // jika data ada
      if(!empty($dataBonus)){
        $totalItem += $dataBonus['total_item'];
        $kode_bonus = $dataBonus['kode_bonus'];
        $ribuan = $dataBonus['ribuan'];
        $puluhanribu = $dataBonus['puluhan_ribu'];
        $totalbonus = $dataBonus['jumlah_bonus'];

        // jika pembelian lbh besar dr ribuan
        if(@($totalItem/$ribuan) >= 1){
          // stack kelipatan ribuan
          $selisihribuan = $totalItem - $ribuan;
          if(($selisihribuan/1000) >= 1){
            $selisihribuan = floor($selisihribuan/1000);
            $ribuan += (1000*$selisihribuan);
            $bonus += (300000*$selisihribuan);
          }
        }

        // jika pembelian lbh besar dr puluhan ribu
        if(@($totalItem/$puluhanribu) >= 1){
          // stack kelipatan puluhan ribu
          $selisihpuluhanribu = $totalItem - $puluhanribu;
          if(($selisihpuluhanribu/10000) >= 1){
            $selisihpuluhanribu = floor($selisihpuluhanribu/10000);
            $puluhanribu += (10000*$selisihpuluhanribu);
            $bonus += (500000*$selisihpuluhanribu);
          }
        }

        // pembelian langsung 1000
        if($dataPembelian['total_item'] >= 1000){
          $bonus += 50000;
        }

        // update table bonus
        $this->db->set(array(
          'jumlah_bonus' => ($totalbonus+$bonus),
          'ribuan' => $ribuan,
          'puluhan_ribu' => $puluhanribu,
          'total_item' => $totalItem
        ));
        $this->db->where('kode_agen', $dataPembelian['kode_agen']);
        $this->db->update('bonus');
        // ambil id pembelian yg baru saja diinput
        $this->db->insert('bonus_detail', array(
          'kode_bonus' => $kode_bonus,
          'jumlah_item' => $dataPembelian['total_item'],
          'history_item' => $totalItem,
          'tanggal_pembelian' => $dataPembelian['tanggal_pembelian'],
          'bonus' => $bonus
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
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian']
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
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian']
          );
          // insert saldo
          $this->db->insert('saldo', $dataSaldoBonus);
          //////////////////////////////////////////////////
        }

        // $hasilPerhitungan = array(
        //   'Total Item' => $totalItem,
        //   'Ribuan' => $ribuan,
        //   'Puluhan Ribu' => $puluhanribu,
        //   'Total Bonus' => $totalbonus,
        //   'Bonus' => $bonus,
        //   'Ket' => 'data Ada'
        // );
        return true;
      }

      // jika data kosong
      else{

        // jika pembelian lbh besar dr ribuan
        if(($totalItem/$ribuan) >= 1){
          // stack kelipatan ribuan
          $selisihribuan = $totalItem - $ribuan;
          if(($selisihribuan/1000) >= 1){
            $selisihribuan = floor($selisihribuan/1000);
            $ribuan += (1000*$selisihribuan);
            $bonus += (300000*$selisihribuan);
          }
        }


        // jika pembelian lbh besar dr puluhan ribu
        if(($totalItem/$puluhanribu) >= 1){
          // stack kelipatan puluhan ribu
          $selisihpuluhanribu = $totalItem - $puluhanribu;
          if(($selisihpuluhanribu/10000) >= 1){
            $selisihpuluhanribu = floor($selisihpuluhanribu/10000);
            $puluhanribu += (10000*$selisihpuluhanribu);
            $bonus += (500000*$selisihpuluhanribu);
          }
        }

        // pembelian langsung 1000
        if($dataPembelian['total_item'] >= 1000){
          $bonus += 50000;
        }

        //insert ke db
        $this->db->insert('bonus', array(
          'kode_agen' => $dataPembelian['kode_agen'],
          'jumlah_bonus' => $totalbonus+$bonus,
          'ribuan' => $ribuan,
          'puluhan_ribu' => $puluhanribu,
          'total_item' => $totalItem
        ));
        // ambil id pembelian yg baru saja diinput
        $kode_bonus_baru_diinput = $this->db->insert_id();
        $this->db->insert('bonus_detail', array(
          'kode_bonus' => $kode_bonus_baru_diinput,
          'jumlah_item' => $dataPembelian['total_item'],
          'history_item' => $dataPembelian['total_item'],
          'tanggal_pembelian' => $dataPembelian['tanggal_pembelian'],
          'bonus' => $bonus
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
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian']
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
            'keterangan' => 'bonus pembelian '.$dataPembelian['tanggal_pembelian']
          );
          // insert saldo
          $this->db->insert('saldo', $dataSaldoBonus);
          //////////////////////////////////////////////////
        }

        // $hasilPerhitungan = array(
        //   'Total Item' => $totalItem,
        //   'Ribuan' => $ribuan,
        //   'Selisih Ribuan' => $selisihribuan,
        //   'Puluhan Ribu' => $puluhanribu,
        //   'Selisih Puluhan Ribu' => $selisihpuluhanribu,
        //   'Total Bonus' => $bonus,
        //   'Bonus' => $bonus,
        //   'Ket' => 'data Kosong'
        // );
        return true;
      }

    }

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
      // hapus data agen dari kodeagen
      $this->db->where('kode_pembelian', $kodepembelian);
      if($this->db->delete('pembelian')){
        return true;
      }
      return false;
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B A Y A R A N //////////////

    public function getPembayaran($kodePembayaran = null){
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
      // insert saldo
      $this->db->insert('saldo', $dataSaldo);
      ///////////////////////////////////////////////

      return true;
    }


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

  }
