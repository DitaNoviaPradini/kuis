<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function list()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('kategori', $data);
        return $result;
    }

    public function show($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('kategori');
        return $query->row();
    }

    public function update($id_kategori, $data = [])
    {
        // TODO: set data yang akan di update
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
        return result;
    }

    public function delete($id_kategori)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
}