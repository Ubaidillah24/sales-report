<?php

class M_produk extends CI_Model{
	protected $_table = 'produk';

	public function lihat(){
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}


	public function lihat_id($kode_produk){
		$query = $this->db->get_where($this->_table, ['kode_produk' => $kode_produk]);
		return $query->row();
	}

	public function lihat_nama_produk($nama_produk){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_produk' => $nama_produk]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function plus_stok($stok, $nama_produk){
		$query = $this->db->set('stok', 'stok+' . $stok, false);
		$query = $this->db->where('nama_produk', $nama_produk);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function min_stok($stok, $nama_produk){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_produk', $nama_produk);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_produk){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_produk' => $kode_produk]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_produk){
		return $this->db->delete($this->_table, ['kode_produk' => $kode_produk]);
	}
}