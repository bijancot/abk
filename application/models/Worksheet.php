<?php

class Worksheet extends CI_Model{
    public function getAll(){
        return $this->db->where('deleted_at is NULL', NULL, TRUE)->order_by('ID_WS', 'asc')->get("worksheet")->result();
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
            SELECT * FROM worksheet_mahasiswa WHERE ID_WS = '".$param['ID_WS']."' AND STATUS_WSM IS NOT NULL
        ")->result();
    }
    public function get_mahasiswaDetail($param){  
        return $this->db->get_where('worksheet_mahasiswa', ['ID_WSM' => $param['ID_WSM']])->row();
    }
    public function insert($param){
        $this->db->insert('worksheet', $param);
        return $this->db->insert_id();
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
    public function get_mc($param){
        return $this->db->get_where('multiple_choice', ['ID_MC' => $param['ID_MC']])->row();
    }
    public function get_mcRes($param){
        return $this->db->query("
            SELECT *
            FROM multiple_choice_result mcr 
            WHERE 
                mcr.ID_MC = ".$param['ID_MC']."
                AND mcr.ID_WSMD IN (
                    SELECT wmd.ID_WSMD 
                    FROM worksheet_mahasiswa_detail wmd 
                    WHERE wmd.ID_WSM = ".$param['ID_WSM']."
                    ORDER by wmd.created_at DESC
                )
            ORDER BY mcr.created_at DESC 
            LIMIT 1        
        ")->row();
    }
    public function insert_mcRes($param){
        $this->db->insert('multiple_choice_result', $param);
    }
    
    public function get_ms($param){
        return $this->db->get_where('missing_sentence', ['ID_MS' => $param['ID_MS']])->row();
    }
    public function get_msRes($param){
        return $this->db->query("
            SELECT *
            FROM missing_sentence_result msr
            WHERE 
                msr.ID_MS = ".$param['ID_MS']."
                AND msr.ID_WSMD IN (
                    SELECT wmd.ID_WSMD 
                    FROM worksheet_mahasiswa_detail wmd 
                    WHERE wmd.ID_WSM = ".$param['ID_WSM']."
                    ORDER by wmd.created_at DESC
                )
            ORDER BY msr.created_at DESC 
            LIMIT 1        
        ")->row();
    }
    public function insert_msRes($param){
        $this->db->insert('missing_sentence_result', $param);
    }
    public function get_mat($param){
        return $this->db->get_where('matching', ['ID_MAT' => $param['ID_MAT']])->row();
    }
    public function get_matAllRes($param){
        return $this->db->query("
            SELECT 
                m.KUNCIJAWABAN_MAT 
            FROM 
                worksheet_detail wd ,
                matching m 
            WHERE wd.ID_WS = '".$param['ID_WS']."' AND m.ID_WSD = wd.ID_WSD     
        ")->result();
    }
    public function get_matRes($param){
        return $this->db->query("
            SELECT *
            FROM matching_result mr
            WHERE 
                mr.ID_MAT = ".$param['ID_MAT']."
                AND mr.ID_WSMD IN (
                    SELECT wmd.ID_WSMD 
                    FROM worksheet_mahasiswa_detail wmd 
                    WHERE wmd.ID_WSM = ".$param['ID_WSM']."
                    ORDER by wmd.created_at DESC
                )
            ORDER BY mr.created_at DESC 
            LIMIT 1        
        ")->row();
    }
    public function insert_matRes($param){
        $this->db->insert('matching_result', $param);
    }
    public function get_tf($param){
        return $this->db->get_where('truefalse', ['ID_TF' => $param['ID_TF']])->row();
    }
    public function get_tfRes($param){
        return $this->db->query("
            SELECT *
            FROM truefalse_result tfr
            WHERE 
                tfr.ID_TF = ".$param['ID_TF']."
                AND tfr.ID_WSMD IN (
                    SELECT wmd.ID_WSMD 
                    FROM worksheet_mahasiswa_detail wmd 
                    WHERE wmd.ID_WSM = ".$param['ID_WSM']."
                    ORDER by wmd.created_at DESC
                )
            ORDER BY tfr.created_at DESC 
            LIMIT 1        
        ")->row();
    }
    public function insert_tfRes($param){
        $this->db->insert('truefalse_result', $param);
    }
    public function checkPosition($param){
        return $this->db->query("
            SELECT * FROM worksheet WHERE POSITION_WS = '".$param['POSITION_WS']."' AND deleted_at IS NULL
        ")->row();
    }
}