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


        $dataAmbil = array(
          'kodeagen' => $kodeAgen,
          'tanggaldari' => $tanggalDari,
          'tanggalsampai' => $tanggalSampai
        );

        $dataPembelian = $this->agen_model->getDataPembelianRange($dataAmbil);
        $data['datapembelian'] = $dataPembelian;
        $data['item'] = $item;
        $data['defaultitem'] = $defaultItem;

        $this->load->view('agen/header');
        $this->load->view('agen/pembelianhasil', $data);
        $this->load->view('agen/footer');

        // echo '<pre>';
        // print_r($dataPembelian);
        // echo '<pre>';
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B E L I A N ////////////////

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

        $dataPembelian = $this->agen_model->getDataPembayaranRange($dataAmbil);
        $data['datapembayaran'] = $dataPembelian;

        $this->load->view('agen/header');
        $this->load->view('agen/pembayaranhasil', $data);
        $this->load->view('agen/footer');

        // echo '<pre>';
        // print_r($dataPembelian);
        // echo '<pre>';
      }


    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////////// B O N U S ///////////////////

    public function bonus(){

      $this->load->view('agen/header');
      $this->load->view('agen/bonus');
      $this->load->view('agen/footer');

    }

  }
