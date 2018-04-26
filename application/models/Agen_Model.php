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

    public function getSaldo($dataAmbil){
      $this->db->select('*');
      $this->db->from('saldo');
      $this->db->where('tgl_perubahan >=', $dataAmbil['tanggaldari']);
      $this->db->where('tgl_perubahan <=', $dataAmbil['tanggalsampai']);
      $this->db->where('kode_agen', $dataAmbil['kodeagen']);
      $result = $this->db->get()->result_array();

      return $result;
    }
  }
