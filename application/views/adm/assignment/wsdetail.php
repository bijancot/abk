<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $student[0]->NAMA_MHS ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-view-list"></i></a>
                        <?= $questions[0]->NAMA_WS?>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h5 class="card-title">Attempts</h5>
                    </div>
                    <hr>
                    <div id="list-question" class="d-flex flex-wrap justify-content-center">
                        <div class="mx-1 mb-2">
                            <a class="btn btn btn-danger cardFilled cardNo" style="width:200px;">
                                <span>8-03-2021</span>
                            </a>
                        </div>
                        <div class="mx-1 mb-2">
                            <a class="btn btn-danger cardNoFilled cardNo" style="width:200px;">
                                <span>9-03-2021</span>
                            </a>
                        </div>
                        <div class="mx-1 mb-2">
                            <a class="btn btn-success cardNoFilled cardNo" style="width:200px;">
                                <span>10-03-2021</span>
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h5 id="question_title" class="card-title">10-03-2021</h5>
                        </div>
                    </div>
                    <hr>
                    <form id="formSubmit" action="#" method="post">
                        <div id="question_content">                            
                            <?php                                
                                $no = 1;
                                if($questions[0]->TYPEQUESTION_WS == 1){
                                    foreach ($questions as $items) {
                                        $text = str_replace("<p>", "", $items->SOAL);
                                        echo '
                                            <div>
                                                <span><b>'.$no.'. '.$text.'</b>Answer</span>
                                                <input type="text" class="form-control radius-10"style="width:70px;
                                                font-size:14px;text-align:center;margin-top:5px;" placeholder="Score">
                                                <span style="font-size:12px;color:#bbbbbb;"> Max Score : '.$items->GRADE_ES.'</span>
                                            </div>
                                            ';
                                        $no++;
                                    } 
                                }else{
                                    foreach ($questions as $items) {
                                        $text = str_replace("<p>", "", $items->SOAL);
                                        echo '
                                        <div>
                                        <span><b>'.$no.'. '.$text.'</b>Answer</span>
                                        </div><br>
                                        ';
                                        $no++;
                                    }
                                }                                
                                echo'     
                                    <hr>       
                                    <div>
                                        <span><b>Feedback</b></span>
                                        <textarea class="form-control radius-10" rows="3" style="width:500px;
                                        font-size:14px; margin-top: 10px;" placeholder=""></textarea>
                                    </div>
                                    <br>
                                    <div style="text-align: left;">
                                    <button id="btn-save" class="btn btn-success btn-sm">Submit</button>
                                    </div>
                                ';
                                ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>

</script>