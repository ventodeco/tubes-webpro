<?php

class Banner_model extends CI_Model 
{
    public function create($data)
    {
        $this->db->insert('banner', $data);
    }

    public function getAllBanner(){
        return $this->db->select('*')->get('banner')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('banner')
                          ->row();
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('banner', $data);
        return $query;
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('banner');
    }
}