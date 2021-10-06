<?php

class Worksheet extends CI_Model{
    public function getAll(){
        return $this->db->order_by('POSITION_WS', 'asc')->get("worksheet")->result();
    }
    public function get($param){
        return $this->db->where('ID_WS', $param['ID_WS'])->get("worksheet")->row();
    }
    public function get_detail($param){
        return $this->db->query("
            SELECT * FROM worksheet_detail WHERE ID_WS = '".$param['ID_WS']."' AND deleted_at IS NULL
        ")->result();
    }
    public function get_detailQuestion($param){
        return $this->db->where('ID_WS', $param['ID_WS'])->get('v_worksheet_question')->result();
    }
    public function get_mahasiswa($param){
        return $this->db->query("
            SELECT * FROM worksheet_mahasiswa WHERE ID_WS = '".$param['ID_WS']."'
        ")->result();
    }
    public function insert($param){
        $this->db->insert('worksheet', $param);
    }
    public function insert_detail($param){
        $this->db->insert('worksheet_detail', $param);
        return $this->db->insert_id();
    }
    public function update($param){
        $this->db->where('ID_WS', $param['ID_WS'])->update('worksheet', $param);
    }
    public function update_mahasiswa($param){
        $this->db->where('ID_WSM', $param['ID_WSM'])->update('worksheet_mahasiswa', $param);
    }
    public function update_Detail($param){
        $this->db->where('ID_WSD', $param['ID_WSD'])->update('worksheet_detail', $param);
    }
    public function insert_wsmd($param){
        $this->db->insert('worksheet_mahasiswa_detail', $param);
        return $this->db->insert_id();
    }
    public function get_essRes($param){
        return $this->db->query("
            SELECT *
            FROM essay_result er 
            WHERE 
                er.ID_ES = ".$param['ID_ES']."
                AND er.ID_WSMD IN (
                    SELECT wmd.ID_WSMD 
                    FROM worksheet_mahasiswa_detail wmd 
                    WHERE wmd.ID_WSM = ".$param['ID_WSM']."
                    ORDER by wmd.created_at DESC
                )
            ORDER BY er.created_at DESC 
            LIMIT 1        
        ")->row();
    }
    public function insert_essRes($param){
        $this->db->insert('essay_result', $param);
    }
    public function checkPosition($param){
        return $this->db->query("
            SELECT * FROM worksheet WHERE POSITION_WS = '".$param['POSITION_WS']."' AND deleted_at IS NULL
        ")->row();
    }
}