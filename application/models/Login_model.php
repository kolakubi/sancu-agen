<?php

  class Login_Model extends CI_Model{

    public function __construct(){
      // koneksi ke database
      $this->load->database();
    }

    public function login($username, $password){
      // ambil data berdasarkan usename dan password yg diinput
      $result = $this->db->get_where('login', array('username' => $username, 'password' => $password));
      $num_rows = $result->num_rows();
      // jika result nya ada
      if($num_rows > 0){
        // return array yg cocok
        return $result->row_array();
      }
      // jika tdk ada return false
      return false;
    }

  }
