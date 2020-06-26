<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
  	
  	function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel', 'model');
    }
    public function index()
    {
        $data['title'] = 'kategori';
        $data['allData'] = $this->model->getData();
        $this->load->view('kategori', $data);
    }
    public function detail($id)
    {
        $data['dataID'] = $this->model->getById($id);
        $data['title'] = 'Ubah Kategori';
        $this->load->view('kategori_ubah', $data);
    }
    public function ubah($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'keterangan' => $this->input->post('keterangan', true)
        ];
        $query = $this->model->ubah($data, $id);
        if ($query) {
            echo "<script>alert('Berhasil Diubah')</script>";
            redirect('kategori', 'refresh');
        }
    }
    public function tambah()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $query = $this->model->tambah($data);
        if ($query) {
            echo "<script>alert('Berhasil Ditambahkan')</script>";
            redirect('kategori', 'refresh');
        }
    }
    public function delete($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('kategori', 'refresh');
        }
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */