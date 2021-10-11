<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Course');
        $this->load->model('Worksheet');
        if (empty($this->session->userdata('USER_LOGGED'))) {
			redirect();
		};
    }

    public function index(){
        $email = $this->session->userdata('EMAIL_MHS');
        $data['title']              = 'Spageti - Course';
        $data['courses']            = $this->Course->getAll($email);
        $this->template->mahasiswa('mhs/course/course', $data);
    }
    public function courseDetail($idWS, $idWSM, $noWS){
        $data['title']      = 'Spageti - Take Test';
        $data['noWS']       = $noWS;
        $data['worksheet']  = $this->Worksheet->get(['ID_WS' => $idWS]);

        $wsm = $this->Worksheet->get_mahasiswaDetail(['ID_WSM' => $idWSM]);
        $statusWSM  = $wsm->STATUS_WSM != null ? $wsm->STATUS_WSM : "kosong";
        $data['questions']  = $this->getQuestion($idWS, $idWSM, $statusWSM);

        $this->template->mahasiswa('mhs/course/course_detail', $data);
    }
    public function getQuestion($id, $idWSM, $status) {
        $htmlQuestion = "";
        $data = $this->Course->getQuestionbyID($id);

        $no = 1;
        foreach ($data as $item) {
            $htmlQuestion .= '
                <div class="card mb-3 p-5">
                    <p class="h5 font-w-700" style="margin-bottom: 1rem;">Question '.$no.'</p>
            ';
            if($item->TYPEQUESTION_WS == 1){
                $htmlQuestion .= $this->questEssay($item, $status, $idWSM);
            }else if($item->TYPEQUESTION_WS == 2){
                $htmlQuestion .= $this->questMulti($item, $status, $no-1, $idWSM);
            }else if($item->TYPEQUESTION_WS == 3){
                $htmlQuestion .= $this->questMiss($item, $status, $no-1, $idWSM);
            }
            $htmlQuestion .= "</div>";

            $no++;
        }
        $htmlQuestion .= $this->renderButton($status, $idWSM);
        return $this->renderQuestion($htmlQuestion, $status);
    }
    public function questEssay($item, $status, $idWSM){
        $ansES = "";
        if($status != "0"){
            $statusDisabled = "disabled";
            $esR = $this->Worksheet->get_essRes(['ID_WSM' => $idWSM, 'ID_ES' => $item->ID_ES]);
            if(!empty($esR)){
                $ansES = $esR->JAWABAN_ESR;
            }

        }else{
            $statusDisabled = "";
        }

        return '
                '.$item->SOAL_ES.'
                <textarea '.$statusDisabled.' type="text" name="answer[]" class="question-text" placeholder="Your Answer" required>'.$ansES.'</textarea>
                <input '.$statusDisabled.' type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">
                <input '.$statusDisabled.' type="hidden" name="ID_QUEST[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_ES.'">
        ';
    }
    public function questMulti($item, $status, $no, $idWSM){
        $ansMC = "";
        if($status != "0"){
            $statusDisabled = "disabled";
            $mcR = $this->Worksheet->get_mcRes(['ID_WSM' => $idWSM, 'ID_MC' => $item->ID_MC]);
            if(!empty($mcR)){
                $ansMC = $mcR->JAWABAN_MCR;
            }
        }else{
            $statusDisabled = "";
        }

        $html = '
            '.$item->SOAL_MC.'
            <div style="margin-top: -10px;margin-bottom: 25px;">
        ';
        
        $resp = explode(';', $item->PILIHAN_MC);
        $i = 0;

        foreach ($resp as $item2) {
            $isChecked = $ansMC == $item2 ? "checked" : "";
            $html .= '
                <div class="input-group">
                    <input '.$statusDisabled.' '.$isChecked.' type="radio" name="answer_'.$no.'" value="'.$item2.'" required /> 
                    <label>'.$this->utils->getChar($i).'. '.$item2.'</label>
                </div>
            ';
            $i++;
        }

        $html .= '
            </div>
            <input '.$statusDisabled.' type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">
            <input '.$statusDisabled.' type="hidden" name="ID_QUEST[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MC.'">
            <input '.$statusDisabled.' type="hidden" name="PASSGRADE_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->PASSGRADE_WS.'">
        ';

        return $html;
    }
    public function questMiss($item, $status, $no, $idWSM){
        $ansMS = "";
        if($status != "0"){
            $statusDisabled = "disabled";
            $ansMS = $this->Worksheet->get_msRes(['ID_WSM' => $idWSM, 'ID_MS' => $item->ID_MS])->JAWABAN_MSR;
        }else{
            $statusDisabled = "";
        }
        $html = str_replace("_", ' <input '.$statusDisabled.' type="text" class="input-isian" name="answer_'.$no.'[]" required /> ', $item->SOAL_MS);
        $html .= '
            <input '.$statusDisabled.' type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">
            <input '.$statusDisabled.' type="hidden" name="ID_QUEST[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MS.'">
            <input '.$statusDisabled.' type="hidden" name="PASSGRADE_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->PASSGRADE_WS.'">
            <input '.$statusDisabled.' type="hidden" value="'.$ansMS.'">
        ';
        return $html;

        // echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MS.'">';
    }
    public function renderButton($status, $idWSM){
        if($status == 
        "0"){
            return '
                <input type="hidden" name="ID_WS" value="'.$idWSM.'" />
                <input type="hidden" name="ID_WSM" value="'.$idWSM.'" />
                <button type="submit" class="viewWrk-btn mr-auto w-50">Submit Test</button>
            ';
        }else if($status == "3"){
            return '
                <input type="hidden" name="ID_WSM" value="'.$idWSM.'" />
                <input type="hidden" name="STATUS_WSM" value="0" />
                <button type="submit" class="btn btn-primary verso-shadow-2">Retake Test</button>
            ';
        }else{
            return '';
        }
    }
    public function renderQuestion($contentQuestion, $status){
        if($status == "0"){
            $html = '<form action="'.site_url('course/submit').'" method="post">';
        }else{
            $html = '<form action="'.site_url('course/takeTest').'" method="post">';
        }

        $html .= '
                '.$contentQuestion.'
            </form>
        ';
        return $html;
    }
    public function takeTest(){
        $param = $_POST;
        $noWS = $param['noWS'];
        unset($param['noWS']);

        $this->Worksheet->update_mahasiswa($param);
        redirect('course/'.$param['ID_WS']."/".$param['ID_WSM']."/".$noWS);
    }
    public function submitCourse() {
        $param = $_POST;
        if($param['TYPEQUESTION_WS'] == "1"){
            $wsmd['ID_WSM']      = $param['ID_WSM'];
            $wsmd['STATUS_WSMD'] = '0';
            $idWSMD = $this->Worksheet->insert_wsmd($wsmd);

            for ($i=0; $i < count($param['ID_QUEST']); $i++) { 
                $essRes['ID_WSMD']      = $idWSMD;
                $essRes['ID_ES']        = $param['ID_QUEST'][$i];
                $essRes['EMAIL_MHS']    = $this->session->userdata('EMAIL_MHS');
                $essRes['JAWABAN_ESR']  = $param['answer'][$i];
                $this->Worksheet->insert_essRes($essRes);
            }
            
            $wsm['ID_WSM'] = $param['ID_WSM'];
            $wsm['STATUS_WSM'] = '1';
            $this->Worksheet->update_mahasiswa($wsm);
        }else if($param['TYPEQUESTION_WS'] == "2"){
            $grade = $this->essGrading($param);

            $wsmd['ID_WSM']      = $param['ID_WSM'];
            $wsmd['SCORE_WSMD']  = $grade;
            $wsmd['STATUS_WSMD'] = $grade >= $param['PASSGRADE_WS'] ? '1' : '2';
            $idWSMD = $this->Worksheet->insert_wsmd($wsmd);

            for ($i=0; $i < count($param['ID_QUEST']); $i++) { 
                $mcRes['ID_WSMD']      = $idWSMD;
                $mcRes['ID_MC']        = $param['ID_QUEST'][$i];
                $mcRes['EMAIL_MHS']    = $this->session->userdata('EMAIL_MHS');
                $mcRes['JAWABAN_MCR']  = $param['answer_'.$i];
                $this->Worksheet->insert_mcRes($mcRes);
            }
            
            $wsm['ID_WSM']          = $param['ID_WSM'];
            $wsm['SCOREFINAL_WSM']  = $grade;
            $wsm['STATUS_WSM']      = $grade >= $param['PASSGRADE_WS'] ? '2' : '3';
            $this->Worksheet->update_mahasiswa($wsm);
        }else if($param['TYPEQUESTION_WS'] == "3"){
            $grade = $this->missGrading($param);
            
            $wsmd['ID_WSM']      = $param['ID_WSM'];
            $wsmd['SCORE_WSMD']  = $grade;
            $wsmd['STATUS_WSMD'] = $grade >= $param['PASSGRADE_WS'] ? '1' : '2';
            $idWSMD = $this->Worksheet->insert_wsmd($wsmd);

            for ($i=0; $i < count($param['ID_QUEST']); $i++) { 
                $msRes['ID_WSMD']      = $idWSMD;
                $msRes['ID_MS']        = $param['ID_QUEST'][$i];
                $msRes['EMAIL_MHS']    = $this->session->userdata('EMAIL_MHS');
                $msRes['JAWABAN_MSR']  = implode(';', $param['answer_'.$i]);
                $this->Worksheet->insert_msRes($msRes);
            }
            
            $wsm['ID_WSM']          = $param['ID_WSM'];
            $wsm['SCOREFINAL_WSM']  = $grade;
            $wsm['STATUS_WSM']      = $grade >= $param['PASSGRADE_WS'] ? '2' : '3';
            $this->Worksheet->update_mahasiswa($wsm);
        }

        $this->session->set_flashdata('alert', $wsm['STATUS_WSM']);

        redirect('course');
    }
    public function essGrading($param){
        $countQuest = count($param['ID_QUEST']);
        $wrongQuest = 0;

        for($i = 0; $i < $countQuest; $i++){
            $rightAns = $this->Worksheet->get_mc(['ID_MC' => $param['ID_QUEST'][$i]]);
            if($rightAns->KUNCIJAWABAN_MC != $param['answer_'.$i]){
                ++$wrongQuest;
            }
        }
        $rightQuest = $countQuest - $wrongQuest;
        return (int)(($rightQuest/$countQuest) * 100);
    }
    public function missGrading($param){
        $countQuest = 0;
        $wrongQuest = 0;

        for($i = 0; $i < count($param['ID_QUEST']); $i++){
            $countQuest += count($param['answer_'.$i]);

            $rightAns   = $this->Worksheet->get_ms(['ID_MS' => $param['ID_QUEST'][$i]]);
            $rightAns   = explode(';', $rightAns->KUNCIJAWABAN_MS);

            for($j = 0; $j < count($rightAns); $j++){
                if(strcasecmp($rightAns[$j], $param['answer_'.$i][$j]) != 0){
                    ++$wrongQuest;
                }
            }
        }

        $rightQuest = $countQuest - $wrongQuest;
        return (int)(($rightQuest/$countQuest) * 100);
    }
}