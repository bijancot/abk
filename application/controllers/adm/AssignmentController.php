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
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1, 'deleted_at' => null]]);
        $data['ws_mhs']     = $this->Assignment->getStudentScore($id);

        $this->template->admin('adm/assignment/worksheet', $data);
    }

    //worksheet menu
    public function worksheetmenu(){
        $data['title']      = 'Spageti - Assignment';
        $data['navActive']  = 'assignment';
        $data['worksheet']  = $this->Assignment->getWs(['filter' => ['ISPUBLISHED_WS' => 1, 'deleted_at' => null]]);
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
        $data['npm']        = $npm;
        $data['wsid']       = $wsid;
        $data['tipe']       = $tipe;

        // Check latest attempt
        if($tipe == 1){
            // $data['questions']  = $this->Assignment->getQuestionES($wsid);
            // $data['attempts'] = $this->Assignment->getAttempts($npm, $wsid);
            // $data['essay'] = $this->Assignment->getES($npm, $wsid);
        }else if($tipe == 2){
            // $data['questions']  = $this->Assignment->getQuestionMC($wsid);
        }else{
            // $data['questions']  = $this->Assignment->getQuestionMS($wsid);
        }
        $data['attempts'] = $this->Assignment->getAttempts($npm, $wsid);
        $this->template->admin('adm/assignment/wsdetail', $data);
    }

    public function getAnswers($id_ws, $npm_mhs, $tipe, $created_at) {
        if ($tipe == 1) {
            $data = $this->Assignment->getAnswerES($id_ws, $npm_mhs, $created_at);
            $date_attempt = str_replace("%", " ", $created_at);
            if($data[0]->TGLFEEDBACK_WSMD) {
                echo '
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h5 id="question_title" class="card-title">'.date_format(date_create($date_attempt), "d M Y H:i:s").' (Done)</h5>
                        </div>
                    </div>
                    <hr>';
                $no = 1;
                foreach ($data as $items) {
                    $text = str_replace("<p>", "", $items->SOAL_ES);
                        echo '
                            <div>
                                <span><b>'.$no.'. '.$text.'</b>Answer: '.$items->JAWABAN_ESR.'</span><br>
                                <span style="font-size:12px;color:#bbbbbb;"> Max Score : '.$items->GRADE_ES.'</span>
                            </div>
                            <br>
                            ';
                        $no++;
                }
                echo '
                    <div>
                        <span><b>Final Score</b></span><br>
                        <span>'.$data[0]->SCORE_WSMD.'</span>
                    </div>
                ';
                echo'     
                    <hr>       
                    <div>
                        <span><b>Feedback</b></span>
                        <textarea class="form-control radius-10" name="FEEDBACK_WSMD" rows="3" style="width:700px;
                        font-size:14px; margin-top: 10px;" placeholder="" disabled>'.$data[0]->FEEDBACK_WSMD.'</textarea>
                    </div>
                ';
            } else {
                echo '
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h5 id="question_title" class="card-title">'.date_format(date_create($date_attempt), "d M Y H:i:s").'</h5>
                        </div>
                    </div>
                    <hr>
                    <form id="formSubmit" action="'.site_url('admin/assignment/submit').'" method="post">';
                    echo '<input type="hidden" name="ID_WSM" value="'.$data[0]->ID_WSM.'">';
                    echo '<input type="hidden" name="PASSGRADE_WS" value="'.$data[0]->PASSGRADE_WS.'">';
                    echo '<input type="hidden" name="ID_WSMD" value="'.$data[0]->ID_WSMD.'">';
                $no = 1;
                foreach ($data as $items) {
                    $text = str_replace("<p>", "", $items->SOAL_ES);
                        echo '
                            <div>
                                <span><b>'.$no.'. '.$text.'</b>Answer: '.$items->JAWABAN_ESR.'</span>
                                <input type="text" name="score[]" class="form-control radius-10"style="width:70px;
                                font-size:14px;text-align:center;margin-top:5px;" placeholder="Score">
                                <input type="hidden" name="pass_grade[]" value="'.$items->GRADE_ES.'">
                                <span style="font-size:12px;color:#bbbbbb;"> Max Score : '.$items->GRADE_ES.'</span>
                            </div>
                            <br>
                            ';
                        $no++;
                }
                echo'     
                    <hr>       
                    <div>
                        <span><b>Feedback</b></span>
                        <textarea class="form-control radius-10" name="FEEDBACK_WSMD" rows="3" style="width:700px;
                        font-size:14px; margin-top: 10px;" placeholder="" >'.$data[0]->FEEDBACK_WSMD.'</textarea>
                    </div>
                    <br>
                    <div style="text-align: left;">
                    <button id="btn-save" class="btn btn-success btn-sm">Submit</button>
                    </div>
                    </form>
                ';
            }
        } else if ($tipe == 2) {

        } else if ($tipe == 3) {

        }
    }
    public function submitAnswers() {
        $param = $_POST;

        // Init
        $ID_WSM = $param['ID_WSM'];
        $PASSGRADE_WS = $param['PASSGRADE_WS'];
        $ID_WSMD = $param['ID_WSMD'];
        $FEEDBACK_WSMD = $param['FEEDBACK_WSMD'];

        // Array score and pass grade
        $score = $param['score'];
        $pass_grade = $param['pass_grade'];

        // Variable for storing
        $score_total = 0;
        $pass_grade_total = 0;

        // Looping score and pass grade
        foreach ($score as $items) {
            $score_total += $items;
        }
        foreach ($pass_grade as $items) {
            $pass_grade_total += $items;
        }
        $result = ($score_total/$pass_grade_total) * 100;

        // Check status
        if ($result >= $PASSGRADE_WS) {
            $STATUS_WSM = 2;
            $STATUS_WSMD = 1;
            $SCORE_WSMD = $result;
        } else {
            $STATUS_WSM = 3;
            $STATUS_WSMD = 2;
            $SCORE_WSMD = $result;
        }
        // Update tables
        $data_wsmd = array(
            'STATUS_WSMD' => $STATUS_WSMD, 
            'SCORE_WSMD' => $SCORE_WSMD, 
            'FEEDBACK_WSMD' => $FEEDBACK_WSMD, 
            'TGLFEEDBACK_WSMD' => date("Y-m-d H:i:s")
        );
        $data_wsm = array(
            'SCOREFINAL_WSM' => $SCORE_WSMD, 
            'STATUS_WSM' => $STATUS_WSM
        );
        $this->Assignment->updateWSMD($data_wsmd, $ID_WSMD);
        $this->Assignment->updateWSM($data_wsm, $ID_WSM);
        redirect('admin/assignment/student/');
    }
}