<?php

class Course extends CI_Model {
    public function getAll($email){
        return $this->db->query("
            SELECT 
                w.*,
                wm.ID_WSM ,
                wm.EMAIL_MHS ,
                wm.STATUS_WSM,
                wm.SCOREFINAL_WSM
            FROM worksheet w 
            LEFT JOIN worksheet_mahasiswa wm on wm.ID_WS = w.ID_WS 
            WHERE 
                w.ISPUBLISHED_WS = '1'
                AND deleted_at IS NULL 
                AND wm.EMAIL_MHS = '$email'
            ORDER BY w.POSITION_WS asc
        ")->result();
    }
    public function getQuestionbyID($param) {
        return $this->db->get_where("v_worksheet_detail", array("ID_WS" => $param))->result();
    }
    public function insertBatch($param) {
        $this->db->insert_batch('essay_result', $param);
    }
    public function insertWM($param) {
        $this->db->insert('worksheet_mahasiswa', $param);
        return $this->db->insert_id();
    }
}