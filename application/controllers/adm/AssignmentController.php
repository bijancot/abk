<?php

class AssignmentController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Assignment');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }

    public function index(){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['students']   = $this->Assignment->getAll();
        $data['c_ws']       = $this->Assignment->getCountWs();
        
        $this->template->admin('adm/assignment/assignment', $data);
    }

    public function worksheet($id){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['student']    = $this->Assignment->getMhs(['filter' => ['NPM_MHS' => $id]]);
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1]]);
        $data['ws_mhs']     = $this->Assignment->getStudentScore($id);

        $this->template->admin('adm/assignment/worksheet', $data);
    }

    //worksheet menu
    public function worksheetmenu(){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1]]);

        $this->template->admin('adm/assignment/worksheetmenu', $data);
    }

    public function wsstudent($idws){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ID_WS' => $idws]]);
        $data['students']   = $this->Assignment->getAll();
        $data['score']      = $this->Assignment->getScore($idws);

        $this->template->admin('adm/assignment/wsstudent', $data);
    }

    public function wsdetail($npm, $wsid, $tipe){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['student']    = $this->Assignment->getMhs(['filter' => ['NPM_MHS' => $npm]]);
        $data['questions'] = '';

        if($tipe == 1){
            $data['questions']  = $this->Assignment->getQuestionES($wsid);
        }else if($tipe == 2){
            $data['questions']  = $this->Assignment->getQuestionMC($wsid);
        }else{
            $data['questions']  = $this->Assignment->getQuestionMS($wsid);
        }

        $this->template->admin('adm/assignment/wsdetail', $data);
    }
}