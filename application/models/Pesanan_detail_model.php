<?php

class Pesanan_detail_model extends CI_Model 
{
    public function create($data)
    {
        return $this->db->insert('pesanan_detail', $data);
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

    public function getLastData()
    {
        return $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("pesanan_detail")->row();
    }

    public function getByPesananId($pesananId)
    {
        return $this->db->select('*')
                ->where('pesanan_id', $pesananId)
                ->order_by('id',"DESC")
                ->get('pesanan_detail')
                ->row();
    }
}