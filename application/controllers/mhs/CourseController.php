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
            <form action="'.site_url("").'" method="post" class="contact-form">';
            $no = 1;
        foreach ($data as $item) {
            echo $no;
            if ($item->TYPEQUESTION_WS == 1) {
                echo $item->SOAL_ES;
                echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_ES.'">';
                echo '<textarea type="text" name="answer" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            } elseif ($item->TYPEQUESTION_WS == 2) {
                echo $item->SOAL_MC;
                echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MC.'">';
                echo '<textarea type="text" name="answer" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            } elseif ($item->TYPEQUESTION_WS == 3) {
                echo $item->SOAL_MS;
                echo '<input type="hidden" name="id" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" value="'.$item->ID_MS.'">';
                echo '<textarea type="text" name="answer" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Answer" required></textarea>';
            }
            $no++;
        }
        echo '
                <button type="submit" class="btn btn-primary verso-shadow-2">Submit</button>
                <div class="verso-messages verso-pt-2"></div>
            </form>
        ';
    }
}