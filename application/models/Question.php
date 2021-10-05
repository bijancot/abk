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
    public function essay_insertBatch($param){
        $this->db->insert_batch('essay', $param);
    }
    public function essay_updateBatch($param){
        $this->db->update_batch('essay', $param, 'ID_ES');
    }
    public function multiple_get($param){
        return $this->db->get_where('multiple_choice', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function multiple_insertBatch($param){
        $this->db->insert_batch('multiple_choice', $param);
    }
    public function multiple_updateBatch($param){
        $this->db->update_batch('multiple_choice', $param, 'ID_MC');
    }
    public function missing_get($param){
        return $this->db->get_where('missing_sentence', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function missing_insert($param){
        $this->db->insert('missing_sentence', $param);
    }
    public function missing_update($param){
        $this->db->where('ID_MS', $param['ID_MS'])->update('missing_sentence', $param);
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
    
}