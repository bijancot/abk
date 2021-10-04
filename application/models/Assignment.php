<?php

class Assignment extends CI_Model{
    public function getAll(){
        $this->db->order_by('NPM_MHS');
        return $this->db->get("mahasiswa")->result();
    }
    public function get($param){
        return $this->db->where($param['filter'])->get('worksheet_mahasiswa')->result();
    }
    public function getMhs($param){
        return $this->db->where($param['filter'])->get('mahasiswa')->result();
    }
    public function getWs($param){
        return $this->db->where($param['filter'])->get('worksheet')->result();
    }
    public function insert($param){
        $this->db->insert('student', $param);
    }
    public function update($param){
        $this->db->where('NPM_MHS', $param['NPM_MHS'])->update('mahasiswa', $param);
    }
    public function getCountWs(){
        $sql = "SELECT COUNT(ID_WS) as C_WS FROM worksheet WHERE ISPUBLISHED_WS = 1";
        $result = $this->db->query($sql);
        return $result->row()->C_WS;
    }
    public function getScore($param){
        $sql = "SELECT wm.NILAI_WSM, wm.CATATAN_WSM, wm.STATUS_WSM,wm.NPM_MHS FROM worksheet_mahasiswa wm , mahasiswa m 
        WHERE wm.NPM_MHS = m.NPM_MHS AND wm.ID_WS = $param";
        return $this->db->query($sql)->result();
    }
    public function getStudentScore($param){
        $sql = "SELECT wm.ID_WS, wm.NILAI_WSM, wm.CATATAN_WSM, wm.STATUS_WSM,wm.NPM_MHS FROM worksheet_mahasiswa wm , mahasiswa m 
        WHERE wm.NPM_MHS = m.NPM_MHS 
        AND wm.NPM_MHS = $param";
        return $this->db->query($sql)->result();
    }
    public function getQuestionES($param){
        $sql = "SELECT e2.SOAL_ES as SOAL, w.NAMA_WS, w.TYPEQUESTION_WS,e2.GRADE_ES FROM worksheet w , worksheet_detail wd, essay e2 
        WHERE w.ID_WS = wd.ID_WS 
        AND wd.ID_WSD = e2.ID_WSD 
        AND w.ID_WS = $param";
        return $this->db->query($sql)->result();
    }
    public function getQuestionMC($param){
        $sql = "SELECT mc.SOAL_MC as SOAL, w.NAMA_WS, w.TYPEQUESTION_WS FROM worksheet w , worksheet_detail wd, multiple_choice mc 
        WHERE w.ID_WS = wd.ID_WS 
        AND wd.ID_WSD = mc.ID_WSD 
        AND w.ID_WS = $param";
        return $this->db->query($sql)->result();
    }
    public function getQuestionMS($param){
        $sql = "SELECT ms.SOAL_MS as SOAL, w.NAMA_WS, w.TYPEQUESTION_WS FROM worksheet w , worksheet_detail wd, missing_sentence ms
        WHERE w.ID_WS = wd.ID_WS 
        AND wd.ID_WSD = ms.ID_WSD 
        AND w.ID_WS = $param";
        return $this->db->query($sql)->result();
    }
}