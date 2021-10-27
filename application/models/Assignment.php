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
        $sql = "SELECT w.* FROM worksheet w 
        WHERE ISPUBLISHED_WS = 1 
        AND deleted_at IS NULL
        ORDER BY w.ID_WS ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getWsAttemp(){
        $sql = "SELECT * FROM worksheet_mahasiswa wm , worksheet_mahasiswa_detail wmd 
        WHERE wm.ID_WSM = wmd.ID_WSM 
        AND STATUS_WSM != 0
        ORDER BY wm.ID_WS ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function getScore($param){
        $sql = "SELECT wm.SCOREFINAL_WSM, wm.STATUS_WSM, wm.NPM_MHS FROM worksheet_mahasiswa wm , mahasiswa m 
        WHERE wm.NPM_MHS = m.NPM_MHS AND wm.ID_WS = $param";
        return $this->db->query($sql)->result();
    }
    public function getStudentScore($param){
        $sql = "SELECT wm.ID_WS, wm.SCOREFINAL_WSM, wm.STATUS_WSM, wm.NPM_MHS FROM worksheet_mahasiswa wm , mahasiswa m 
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
    public function getAttempts($npm_mhs, $id_ws) {
        $sql = "SELECT * FROM worksheet w
        LEFT JOIN worksheet_mahasiswa wm on w.ID_WS = wm.ID_WS
        LEFT JOIN worksheet_mahasiswa_detail wmd on wm.ID_WSM = wmd.ID_WSM
        WHERE w.ISPUBLISHED_WS = 1
          and w.deleted_at is null
          and wm.NPM_MHS = $npm_mhs
          and w.ID_WS = $id_ws
        ORDER BY wmd.created_at DESC";
        return $this->db->query($sql)->result();
    }
    public function getLatestAtt($npm_mhs, $id_ws) {
        $sql = "SELECT wmd.created_at as latest FROM worksheet w
        LEFT JOIN worksheet_mahasiswa wm on w.ID_WS = wm.ID_WS
        LEFT JOIN worksheet_mahasiswa_detail wmd on wm.ID_WSM = wmd.ID_WSM
        WHERE w.ISPUBLISHED_WS = 1
          and w.deleted_at is null
          and wm.NPM_MHS = $npm_mhs
          and w.ID_WS = $id_ws
        ORDER BY wmd.created_at DESC";
        return $this->db->query($sql)->first_row()->latest;
    }
    public function getES($npm_mhs, $id_ws) {
        $sql = "SELECT *
        FROM essay e
        LEFT JOIN essay_result er on e.ID_ES = er.ID_ES
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws";
        return $this->db->query($sql)->row();
    }
    public function getAnswerES($id_ws, $npm_mhs, $created_at) {
        $sql = "SELECT *
        FROM essay e
        LEFT JOIN essay_result er on e.ID_ES = er.ID_ES
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws and wmd.created_at = '$created_at'";
        return $this->db->query($sql)->result();
    }
    public function getAnswerMC($id_ws, $npm_mhs, $created_at) {
        $sql = "SELECT *
        FROM multiple_choice e
        LEFT JOIN multiple_choice_result er on e.ID_MC = er.ID_MC
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws and wmd.created_at = '$created_at'";
        return $this->db->query($sql)->result();
    }
    public function getAnswerMAT($id_ws, $npm_mhs, $created_at) {
        $sql = "SELECT *
        FROM matching e
        LEFT JOIN matching_result er on e.ID_MAT = er.ID_MAT
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws and wmd.created_at = '$created_at'";
        return $this->db->query($sql)->result();
    }
    public function getAnswerTF($id_ws, $npm_mhs, $created_at) {
        $sql = "SELECT *
        FROM truefalse e
        LEFT JOIN truefalse_result er on e.ID_TF = er.ID_TF
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws and wmd.created_at = '$created_at'";
        return $this->db->query($sql)->result();
    }
    public function getAnswerMS($id_ws, $npm_mhs, $created_at) {
        $sql = "SELECT *
        FROM missing_sentence e
        LEFT JOIN missing_sentence_result er on e.ID_MS = er.ID_MS
        LEFT JOIN worksheet_mahasiswa_detail wmd on er.ID_WSMD = wmd.ID_WSMD
        LEFT JOIN worksheet_mahasiswa wm on wmd.ID_WSM = wm.ID_WSM
        LEFT JOIN worksheet w on wm.ID_WS = w.ID_WS
        WHERE wm.NPM_MHS = $npm_mhs and wm.ID_WS = $id_ws and wmd.created_at = '$created_at'";
        return $this->db->query($sql)->result();
    }
    public function getTotalAttempt($id_ws, $npm_mhs) {
        $sql = "SELECT COUNT(wmd.ID_WSMD) as TOTAL
        FROM worksheet_mahasiswa wm, worksheet_mahasiswa_detail wmd 
        WHERE wm.NPM_MHS = $npm_mhs AND 
        wm.ID_WS = $id_ws AND wm.ID_WSM = wmd.ID_WSM";
        return $this->db->query($sql)->row()->TOTAL;     
    }
    public function getTotalFailed($id_ws, $npm_mhs) {   
        $sql = "SELECT COUNT(wmd.ID_WSMD) as TOTAL
        FROM worksheet_mahasiswa wm, worksheet_mahasiswa_detail wmd 
        WHERE wm.NPM_MHS = $npm_mhs AND 
        wm.ID_WS = $id_ws AND wm.ID_WSM = wmd.ID_WSM AND wmd.STATUS_WSMD = 2";
        return $this->db->query($sql)->row()->TOTAL;     
    }

    public function updateWSMD($data, $param) {
        return $this->db->where('ID_WSMD', $param)->update('worksheet_mahasiswa_detail', $data);
    }
    public function updateWSM($data, $param) {
        return $this->db->where('ID_WSM', $param)->update('worksheet_mahasiswa', $data);
    }
}