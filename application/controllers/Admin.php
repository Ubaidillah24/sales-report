<?php

use Dompdf\Dompdf;

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'admin';
		$this->load->model('M_admin', 'm_admin');
	}

	public function index(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Managemen Admin hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Data Admin';
		$this->data['all_admin'] = $this->m_admin->lihat();
		$this->data['no'] = 1;

		$this->load->view('admin/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Admin';

		$this->load->view('admin/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_admin->tambah($data)){
			$this->session->set_flashdata('success', 'Data Admin <strong>Berhasil</strong> Ditambahkan!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('error', 'Data Admin <strong>Gagal</strong> Ditambahkan!');
			redirect('admin');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Admin';
		$this->data['admin'] = $this->m_admin->lihat_id($id);

		$this->load->view('admin/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_admin->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Admin <strong>Berhasil</strong> Diubah!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('error', 'Data Admin <strong>Gagal</strong> Diubah!');
			redirect('admin');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_admin->hapus($id)){
			$this->session->set_flashdata('success', 'Data Admin <strong>Berhasil</strong> Dihapus!');
			redirect('admin');
		} else {
			$this->session->set_flashdata('error', 'Data Admin <strong>Gagal</strong> Dihapus!');
			redirect('admin');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_admin'] = $this->m_admin->lihat();
		$this->data['title'] = 'Laporan Data Admin';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('admin/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Admin Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}