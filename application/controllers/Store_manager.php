<?php

use Dompdf\Dompdf;

class Store_manager extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'store_manager' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'store_manager';
		$this->load->model('M_store_manager', 'm_store_manager');
		$this->load->model('M_cabang', 'm_cabang');
	}

	public function index(){
		$this->data['title'] = 'Data Store Manager';
		$this->data['all_store_manager'] = $this->m_store_manager->lihat();
		$this->data['no'] = 1;

		$this->load->view('store_manager/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Store_manager';
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->load->view('store_manager/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'id_cabang' => $this->input->post('id_cabang'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_store_manager->tambah($data)){
			$this->session->set_flashdata('success', 'Data Store_manager <strong>Berhasil</strong> Ditambahkan!');
			redirect('store_manager');
		} else {
			$this->session->set_flashdata('error', 'Data Store_manager <strong>Gagal</strong> Ditambahkan!');
			redirect('store_manager');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Store_manager';
		$this->data['store_manager'] = $this->m_store_manager->lihat_id($id);
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->load->view('store_manager/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'id_cabang' => $this->input->post('id_cabang'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_store_manager->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Store_manager <strong>Berhasil</strong> Diubah!');
			redirect('store_manager');
		} else {
			$this->session->set_flashdata('error', 'Data Store_manager <strong>Gagal</strong> Diubah!');
			redirect('store_manager');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_store_manager->hapus($id)){
			$this->session->set_flashdata('success', 'Data Store_manager <strong>Berhasil</strong> Dihapus!');
			redirect('store_manager');
		} else {
			$this->session->set_flashdata('error', 'Data Store_manager <strong>Gagal</strong> Dihapus!');
			redirect('store_manager');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_store_manager'] = $this->m_store_manager->lihat();
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['title'] = 'Laporan Data Store_manager';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('store_manager/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Store_manager Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}