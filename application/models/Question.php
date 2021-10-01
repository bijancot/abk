<?php

class Question extends CI_Model{
    public function getAll(){
        return $this->db->get("v_worksheet")->result();
    }
    public function get(){

    }
    public function essay_get($param){
        return $this->db->get_where('essay', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function essay_insert($param){
        $this->db->insert('essay', $param);
    }
    public function essay_update($param){
        $this->db->where('ID_ES', $param['ID_ES'])->update('essay', $param);
    }
    public function multiple_get($param){
        return $this->db->get_where('multiple_choice', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function multiple_insert($param){
        $this->db->insert('multiple_choice', $param);
    }
    public function multiple_update($param){
        $this->db->where('ID_MC', $param['ID_MC'])->update('multiple_choice', $param);
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
    
}