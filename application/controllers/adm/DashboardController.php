<?php

class DashboardController extends CI_Controller{
    public function index(){
        $data['title'] = 'Dashboard';
        $this->template->admin('adm/dashboard', $data);
    }
}