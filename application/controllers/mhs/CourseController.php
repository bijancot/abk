<?php

class CourseController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Course');
        if (empty($this->session->userdata('USER_LOGGED'))) {
			redirect();
		};
    }

    public function index(){
        $data['title']      = 'Course';
        $data['courses'] = $this->Course->getAll();
        $this->template->mahasiswa('mhs/course/course', $data);
    }
    public function getQuestion($id) {
        $data = $this->Course->getQuestionbyID($id);
        echo '
            <form action="'.site_url('course/submit').'" method="post">';
            $no = 1;
        foreach ($data as $item) {
            echo "<h5>Question ".$no."</h5>";
            if ($item->TYPEQUESTION_WS == 1) {
                echo $item->SOAL_ES;
                echo '<input type="hidden" name="ID_ES" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_ES.'">';
                echo '<input type="hidden" name="TYPEQUESTION_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->TYPEQUESTION_WS.'">';
                echo '<textarea type="text" name="answer[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            } elseif ($item->TYPEQUESTION_WS == 2) {
                echo $item->SOAL_MC;
                echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MC.'">';
                echo '<textarea type="text" name="answer[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            } elseif ($item->TYPEQUESTION_WS == 3) {
                echo $item->SOAL_MS;
                echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MS.'">';
                echo '<textarea type="text" name="answer[]" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            }
            $no++;
        }
        echo '<input type="hidden" name="ID_WS" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_WS.'">';
        echo '
                <button type="submit" class="btn btn-primary verso-shadow-2">Submit</button>
            </form>
        ';
    }
    public function submitCourse() {
        $param = $_POST;     
        $store = array();
        foreach ($param['answer'] as $item) {
            if($param['TYPEQUESTION_WS'] == 1) {
                $temp['ID_ES'] = $param['ID_ES'];
                $temp['EMAIL_MHS'] = $this->session->userdata('EMAIL_MHS');
                $temp['JAWABAN_ESR'] = $item;
                array_push($store, $temp);
            } else if($param['TYPEQUESTION_WS'] == 2) {

            } else if($param['TYPEQUESTION_WS'] == 3) {

            }
        }
        $data = array(
            'ID_WS' => $param['ID_WS'],
            'EMAIL_MHS' => $this->session->userdata('EMAIL_MHS'),
            'STATUS_WSM' => 1,
            'NPM_MHS' => $this->session->userdata('NPM_MHS')
        );
        $this->Course->insertWM($data);
        $this->Course->insertBatch($store);
        redirect('course');
    }
}