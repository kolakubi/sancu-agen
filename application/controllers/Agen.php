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

    public function profilview(){
      // ambil biodata agen
      $username = $_SESSION['username'];
      $dataAgen = $this->agen_model->getBiodata($username);

      $this->load->view('agen/header');
      $this->load->view('agen/profil', $dataAgen);
      $this->load->view('agen/footer');
    }

  }
