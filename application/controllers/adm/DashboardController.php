<?php

class DashboardController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }

    public function index(){
        $data['title']      = 'Spageti - Dashboard';
        $data['navActive']  = 'dashboard';

        $this->template->admin('adm/dashboard', $data);
    }
}