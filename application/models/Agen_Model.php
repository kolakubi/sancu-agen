<?php

  class Agen_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    public function getBiodata($username){
      $result = $this->db->get_where('agen', array('kode_agen'=>$username));
      $resultArray = $result->row_array();
      return $resultArray;
    }

  }
