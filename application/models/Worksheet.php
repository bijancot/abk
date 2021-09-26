<?php

class Worksheet extends CI_Model{
    public function getAll(){
        return $this->db->get("v_worksheet")->result();
    }
    public function get(){

    }
    public function insert($param){
        $this->db->insert('worksheet', $param);
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
}