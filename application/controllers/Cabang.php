<?php

use Dompdf\Dompdf;

class Cabang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'store_manager' && $this->session->login['role'] != 'admin') redirect();
		$this->load->model('M_cabang', 'm_cabang');
		$this->data['aktif'] = 'cabang';
	}

	public function index(){
		$this->data['title'] = 'Data Cabang';
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['no'] = 1;

		$this->load->view('cabang/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Cabang';

		$this->load->view('cabang/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode_cabang' => $this->input->post('kode_cabang'),
			'nama_cabang' => $this->input->post('nama_cabang'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_cabang->tambah($data)){
			$this->session->set_flashdata('success', 'Data Cabang <strong>Berhasil</strong> Ditambahkan!');
			redirect('cabang');
		} else {
			$this->session->set_flashdata('error', 'Data Cabang <strong>Gagal</strong> Ditambahkan!');
			redirect('cabang');
		}
	}

	public function ubah($kode){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Cabang';
		$this->data['cabang'] = $this->m_cabang->lihat_id($kode);

		$this->load->view('cabang/ubah', $this->data);
	}

	public function proses_ubah($kode_cabang){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode_cabang' => $this->input->post('kode_cabang'),
			'nama_cabang' => $this->input->post('nama_cabang'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_cabang->ubah($data, $kode_cabang)){
			$this->session->set_flashdata('success', 'Data Cabang <strong>Berhasil</strong> Diubah!');
			redirect('cabang');
		} else {
			$this->session->set_flashdata('error', 'Data Cabang <strong>Gagal</strong> Diubah!');
			redirect('cabang');
		}
	}

	public function hapus($kode_cabang){
		if ($this->session->login['role'] == 'store_manager'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_cabang->hapus($kode_cabang)){
			$this->session->set_flashdata('success', 'Data Cabang <strong>Berhasil</strong> Dihapus!');
			redirect('cabang');
		} else {
			$this->session->set_flashdata('error', 'Data Cabang <strong>Gagal</strong> Dihapus!');
			redirect('cabang');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['title'] = 'Laporan Data Cabang';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('cabang/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Cabang Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}