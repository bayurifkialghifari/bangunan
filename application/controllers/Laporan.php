<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		
		$this->load->library('pdf');
        $this->load->model('laporanModel', 'model');
    }
    public function produk()
    {
        $data['title'] = 'Laporan Produk';
        $data['allData'] = $this->model->getDataProduk();
        $this->load->view('laporan-produk', $data);
    }

    public function eproduk()
    {
    	$dari = $this->input->get('dari');
    	$sampai = $this->input->get('sampai');
    	$data['records'] = $this->model->getDataProdukDetail($dari, $sampai);

		// Config PDF
		$config['html'] = 'pdf/produk';
		$config['data'] = $data;
		$config['filename'] = 'LAPORAN_PRODUK_' . date('y-m-d');

		$this->pdf->render($config);
    }


    public function penjualan()
    {
        $data['title'] = 'Laporan Penjualan';
        $data['allData'] = $this->model->getDataPenjualan();
        $this->load->view('laporan-penjualan', $data);
    }

    public function epenjualan()
    {
    	$dari = $this->input->get('dari');
    	$sampai = $this->input->get('sampai');
    	$data['records'] = $this->model->getDataPenjualanDetail($dari, $sampai);

		// Config PDF
		$config['html'] = 'pdf/penjualan';
		$config['data'] = $data;
		$config['filename'] = 'LAPORAN_PENJUALAN_' . date('y-m-d');

		$this->pdf->render($config);
    }

    public function pembayaran()
    {
        $data['title'] = 'Laporan Pembayaran';
        $data['allData'] = $this->model->getDataPembayaran();
        $this->load->view('laporan-pembayaran', $data);
    }

    public function epembayaran()
    {
    	$dari = $this->input->get('dari');
    	$sampai = $this->input->get('sampai');
    	$data['records'] = $this->model->getDataPembayaranDetail($dari, $sampai);

		// Config PDF
		$config['html'] = 'pdf/pembayaran';
		$config['data'] = $data;
		$config['filename'] = 'LAPORAN_PEMBAYARAN_' . date('y-m-d');

		$this->pdf->render($config);
    }

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */