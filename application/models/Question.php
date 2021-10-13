<?php

class Question extends CI_Model{
    public function getAll(){
        return $this->db->get("v_worksheet")->result();
    }
    public function get(){

    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
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
    public function missing_insertBatch($param){
        $this->db->insert_batch('missing_sentence', $param);
    }
    public function missing_updateBatch($param){
        $this->db->update_batch('missing_sentence', $param, 'ID_MS');
    }
    public function matching_get($param){
        return $this->db->get_where('matching', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function matching_insertBatch($param){
        $this->db->insert_batch('matching', $param);
    }
    public function matching_updateBatch($param){
        $this->db->update_batch('matching', $param, 'ID_MAT');
    }
    public function truefalse_get($param){
        return $this->db->get_where('truefalse', ['ID_WSD' => $param['ID_WSD']])->row();
    }
    public function truefalse_insertBatch($param){
        $this->db->insert_batch('truefalse', $param);
    }
    public function truefalse_updateBatch($param){
        $this->db->update_batch('truefalse', $param, 'ID_TF');
    }
}