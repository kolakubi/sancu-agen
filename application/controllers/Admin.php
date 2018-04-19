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

    public function agentambah(){
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
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
          ),
          array(
            'field' => 'kota',
            'label' => 'Kota',
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
            'field' => 'kelamin',
            'label' => 'Kelamin',
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
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $kelamin = $this->input->post('kelamin');
        $joindate = $this->input->post('joindate');

        // buat array input
        // nama array sesuai nama tabel
        $dataInput = array(
          'kode_agen' => $kodeagen,
          'nama' => $nama,
          'alamat' => $alamat,
          'kota' => $kota,
          'telepon' => $telepon,
          'email' => $email,
          'kelamin' => $kelamin,
          'tgl_gabung' => $joindate
        );

        // insert data ke database
        $result = $this->admin_model->insertAgen($dataInput);
        if(!$result['status']){
          $this->form_validation->set_message($result['cekkode']);
          echo $result['cekkode'];
        }
        else{
          redirect('admin/agen');
        }
      }
    }

    public function agenubah($kodeagen){
      // ambil data dengan kode_agen tertentu
      $dataAgen = $this->admin_model->getDataAgen($kodeagen);
      $data['agen'] = $dataAgen;

      // validasi form
      // jika form tidak diisi semua, akan muncul error
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
          ),
          array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
          ),
          array(
            'field' => 'kota',
            'label' => 'Kota',
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
            'field' => 'kelamin',
            'label' => 'Kelamin',
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
        $this->load->view('admin/agenubah', $data);
        $this->load->view('admin/footer');
      }
      // jika tidak form sudah valid
      // ambil data dari form
      else{
        $kodeagen = $this->input->post('kodeagen');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $kelamin = $this->input->post('kelamin');
        $joindate = $this->input->post('joindate');

        // buat array input
        // nama array sesuai nama tabel
        $dataInput = array(
          'nama' => $nama,
          'alamat' => $alamat,
          'kota' => $kota,
          'telepon' => $telepon,
          'email' => $email,
          'kelamin' => $kelamin,
          'tgl_gabung' => $joindate
        );

        //insert data ke database
        $result = $this->admin_model->updateAgen($dataInput, $kodeagen);

        if($result){
          redirect('admin/agen');
        }
      }
    }

    public function agenhapus($kodeagen){
      // hapus data dari database
      $result = $this->admin_model->deleteAgen($kodeagen);
      if($result){
        redirect('admin/agen');
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////// P E M B E L I A N ////////////////

    public function pembelian(){
      // ambil semua data pembelian
      $dataPembelian = $this->admin_model->getDataPembelian();
      $data['pembelian'] = $dataPembelian;

      $this->load->view('admin/header');
      $this->load->view('admin/pembelian', $data);
      $this->load->view('admin/footer');
    }

    public function pembeliantambah(){

      $dataAgen = $this->admin_model->getDataAgen();
      $data['agen'] = $dataAgen;

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'kodeagen',
            'label' => 'Kodeagen',
            'rules' => 'required'
          ),
          array(
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'
          ),
          array(
            'field' => 'sancu',
            'label' => 'Sancu',
            'rules' => 'required'
          ),
          array(
            'field' => 'boncu',
            'label' => 'Boncu',
            'rules' => 'required'
          ),
          array(
            'field' => 'pretty',
            'label' => 'Pretty',
            'rules' => 'required'
          ),
          array(
            'field' => 'xtreme',
            'label' => 'Xtreme',
            'rules' => 'required'
          ),
          array(
            'field' => 'pembelianjumlahitem',
            'label' => 'Jumlah Item',
            'rules' => 'required'
          ),
          array(
            'field' => 'pembelianjumlah',
            'label' => 'Jumlah',
            'rules' => 'required'
          ),
          array(
            'field' => 'pembeliandibayar',
            'label' => 'Dibayar',
            'rules' => 'required'
          ),
          array(
            'field' => 'pembeliansisatagihan',
            'label' => 'Sisa Tagihan',
            'rules' => 'required'
          )
        )
      );

      if(!$this->form_validation->run()){
        $this->load->view('admin/header');
        $this->load->view('admin/pembeliantambah', $data);
        $this->load->view('admin/footer');
      }
      else{
        $kodeagen = $this->input->post('kodeagen');
        $tanggal = $this->input->post('tanggal');
        $sancu = $this->input->post('sancu');
        $boncu = $this->input->post('boncu');
        $pretty = $this->input->post('pretty');
        $xtreme = $this->input->post('xtreme');
        $pembelianjumlahitem = $this->input->post('pembelianjumlahitem');
        $pembelianjumlah = $this->input->post('pembelianjumlah');
        $pembeliandibayar = $this->input->post('pembeliandibayar');
        $pembeliansisatagihan = $this->input->post('pembeliansisatagihan');
      }


    }

  }
