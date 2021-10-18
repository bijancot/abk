<?php

class Dashboard extends CI_Model {
    public function studentTotal() {
        $this->db->select("count(*) as total");
        return $this->db->from('mahasiswa')->get()->row();
    }
    public function studentVTotal() {
        $this->db->select("count(*) as total");
        $this->db->where('ISVERIF_MHS', 1);
        return $this->db->from('mahasiswa')->get()->row();
    }
    public function worksheetTotal() {
        $this->db->select("count(*) as total");
        $this->db->where('deleted_at', null);
        return $this->db->from('worksheet')->get()->row();
    }
    public function worksheetPTotal() {
        $this->db->select("count(*) as total");
        $this->db->where('ISPUBLISHED_WS', 1);
        return $this->db->from('worksheet')->get()->row();
    }
    public function studentActivity() {
        $this->db->select("count(ID_WSMD) as total, MONTHNAME(created_at) as month");
        $this->db->where('YEAR(created_at) = YEAR(CURRENT_DATE())');
        $this->db->group_by('MONTHNAME(created_at)');
        $this->db->order_by('created_at ASC');
        return $this->db->from('worksheet_mahasiswa_detail')->get()->result();
    }
    public function studentStatus() {
        $this->db->select("COUNT(ID_WSM) as total, STATUS_WSM as status");
        $this->db->from('worksheet w');
        $this->db->join('worksheet_mahasiswa wm', 'w.ID_WS = wm.ID_WS');
        $this->db->where('w.ISPUBLISHED_WS = 1 AND w.deleted_at is null');
        $this->db->group_by('STATUS_WSM');
        return $this->db->get()->result();
    }
    public function passRates() {
        $this->db->select("NAMA_WS, COUNT(STATUS_WSM) as TOTAL, STATUS_WSM");
        $this->db->from('worksheet w');
        $this->db->join('worksheet_mahasiswa wm', 'w.ID_WS = wm.ID_WS', 'left');
        $this->db->where('w.ISPUBLISHED_WS = 1 AND w.deleted_at is null AND STATUS_WSM = 2 or STATUS_WSM = 3');
        $this->db->group_by('w.ID_WS, STATUS_WSM');
        return $this->db->get()->result();
    }
    public function studentRanking() {
        $this->db->select("NAMA_MHS, SUM(SCOREFINAL_WSM) as TOTAL");
        $this->db->from('mahasiswa m');
        $this->db->join('worksheet_mahasiswa wm', 'm.EMAIL_MHS = wm.EMAIL_MHS', 'left');
        $this->db->group_by('NAMA_MHS');
        $this->db->order_by('TOTAL DESC');
        return $this->db->get()->result();
    }
}