<?php

class AuthController extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if ($this->session->userdata('user_logged')) {
            redirect('admin/dashboard');
        }
        $this->load->view('adm/auth/login');
    }

    public function auth_login(){
        $username = $this->input->post('USERNAME');
        $pass = $this->input->post('PASSWORD');

        if ($username === "admin" && $pass === "123spageti456") {

            $this->session->set_userdata('user_logged', $username);

            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username / password is incorrect! </div>');
            redirect('admin');
        }
    }

    public function logout(){
        $this->session->sess_destroy();

        redirect('admin');
    }
}