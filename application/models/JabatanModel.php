<?php

class JabatanModel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('jabatan')->result_array();
    }
    public function tambah($data)
    {
        return $this->db->insert('jabatan', $data);
    }
    public function hapus($id)
    {
        return $this->db->delete('jabatan', ['id_jabatan' => $id]);
    }
    public function getById($id)
    {
        return $this->db->get_where('jabatan', ['id_jabatan' => $id])->row_array();
    }
    public function ubah($data, $id)
    {
        return $this->db->where('id_jabatan', $id)->update('jabatan', $data);
    }
}
