<?php

  class Admin_model extends CI_Model{

    public function __construct(){
      // load database
      $this->load->database();
    }

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

    public function insertPembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran){
      // insert data pembelian
      // insert ke table pembelian
      $this->db->insert('pembelian', $dataPembelian);

      // ambil id pembelian yg baru saja diinput
      $insert_id = $this->db->insert_id();
      // insert data pembayaran dengan foreign key id pembelian
      $dataPembayaran['kode_pembelian'] = $insert_id;
      $dataPembelianDetail['kode_pembelian'] = $insert_id;

      // insert ke table pembelian_detail
      // pembelian sancu
      if($dataPembelianDetail['sancu'] != 0){
        $dataBaru = array(
          'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
          'kode_item' =>  'sancu',
          'jumlah_item' => $dataPembelianDetail['sancu'],
          'total_harga_item' => $dataPembelianDetail['total_harga_sancu']
        );
        $this->db->insert('pembelian_detail', $dataBaru);
      }
      // pembelian boncu
      if($dataPembelianDetail['boncu'] != 0){
        $dataBaru = array(
          'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
          'kode_item' =>  'boncu',
          'jumlah_item' => $dataPembelianDetail['boncu'],
          'total_harga_item' => $dataPembelianDetail['total_harga_boncu']
        );
        $this->db->insert('pembelian_detail', $dataBaru);
      }
      // pembelian pretty
      if($dataPembelianDetail['pretty'] != 0){
        $dataBaru = array(
          'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
          'kode_item' =>  'pretty',
          'jumlah_item' => $dataPembelianDetail['pretty'],
          'total_harga_item' => $dataPembelianDetail['total_harga_pretty']
        );
        $this->db->insert('pembelian_detail', $dataBaru);
      }
      // pembelian pretty
      if($dataPembelianDetail['xtreme'] != 0){
        $dataBaru = array(
          'kode_pembelian' => $dataPembelianDetail['kode_pembelian'],
          'kode_item' =>  'xtreme',
          'jumlah_item' => $dataPembelianDetail['xtreme'],
          'total_harga_item' => $dataPembelianDetail['total_harga_xtreme']
        );
        $this->db->insert('pembelian_detail', $dataBaru);
      }

      $this->db->insert('pembayaran', $dataPembayaran);

      return true;
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
      if($kodePembayaran){
        // jika ada kode pembayaran
        // ambil data berdasarkan kode
        $result = $this->db->get_where('pembayaran', array('kode_pembayaran'=>$kodePembayaran));
        return $result->row_array();
      }
      // jika tidak ada kode pembayaran
      $result = $this->db->get('pembayaran')->result_array();
      return $result;
    }

    public function getPembayaranDetail($kodePembayaran){
      // ambil data pembayaran detail sesuai kode pembayaran
      $this->db->select('*');
      $this->db->from('pembayaran_detail');
      $this->db->join('pembayaran', 'pembayaran.kode_pembayaran = pembayaran_detail.kode_pembayaran');
      $this->db->where('pembayaran.kode_pembayaran', $kodePembayaran);
      $result = $this->db->get()->result_array();

      return $result;
    }

    public function insertPembayaranDetail($dataPembayaran){
      // insert ke table pembayaran_detail
      $this->db->insert('pembayaran_detail', $dataPembayaran);
      // update table pembayaran (sisa_tagihan)
      $tagihanBaru = array('sisa_tagihan' => $dataPembayaran['sisa_tagihan']);
      $this->db->set($tagihanBaru);
      $this->db->where('kode_pembayaran', $dataPembayaran['kode_pembayaran']);
      $this->db->update('pembayaran');

      return true;
    }

  }
