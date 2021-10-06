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
        $data['title']              = 'Course';
        $data['courses']            = $this->Course->getAll($email);
        $this->template->mahasiswa('mhs/course/course', $data);
    }
    public function getQuestion($id, $idWSM, $status) {
        $htmlQuestion = "";
        $data = $this->Course->getQuestionbyID($id);

        $no = 1;
        foreach ($data as $item) {
            $htmlQuestion .= "<h5>Question ".$no."</h5>";
            if($item->TYPEQUESTION_WS == 1){
                $htmlQuestion .= $this->questEssay($item, $status, $idWSM);
            }else if($item->TYPEQUESTION_WS == 2){
                $htmlQuestion .= $this->questMulti($item, $status, $no);
            }else if($item->TYPEQUESTION_WS == 3){

            }

            $no++;
        }
        $htmlQuestion .= $this->renderButton($status, $idWSM);
        $this->renderQuestion($htmlQuestion, $status);
        
        // echo '
        //     <form action="'.site_url('course/submit').'" method="post">';
        //     $no = 1;
        // foreach ($data as $item) {
        //     echo "<h5>Question ".$no."</h5>";
        //     if ($item->TYPEQUESTION_WS == 1) {
        //         echo $item->SOAL_ES;
        //         echo '<input type="hidden" name="ID_ES" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_ES.'">';
        //         echo '<input type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">';
        //         echo '<textarea type="text" name="answer[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
        //     } elseif ($item->TYPEQUESTION_WS == 2) {
        //         echo $item->SOAL_MC;

        //         $resp = explode(';', $item->PILIHAN_MC);
        //         echo '<div style="margin-top: -10px;margin-bottom: 25px;">';
        //         $i = 0;
        //         foreach ($resp as $item2) {
        //             echo '
        //                 <div><input type="radio" name="answer_'.$no.'" value="'.$item2.'" required /> '.$this->utils->getChar($i).'. '.$item2.'</div>
        //             ';
        //             $i++;
        //         }
        //         echo '</div>';

        //         echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MC.'">';
        //     } elseif ($item->TYPEQUESTION_WS == 3) {
        //         echo str_replace("_", ' <input type="text" style="font-size: 14px;color: #A79086;background-color: #EFE9E8;font-family: Roboto;border-left: 3px solid #A79086;" placeholder="Enter answer" name="answer_'.$no.'[]" /> ', $item->SOAL_MS);
                
        //         echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MS.'">';
        //     }
        //     $no++;
        // }
        // echo '<input type="hidden" name="ID_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_WS.'">';
        // echo '
        //         <button type="submit" class="btn btn-primary verso-shadow-2">Submit</button>
        //     </form>
        // ';
    }
    public function questEssay($item, $status, $idWSM){
        $ansES = "";
        if($status != "0"){
            $statusDisabled = "disabled";
            $ansES = $this->Worksheet->get_essRes(['ID_WSM' => $idWSM, 'ID_ES' => $item->ID_ES])->JAWABAN_ESR;
        }else{
            $statusDisabled = "";
        }
        return '
                '.$item->SOAL_ES.'
                <textarea '.$statusDisabled.' type="text" name="answer[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required>'.$ansES.'</textarea>
                <input '.$statusDisabled.' type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">
                <input '.$statusDisabled.' type="hidden" name="ID_QUEST[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_ES.'">
        ';
    }
    public function questMulti($item, $status, $no){
        $statusDisabled = $status != "0" ? "disabled" : "";
        $html = '
            '.$item->SOAL_MC.'
            <div style="margin-top: -10px;margin-bottom: 25px;">
        ';
        
        $resp = explode(';', $item->PILIHAN_MC);
        $i = 0;
        foreach ($resp as $item2) {
            $html .= '
                <div><input '.$statusDisabled.' type="radio" name="answer_'.$no.'" value="'.$item2.'" required /> '.$this->utils->getChar($i).'. '.$item2.'</div>
            ';
            $i++;
        }
        $html .= '
            </div>
            <input '.$statusDisabled.' type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">
        ';

        return $html;
    }
    public function renderButton($status, $idWSM){
        if($status == "kosong"){
            return '
                <input type="hidden" name="ID_WSM" value="'.$idWSM.'" />
                <input type="hidden" name="STATUS_WSM" value="0" />
                <button type="submit" class="btn btn-primary verso-shadow-2">Take Test</button>
            ';
        }else if($status == "0"){
            return '
                <input type="hidden" name="ID_WSM" value="'.$idWSM.'" />
                <button type="submit" class="btn btn-primary verso-shadow-2">Submit</button>
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
            echo '<form action="'.site_url('course/submit').'" method="post">';
        }else{
            echo '<form action="'.site_url('course/takeTest').'" method="post">';
        }

        echo '
                '.$contentQuestion.'
            </form>
        ';
    }
    public function takeTest(){
        $param = $_POST;
        $this->Worksheet->update_mahasiswa($param);
        redirect('course');
    }
    public function submitCourse() {
        $param = $_POST;
        // print_r($param['ID_QUEST'][0]);
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
        }
        // print_r($param);
        
        // $storeWM['ID_WS']       = $param['ID_WS'];
        // $storeWM['EMAIL_MHS']   = $this->session->userdata('EMAIL_MHS');
        // $storeWM['NPM_MHS']     = $this->session->userdata('NPM_MHS');
        // $storeWM['STATUS_WSM']  = "0";
        // $this->Course->insertWM($storeWM);

        
        // $this->db->insert();
        
        // foreach ($param['answer'] as $item) {
        //     if($param['TYPEQUESTION_WS'] == 1) {
        //         $temp['ID_ES'] = $param['ID_ES'];
        //         $temp['EMAIL_MHS'] = $this->session->userdata('EMAIL_MHS');
        //         $temp['JAWABAN_ESR'] = $item;
        //         array_push($store, $temp);
        //     } else if($param['TYPEQUESTION_WS'] == 2) {
        //         print_r($param);
        //     } else if($param['TYPEQUESTION_WS'] == 3) {

        //     }
        // }
        // $data = array(
        //     'ID_WS' => $param['ID_WS'],
        //     'EMAIL_MHS' => $this->session->userdata('EMAIL_MHS'),
        //     'STATUS_WSM' => 1,
        //     'NPM_MHS' => $this->session->userdata('NPM_MHS')
        // );
        // $this->Course->insertWM($data);
        // $this->Course->insertBatch($store);
        redirect('course');
    }
}