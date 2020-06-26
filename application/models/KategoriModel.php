<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {

 	public function getData()
    {
        return $this->db->get('kategori')->result_array();
    }
    public function tambah($data)
    {
        return $this->db->insert('kategori', $data);
    }
    public function hapus($id)
    {
        return $this->db->delete('kategori', ['id_kategori' => $id]);
    }
    public function getById($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }
    public function ubah($data, $id)
    {
        return $this->db->where('id_kategori', $id)->update('kategori', $data);
    }	

}

/* End of file KategoriModel.php */
/* Location: ./application/models/KategoriModel.php */