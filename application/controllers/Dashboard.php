<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'store_manager' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_produk', 'm_produk');
		$this->load->model('M_cabang', 'm_cabang');
		$this->load->model('M_kategori', 'm_kategori');
		$this->load->model('M_store_manager', 'm_store_manager');
		$this->load->model('M_laporan', 'm_laporan');
		$this->load->model('M_admin', 'm_admin');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_produk'] = $this->m_produk->jumlah();
		$this->data['jumlah_cabang'] = $this->m_cabang->jumlah();
		$this->data['jumlah_kategori'] = $this->m_kategori->jumlah();
		$this->data['jumlah_store_manager'] = $this->m_store_manager->jumlah();
		$this->data['jumlah_laporan'] = $this->m_laporan->jumlah();
		$this->data['jumlah_admin'] = $this->m_admin->jumlah();
		$this->data['jumlah_cabang'] = $this->m_cabang->jumlah();
		$this->load->view('dashboard', $this->data);
	}
}