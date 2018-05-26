<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function list($limit, $start, $search)
    {        
        $this->db->select('*');
        $this->db->join('kategori', 'barang.id_kategori=kategori.id_kategori');

        if($search != 'NIL'){
            $this->db->like('nama', $search);
        }

        $query = $this->db->get('barang',$limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('barang', $data);
        return $result;
    }

    public function getTotal($search)
    {
        $this->db->select('*');
        $this->db->join('kategori', 'barang.id_kategori=kategori.id_kategori');
        if($search != 'NIL'){
            $this->db->like('nama', $search);
        }
        return $this->db->count_all_results('barang');
    }

    public function show($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang'); 
        $this->db->join('kategori', 'barang.id_kategori=kategori.id_kategori');
        $this->db->where('id_barang',$id_barang);     
        $query = $this->db->get();
        return $query->row();
    }

    public function update($id_barang, $data = [])
    {
        // TODO: set data yang akan di update
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        return result;
    }
    
    public function delete($id_barang)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id_barang', $id_barang);

        $this->db->delete('barang');
    }
}

/* End of file ModelName.php */