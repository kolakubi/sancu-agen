<?php

  class Login_Model extends CI_Model{

    public function __construct(){
      // koneksi ke database
      $this->load->database();
    }

    public function login($username, $password, $ip){
      // ambil data berdasarkan username yg diinput
      $result = $this->db->get_where('login', array('username' => $username));
      $resultArray = $result->row_array();
      $num_rows = $result->num_rows();

      // jika result nya ada
      if($num_rows > 0){
        // ambil hash password
        $hash = $resultArray['password'];

        ///////////////////////////////////////////////////
        // jika password dan hash cocok
        if(password_verify($password, $hash)){
          // save history login
          $this->db->insert('log', array(
            'username' => $username,
            'ip' => $ip,
            'status' => 'sukses'
          ));

          // return array yg cocok
          return $result->row_array();
        }
        // jika tidak cocok
        else{
          // save history login
          $this->db->insert('log', array(
            'username' => $username,
            'ip' => $ip,
            'status' => 'gagal'
          ));

          // jika tdk ada return false
          return false;
        }
        //////////////////////////////////////////////////
      }
      // save history login
      $this->db->insert('log', array(
        'username' => $username,
        'ip' => $ip,
        'status' => 'gagal'
      ));

      // jika tdk ada return false
      return false;
    }

  }
