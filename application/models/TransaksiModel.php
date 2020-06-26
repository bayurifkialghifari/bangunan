<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	public function getData($id = null)
	{
		$exe = $this->db->select('a.*, b.nama as produk, b.harga_jual as harga, c.username as kasir')
						->from('transaksi a')
						->join('produk b', 'a.kode_produk = b.kode_produk', 'left')
						->join('pengguna c', 'a.id_kasir = c.id_pengguna', 'left');

		if($id != null)
		{
			$exe = $this->db->where('id', $id);
		}
		
		$exe = $this->db->get();

		return $exe->result_array();
	}

	public function getProduk()
	{
		$exe = $this->db->get('produk');

		return $exe->result_array();
	}
	
	function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

	public function tambah($produk, $dibeli, $total, $dibayar, $sisa, $status)
	{
		$data['kode_produk'] = $produk;
		$data['kode_transaksi'] = $this->generateRandomString();
		$data['id_kasir'] = $this->session->userdata('id_user');
		$data['qty'] = $dibeli;
		$data['total'] = $total;
		$data['dibayar'] = $dibayar;
		$data['sisa'] = $sisa;
		$data['status'] = $status;

		$exe = $this->db->insert('transaksi', $data);

		// Update stok produk
		$this->update($produk, $dibeli);

		return $exe;
	}

	public function ubah($id, $dibayar, $sisa, $status)
	{
		// Ambil sisa bayar sebelumnya
		$sisas = $this->db->get_where('transaksi', ['id' => $id])->row_array()['dibayar'];

		$data['dibayar'] = (int)$sisas + (int)$dibayar;
		$data['sisa'] = $sisa;
		$data['status'] = $status;

		$exe = $this->db->where('id', $id);
		$exe = $this->db->update('transaksi', $data);

		return $exe;
	}

	public function update($produk, $dibeli)
	{
		$stok = $this->db->get_where('produk', ['kode_produk' => $produk])->row_array()['stok'];
		$stok = (int)$stok - (int)$dibeli;
		
		$exe = $this->db->where('kode_produk', $produk);
		$exe = $this->db->set('stok', $stok);
		$exe = $this->db->update('produk');

		return $exe;
	}

	public function delete($id)
	{
		$exe = $this->db->where('id', $id);
		$exe = $this->db->delete('transaksi');

		return $exe;
	}

}

/* End of file TransaksiModel.php */
/* Location: ./application/models/TransaksiModel.php */