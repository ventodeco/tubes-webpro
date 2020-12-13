<?php

class Category_model extends CI_Model {

    public function create($data)
    {
        $this->db->insert('category', $data);
    }

    public function getAllCategory(){
        return $this->db->select('*')->get('category')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('category')
                          ->row();
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('category', $data);
        return $query;
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
    }
}