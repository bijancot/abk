<?php

class Question extends CI_Model{
    public function getAll(){
        return $this->db->get("v_worksheet")->result();
    }
    public function get(){

    }
    public function essay_insert($param){
        $this->db->insert('essay', $param);
    }
    public function multiple_insert($param){
        $this->db->insert('multiple_choice', $param);
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
    
}