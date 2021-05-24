<?php

use Dompdf\Dompdf;

class Laporan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'laporan';
		$this->load->model('M_produk', 'm_produk');
		$this->load->model('M_store_manager', 'm_store_manager');
		$this->load->model('M_cabang', 'm_cabang');
		$this->load->model('M_laporan', 'm_laporan');
		$this->load->model('M_detail_laporan', 'm_detail_laporan');
	}

	public function index(){
		$this->data['title'] = 'Laporan Penjualan';
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['all_laporan'] = $this->m_laporan->lihat();
		$this->data['no'] = 1;

		$this->load->view('laporan/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Laporan Penjualan';
		$this->data['all_produk'] = $this->m_produk->lihat();
		$this->data['all_store_manager'] = $this->m_store_manager->lihat();
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->load->view('laporan/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_produk_dilaporan = count($this->input->post('nama_produk_hidden'));

		$data_laporan = [
			'no_laporan' => $this->input->post('no_laporan'),
			'tgl_laporan' => $this->input->post('tgl_laporan'),
			'jam_laporan' => $this->input->post('jam_laporan'),
			'nama_cabang' => $this->input->post('nama_cabang'),
			'nama_store_manager' => $this->input->post('nama_store_manager'),
			'target' => $this->input->post('target'),
			'nett' => $this->input->post('nett'),
			'mtd_nett' => $this->input->post('mtd_nett'),
			'sales_race' => $this->input->post('sales_race'),
			'sales_achieve' => $this->input->post('sales_achieve'),
			'sc' => $this->input->post('sc'),
			'large' => $this->input->post('large'),
			'grab' => $this->input->post('grab'),
			'gofood' => $this->input->post('gofood'),
			'walk_in' => $this->input->post('walk_in'),
			'shopee_food' => $this->input->post('shopee_food'),
			
		];

		$data_detail_laporan = [];

		for($i = 0; $i < $jumlah_produk_dilaporan; $i++){
			array_push($data_detail_laporan, ['no_laporan' => $this->input->post('no_laporan')]);
			$data_detail_laporan[$i]['nama_produk'] = $this->input->post('nama_produk_hidden')[$i];
			$data_detail_laporan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
		}

		if($this->m_laporan->tambah($data_laporan) && $this->m_detail_laporan->tambah($data_detail_laporan)){
			$this->session->set_flashdata('success', 'Invoice <strong>Laporan</strong> Berhasil Dibuat!');
			redirect('laporan');
		} else {
			$this->session->set_flashdata('error', 'Laporan <strong>Gagal</strong> Ditambahkan!');
			redirect('laporan');
		}
	}

	public function detail($no_laporan){
		$this->data['title'] = 'Detail Laporan';
		$this->data['laporan'] = $this->m_laporan->lihat_no_laporan($no_laporan);
		$this->data['all_cabang'] = $this->m_cabang->lihat();
		$this->data['all_detail_laporan'] = $this->m_detail_laporan->lihat_no_laporan($no_laporan);
		$this->data['no'] = 1;

		$this->load->view('laporan/detail', $this->data);
	}

	public function hapus($no_laporan){
		if($this->m_laporan->hapus($no_laporan) && $this->m_detail_laporan->hapus($no_laporan)){
			$this->session->set_flashdata('success', 'Invoice Laporan <strong>Berhasil</strong> Dihapus!');
			redirect('laporan');
		} else {
			$this->session->set_flashdata('error', 'Invoice Laporan <strong>Gagal</strong> Dihapus!');
			redirect('laporan');
		}
	}

	public function get_all_produk(){
		$data = $this->m_produk->lihat_nama_produk($_POST['nama_produk']);
		echo json_encode($data);
	}

	public function keranjang_produk(){
		$this->load->view('laporan/keranjang');
	}

	public function dataAll($start = null , $end = null)
    {
        $column_order   = array();
        $column_search  = array();
        $order          = array();
        $select         = "";

		

        if($start == null || $end == null){
            $where          = "";
        }else{

            $where = "WHERE str_to_date(tgl_laporan , '%d/%m/%Y') between '$start' and '$end'";
        }
		
		$query ="
		SELECT * FROM laporan $where
		
		";

		
        
        $list = $this->db->query($query)->result_array();
		// echo $this->db->last_query();
        
        $output = array(
            "draw" => null,
            "recordsTotal" => count($list),
            "recordsFiltered" => count($list),
            "data" => $list
        );
        echo json_encode($output);
    }

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_laporan'] = $this->m_laporan->lihat();
		$this->data['title'] = 'Laporan Data Laporan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('laporan/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Laporan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_laporan){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['laporan'] = $this->m_laporan->lihat_no_laporan($no_laporan);
		$this->data['all_detail_laporan'] = $this->m_detail_laporan->lihat_no_laporan($no_laporan);
		$this->data['title'] = 'Laporan Detail Laporan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('laporan/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Laporan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}