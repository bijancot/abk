<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Course');
        if (empty($this->session->userdata('USER_LOGGED'))) {
			redirect();
		};
    }

    public function index(){
        $data['title']      = 'Course';
        $data['course'] = $this->Course->getAll();
        $this->template->mahasiswa('mhs/course/course', $data);
    }

    public function showCourse($idCourse) {
        $result = $this->Course->getID($idCourse);

        // Essay
        if ($result->TIPE_WSD == 1) {

        } 
        // Multiple choices
        else if ($result->TIPE_WSD == 2) {

        } 
        // Missing sentence
        else if ($result->TIPE_WSD == 3) {

        }
        $data['title']      = 'Course';
        $data['course'] = $this->Course->getAll();
        $this->template->mahasiswa('mhs/course/course', $data);
    }
}