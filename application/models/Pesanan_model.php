<?php

class Pesanan_model extends CI_Model 
{
    public function create($data)
    {
        return $this->db->insert('pesanan', $data);
    }

    public function getAllPesanan(){
        return $this->db->select('*')->get('pesanan')->result();
    }

    public function getById($id){
        $query = $this->db->select('*')
                          ->where('id', $id)
                          ->get('pesanan')
                          ->row();
        return $query;
    }

    public function getLastData()
    {
        return $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("pesanan")->row();
    }
}