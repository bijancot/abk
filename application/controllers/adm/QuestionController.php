<?php

class QuestionController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Worksheet');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }
    public function index($idWS){
        $data['title']      = 'Spageti - Manage Question';
        $data['navActive']  = 'worksheet';

        $this->template->admin('adm/worksheet/question', $data);
    }
    public function store(){
        $param = $_POST;
        print_r($param);
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