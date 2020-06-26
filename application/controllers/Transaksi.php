<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
   	
   	function __construct()
    {
        parent::__construct();
        $this->load->model('transaksiModel', 'model');
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['allData'] = $this->model->getData();
        $data['produk'] = $this->model->getProduk();
        $this->load->view('transaksi', $data);
    }

    public function detail($id)
    {
    	$data['title'] = 'Transaksi Detail';
        $data['allData'] = $this->model->getData($id);
        $this->load->view('transaksi_ubah', $data);	
    }

    public function tambah()
    {
    	$produk = $this->input->post('produk');
    	$produk = explode('|', $produk)[0];

    	$dibeli = $this->input->post('dibeli');
    	$total = $this->input->post('total');
    	$dibayar = $this->input->post('dibayar');
    	$sisa = $this->input->post('sisa');
    	$status = ($sisa == 0) ? 'Lunas' : 'Belum Lunas';

    	$exe = $this->model->tambah($produk, $dibeli, $total, $dibayar, $sisa, $status);

    	echo "<script>alert('Transaksi Berhasil')</script>";
    	
    	redirect('transaksi','refresh');
    }

    public function ubah($id)
    {
    	$dibayar = $this->input->post('dibayar');
    	$sisa = $this->input->post('sisa');
    	$status = ($sisa == 0) ? 'Lunas' : 'Belum Lunas';

    	$exe = $this->model->ubah($id, $dibayar, $sisa, $status);

    	echo "<script>alert('Transaksi Berhasil')</script>";
    	
    	redirect('transaksi','refresh');
    }

    public function delete($id)
    {
    	$exe = $this->model->delete($id);

    	echo "<script>alert('Transaksi Dihapus!')</script>";

    	redirect('transaksi','refresh');
    }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */