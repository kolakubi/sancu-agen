<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller{

		public function index(){
			$data['gagal'] = false;
			$this->load->view('login', $data);
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

			$this->form_validation->set_message('required', '%s tidak boleh kosong');

			if(!$this->form_validation->run()){
				$data['gagal'] = false;
				$this->load->view('login', $data);
			}
			else{
				// ambil value dr field
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$ip = null;

				// jika di live server
				if(!empty($_SERVER['HTTP_CLIENT_IP'])){
					function get_visitor_ip() {
				    $ip = '';
				    if ($_SERVER['HTTP_CLIENT_IP'])
				        $ip = $_SERVER['HTTP_CLIENT_IP'];
				    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
				        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				    else if($_SERVER['HTTP_X_FORWARDED'])
				        $ip = $_SERVER['HTTP_X_FORWARDED'];
				    else if($_SERVER['HTTP_FORWARDED_FOR'])
				        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
				    else if($_SERVER['HTTP_FORWARDED'])
				        $ip = $_SERVER['HTTP_FORWARDED'];
				    else if($_SERVER['REMOTE_ADDR'])
				        $ip = $_SERVER['REMOTE_ADDR'];
				    else
				        $ip = 'none';

				    return $ip;
					}
					$ip = get_visitor_ip();
				}
				else{
					// jika di local server
					function get_client_ip_env() {
				    $ipaddress = '';
				    if (getenv('HTTP_CLIENT_IP'))
				        $ipaddress = getenv('HTTP_CLIENT_IP');
				    else if(getenv('HTTP_X_FORWARDED_FOR'))
				        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
				    else if(getenv('HTTP_X_FORWARDED'))
				        $ipaddress = getenv('HTTP_X_FORWARDED');
				    else if(getenv('HTTP_FORWARDED_FOR'))
				        $ipaddress = getenv('HTTP_FORWARDED_FOR');
				    else if(getenv('HTTP_FORWARDED'))
				        $ipaddress = getenv('HTTP_FORWARDED');
				    else if(getenv('REMOTE_ADDR'))
				        $ipaddress = getenv('REMOTE_ADDR');
				    else
				        $ipaddress = 'UNKNOWN';

				    return $ipaddress;
					}

					$ip = get_client_ip_env();
				}

				// $arr = array(
				// 	'username' => $username,
				// 	'password' => $password,
				// 	'ip' => $ip
				// );
				//
				// echo '<pre>';
				// print_r($arr);
				// echo '</pre>';

				//ambil data dari model login_model
				$result = $this->login_model->login($username, $password, $ip);
				// jika ada result
				if($result){

					$level = $result['level']; // cek level
					$this->session->set_userdata($result);

					if($level === '1'){ // jika level 1 ke admin
						redirect('admin');
					}
					else if($level === '2'){
						redirect('agen'); // jika level 2 ke agen
					}
					else{
						return false;
					}
				}
				// jika tdk ada result
				else{
					$data['gagal'] = true;
					$this->load->view('login', $data); // kembali ke login
				}
			}

		}

	}
