<?php

class Video extends CI_Model{
    public function getAll(){
        return $this->db->where('deleted_at is NULL', NULL, TRUE)->get("video")->result();
    }
    public function get($param){
        return $this->db->where($param['filter'])->get('video')->result();
    }
    public function insert($param){
        $this->db->insert('video', $param);
    }
    public function update($param){
        $this->db->where('ID_VD', $param['ID_VD'])->update('video', $param);
    }
}