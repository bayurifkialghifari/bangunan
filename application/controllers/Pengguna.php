<?php

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('penggunaModel', 'model');
    }
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['allData'] = $this->model->getData();
        $this->load->view('pengguna', $data);
    }
    public function detail($id)
    {
        $data['dataID'] = $this->model->getById($id);
        $data['title'] = 'Ubah Pengguna';
        $this->load->view('pengguna_ubah', $data);
    }
    public function ubah($id)
    {
        $data = [
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'username' => $this->input->post('username', true),
            'nama' => $this->input->post('nama', true),
            'nomor_hp' => $this->input->post('nomor_hp', true)
        ];
        $query = $this->model->ubah($data, $id);
        if ($query) {
            echo "<script>alert('Berhasil Diubah')</script>";
            redirect('pengguna', 'refresh');
        }
    }
    public function tambah()
    {
        $data = [
            'id_jabatan' => $this->input->post('id_jabatan', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama', true),
            'nomor_hp' => $this->input->post('nomor_hp', true)
        ];
        $query = $this->model->tambah($data);
        if ($query) {
            echo "<script>alert('Berhasil Ditambahkan')</script>";
            redirect('pengguna', 'refresh');
        }
    }
    public function delete($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('pengguna', 'refresh');
        }
    }
}
