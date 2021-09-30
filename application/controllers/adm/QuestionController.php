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
        $data['title']      = 'Spageti - Manage Question';
        $data['navActive']  = 'worksheet';
        $data['idWS']       = $idWS;

        $this->template->admin('adm/worksheet/question', $data);
    }
    public function store(){
        $param = $_POST;
        print_r($param);

        // Insert WSD
        $storeWSD['ID_WS']    = $param['ID_WS'];
        $storeWSD['TIPE_WSD'] = $param['TIPE'];
        $idWSD = $this->Worksheet->insert_detail($storeWSD);

        if($param['TIPE'] == "1"){
            $storeQuest['ID_WSD']   = $idWSD;
            $storeQuest['SOAL_ES']  = $param['ESSAY_QUESTION'];
            $this->Question->essay_insert($storeQuest);
        }else if($param['TIPE'] == "2"){
            $storeQuest['ID_WSD']            = $idWSD;
            $storeQuest['SOAL_MC']           = $param['MULTI_QUESTION'];
            $storeQuest['PILIHAN_MC']        = implode(';', $param['MULTI_RESPONSE']);
            $storeQuest['KUNCIJAWABAN_MC']   = $param['MULTI_RIGHTANS'];
            $storeQuest['ISRAND_MC']         = !empty($param['MULTI_ISRANDOM']) && $param['MULTI_ISRANDOM'] == 'on';
            $this->Question->multiple_insert($storeQuest);
        }
        // $this->Worksheet->insert($param);
        // $this->session->set_flashdata('succ', 'Successfully created a new worksheet');
        // redirect('admin/worksheet');
    }
    public function edit(){
        $param                  = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');;
        $this->Worksheet->update($param);
        $this->session->set_flashdata('succ', 'Successfully changing a worksheet');
        redirect('admin/worksheet');
    }
    public function changeStatus(){
        $param = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');;
        $this->Worksheet->update($param);
        $this->session->set_flashdata('succ', 'Successfully changed the publish status on the worksheet ');
        redirect('admin/worksheet');
    }
    public function softDestroy(){
        $param                  = $_POST;
        $param['deleted_at']    = date('Y-m-d H:i:s');
        $this->Worksheet->update($param);
        $this->session->set_flashdata('succ', 'Successfully delete a worksheet  ');
        redirect('admin/worksheet');
    }
}