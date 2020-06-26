<?php


class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel', 'model');
    }
    public function index()
    {
        $data['title'] = 'Barang';
        $data['allData'] = $this->model->getData();
        $this->load->view('barang', $data);
    }
    public function tambah()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama' => $this->input->post('nama', true),
            'keterangan' => $this->input->post('keterangan', true),
            'harga_beli' => $this->input->post('harga_beli', true),
            'harga_jual' => $this->input->post('harga_jual', true),
            'stok' => $this->input->post('stok', true)
        ];
        $query = $this->model->tambah($data);
        if ($query) {
            echo "<script>alert('Berhasil Ditambahkan')</script>";
            redirect('barang', 'refresh');
        }
    }
    public function detail($id)
    {
        $data['dataID'] = $this->model->getById($id);
        $data['title'] = 'Ubah Pengguna';
        $this->load->view('barang_ubah', $data);
    }
    public function ubah($id)
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama' => $this->input->post('nama', true),
            'keterangan' => $this->input->post('keterangan', true),
            'harga_beli' => $this->input->post('harga_beli', true),
            'harga_jual' => $this->input->post('harga_jual', true),
            'stok' => $this->input->post('stok', true)
        ];
        $query = $this->model->ubah($data, $id);
        if ($query) {
            echo "<script>alert('Berhasil Diubah')</script>";
            redirect('barang', 'refresh');
        }
    }
    public function delete($id)
    {
        $query = $this->model->hapus($id);
        if ($query) {
            echo "<script>alert('Berhasil Dihapus')</script>";
            redirect('barang', 'refresh');
        }
    }
}
