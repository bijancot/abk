<?php

class DashboardController extends CI_Controller{
    public function index(){
        $data['title']      = 'Spageti - Dashboard';
        $data['navActive']  = 'dashboard';

        $this->template->admin('adm/dashboard', $data);
    }
}