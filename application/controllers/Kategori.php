<?php

use Dompdf\Dompdf;

class Kategori extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'store_manager' && $this->session->login['role'] != 'admin') redirect();
		$this->load->model('M_kategori', 'm_kategori');
		$this->data['aktif'] = 'kategori';
	}

	public function index(){
		$this->data['title'] = 'Data Kategori';
		$this->data['all_kategori'] = $this->m_kategori->lihat();
		$this->data['no'] = 1;

		$this->load->view('kategori/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Kategori';

		$this->load->view('kategori/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kategori_produk' => $this->input->post('kategori_produk'),
		];

		if($this->m_kategori->tambah($data)){
			$this->session->set_flashdata('success', 'Data Kategori <strong>Berhasil</strong> Ditambahkan!');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('error', 'Data Kategori <strong>Gagal</strong> Ditambahkan!');
			redirect('kategori');
		}
	}

	public function ubah($id_kategori){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Kategori';
		$this->data['kategori'] = $this->m_kategori->lihat_id($id_kategori);

		$this->load->view('kategori/ubah', $this->data);
	}

	public function proses_ubah($id_kategori){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kategori_produk' => $this->input->post('kategori_produk'),
		];

		if($this->m_kategori->ubah($data, $id_kategori)){
			$this->session->set_flashdata('success', 'Data Kategori <strong>Berhasil</strong> Diubah!');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('error', 'Data Kategori <strong>Gagal</strong> Diubah!');
			redirect('kategori');
		}
	}

	public function hapus($id_kategori){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_kategori->hapus($id_kategori)){
			$this->session->set_flashdata('success', 'Data Kategori <strong>Berhasil</strong> Dihapus!');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('error', 'Data Kategori <strong>Gagal</strong> Dihapus!');
			redirect('kategori');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_kategori'] = $this->m_kategori->lihat();
		$this->data['title'] = 'Laporan Data Kategori';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('kategori/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Kategori Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}