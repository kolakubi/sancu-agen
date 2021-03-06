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
      $nik = $_SESSION['username'];
      $dataAdmin = $this->admin_model->getDataAdmin($nik);
      $data['admin'] = $dataAdmin;

      $this->load->view('admin/header');
      $this->load->view('admin/dashboard', $data);
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

        print_r($dataInput);

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

    public function getAgenJson(){
      $nama = $this->input->post('nama');

      $result = $this->admin_model->getDataAgenJson($nama);
      echo json_encode($result);
    }

    public function pembelian(){
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'kodeagen',
            'label' => 'Kode Agen',
            'rules' => 'required'
          ),
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
        $data['pembelian'] = array();
        $data['tanggal'] = array();

        $this->load->view('admin/header');
        $this->load->view('admin/pembelian', $data);
        $this->load->view('admin/footer');
      }
      else{
        $kodeagen = $this->input->post('kodeagen');
        $tanggaldari = $this->input->post('tanggaldari');
        $tanggalsampai = $this->input->post('tanggalsampai');
        $dataambil = array(
          'kode_agen' => $kodeagen,
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        // ambil semua data pembelian
        $dataPembelian = $this->admin_model->getDataPembelianJoin($dataambil);
        $data['pembelian'] = $dataPembelian;
        $data['tanggal'] = array(
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        $this->load->view('admin/header');
        $this->load->view('admin/pembelian', $data);
        $this->load->view('admin/footer');
      }
    }

    public function pembeliantambah(){

      // ambil data agen
      // untuk isi dropdown agen
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
            'field' => 'bonus',
            'label' => 'Bonus',
            'rules' => 'required'
          ),
          array(
            'field' => 'sancuharga',
            'label' => 'Harga Sancu',
            'rules' => 'required'
          ),
          array(
            'field' => 'boncu',
            'label' => 'Boncu',
            'rules' => 'required'
          ),
          array(
            'field' => 'boncuharga',
            'label' => 'Harga Boncu',
            'rules' => 'required'
          ),
          array(
            'field' => 'pretty',
            'label' => 'Pretty',
            'rules' => 'required'
          ),
          array(
            'field' => 'prettyharga',
            'label' => 'Harga Pretty',
            'rules' => 'required'
          ),
          array(
            'field' => 'xtreme',
            'label' => 'Xtreme',
            'rules' => 'required'
          ),
          array(
            'field' => 'xtremeharga',
            'label' => 'Harga Xtreme',
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
        )
      );

      if(!$this->form_validation->run()){
        $this->load->view('admin/header');
        $this->load->view('admin/pembeliantambah', $data);
        $this->load->view('admin/footer');
      }
      else{
        $kodeagen = $this->input->post('kodeagen');
        $kodeadmin = $_SESSION['username'];
        $tanggal = $this->input->post('tanggal');
        $sancu = $this->input->post('sancu');
        $sancuharga = $this->input->post('sancuharga');
        $sancuharga = preg_replace("/[^0-9]/", "", $sancuharga);
        ///////////////////////////////////////////////////////
        $boncu = $this->input->post('boncu');
        $boncuharga = $this->input->post('boncuharga');
        $boncuharga = preg_replace("/[^0-9]/", "", $boncuharga);
        ///////////////////////////////////////////////////////
        $pretty = $this->input->post('pretty');
        $prettyharga = $this->input->post('prettyharga');
        $prettyharga = preg_replace("/[^0-9]/", "", $prettyharga);
        ///////////////////////////////////////////////////////
        $xtreme = $this->input->post('xtreme');
        $xtremeharga = $this->input->post('xtremeharga');
        $xtremeharga = preg_replace("/[^0-9]/", "", $xtremeharga);
        ///////////////////////////////////////////////////////
        $pembelianjumlahitem = $this->input->post('pembelianjumlahitem');
        $pembelianjumlah = $this->input->post('pembelianjumlah');
        $pembeliandibayar = $this->input->post('pembeliandibayar');
        $pembeliansisatagihan = $this->input->post('pembeliansisatagihan');
        $perincian = $this->input->post('perincian');
        if($perincian == null){
          $perincian = 'tidak ada';
        }
        $bonus = $this->input->post('bonus');
        $bonus = preg_replace("/[^0-9]/", "", $bonus);

        // data buat diinput ke pembelian
        $dataPembelian = array(
          // nama harus sama dengan nama field di tabel
          'kode_agen' => $kodeagen,
          'tanggal_pembelian' => $tanggal,
          'total_item' => $pembelianjumlahitem,
          'total_pembelian' => $pembelianjumlah,
          'perincian' => $perincian,
          'nik' => $kodeadmin
        );

        // data buat diinput ke pembelian detail
        $dataPembelianDetail = array(
          'tanggal_pembelian' => $tanggal,
          'sancu' => $sancu,
          'total_harga_sancu' => $sancuharga,
          'boncu' => $boncu,
          'total_harga_boncu' => $boncuharga,
          'pretty' => $pretty,
          'total_harga_pretty' => $prettyharga,
          'xtreme' => $xtreme,
          'total_harga_xtreme' => $xtremeharga
        );

        // data buat diinput ke pembayaran
        $dataPembayaran = array(
          'tanggal_pembelian' => $tanggal,
          'jumlah_pembelian' => $pembelianjumlah,
          'sisa_tagihan' => $pembelianjumlah
        );

        // data buat di input ke saldo
        $dataSaldo = array(
          'kode_agen' => $kodeagen,
          'tgl_perubahan' => $tanggal,
          'debet' => $pembelianjumlah,
          'kredit' => 0,
          'keterangan' => 'pembelian'
        );

        $dataBonus = array(
          'kode_agen' => $kodeagen,
          'jumlah_bonus' => $bonus,
          'ribuan' => 0,
          'puluhan_ribu' => 0,
          'total_item' => $sancu+$boncu
        );

        // insert data ke database
        $result = $this->admin_model->insertPembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $dataSaldo, $dataBonus);
        if($result){
          // jika sukses redirect ke halaman pembelian
          redirect('admin/pembelian');
        }
      }
    }

    public function pembeliandetail($kodepembelian){
      // ambil data pembelian berdasarkan kode
      $datapembelian = $this->admin_model->getDataPembelianDetail($kodepembelian);
      $data['datapembelian'] = $datapembelian;

      $this->load->view('admin/header');
      $this->load->view('admin/pembeliandetail', $data);
      $this->load->view('admin/footer');
    }

    public function pembelianubah($kodepembelian){
      // ambil data pembelian berdasarkan kode
      $datapembelian = $this->admin_model->getDataPembelianDetail($kodepembelian);
      $data['pembelian'] = $datapembelian;

      $this->form_validation->set_rules(
        array(
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
            'field' => 'sancuharga',
            'label' => 'Harga Sancu',
            'rules' => 'required'
          ),
          array(
            'field' => 'boncu',
            'label' => 'Boncu',
            'rules' => 'required'
          ),
          array(
            'field' => 'boncuharga',
            'label' => 'Harga Boncu',
            'rules' => 'required'
          ),
          array(
            'field' => 'pretty',
            'label' => 'Pretty',
            'rules' => 'required'
          ),
          array(
            'field' => 'prettyharga',
            'label' => 'Harga Pretty',
            'rules' => 'required'
          ),
          array(
            'field' => 'xtreme',
            'label' => 'Xtreme',
            'rules' => 'required'
          ),
          array(
            'field' => 'xtremeharga',
            'label' => 'Harga Xtreme',
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
        )
      );

      if(!$this->form_validation->run()){

        $this->load->view('admin/header');
        $this->load->view('admin/pembelianubah', $data);
        $this->load->view('admin/footer');
      }
      else{
        //
        $kodeagen = $this->input->post('kodeagen');
        $tanggal = $this->input->post('tanggal');
        $sancu = $this->input->post('sancu');
        $sancuharga = $this->input->post('sancuharga');
        $boncu = $this->input->post('boncu');
        $boncuharga = $this->input->post('boncuharga');
        $pretty = $this->input->post('pretty');
        $prettyharga = $this->input->post('prettyharga');
        $xtreme = $this->input->post('xtreme');
        $xtremeharga = $this->input->post('xtremeharga');
        $pembelianjumlahitem = $this->input->post('pembelianjumlahitem');
        $pembelianjumlah = $this->input->post('pembelianjumlah');
        $pembeliandibayar = $this->input->post('pembeliandibayar');
        $pembeliansisatagihan = $this->input->post('pembeliansisatagihan');

        $dataPembelian = array(
          'tanggal_pembelian' => $tanggal,
          'total_item' => $pembelianjumlahitem,
          'total_pembelian' => $pembelianjumlah,
        );

        $dataPembelianDetail = array(
          // 'kode_agen' => $kodeagen,
          'tanggal_pembelian' => $tanggal,
          'sancu' => $sancu,
          'total_harga_sancu' => $sancuharga,
          'boncu' => $boncu,
          'total_harga_boncu' => $boncuharga,
          'pretty' => $pretty,
          'total_harga_pretty' => $prettyharga,
          'xtreme' => $xtreme,
          'total_harga_xtreme' => $xtremeharga,
        );

        $dataPembayaran = array(
          //'kode_pembelian' => $kodepembelian,
          // 'tanggal_pembelian' => $tanggal,
          'jumlah_pembelian' => $pembelianjumlah,
          // 'sisa_tagihan' => $pembelianjumlah
        );

        // insert data ke database
        $result = $this->admin_model->updatePembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $kodepembelian);

        echo '<pre>';
        print_r($result);
        echo '</pre>';

        if($result){
          // jika sukses redirect ke halaman pembelian
          redirect('admin/pembelian');
        }
      }
    }

    public function pembelianhapus($kodepembelian){

      // hapus data dari database
      $result = $this->admin_model->deletePembelian($kodepembelian);
      if($result){
        redirect('admin/pembelian');
      }

    } // end of function pembelianHapus

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    /////////// P E M B A Y A R A N ///////////////

    public function pembayaran(){

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'kodeagen',
            'label' => 'Agen',
            'rules' => 'required'
          ),
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
        )
      );

      if(!$this->form_validation->run()){

        $data['dataPembayaran'] = array();
        $data['tanggal'] = array();
        // load view
        $this->load->view('admin/header');
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
      }else{
        $kodeagen = $this->input->post('kodeagen');
        $tanggaldari = $this->input->post('tanggaldari');
        $tanggalsampai = $this->input->post('tanggalsampai');

        $datapembayaran = array(
          'kode_agen' => $kodeagen,
          'tanggaldari' => $tanggaldari,
          'tanggalsampai' => $tanggalsampai
        );

        // ambil data pembayaran dari database
        $result = $this->admin_model->getPembayaran($datapembayaran);

        $data['dataPembayaran'] = $result;
        $data['tanggal'] = array(
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';

        // load view
        $this->load->view('admin/header');
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
      }

    }

    public function pembayaranDetail($kodePembayaran){
      // ambil data pembayarandetail dari database
      $result = $this->admin_model->getPembayaranDetail($kodePembayaran);
      $nik = $_SESSION['username'];
      $data['dataPembayaran'] = $result;
      //$data['dataPembayaran']['nik'] = $nik;

      // echo '<pre>';
      // print_r($result);
      // echo '</pre>';

      // load view
      $this->load->view('admin/header');
      $this->load->view('admin/pembayarandetail', $data);
      $this->load->view('admin/footer');
    }

    public function pembayaranDetailTambah($kodePembayaran){
      // ambil data pembelian
      $result = $this->admin_model->getPembayaranKode($kodePembayaran);
      $data['dataPembayaran'] = $result;
      // set form rules
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'tanggalpembayaran',
            'label' => 'Tanggal Pembayaran',
            'rules' => 'required'
          ),
          array(
            'field' => 'dibayar',
            'label' => 'Dibayar',
            'rules' => 'required'
          ),
          array(
            'field' => 'sisatagihan',
            'label' => 'Sisa Tagihan',
            'rules' => 'required'
          )
        )
      );

      if(!$this->form_validation->run()){
        $this->load->view('admin/header');
        $this->load->view('admin/pembayarandetailtambah', $data);
        $this->load->view('admin/footer');
      }
      else{
        // ambil value dari form
        $tanggalpembayaran = $this->input->post('tanggalpembayaran');
        $dibayar = $this->input->post('dibayar');
        $dibayar = preg_replace("/[^0-9]/", "", $dibayar);
        /////////////////////////////////////////////////////
        $sisatagihan = $this->input->post('sisatagihan');
        /////////////////////////////////////////////////////
        $keterangan = $this->input->post('keterangan');

        $nik = $_SESSION['username'];

        $dataPembayaran = array(
          'kode_pembayaran' => $kodePembayaran,
          'tanggal_pembayaran' => $tanggalpembayaran,
          'nominal_pembayaran' => $dibayar,
          'tagihan_sebelumnya' => $result['sisa_tagihan'],
          'sisa_tagihan' => $sisatagihan,
          'keterangan' => $keterangan,
          'nik' => $nik
        );

        // data buat di input ke saldo
        $dataSaldo = array(
          'kode_agen' => $result['kode_agen'],
          'tgl_perubahan' => $tanggalpembayaran,
          'debet' => 0,
          'kredit' => $dibayar,
          'keterangan' => $keterangan
          //'keterangan' => 'bayar pembelian '.$result['tanggal_pembelian']
        );

        $result = $this->admin_model->insertPembayaranDetail($dataPembayaran, $dataSaldo);
        if($result){
          redirect('admin/pembayaran');
        }
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
      }
    }

    public function pembayaranDetailUbah($kodePembayaranDetail){

      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'nominalpembayaran',
            'label' => 'Nominal',
            'rules' => 'required'
          ),
          array(
            'field' => 'kodepembayarandetail',
            'label' => 'Kode Pembayaran Detail',
            'rules' => 'required'
          )
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){
        // ambil data pembayarandetail dari database
        $result = $this->admin_model->getPembayaranDetail2($kodePembayaranDetail);
        $data['dataPembayaranDetail'] = $result;
      
        // load view
        $this->load->view('admin/header');
        $this->load->view('admin/pembayarandetailubah', $data);
        $this->load->view('admin/footer');
      }
      else{
        $nominal = $this->input->post('nominalpembayaran');

        $dataPembayaranDetailUbah = array(
          'kode_pembayaran_detail' => $this->input->post('kodepembayarandetail'),
          'nominal_pembayaran' => $nominal
        );

        $hasil = $this->admin_model->pembayaranDetailUbah($dataPembayaranDetailUbah);
        if($hasil){
          redirect('admin/pembayaran');
        }
      }

    } // end of function pembayaranDetailUbah

    public function pembayarandetailhapus($kodepembayarandetail){
      
      // hapus data dari database
      $result = $this->admin_model->deletePembayaranDetail($kodepembayarandetail);
      if($result){
        redirect('admin/pembelian');
      }
    
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////////// B O N U S ////////////////////

    public function bonus(){

      // ambil data bonus
      $dataBonus = $this->admin_model->getBonus();
      $data['dataBonus'] = $dataBonus;

      $this->load->view('admin/header');
      $this->load->view('admin/bonus', $data);
      $this->load->view('admin/footer');
    }

    public function bonus_detail($kode_bonus){

      // ambil data bonus_setail berdasarkan $kode_bonus

      $dataBonusDetail = $this->admin_model->getBonusDetail($kode_bonus);
      $data['databonusdetail'] = $dataBonusDetail;

      $this->load->view('admin/header');
      $this->load->view('admin/bonusdetail', $data);
      $this->load->view('admin/footer');
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
          ),
          array(
            'field' => 'kodeagen',
            'label' => 'Kode Agen',
            'rules' => 'required'
          )
        )
      );

      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      if(!$this->form_validation->run()){
        $data['datasaldo'] = array(
          array(
            'kode_saldo' => 0,
            'kode_agen' => 0,
            'tgl_perubahan' => '',
            'debet' => 0,
            'kredit' => 0,
            'nominal' => 0,
          ),
        );
        $data['tanggal'] = array();

        $this->load->view('admin/header');
        $this->load->view('admin/saldo', $data);
        $this->load->view('admin/footer');
      }
      else{
        $tanggaldari = $this->input->post('tanggaldari');
        $tanggalsampai = $this->input->post('tanggalsampai');
        $kodeagen = $this->input->post('kodeagen');
        $date = $tanggaldari;
        $kemarin = date('Y-m-d',strtotime($date . "-1 days"));
        $datasaldo = array(
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai,
          'kodeagen' => $kodeagen
        );

        $result = $this->admin_model->getSaldo($datasaldo, $kemarin);

        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';

        $data['datasaldo'] = $result;
        $data['tanggal'] = array(
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        $this->load->view('admin/header');
        $this->load->view('admin/saldo', $data);
        $this->load->view('admin/footer');

      } // => end of form_validation

    } // => end of function saldo

    function saldoAwal(){

      // set form rules
      $this->form_validation->set_rules(
        array(
          array(
            'field' => 'saldo',
            'label' => 'Saldo',
            'rules' => 'required'
          ),
          array(
            'field' => 'sebelah',
            'label' => 'Sebelah',
            'rules' => 'required'
          ),
          array(
            'field' => 'kodeagen',
            'label' => 'Kode Agen',
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
        )
      );

      // set pesan error
      $this->form_validation->set_message('required', 'mohon lengkapi %s');

      // jika form tidak valid
      if(!$this->form_validation->run()){

        // status error false
        $data['statusDataSaldo'] = 0;

        $this->load->view('admin/header');
        $this->load->view('admin/saldoawal', $data);
        $this->load->view('admin/footer');
      }
      else{

        // ambil value dari form
        $kodeagen = $this->input->post('kodeagen');
        $sebelah = $this->input->post('sebelah');
        $saldo = $this->input->post('saldo');
        $saldo = preg_replace("/[^0-9]/", "", $saldo);
        $sancu = $this->input->post('sancu');
        $boncu = $this->input->post('boncu');
        $pretty = $this->input->post('pretty');
        $xtreme = $this->input->post('xtreme');
        $tanggal = date('Y-m-d');
        $nik = $_SESSION['username'];

        $dataSaldoAwal = array(
          'kode_agen' => $kodeagen,
          'kode_pembelian' => 0,
          'kode_pembayaran_detail' => 0,
          'tgl_perubahan' => $tanggal,
          'debet' => $sebelah == 'debet' ? $saldo : 0,
          'kredit' => $sebelah == 'kredit' ? $saldo : 0,
          'nominal' => $sebelah == 'debet' ? $saldo : ($saldo*(-1)),
          'keterangan' => 'saldo awal '.$tanggal,
        );

        $dataPembelian = array(
          'kode_agen' => $kodeagen,
          'tanggal_pembelian' => $tanggal,
          'total_item' => $sancu+$boncu+$pretty+$xtreme,
          'total_pembelian' => $saldo,
          'perincian' => 'saldo awal '.$tanggal,
          'status_no_edit' => 1,
          'nik' => $nik
        );

        $dataPembelianDetail = array(
          'tanggal_pembelian' => $tanggal,
          'sancu' => $sancu,
          'total_harga_sancu' => 0,
          'boncu' => $boncu,
          'total_harga_boncu' => 0,
          'pretty' => $pretty,
          'total_harga_pretty' => 0,
          'xtreme' => $xtreme,
          'total_harga_xtreme' => 0
        );

        $dataPembayaran = array(
          'tanggal_pembelian' => date('Y-m-d'),
          'jumlah_pembelian' => $saldo,
          'sisa_tagihan' => $saldo
        );

        // hapus index sebelah
        // krn tidak diperlukan di database
        unset($dataSaldoAwal['sebelah']);

        // echo '<pre>';
        // print_r($dataSaldoAwal);
        // echo '</pre>';

        $hasil = $this->admin_model->saldoAwal($dataSaldoAwal, $dataPembelian, $dataPembelianDetail, $dataPembayaran);
        if($hasil){
          redirect('admin/saldo');
        }{
          // status error true
          $data['statusDataSaldo'] = 1;

          $this->load->view('admin/header');
          $this->load->view('admin/saldoawal', $data);
          $this->load->view('admin/footer');
        }

      } // end of form validation

    } // => end of function saldoAwal


    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ////////////// L A P O R A N //////////////////

    public function laporanpembelian(){

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
        $data['datapembelian'] = array();
        $data['tanggal'] = array();

        $this->load->view('admin/header');
        $this->load->view('admin/laporanpembelian', $data);
        $this->load->view('admin/footer');
      }
      else{
        $kodeagen = $this->input->post('kodeagen');
        $tanggaldari = $this->input->post('tanggaldari');
        $tanggalsampai = $this->input->post('tanggalsampai');
        $datalaporan = array(
          'kodeagen' => $kodeagen,
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        $result = $this->admin_model->getLaporanPembelian($datalaporan);

        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';

        $data['datapembelian'] = $result;
        $data['tanggal'] = array(
          'dari' => $tanggaldari,
          'sampai' => $tanggalsampai
        );

        $this->load->view('admin/header');
        $this->load->view('admin/laporanpembelian', $data);
        $this->load->view('admin/footer');
      }

    }
  }
