<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardKasir extends CI_Controller
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
        $data['title'] = 'Dashboard Kasir';
        $data['jual'] = $this->db->query('SELECT SUM(dibayar) as dibayar FROM transaksi')->row_array()['dibayar'];
        $data['hutang'] = $this->db->query('SELECT SUM(sisa) as hutang FROM transaksi')->row_array()['hutang'];
        $this->load->view('dashboard-kasir', $data);
    }
}