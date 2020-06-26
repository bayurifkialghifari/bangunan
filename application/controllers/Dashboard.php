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
		$this->load->view('dashboard', $data);
	}
}
