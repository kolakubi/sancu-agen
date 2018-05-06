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

    public function pembelian(){
      // ambil semua data pembelian
      $dataPembelian = $this->admin_model->getDataPembelianJoin();
      $data['pembelian'] = $dataPembelian;

      $this->load->view('admin/header');
      $this->load->view('admin/pembelian', $data);
      $this->load->view('admin/footer');
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

        // data buat diinput ke pembelian
        $dataPembelian = array(
          // nama harus sama dengan nama field di tabel
          'kode_agen' => $kodeagen,
          'tanggal_pembelian' => $tanggal,
          'total_item' => $pembelianjumlahitem,
          'total_pembelian' => $pembelianjumlah,
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
          'total_harga_xtreme' => $xtremeharga,
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

        // insert data ke database
        $result = $this->admin_model->insertPembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $dataSaldo);
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
          'tanggal_pembelian' => $tanggal,
          'jumlah_pembelian' => $pembelianjumlah,
          'sisa_tagihan' => $pembelianjumlah
        );

        // insert data ke database
        $result = $this->admin_model->updatePembelian($dataPembelian, $dataPembelianDetail, $dataPembayaran, $kodepembelian);
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
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    /////////// P E M B A Y A R AN ///////////////

    public function pembayaran(){
      // ambil data pembayaran dari database
      $result = $this->admin_model->getPembayaran();

      $data['dataPembayaran'] = $result;
      // load view
      $this->load->view('admin/header');
      $this->load->view('admin/pembayaran', $data);
      $this->load->view('admin/footer');
    }

    public function pembayaranDetail($kodePembayaran){
      // ambil data pembayarandetail dari database
      $result = $this->admin_model->getPembayaranDetail($kodePembayaran);
      $data['dataPembayaran'] = $result;
      // load view
      $this->load->view('admin/header');
      $this->load->view('admin/pembayarandetail', $data);
      $this->load->view('admin/footer');
      // echo '<pre>';
      // print_r($result);
      // echo '</pre>';
    }

    public function pembayaranDetailTambah($kodePembayaran){
      // ambil data pembelian
      $result = $this->admin_model->getPembayaran($kodePembayaran);
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
        $kodepembayaran = $result['kode_pembayaran'];
        $tanggalpembayaran = $this->input->post('tanggalpembayaran');
        $dibayar = $this->input->post('dibayar');
        $sisatagihan = $this->input->post('sisatagihan');
        $keterangan = $this->input->post('keterangan');

        $dataPembayaran = array(
          'kode_pembayaran' => $kodepembayaran,
          'tanggal_pembayaran' => $tanggalpembayaran,
          'nominal_pembayaran' => $dibayar,
          'tagihan_sebelumnya' => $result['sisa_tagihan'],
          'sisa_tagihan' => $sisatagihan,
          'keterangan' => $keterangan
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
      }
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    //////////////// B O N U S ////////////////////

    public function bonus(){
      $this->load->view('admin/header');
      $this->load->view('admin/bonus');
      $this->load->view('admin/footer');
    }


  }
