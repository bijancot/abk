<?php

class VideoController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Video');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }
    public function index(){
        $data['title']      = 'Spageti - Video';
        $data['navActive']  = 'video';
        $data['video']      = $this->Video->getAll();
        
        $this->template->admin('adm/video/video', $data);
    }
    public function store(){
        $param = $_POST;
        $this->Video->insert($param);
        $this->session->set_flashdata('succ', 'Successfully created a new video');
        redirect('admin/video');
    }
    public function edit(){
        $param = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');
        $this->Video->update($param);
        $this->session->set_flashdata('succ', 'Successfully changing a video');
        redirect('admin/video');
    }
    public function changeStatus(){
        $param = $_POST;
        $param['updated_at']    = date('Y-m-d H:i:s');
        $this->Video->update($param);
        $this->session->set_flashdata('succ', 'Successfully changed the publish status on the video');
        redirect('admin/video');
    }
    public function delete(){
        $param = $_POST;
        $param['deleted_at']    = date('Y-m-d H:i:s');
        $this->Video->update($param);
        $this->session->set_flashdata('succ', 'Successfully delete a video');
        redirect('admin/video');
    }
}