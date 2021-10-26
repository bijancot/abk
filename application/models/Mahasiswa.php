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
    public function checkEmailisExist($param) {
        $query = $this->db->get_where('mahasiswa', $param)->num_rows();
        return ($query > 0) ? TRUE : FALSE;
    }
    public function updateToken($param, $data) {
        $this->db->where('EMAIL_MHS', $param);
        $this->db->update('mahasiswa', $data);
    }
    public function checkTokenisExist($param) {
        $query = $this->db->get_where('mahasiswa', $param)->num_rows();
        return ($query > 0) ? TRUE : FALSE;
    }
    public function checkTokenisValid($param) {
        $this->db->where('DATE(TOKEN_EXPIRE_DATE) >=', $param['TOKEN_EXPIRE_DATE']);
        $this->db->where('RESET_TOKEN', $param['RESET_TOKEN']);
        $query = $this->db->get('mahasiswa')->num_rows();
        return ($query > 0) ? TRUE : FALSE;
    }
    public function resetPassword($param, $data) {
        $this->db->where($param);
        $this->db->update('mahasiswa', $data);
    }
    public function resetToken($param) {
        $this->db->where($param);
        $this->db->update('mahasiswa', ['RESET_TOKEN' => null, 'TOKEN_EXPIRE_DATE' => null]);
    }
}