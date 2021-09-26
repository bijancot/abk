<?php

class Student extends CI_Model{
    public function getAll(){
        return $this->db->get("mahasiswa")->result();
    }
    public function get($param){
        return $this->db->where($param['filter'])->get('mahasiswa')->result();
    }
    public function insert($param){
        $this->db->insert('student', $param);
    }
    public function update($param){
        $this->db->where('NPM_MHS', $param['NPM_MHS'])->update('mahasiswa', $param);
    }
}