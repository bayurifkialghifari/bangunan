<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

	public function getDataProduk()
	{
		return $this->db->select('produk.*, kategori.nama as kategori')->join('kategori', 'kategori.id_kategori = produk.id_kategori')->get('produk')->result_array();
	}

	public function getDataProdukDetail($dari, $sampai)
	{
		return $this->db->select('produk.*, kategori.nama as kategori')
					->join('kategori', 'kategori.id_kategori = produk.id_kategori')
					->where("( produk.tanggal LIKE '%$dari%' or produk.tanggal LIKE '%$sampai%' )")
					->get('produk')
					->result_array();
	}

	public function getDataPenjualan()
	{
		$exe = $this->db->select('a.*, b.nama as produk, b.harga_jual as harga, c.username as kasir')
						->from('transaksi a')
						->join('produk b', 'a.kode_produk = b.kode_produk', 'left')
						->join('pengguna c', 'a.id_kasir = c.id_pengguna', 'left');
		
		$exe = $this->db->get();

		return $exe->result_array();
	}

	public function getDataPenjualanDetail($dari, $sampai)
	{
		$exe = $this->db->select('a.*, b.nama as produk, b.harga_jual as harga, c.username as kasir')
						->from('transaksi a')
						->join('produk b', 'a.kode_produk = b.kode_produk', 'left')
						->where("( a.tanggal LIKE '%$dari%' or a.tanggal LIKE '%$sampai%' )")
						->join('pengguna c', 'a.id_kasir = c.id_pengguna', 'left');
		
		$exe = $this->db->get();

		return $exe->result_array();	
	}

	public function getDataPembayaran()
	{
		$exe = $this->db->select('a.*, b.nama as produk, b.harga_jual as harga, c.username as kasir')
						->from('transaksi a')
						->join('produk b', 'a.kode_produk = b.kode_produk', 'left')
						->join('pengguna c', 'a.id_kasir = c.id_pengguna', 'left');
		
		$exe = $this->db->get();

		return $exe->result_array();
	}

	public function getDataPembayaranDetail($dari, $sampai)
	{
		$exe = $this->db->select('a.*, b.nama as produk, b.harga_jual as harga, c.username as kasir')
						->from('transaksi a')
						->join('produk b', 'a.kode_produk = b.kode_produk', 'left')
						->where("( a.tanggal LIKE '%$dari%' or a.tanggal LIKE '%$sampai%' )")
						->join('pengguna c', 'a.id_kasir = c.id_pengguna', 'left');
		
		$exe = $this->db->get();

		return $exe->result_array();	
	}

}

/* End of file LaporanModel.php */
/* Location: ./application/models/LaporanModel.php */