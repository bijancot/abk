<?php

class Mahasiswa extends CI_Model{
    public function register($data){      
        // Insert user
        return $this->db->insert('mahasiswa', $data);
    }
}