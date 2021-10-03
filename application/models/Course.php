<?php

class Course extends CI_Model {
    public function getAll(){
        return $this->db->order_by('POSITION_WS', 'asc')->where('ISPUBLISHED_WS', 1)->get("worksheet")->result();
    }
    public function getWsDetail($param) {
        return $this->db->where('ID_WS', $param)->get("worksheet_detail")->result();
    }
}