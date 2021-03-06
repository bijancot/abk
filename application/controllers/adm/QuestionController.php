<?php

class QuestionController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Question');
        $this->load->model('Worksheet');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }
    public function index($idWS){
        $data['title']              = 'Spageti - Manage Question';
        $data['navActive']          = 'worksheet';
        $data['idWS']               = $idWS;
        $data['worksheet']          = $this->Worksheet->get(['ID_WS' => $idWS]);
        $data['worksheetDetail']    = $this->Worksheet->get_detailQuestion(['ID_WS' => $idWS]);

        
        $this->template->admin('adm/worksheet/question', $data);
    }
    public function store(){
        $param = $_POST;
        $worksheetMhs = $this->Worksheet->get_mahasiswa($param);

        if($worksheetMhs != null){
            $this->session->set_flashdata('err', "Can't change the question because there is a transaction from the student!");
            redirect('admin/question/manage/'.$param['ID_WS']);
        }

        if($param['TIPE'] == "1"){
            $storeQuest = array();
            $file = $this->upload_pdf($param['ID_WS']);
            for($i = 0; $i < count($param['ESSAY_QUESTION']); $i++){
                if($param['ID_QUEST'][$i] == "kosong"){
                    $status = "insert";
                    // Insert WSD
                    $storeWSD['ID_WS'] = $param['ID_WS'];
                    $idWSD = $this->Worksheet->insert_detail($storeWSD);
    
                    $temp['ID_WSD']     = $idWSD;
                    $temp['SOAL_ES']    = $param['ESSAY_QUESTION'][$i];
                    $temp['GRADE_ES']   = $param['ESSAY_GRADE'][$i];
                    array_push($storeQuest, $temp);
                }else{
                    $status = "update";
                    $temp['ID_ES']      = $param['ID_QUEST'][$i];
                    $temp['SOAL_ES']    = $param['ESSAY_QUESTION'][$i];
                    $temp['GRADE_ES']   = $param['ESSAY_GRADE'][$i];
                    array_push($storeQuest, $temp);
                }
            }
            if($status == 'insert'){
                $this->Question->essay_insertBatch($storeQuest);
                $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'ISREADY_WS' => '1']);
                if($file != NULL){                    
                    $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'PATH_PDF' => $file]);
                }
                $this->session->set_flashdata('succ', 'Successfully inserted questions!');
            }else if($status == 'update'){
                $this->Question->essay_updateBatch($storeQuest);
                if($file != NULL){                    
                    $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'PATH_PDF' => $file]);
                }
                $this->session->set_flashdata('succ', 'Successfully updated questions!');
            }
        }else if($param['TIPE'] == "2"){
            $storeQuest = array();
            for($i = 0; $i < count($param['MULTI_QUESTION']); $i++){
                if($param['ID_QUEST'][$i] == "kosong"){
                    $status = "insert";
                    // Insert WSD
                    $storeWSD['ID_WS'] = $param['ID_WS'];
                    $idWSD = $this->Worksheet->insert_detail($storeWSD);
    
                    $temp['ID_WSD']          = $idWSD;
                    $temp['SOAL_MC']         = $param['MULTI_QUESTION'][$i];
                    $temp['PILIHAN_MC']      = implode(';', $param['MULTI_RESPONSE_'.$i]);
                    $temp['KUNCIJAWABAN_MC'] = $param['MULTI_RIGHTANS_'.$i];
                    array_push($storeQuest, $temp);
                }else{
                    $status = "update";
                    $temp['ID_MC']           = $param['ID_QUEST'][$i];
                    $temp['SOAL_MC']         = $param['MULTI_QUESTION'][$i];
                    $temp['PILIHAN_MC']      = implode(';', $param['MULTI_RESPONSE_'.$i]);
                    $temp['KUNCIJAWABAN_MC'] = $param['MULTI_RIGHTANS_'.$i];
                    array_push($storeQuest, $temp);
                }
            }
            if($status == 'insert'){
                $this->Question->multiple_insertBatch($storeQuest);
                $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'ISREADY_WS' => '1']);
                $this->session->set_flashdata('succ', 'Successfully inserted questions!');
            }else if($status == 'update'){
                $this->Question->multiple_updateBatch($storeQuest);
                $this->session->set_flashdata('succ', 'Successfully updated questions!');
            }
        }else if($param['TIPE'] == "3"){
            $storeQuest = array();
            for($i = 0; $i < count($param['MISSING_QUESTION']); $i++){
                if($param['ID_QUEST'][$i] == "kosong"){
                    $status = "insert";
                    // Insert WSD
                    $storeWSD['ID_WS'] = $param['ID_WS'];
                    $idWSD = $this->Worksheet->insert_detail($storeWSD);
    
                    $temp['ID_WSD']             = $idWSD;
                    $temp['SOAL_MS']            = $param['MISSING_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_MS']    = implode(';', $param['MISSING_RESPONSE_'.$i]);
                    array_push($storeQuest, $temp);
                }else{
                    $status = "update";
                    $temp['ID_MS']           = $param['ID_QUEST'][$i];
                    $temp['SOAL_MS']         = $param['MISSING_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_MS'] = implode(';', $param['MISSING_RESPONSE_'.$i]);
                    array_push($storeQuest, $temp);
                }
            }
            if($status == 'insert'){
                $this->Question->missing_insertBatch($storeQuest);
                $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'ISREADY_WS' => '1']);
                $this->session->set_flashdata('succ', 'Successfully inserted questions!');
            }else if($status == 'update'){
                $this->Question->missing_updateBatch($storeQuest);
                $this->session->set_flashdata('succ', 'Successfully updated questions!');
            }
        }else if($param['TIPE'] == "4"){
            $storeQuest = array();
            for($i = 0; $i < count($param['MATCHING_QUESTION']); $i++){
                if($param['ID_QUEST'][$i] == "kosong"){
                    $status = "insert";
                    // Insert WSD
                    $storeWSD['ID_WS'] = $param['ID_WS'];
                    $idWSD = $this->Worksheet->insert_detail($storeWSD);
    
                    $temp['ID_WSD']              = $idWSD;
                    $temp['SOAL_MAT']            = $param['MATCHING_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_MAT']    = $param['MATCHING_RESPONSE'][$i];
                    array_push($storeQuest, $temp);
                }else{
                    $status = "update";
                    $temp['ID_MAT']            = $param['ID_QUEST'][$i];
                    $temp['SOAL_MAT']         = $param['MATCHING_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_MAT'] = $param['MATCHING_RESPONSE'][$i];
                    array_push($storeQuest, $temp);
                }
            }
            if($status == 'insert'){
                $this->Question->matching_insertBatch($storeQuest);
                $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'ISREADY_WS' => '1']);
                $this->session->set_flashdata('succ', 'Successfully inserted questions!');
            }else if($status == 'update'){
                $this->Question->matching_updateBatch($storeQuest);
                $this->session->set_flashdata('succ', 'Successfully updated questions!');
            }
        }else if($param['TIPE'] == "5"){
            $storeQuest = array();
            for($i = 0; $i < count($param['TRUEFALSE_QUESTION']); $i++){
                if($param['ID_QUEST'][$i] == "kosong"){
                    $status = "insert";
                    // Insert WSD
                    $storeWSD['ID_WS'] = $param['ID_WS'];
                    $idWSD = $this->Worksheet->insert_detail($storeWSD);
    
                    $temp['ID_WSD']              = $idWSD;
                    $temp['SOAL_TF']            = $param['TRUEFALSE_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_TF']    = $param['TRUEFALSE_RESPONSE_'.$i];
                    array_push($storeQuest, $temp);
                }else{
                    $status = "update";
                    $temp['ID_TF']            = $param['ID_QUEST'][$i];
                    $temp['SOAL_TF']         = $param['TRUEFALSE_QUESTION'][$i];
                    $temp['KUNCIJAWABAN_TF'] = $param['TRUEFALSE_RESPONSE_'.$i];
                    array_push($storeQuest, $temp);
                }
            }
            if($status == 'insert'){
                $this->Question->truefalse_insertBatch($storeQuest);
                $this->Worksheet->update(['ID_WS' => $param['ID_WS'], 'ISREADY_WS' => '1']);
                $this->session->set_flashdata('succ', 'Successfully inserted questions!');
            }else if($status == 'update'){
                $this->Question->truefalse_updateBatch($storeQuest);
                $this->session->set_flashdata('succ', 'Successfully updated questions!');
            }
        }

        redirect('admin/question/manage/'.$param['ID_WS']);
    }
    public function edit(){

    }
    public function changeStatus(){
        $param = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');;
        $this->Worksheet->update($param);
        $this->session->set_flashdata('succ', 'Successfully changed the publish status on the worksheet ');
        redirect('admin/worksheet');
    }
    public function softDestroy(){
        $param  = $_POST;
        
        $worksheetMhs = $this->Worksheet->get_mahasiswa($param);

        if($worksheetMhs != null){
            $this->session->set_flashdata('err', "Can't change the question because there is a transaction from the student!");
            redirect('admin/worksheet');
        }

        $idWS   = $param['ID_WS'];
        $param['deleted_at']    = date('Y-m-d H:i:s');
        unset($param['ID_WS']);

        $this->Worksheet->update_detail($param);
        $this->session->set_flashdata('succ', 'Successfully delete a question  ');
        redirect('admin/question/manage/'.$idWS);
    }
    public function ajxGet(){
        $param = $_POST;
        if($param['TYPEQUESTION_WS'] == "1"){
            echo json_encode($this->Question->essay_get($param));
        }else if($param['TYPEQUESTION_WS'] == "2"){
            echo json_encode($this->Question->multiple_get($param));
        }else if($param['TYPEQUESTION_WS'] == "3"){
            echo json_encode($this->Question->missing_get($param));
        }
    }

    function upload_pdf($idws){
        $this->load->library('upload');
        $newPath = './assets/uploads/pdf/'.$idws.'/';
        if(!is_dir($newPath)){
            mkdir($newPath, 0777, TRUE);
        }
        $config['upload_path'] = $newPath;
        $config['allowed_types'] = 'pdf'; 
        $config['encrypt_name'] = FALSE;
 
        $this->upload->initialize($config);
        if(!empty($_FILES['pdffile']['name'])){
 
            if ($this->upload->do_upload('pdffile')){
                $pdf = $this->upload->data(); 
                $filepdf = $pdf['file_name'];

                return base_url('/assets/uploads/pdf/'.$idws.'/'.$filepdf);
            }
                      
        }
    }
}