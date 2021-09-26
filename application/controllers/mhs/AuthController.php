<?php

class AuthController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa');
    }
    // public function VLogin(){
    //     echo 'ilham';
    // }
    public function proses_register() {
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('npm','NPM','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == TRUE) {
            $data = array(
                'NAMA_MHS'      => $this->input->post('name'),
                'NPM_MHS'       => $this->input->post('npm'),
                'EMAIL_MHS'     => $this->input->post('email'),
                'TELP_MHS'      => $this->input->post('phone'),
                'JK_MHS'        => $this->input->post('gender'),
                'ALAMAT_MHS'    => $this->input->post('address'),
                'PASSWORD_MHS'  => md5($this->input->post('password')),
            );

            //Table Insert
            $this->Mahasiswa->register($data);

            //Create Message
            $this->session->set_tempdata('success_register', 'Pendaftaran berhasil', 10);

            //Redirect to pages
            redirect();
        } else {
            //Create Message
            $this->session->set_tempdata('failed_register', 'Pendaftaran gagal', 10);
            redirect();
        }
    }
}
