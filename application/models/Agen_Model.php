<?php

  class Agen_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    // ambil data agen berdasarkan kodeagen (username dalam login)
    public function getBiodata($username){
      $result = $this->db->get_where('agen', array('kode_agen'=>$username));
      $resultArray = $result->row_array();
      return $resultArray;
    }

    /////////////////////////////////////////
    /////////////////////////////////////////
    ////////// P E M B E L I A N ////////////

    // ambil data pembelian berdasarkan range date
    public function getDataPembelianRange($dataAmbil){

      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->join('pembelian_detail', 'pembelian_detail.kode_pembelian = pembelian.kode_pembelian', 'inner');
      $this->db->where('pembelian.tanggal_pembelian >=', $dataAmbil['tanggaldari']);
      $this->db->where('pembelian.tanggal_pembelian <=', $dataAmbil['tanggalsampai']);
      $this->db->where('kode_agen', $dataAmbil['kodeagen']);
      $this->db->where_in('kode_item', $dataAmbil['item']);
      $result = $this->db->get()->result_array();
      return $result;

    }

    /////////////////////////////////////////
    /////////////////////////////////////////
    ////// G A N T I   P A S S W O R D //////

    public function cek_password($passwordlama, $passwordbaru, $kodeagen){
      $result = $this->db->get_where('login', array('username' => $kodeagen))->row_array();

      $hashpassword = $result['password'];
      if(password_verify($passwordlama, $hashpassword)){
        $hashpasswordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);

        $this->db->set(array('password' => $hashpasswordbaru));
        $this->db->where('username', $kodeagen);
        $this->db->update('login');

        return true;
      }
      return false;
    }

    /////////////////////////////////////////
    /////////////////////////////////////////
    ////////// P E M B A Y A R A N /////////

    // ambil data pembelian berdasarkan range date
    public function getDataPembayaranRange($dataAmbil){

      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->join('pembayaran', 'pembelian.kode_pembelian = pembayaran.kode_pembelian', 'inner');
      $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran.kode_pembayaran', 'inner');
      $this->db->where("`pembelian.tanggal_pembelian` >= '".$dataAmbil['tanggaldari']."' AND `pembelian.tanggal_pembelian` <= '".$dataAmbil['tanggalsampai']."' AND `kode_agen` = '".$dataAmbil['kodeagen']."'");
      $result = $this->db->get()->result_array();
      return $result;
    }

    /////////////////////////////////////////
    /////////////////////////////////////////
    ////////////// S A L D O  ///////////////

    public function getSaldo($dataAmbil, $kemarin){
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('tgl_perubahan >=', $dataAmbil['tanggaldari']);
      $this->db->where('tgl_perubahan <=', $dataAmbil['tanggalsampai']);
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

    /////////////////////////////////////////
    /////////////////////////////////////////
    ////////////// B O N U S  ///////////////

    public function getBonus($dataAmbil){
      $this->db->select('*');
      $this->db->from('bonus_detail');
      $this->db->join('bonus', 'bonus_detail.kode_bonus = bonus.kode_bonus');
      $this->db->join('agen', 'bonus.kode_agen = agen.kode_agen');
      $this->db->where('tanggal_pembelian >=', $dataAmbil['tanggaldari']);
      $this->db->where('tanggal_pembelian <=', $dataAmbil['tanggalsampai']);
      $this->db->where('bonus.kode_agen', $dataAmbil['kodeagen']);
      $result = $this->db->get()->result_array();
      return $result;
    }

  } //end of class
