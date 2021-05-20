<?php

class M_cabang extends CI_Model{
	protected $_table = 'cabang';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_cst(){
		$query = $this->db->select('nama_cabang');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_id($kode_cabang){
		$query = $this->db->get_where($this->_table, ['kode_cabang' => $kode_cabang]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $kode_cabang){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_cabang' => $kode_cabang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_cabang){
		return $this->db->delete($this->_table, ['kode_cabang' => $kode_cabang]);
	}
}