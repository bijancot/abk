<?php

class Course extends CI_Model {
    public function getAll(){
        return $this->db->get_where("worksheet", array("ISPUBLISHED_WS" => 1, "deleted_at =" => null))->result();
    }
    public function getQuestionbyID($param) {
        return $this->db->get_where("v_worksheet_detail", array("ID_WS" => $param))->result();
    }
}