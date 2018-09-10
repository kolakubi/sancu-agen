<?php

  class Agen extends CI_Controller{

    public function __construct(){
      parent::__construct();
      // cek session agen yaitu level 2
      if($_SESSION['level']){
        $sessionLevel = $_SESSION['level'];
        if($sessionLevel != 2){
          redirect('login');
        }
      }
      else{
        redirect('login');
      }
    }

    public function index(){
      // ambil biodata agen
      $username = $_SESSION['username'];
      $dataAgen = $this->agen_model->getBiodata($username);

      $this->load->view('agen/header');
      $this->load->view('agen/dashboard', $dataAgen);
      $this->load->view('agen/footer');
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////////// P R O F I L //////////////////

    public function profil(){
      // ambil biodata agen
      $username = $_SESSION['username'];
      $dataAgen = $this->agen_model->getBiodata($username);

      $this->load->view('agen/header');
      $this->load->view('agen/profil', $dataAgen);
      $this->load->view('agen/footer');
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    /////// G A N T I   P A S S W O R D ///////////

    public function gantipassword(){
      // ambil kodeagen dari session username
      $kodeagen = $_SESSION['username'];

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'passwordlama',
            'label' => 'Password Lama',
            'rules' => 'required'
          ),
          array(
            'field' => 'passwordbaru',
            'label' => 'Password Baru',
            'rules' => 'required'
          ),
          array(
            'field' => 'passwordbaru2',
            'label' => 'Password Baru',
            'rules' => 'required'
          ),
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      $status = array(
        'passwordsalah' => false,
        'passwordbarutdksama' => false,
        'suseskubahpassword' => false
      );

      function resetError(){
        $status = array(
          'passwordsalah' => false,
          'passwordbarutdksama' => false,
          'suseskubahpassword' => false
        );
      }

      if(!$this->form_validation->run()){
        $data['error'] = $status;

        $this->load->view('agen/header');
        $this->load->view('agen/gantipassword', $data);
        $this->load->view('agen/footer');
      }
      else{
        $passwordlama = $this->input->post('passwordlama');
        $passwordbaru = $this->input->post('passwordbaru');
        $passwordbaru2 = $this->input->post('passwordbaru2');

        // jika password baru match
        if($passwordbaru === $passwordbaru2){
          // validasi password user
          $result = $this->agen_model->cek_password($passwordlama, $passwordbaru, $kodeagen);
          //jika true
          if($result){
            // ubah password sukses
            resetError();
            $status['suseskubahpassword'] = true;
          }
          // jika false
          else{
            // setting peringatan password salah
            resetError();
            $status['passwordsalah'] = true;
          }
        }
        // jika password baru tdk match
        else{
          resetError();
          $status['passwordbarutdksama'] = true;
        }

        $data['error'] = $status;

        $this->load->view('agen/header');
        $this->load->view('agen/gantipassword', $data);
        $this->load->view('agen/footer');
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B E L I A N ////////////////

    public function pembelian(){

      //setting form rule
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'tanggaldari',
            'label' => 'Tanggal Dari',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggalsampai',
            'label' => 'Tanggal Sampai',
            'rules' => 'required'
          ),
          array(
            'field' => 'item[]',
            'label' => 'item',
            'rules' => 'required'
          ),
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){

        $this->load->view('agen/header');
        $this->load->view('agen/pembelian');
        $this->load->view('agen/footer');
      }
      else{
        // ambil session username
        $kodeAgen = $_SESSION['username'];
        $tanggalDari = $this->input->post('tanggaldari');
        $tanggalSampai = $this->input->post('tanggalsampai');
        $item = $this->input->post('item');
        $defaultItem = array('sancu', 'boncu', 'pretty', 'xtreme');
        $perincian = $item == $defaultItem ? true : false;
        //$item = implode(',', $item);

        $dataAmbil = array(
          'kodeagen' => $kodeAgen,
          'tanggaldari' => $tanggalDari,
          'tanggalsampai' => $tanggalSampai,
          'item' => $item
        );

        // ambil data pembelian
        $dataPembelian = $this->agen_model->getDataPembelianRange($dataAmbil);

        // cek apakah data kosong
        if(!empty($dataPembelian)){
          $data['datapembelian'] = $dataPembelian;
          $data['item'] = $item;
          $data['defaultitem'] = $defaultItem;
          $data['perincian'] = $perincian;

          $this->load->view('agen/header');
          $this->load->view('agen/pembelianhasil', $data);
          $this->load->view('agen/footer');
        }else{
          $this->load->view('agen/header');
          $this->load->view('agen/datakosong');
          $this->load->view('agen/footer');
        }
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ////////// P E M B A Y A R A N ////////////////

    public function pembayaran(){

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'tanggaldari',
            'label' => 'Tanggal Dari',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggalsampai',
            'label' => 'Tanggal Sampai',
            'rules' => 'required'
          )
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){

        $this->load->view('agen/header');
        $this->load->view('agen/pembayaran');
        $this->load->view('agen/footer');
      }
      else{
        // ambil session username
        $kodeAgen = $_SESSION['username'];
        $tanggalDari = $this->input->post('tanggaldari');
        $tanggalSampai = $this->input->post('tanggalsampai');

        $dataAmbil = array(
          'kodeagen' => $kodeAgen,
          'tanggaldari' => $tanggalDari,
          'tanggalsampai' => $tanggalSampai
        );

        // ambil data pembayaran
        $dataPembelian = $this->agen_model->getDataPembayaranRange($dataAmbil);
        // cek apakah data kosong
        if(!empty($dataPembelian)){
          $data['datapembayaran'] = $dataPembelian;

          $this->load->view('agen/header');
          $this->load->view('agen/pembayaranhasil', $data);
          $this->load->view('agen/footer');
        }
        else{
          $this->load->view('agen/header');
          $this->load->view('agen/datakosong');
          $this->load->view('agen/footer');
        }
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////////// S A L D O ///////////////////

    public function saldo(){

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'tanggaldari',
            'label' => 'Tanggal Dari',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggalsampai',
            'label' => 'Tanggal Sampai',
            'rules' => 'required'
          )
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){

        $this->load->view('agen/header');
        $this->load->view('agen/saldo');
        $this->load->view('agen/footer');
      }
      else{
        // ambil session username
        $kodeAgen = $_SESSION['username'];
        $tanggalDari = $this->input->post('tanggaldari');
        $tanggalSampai = $this->input->post('tanggalsampai');
        // ambil 1 hari sebelumnya
        // untuk cek saldo terakhir
        $date = $tanggalDari;
        $kemarin = date('Y-m-d',strtotime($date . "-1 days"));

        $dataAmbil = array(
          'kodeagen' => $kodeAgen,
          'tanggaldari' => $tanggalDari,
          'tanggalsampai' => $tanggalSampai
        );

        //ambil saldo
        $dataSaldo = $this->agen_model->getSaldo($dataAmbil, $kemarin);
        // cek apakah data kosong
        if(!empty($dataSaldo)){
          $data['datasaldo'] = $dataSaldo;

          $this->load->view('agen/header');
          $this->load->view('agen/saldohasil', $data);
          $this->load->view('agen/footer');
        }
        else{
          $this->load->view('agen/header');
          $this->load->view('agen/datakosong');
          $this->load->view('agen/footer');
        }
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////////// B O N U S ///////////////////

    public function bonus(){

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'tanggaldari',
            'label' => 'Tanggal Dari',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggalsampai',
            'label' => 'Tanggal Sampai',
            'rules' => 'required'
          )
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){

        $this->load->view('agen/header');
        $this->load->view('agen/bonus');
        $this->load->view('agen/footer');
      }
      else{
        // ambil session username
        $kodeAgen = $_SESSION['username'];
        $tanggalDari = $this->input->post('tanggaldari');
        $tanggalSampai = $this->input->post('tanggalsampai');

        $dataAmbil = array(
          'kodeagen' => $kodeAgen,
          'tanggaldari' => $tanggalDari,
          'tanggalsampai' => $tanggalSampai
        );

        //ambil bonus
        $dataBonus = $this->agen_model->getBonus($dataAmbil);
        // cek apakah data kosong
        if(!empty($dataBonus)){
          $data['databonus'] = $dataBonus;

          $this->load->view('agen/header');
          $this->load->view('agen/bonushasil', $data);
          $this->load->view('agen/footer');
        }
        else{
          $this->load->view('agen/header');
          $this->load->view('agen/datakosong');
          $this->load->view('agen/footer');
        }
      }
    }

  }
