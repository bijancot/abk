<?php

class WorksheetController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Worksheet');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }
    public function index(){
        $data['title']      = 'Spageti - Worksheet';
        $data['navActive']  = 'worksheet';
        $data['worksheets'] = $this->Worksheet->getAll();
        
        $this->template->admin('adm/worksheet/worksheet', $data);
    }
    public function store(){
        $param = $_POST;

        $idWS = $this->Worksheet->insert($param);
        $this->session->set_flashdata('succ', 'Successfully created a new worksheet');
        redirect('admin/question/manage/'.$idWS);
    }
    public function edit(){
        $param                  = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');

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
        $worksheetMhs = $this->Worksheet->get_mahasiswa($param);
        if($worksheetMhs == null){
            $param['deleted_at']    = date('Y-m-d H:i:s');
            $this->Worksheet->update($param);
            $this->session->set_flashdata('succ', 'Successfully delete a worksheet  ');
            redirect('admin/worksheet');
        }else{
            $this->session->set_flashdata('err', "Can't delete the worksheet because there is a transaction from the student !");
            redirect('admin/worksheet');
        }
    }
    public function question($idWS){
        $data['title']      = 'Spageti - Manage Question';
        $data['navActive']  = 'worksheet';

        $this->template->admin('adm/worksheet/question', $data);
    }
    public function ajxCheckPosition(){
        $param = $_POST;
        $position = $this->Worksheet->checkPosition($param);
        
        if(!empty($position->POSITION_WS) && $position->POSITION_WS != null){
            $status = 0;
        }else{
            $status = 1;
        }
        echo json_encode($status);
    }
}