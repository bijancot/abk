<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('USER_LOGGED'))) {
			redirect();
		};
    }

    public function index(){
        $data['title']      = 'Nota Pembayaran | SYMA Decoration';
        $this->template->mahasiswa('mhs/course/course', $data);
    }
}