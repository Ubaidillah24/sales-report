<?php

use Dompdf\Dompdf;

class kasir extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'kasir';
		$this->load->model('M_kasir', 'm_kasir');
		$this->load->model('M_cabang', 'm_cabang');
	}

	public function index(){
		$this->data['title'] = 'Data Kasir';
		$this->data['all_kasir'] = $this->m_kasir->lihat();
		$this->data['no'] = 1;

		$this->load->view('kasir/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah kasir';
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->load->view('kasir/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'nik' => $this->input->post('nik'),
			'id_cabang' => $this->input->post('id_cabang'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_kasir->tambah($data)){
			$this->session->set_flashdata('success', 'Data kasir <strong>Berhasil</strong> Ditambahkan!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('error', 'Data kasir <strong>Gagal</strong> Ditambahkan!');
			redirect('kasir');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah kasir';
		$this->data['kasir'] = $this->m_kasir->lihat_id($id);
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->load->view('kasir/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'nik' => $this->input->post('nik'),
			'id_cabang' => $this->input->post('id_cabang'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if($this->m_kasir->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data kasir <strong>Berhasil</strong> Diubah!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('error', 'Data kasir <strong>Gagal</strong> Diubah!');
			redirect('kasir');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_kasir->hapus($id)){
			$this->session->set_flashdata('success', 'Data kasir <strong>Berhasil</strong> Dihapus!');
			redirect('kasir');
		} else {
			$this->session->set_flashdata('error', 'Data kasir <strong>Gagal</strong> Dihapus!');
			redirect('kasir');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_kasir'] = $this->m_kasir->lihat();
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['title'] = 'Laporan Data kasir';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('kasir/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data kasir Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}