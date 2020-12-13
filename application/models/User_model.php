<?php

class User_model extends CI_Model 
{
    public function create($data)
    {
        $this->db->insert('user', $data);
    }

    public function login($email, $password){

        $query = $this->db->select('*')
                          ->where('email', $email)
                          ->get('user');
        $row = $query->row();
        
        if($this->password->verify($password, $row->password)){
                return $row;
        }else{
                return false;
        }
    }
}