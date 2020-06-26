<?php

class BarangModel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('produk')->result_array();
    }
    public function tambah($data)
    {
        return $this->db->insert('produk', $data);
    }
    public function hapus($id)
    {
        return $this->db->delete('produk', ['kode_produk' => $id]);
    }
    public function getById($id)
    {
        return $this->db->get_where('produk', ['kode_produk' => $id])->row_array();
    }
    public function ubah($data, $id)
    {
        return $this->db->where('kode_produk', $id)->update('produk', $data);
    }
}
