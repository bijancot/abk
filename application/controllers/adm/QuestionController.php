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
        $data['worksheetDetail']    = $this->Worksheet->get_detail(['ID_WS' => $idWS]);

        
        $this->template->admin('adm/worksheet/question', $data);
    }
    public function store(){
        $param = $_POST;

        // Insert WSD
        $storeWSD['ID_WS'] = $param['ID_WS'];
        $idWSD = $this->Worksheet->insert_detail($storeWSD);

        if($param['TIPE'] == "1"){
            $storeQuest['ID_WSD']   = $idWSD;
            $storeQuest['SOAL_ES']  = $param['ESSAY_QUESTION'];
            $storeQuest['GRADE_ES']  = $param['ESSAY_GRADE'];
            $this->Question->essay_insert($storeQuest);
        }else if($param['TIPE'] == "2"){
            $storeQuest['ID_WSD']            = $idWSD;
            $storeQuest['SOAL_MC']           = $param['MULTI_QUESTION'];
            $storeQuest['PILIHAN_MC']        = implode(';', $param['MULTI_RESPONSE']);
            $storeQuest['KUNCIJAWABAN_MC']   = $param['MULTI_RIGHTANS'];
            $storeQuest['ISRAND_MC']         = !empty($param['MULTI_ISRANDOM']) && $param['MULTI_ISRANDOM'] == 'on';
            $this->Question->multiple_insert($storeQuest);
        }else if($param['TIPE'] == "3"){
            $storeQuest['ID_WSD']            = $idWSD;
            $storeQuest['SOAL_MS']           = $param['MISSING_QUESTION'];
            $storeQuest['KUNCIJAWABAN_MS']   = implode(';', $param['MISSING_RESPONSE']);
            $this->Question->missing_insert($storeQuest);
        }

        $this->session->set_flashdata('succ', 'Successfully created a new question');
        $this->session->set_flashdata('statChange', $idWSD);
        $this->session->set_flashdata('statNo', $param['no']);
        redirect('admin/question/manage/'.$param['ID_WS']);
    }
    public function edit(){
        $param                  = $_POST;
        
        if($param['TIPE'] == "1"){
            $editQuest['ID_ES']     = $param['ID_QUEST'];
            $editQuest['SOAL_ES']   = $param['ESSAY_QUESTION'];
            $editQuest['GRADE_ES']  = $param['ESSAY_GRADE'];
            $this->Question->essay_update($editQuest);
        }else if($param['TIPE'] == "2"){
            $editQuest['ID_MC']             = $param['ID_QUEST'];
            $editQuest['SOAL_MC']           = $param['MULTI_QUESTION'];
            $editQuest['PILIHAN_MC']        = implode(';', $param['MULTI_RESPONSE']);
            $editQuest['KUNCIJAWABAN_MC']   = $param['MULTI_RIGHTANS'];
            $editQuest['ISRAND_MC']         = !empty($param['MULTI_ISRANDOM']) && $param['MULTI_ISRANDOM'] == 'on';
            $this->Question->multiple_update($editQuest);
        }else if($param['TIPE'] == "3"){
            $editQuest['ID_MS']             = $param['ID_QUEST'];
            $editQuest['SOAL_MS']           = $param['MISSING_QUESTION'];
            $editQuest['KUNCIJAWABAN_MS']   = implode(';', $param['MISSING_RESPONSE']);
            $this->Question->missing_update($editQuest);
        }
        
        $this->session->set_flashdata('succ', 'Successfuly change a question');
        $this->session->set_flashdata('statChange', $param['idWSD']);
        $this->session->set_flashdata('statNo', $param['no']);
        
        redirect('admin/question/manage/'.$param['ID_WS']);
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
}