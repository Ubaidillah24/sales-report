<?php

class M_laporan extends CI_Model {
	protected $_table = 'laporan';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_laporan($no_laporan){
		return $this->db->get_where($this->_table, ['no_laporan' => $no_laporan])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_laporan){
		return $this->db->delete($this->_table, ['no_laporan' => $no_laporan]);
	}
}