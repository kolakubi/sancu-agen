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

    public function insertPembelian($dataPembelian){
      // insert data pembelian
      if($this->db->insert('pembelian', $dataPembelian)){
        return true;
      }
      return false;
    }

    public function updatePembelian($dataPembelian, $kodepembelian){
      //update database
      $this->db->set($dataPembelian);
      $this->db->where('kode_pembelian', $kodepembelian);

      if($this->db->update('pembelian')){
          return true;
      }
      return false;
    }

    public function deletePembelian($kodepembelian){
      // hapus data agen dari kodeagen
      $this->db->where('kode_pembelian', $kodepembelian);
      if($this->db->delete('pembelian')){
        return true;
      }
      return false;
    }

  }
