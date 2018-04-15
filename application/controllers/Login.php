<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller{

		public function index(){
			$this->load->view('login');
		}

		public function validasi(){
			// set form validation
			$this->form_validation->set_rules(array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				)
			));

			if(!$this->form_validation->run()){
				$this->load->view('login');
				echo "salah";
			}
			else{
				// ambil value dr field
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				// ambil data dari model login_model
				$result = $this->login_model->login($username, $password);

				if($result){

					$level = $result['level'];

					$this->session->set_userdata($result);

					if($level === '1'){
						redirect('admin');
					}
					else{
						redirect('karyawan');
					}
				}
				else{
					$this->load->view('login');
				}
			}

		}

	}