<?php

class Worksheet extends CI_Model{
    public function getAll(){
        return $this->db->query("
            SELECT w.*, COUNT(wd.ID_WSD) AS TOTAL_QUESTION
            FROM worksheet w
            LEFT JOIN worksheet_detail wd ON wd.ID_WS = w.ID_WS 
            WHERE w.deleted_at IS NULL
        ")->result();
    }
    public function get(){

    }
    public function insert($param){
        $this->db->insert('worksheet', $param);
    }
}