<?php

class Mahasiswa extends CI_Model{
    private $_table = "mahasiswa";
    public function register($data){      
        // Insert user
        return $this->db->insert($this->_table, $data);
    }

    function login($email, $password) {		
		$where = array(
            'EMAIL_MHS' => $email,
            'PASSWORD_MHS' => $password
            );
            $query = $this->db->get_where($this->_table, $where);
            if($query) {
                return $query->row();
            }
        return false;
	}	
}