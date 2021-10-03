<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('USER_LOGGED'))) {
			redirect();
		};
    }

    public function index(){
        $data['title']      = 'Course';
        $this->template->mahasiswa('mhs/course/course', $data);
    }
}