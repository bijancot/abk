<?php

class AssignmentController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Assignment');
        if (empty($this->session->userdata('user_logged')) || $this->session->userdata('user_logged') != 'admin') {
			redirect('admin');
		};
    }

    public function index(){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['students']   = $this->Assignment->getAll();
        $data['c_ws']       = $this->Assignment->getCountWs();
        
        $this->template->admin('adm/assignment/assignment', $data);
    }

    public function worksheet($id){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['student']    = $this->Assignment->getMhs(['filter' => ['NPM_MHS' => $id]]);
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1]]);
        $data['ws_mhs']     = $this->Assignment->getStudentScore($id);

        $this->template->admin('adm/assignment/worksheet', $data);
    }

    //worksheet menu
    public function worksheetmenu(){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1]]);

        $this->template->admin('adm/assignment/worksheetmenu', $data);
    }

    public function wsstudent($idws){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ID_WS' => $idws]]);
        $data['students']   = $this->Assignment->getAll();
        $data['score']      = $this->Assignment->getScore($idws);

        $this->template->admin('adm/assignment/wsstudent', $data);
    }

    public function wsdetail($npm, $wsid, $tipe){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['student']    = $this->Assignment->getMhs(['filter' => ['NPM_MHS' => $npm]]);
        $data['ws']         = $this->Assignment->getWs(['filter' => ['ID_WS' => $wsid]]);
        // $data['questions'] = '';
        $data['npm']        = $npm;
        $data['wsid']       = $wsid;

        if($tipe == 1){
            // $data['questions']  = $this->Assignment->getQuestionES($wsid);
            // $data['attempts'] = $this->Assignment->getAttempts($npm, $wsid);
            $data['essay'] = $this->Assignment->getES($npm, $wsid);
        }else if($tipe == 2){
            // $data['questions']  = $this->Assignment->getQuestionMC($wsid);
        }else{
            // $data['questions']  = $this->Assignment->getQuestionMS($wsid);
        }
        $data['attempts'] = $this->Assignment->getAttempts($npm, $wsid);
        $this->template->admin('adm/assignment/wsdetail', $data);
    }

    public function getAnswers($id_ws, $npm_mhs, $created_at) {
        $data = $this->Assignment->getAnswerES($id_ws, $npm_mhs, $created_at);
        echo '
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h5 id="question_title" class="card-title">'.str_replace("%", " ", $created_at).'</h5>
                </div>
            </div>
            <hr>
            <form id="formSubmit" action="#" method="post">';
        echo '<input type="hidden" name="ID_WSM" value="'.$data[0]->ID_WSMD.'">';
        $no = 1;
        foreach ($data as $items) {
            $text = str_replace("<p>", "", $items->SOAL_ES);
                echo '
                    <div>
                        <span><b>'.$no.'. '.$text.'</b>Answer: '.$items->JAWABAN_ESR.'</span>
                        <input type="text" class="form-control radius-10"style="width:70px;
                        font-size:14px;text-align:center;margin-top:5px;" placeholder="Score">
                        <span style="font-size:12px;color:#bbbbbb;"> Max Score : '.$items->GRADE_ES.'</span>
                    </div>
                    ';
                $no++;
        }
        echo'     
            <hr>       
            <div>
                <span><b>Feedback</b></span>
                <textarea class="form-control radius-10" rows="3" style="width:700px;
                font-size:14px; margin-top: 10px;" placeholder=""></textarea>
            </div>
            <br>
            <div style="text-align: left;">
            <button id="btn-save" class="btn btn-success btn-sm">Submit</button>
            </div>
            </form>
        ';
    }
}