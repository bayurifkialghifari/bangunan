<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == false) {
			redirect('login', 'refresh');
		}
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jual'] = $this->db->query('SELECT SUM(dibayar) as dibayar FROM transaksi')->row_array()['dibayar'];
        $data['hutang'] = $this->db->query('SELECT SUM(sisa) as hutang FROM transaksi')->row_array()['hutang'];
        $data['total_barang'] = $this->db->get('produk')->num_rows();
        $data['total_stok'] = $this->db->query('SELECT SUM(stok) as total_stok FROM produk')->row_array();
		$this->load->view('dashboard', $data);
	}
}
