<?php

  class Admin extends CI_Controller{

    public function __construct(){
      parent::__construct();
      // cek session admin yaitu level 1
      if($_SESSION['level']){
        $sessionLevel = $_SESSION['level'];
        if($sessionLevel != 1){
          // jika level bukan 1, redirect ke login
          redirect('login');
        }
      }
      else{
        redirect('login');
      }
    }

    public function index(){
      $this->load->view('admin/header');
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
    }

    public function agen(){
      // ambil semua data agen
      $dataAgen = $this->admin_model->getDataAgen();
      $data['agen'] = $dataAgen;

      $this->load->view('admin/header');
      $this->load->view('admin/agen', $data);
      $this->load->view('admin/footer');
    }

    public function agendetail($kodeagen=null){
      // ambil data dengan kode_agen tertentu
      $dataAgen = $this->admin_model->getDataAgen($kodeagen);
      $data['agen'] = $dataAgen;

      $this->load->view('admin/header');
      $this->load->view('admin/agendetail', $data);
      $this->load->view('admin/footer');
    }

    public function tambahagen(){

      // validasi form
      // jika form tidak diisi semua, akan muncul error
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'kodeagen',
            'label' => 'Kode Agen',
            'rules' => 'required'
          ),
          array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
          ),
          array(
            'field' => 'telepon',
            'label' => 'Telepon',
            'rules' => 'required'
          ),
          array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
          ),
          array(
            'field' => 'joindate',
            'label' => 'Join Date',
            'rules' => 'required'
          )
        )
      );

      // jika ada error, tampilkan form kembali
      // dengan pesan error
      if(!$this->form_validation->run()){
        $this->load->view('admin/header');
        $this->load->view('admin/agentambah');
        $this->load->view('admin/footer');
      }
      // jika tidak form sudah valid
      // ambil data dari form
      else{
        $kodeagen = $this->input->post('kodeagen');
        $nama = $this->input->post('nama');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $joindate = $this->input->post('joindate');

        
      }



    }

  }
