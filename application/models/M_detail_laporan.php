<?php

class M_detail_laporan extends CI_Model {
	protected $_table = 'detail_laporan';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_laporan($no_laporan){
		return $this->db->get_where($this->_table, ['no_laporan' => $no_laporan])->result();
	}

	public function hapus($no_laporan){
		return $this->db->delete($this->_table, ['no_laporan' => $no_laporan]);
	}
}