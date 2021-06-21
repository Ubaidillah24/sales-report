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
		$this->load->model('M_kasir', 'm_kasir');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_produk'] = $this->m_produk->jumlah();
		$this->data['jumlah_cabang'] = $this->m_cabang->jumlah();
		$this->data['jumlah_kategori'] = $this->m_kategori->jumlah();
		$this->data['jumlah_store_manager'] = $this->m_store_manager->jumlah();
		
		$qtoday = date('Y-m-d');
		$qlaporan = "select count(*) as hitung from laporan where str_to_date(tgl_laporan , '%d/%m/%Y') between '$qtoday' and '$qtoday'";
		$this->data['jumlah_laporan'] = $this->db->query($qlaporan)->result_array()[0]['hitung'];

		$qprod = "
		SELECT 

		dl.nama_produk,
		sum(dl.jumlah) as jumlah
		
		
		FROM 
		
		laporan l
		
		INNER JOIN detail_laporan dl ON dl.no_laporan = l.no_laporan 
		
		WHERE str_to_date(l.tgl_laporan , '%d/%m/%Y') between '$qtoday' and '$qtoday'
		
		GROUP BY dl.nama_produk";

		$this->data['dataproduk'] = $this->db->query($qprod)->result_array();

		$qtoko = "
		SELECT 

		l.nama_cabang,
		sum(dl.jumlah) as jumlah
		
		
		FROM 
		
		laporan l
		
		INNER JOIN detail_laporan dl ON dl.no_laporan = l.no_laporan 
		
		WHERE str_to_date(l.tgl_laporan , '%d/%m/%Y') between '$qtoday' and '$qtoday'
		
		GROUP BY l.nama_cabang";

		$this->data['datatoko'] = $this->db->query($qtoko)->result_array();

		$this->data['jumlah_admin'] = $this->m_admin->jumlah();
		$this->data['jumlah_cabang'] = $this->m_cabang->jumlah();
		$this->load->view('dashboard', $this->data);
	}
}