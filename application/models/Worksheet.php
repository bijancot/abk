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
    public function update_Detail($param){
        $this->db->where('ID_WSD', $param['ID_WSD'])->update('worksheet_detail', $param);
    }
    public function checkPosition($param){
        return $this->db->query("
            SELECT * FROM worksheet WHERE POSITION_WS = '".$param['POSITION_WS']."' AND deleted_at IS NULL
        ")->row();
    }
}