<?php

class AuthController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa');
    }
    public function index() {
        if ($this->session->userdata('USER_LOGGED')) {
            redirect('course');
        }
        $this->load->view('mhs/auth/login');
    }
    public function register() {
        $this->load->view('mhs/auth/register');
    }
    public function proses_register() {
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('npm','NPM','trim|required|is_unique[mahasiswa.NPM_MHS]', array(
            'is_unique' => '%s already exists.'
        ));
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mahasiswa.EMAIL_MHS]', array(
            'is_unique' => '%s already exists.'
        ));
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == TRUE) {
            $data = array(
                'NAMA_MHS'      => $this->input->post('name'),
                'NPM_MHS'       => $this->input->post('npm'),
                'EMAIL_MHS'     => $this->input->post('email'),
                'TELP_MHS'      => $this->input->post('phone'),
                'PASSWORD_MHS'  => md5($this->input->post('password'))
            );

            //Table Insert
            $this->Mahasiswa->register($data);
            $this->checkWSM($this->input->post('email'), $this->input->post('npm'));
            $sessionData = array(
                'EMAIL_MHS'     => $this->input->post('email'),
                'NPM_MHS'       => $this->input->post('npm'),
                'NAMA_MHS'      => $this->input->post('name'),
                'USER_LOGGED'   => TRUE,
                'USER_ISVERIF'  => "0",
                'USER_ISACTIVE' => null
            );
            $this->session->set_userdata($sessionData);
            
            //Redirect to pages
            $this->send_code();
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
                    'USER_ISVERIF'  => $user->ISVERIF_MHS,
                    'USER_ISACTIVE' => $user->ISACTIVE_MHS
                );
                $this->session->set_userdata($sessionData);
                if($user->ISVERIF_MHS == 0) {
                    $this->session->set_tempdata('failed_auth_msg', 'Account has not been verified!', 5);
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
    public function forgotPassword() {
        // print_r(hash_algos());
        $this->load->view('mhs/auth/forgot');
    }
    public function emailVerif() {
        // print_r(hash_algos());
        $this->load->view('mhs/auth/email-verif');
    }
    public function email($data) {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'wendyuzenn@gmail.com',  
            'smtp_pass'   => 'passwordthatudontexpect', 
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('no-reply@puspen.kristomoyo.com', 'Spageti.');
        $this->email->to($data['email']); 
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
    public function proses_forgot() {
        $email = $this->input->post('email');
        $result = $this->Mahasiswa->checkEmailisExist(['EMAIL_MHS' => $email]);
        if ($result) {
            $token = hash('sha256', $email.date('Y-m-d h:i:s'));
            $is_valid = date('Y-m-d', strtotime('tomorrow'));
            $arr = array(
                'RESET_TOKEN' => $token,
                'TOKEN_EXPIRE_DATE' => $is_valid
            );
            $this->Mahasiswa->updateToken($email, $arr);
            $data = array(
                'email' => $email,
                'subject' => 'Reset your Spageti password',
                'message' => $this->load->view('email', ['link' => $token], true)
            );
            $email = $this->email($data);
            if ($email) {
                $this->session->set_tempdata('auth_msg', 'Check your inbox for a reset email', 5);
            } else {
                $this->session->set_tempdata('auth_msg', 'Failed to send reset email', 5);
            }
        } else {
            $this->session->set_tempdata('auth_msg', 'Email is not found', 5);
        }
        redirect('forgot-password');
    }
    public function resetPassword($param) {
        $result = $this->Mahasiswa->checkTokenisExist(['RESET_TOKEN' => $param]);
        if ($result) {
            $valid = $this->Mahasiswa->checkTokenisValid(['RESET_TOKEN' => $param, 'TOKEN_EXPIRE_DATE' => date('Y-m-d')]);
            if ($valid) {
                $data['token'] = $param;
                // $this->session->set_tempdata('auth_msg', 'Token is valid', 5);
                $this->load->view('mhs/auth/reset', $data);
            } else {
                $this->session->set_tempdata('auth_msg', 'Token has expired', 5);
                redirect('forgot-password');
            }
        } else {
            $this->session->set_tempdata('auth_msg', 'Token doesn\'t exist', 5);
            redirect('forgot-password');
        }
    }
    public function proses_reset() {
        $token = $this->input->post('token');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if ($password == $confirm_password) {
            $this->Mahasiswa->resetPassword(['RESET_TOKEN' => $token], ['PASSWORD_MHS' => md5($confirm_password)]);
            $this->Mahasiswa->resetToken(['RESET_TOKEN' => $token]);
            $this->session->set_tempdata('auth_msg', 'Password reset successfully', 5);
            redirect('login');
        } else {
            $this->session->set_tempdata('auth_msg', 'Password reset failed', 5);
            redirect('forgot-password');
        }
    }
    public function send_code(){
        $code = random_int(100, 999)."-".random_int(100, 999);
        $this->Mahasiswa->updateCodeRegis($this->session->userdata('EMAIL_MHS'), ['REGISTER_TOKEN' => $code]);
        $data = array(
            'email' => $this->session->userdata('EMAIL_MHS'),
            'subject' => 'Your verification code',
            'message' => $this->load->view('email_verification', ['code' => $code], true)
        );
        $this->email($data);
        $this->session->set_tempdata('auth_msg', 'The code has been sent, please check your email', 5);
        redirect('email-verification');
    }
    public function proses_verif(){
        $param = $_POST;
        $email = $this->session->userdata('EMAIL_MHS');
        $mhs = $this->Mahasiswa->get(['EMAIL_MHS' => $email]);
        
        if($mhs->REGISTER_TOKEN == $param['kode_aktivasi']){
            $this->Mahasiswa->update(['EMAIL_MHS' => $email, 'ISVERIF_MHS' => "1", 'ISACTIVE_MHS' => "1"]);
            $sessionData = array(
                'USER_ISVERIF'  => 1,
                'USER_ISACTIVE' => 1
            );
            $this->session->set_userdata($sessionData);
            $this->session->set_tempdata('auth_msg', 'Congrats your account has been verified!', 5);
            redirect('course');
        }else{
            $this->session->set_tempdata('failed_auth_msg', 'Verification code does not match', 5);
            redirect('email-verification');
        }
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
