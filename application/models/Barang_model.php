<?php

class Barang_model extends CI_Model 
{
    public function create($data)
    {
        $this->db->insert('barang', $data);
    }

    public function getAllBarang(){
        return $this->db->select('*')->get('barang')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('barang')
                          ->row();
        return $query;
    }

    public function getByCategory($idCategory)
    {
        if ($idCategory == 0) {
            $query = $this->db->select('*')->get('barang')->result();
        } else {
            $query = $this->db->select('*')
                              ->where('category_id', $idCategory)
                              ->get('barang')
                              ->result();
        }

        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('barang', $data);
        return $query;
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }
}