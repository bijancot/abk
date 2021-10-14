<?php

class DashboardController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Dashboard');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }

    public function index(){
        $data['title']      = 'Spageti - Dashboard';
        $data['navActive']  = 'dashboard';
        $data['studentTotal'] = $this->Dashboard->studentTotal();
        $data['studentVTotal'] = $this->Dashboard->studentVTotal();
        $data['studentActivity'] = $this->Dashboard->studentActivity();
        $data['studentStatus'] = $this->Dashboard->studentStatus();
        $data['worksheetTotal'] = $this->Dashboard->worksheetTotal();
        $data['worksheetPTotal'] = $this->Dashboard->worksheetPTotal();
        $data['passRates'] = $this->Dashboard->passRates();
        $data['studentRanking'] = $this->Dashboard->studentRanking();

        // print_r($data['studentRanking']);
        $this->template->admin('adm/dashboard', $data);
    }
}