<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->login) redirect('dashboard');
		$this->load->model('M_store_manager', 'm_store_manager');
		$this->load->model('M_cabang', 'm_cabang');
		$this->load->model('M_admin', 'm_admin');
	}

	public function index(){
		$this->load->view('login');
	}

	public function proses_login(){


		if($this->input->post('role') === 'store_manager') $this->_proses_login_store_manager($this->input->post('username'));
		elseif($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
		else {
			?>
			<script>
				alert('role tidak tersedia!')
			</script>
			<?php
		}
	}

	protected function _proses_login_store_manager($username){
		$get_store_manager = $this->m_store_manager->lihat_username($username);
		if($get_store_manager){
			if(password_verify($this->input->post('password'), $get_store_manager->password)){
				$session = [
					'kode' => $get_store_manager->kode,
					'nama' => $get_store_manager->nama,
					'nama_cabang' => $get_store_manager->nama_cabang,
					'username' => $get_store_manager->username,
					'password' => $get_store_manager->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}

	protected function _proses_login_admin($username){

		// var_dump($_POST);die;

		// echo '<br><br>';

		$get_admin = $this->m_admin->lihat_username($username);
		if($get_admin){
			if(password_verify($this->input->post('password'), $get_admin->password)){
				$session = [
					'kode' => $get_admin->kode,
					'nama' => $get_admin->nama,
					'username' => $get_admin->username,
					'password' => $get_admin->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
}