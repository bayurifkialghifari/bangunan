<?php

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('JabatanModel', 'model');
    }
    public function index()
    {
        $data['title'] = 'Jabatan';
        $data['allData'] = $this->model->getData();
        $this->load->view('jabatan', $data);
    }
    public function detail($id)
    {
        $data['dataID'] = $this->model->getById($id);
        $data['title'] = 'Ubah Jabatan';
        $this->load->view('jabatan_ubah', $data);
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
            redirect('jabatan', 'refresh');
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
            redirect('jabatan', 'refresh');
        }
    }
    public function delete($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('jabatan', 'refresh');
        }
    }
}
