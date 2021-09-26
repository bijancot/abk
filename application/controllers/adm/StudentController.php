<?php

class StudentController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Student');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }

    public function verification(){
        $data['title']      = 'Spageti - Student Verification';
        $data['navActive']  = 'student';
        $data['students'] = $this->Student->getAll();
        
        $this->template->admin('adm/student/verification', $data);
    }

    public function changeStatus(){
        $param = $_POST;
        $this->Student->update($param);
        $this->session->set_flashdata('succ', 'Successfully changed the status on the student ');
        redirect('admin/student/verification');
    }

    public function ajxGet(){
        $data['filter'] = 'NPM_MHS = '.$_POST['NPM_MHS'];
        echo json_encode($this->Student->get($data));
    }
}