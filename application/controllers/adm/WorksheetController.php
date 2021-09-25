<?php

class WorksheetController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Worksheet');
    }
    public function index(){
        $data['title']      = 'Spageti - Worksheet';
        $data['navActive']  = 'Worksheet';
        $data['worksheets'] = $this->Worksheet->getAll();
        
        $this->template->admin('adm/worksheet/worksheet', $data);
    }
    public function store(){
        $param = $_POST;
        $param['ID_WS'] = 
        $this->Worksheet->insert($param);
        redirect('admin/worksheet');
    }
}