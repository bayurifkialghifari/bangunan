<?php

class PenggunaModel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('pengguna')->result_array();
    }
    public function tambah($data)
    {
        return $this->db->insert('pengguna', $data);
    }
    public function hapus($id)
    {
        return $this->db->delete('pengguna', ['id_pengguna' => $id]);
    }
    public function getById($id)
    {
        return $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();
    }
    public function ubah($data, $id)
    {
        return $this->db->where('id_pengguna', $id)->update('pengguna', $data);
    }
}
