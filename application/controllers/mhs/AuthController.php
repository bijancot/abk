<?php

class AuthController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa');
    }
    // public function VLogin(){
    //     echo 'ilham';
    // }
    public function index() {
        $this->load->view('mhs/auth/login');
    }
    public function register() {
        $this->load->view('mhs/auth/register');
    }
    public function proses_register() {
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('npm','NPM','trim|required|is_unique[mahasiswa.NPM_MHS]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mahasiswa.EMAIL_MHS]');
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
            $this->session->set_tempdata('auth_msg', 'Register Successfully', 5);

            $this->checkWSM($this->input->post('email'), $this->input->post('npm'));
            //Redirect to pages
            redirect('login');
        } else {
            //Create Message
            $this->session->set_tempdata('failed_auth_msg', validation_errors(), 5);
            redirect('register');
        }
    }
    public function proses_login() {
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $user = $this->Mahasiswa->login($email, $password);
            if($user != false ){
                $sessionData = array(
                    'EMAIL_MHS'     => $user->EMAIL_MHS,
                    'NPM_MHS'       => $user->NPM_MHS,
                    'NAMA_MHS'      => $user->NAMA_MHS,
                    'USER_LOGGED'   => TRUE,
                    'USER_ISVERIF'  => $user->ISVERIF_MHS
                );
                $this->session->set_userdata($sessionData);
                if($user->ISVERIF_MHS == 0) {
                    $this->session->set_tempdata('failed_auth_msg', 'Account has not been verified!', 5);
                } else {
                    $this->session->set_tempdata('auth_msg', 'Login Successfully', 5);
                }
                $this->checkWSM($user->EMAIL_MHS, $user->NPM_MHS);
                redirect('course');
            } else {
                $this->session->set_tempdata('failed_auth_msg', 'Login Failed, Email or Password is incorrect!', 5);
                redirect('login');
            }
        } else {
            //Create Message
            $this->session->set_tempdata('failed_auth_msg', validation_errors(), 5);
            redirect('login');
        }
    }
    public function proses_logout() {
        $this->session->sess_destroy();
        redirect();
    }
    public function checkWSM($email, $npm){
        $worksheetMhs = $this->db->query("
            SELECT GROUP_CONCAT(wm.ID_WS) AS ID_WS
            FROM  worksheet_mahasiswa wm 
            WHERE wm.EMAIL_MHS = '$email'
        ")->row();

        if($worksheetMhs->ID_WS != null){
            $worksheet = $this->db->query("
                SELECT GROUP_CONCAT(w.ID_WS) AS ID_WS
                FROM  worksheet w 
                WHERE w.ID_WS NOT IN($worksheetMhs->ID_WS) AND w.deleted_at IS NULL
            ")->row();
            if($worksheet->ID_WS != null){
                $this->insertWSM($worksheet, $email, $npm);
            }
            
        }else{
            $worksheet = $this->db->query("
                SELECT GROUP_CONCAT(w.ID_WS) AS ID_WS
                FROM  worksheet w 
                WHERE w.deleted_at IS NULL
            ")->row();
            if($worksheet->ID_WS != null){
                $this->insertWSM($worksheet, $email, $npm);
            }
        }
    }
    public function insertWSM($worksheet, $email, $npm){
        foreach (explode(",", $worksheet->ID_WS) as $item) {
            $temp['ID_WS']      = $item;
            $temp['EMAIL_MHS']  = $email;
            $temp['NPM_MHS']    = $npm;
            $temp['STATUS_WSM'] = null;
            $this->db->insert('worksheet_mahasiswa', $temp);
        }
    }
}
