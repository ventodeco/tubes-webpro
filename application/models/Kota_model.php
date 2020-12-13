<?php

class Kota_model extends CI_Model 
{
    public function create($data)
    {
        $this->db->insert('kota', $data);
    }

    public function getAllKota(){
        return $this->db->select('*')->get('kota')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('kota')
                          ->row();
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('kota', $data);
        return $query;
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kota');
    }
}