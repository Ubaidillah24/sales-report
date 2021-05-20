<?php

class M_kategori extends CI_Model{
	protected $_table = 'kategori';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_spl(){
		$query = $this->db->select('nama');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_id($id_kategori){
		$query = $this->db->get_where($this->_table, ['id_kategori' => $id_kategori]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id_kategori){
		$query = $this->db->set($data);
		$query = $this->db->where(['id_kategori' => $id_kategori]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id_kategori){
		return $this->db->delete($this->_table, ['id_kategori' => $id_kategori]);
	}
}