<?php

class Konfirmasi_pembayaran_model extends CI_Model 
{
    public function create($data)
    {
        $this->db->insert('konfirmasi_pembayaran', $data);
    }
}