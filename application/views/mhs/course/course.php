<!-- Content -->
<div class="contentt">

    <div class="container welcome mx-auto"> <!-- class 'welcome' iki khusus gawe page iki, soale gawe padding e gambar illustrasi ndek isor -->

        <div class="card mb-5 py-4 px-5 relative">
            <p class="h2 font-w-700 mt-4">Welcome Back, <?= strtok($this->session->userdata('NAMA_MHS'), " ") ?>!</p>
            <p>What would you like to do today?</p>

            <img src="<?= base_url('assets/src/img/illust.svg'); ?>" class="illust-home">
        </div>

        <div class="card p-0 mb-5">
            <div class="embed-responsive embed-responsive-16by9 rounded-15">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/9hhMUT2U2L4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="card mb-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Documents</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque earum cupiditate maxime aliquid, exercitationem esse. Accusantium reprehenderit vero architecto laboriosam nisi error accusamus, neque nostrum quo modi, perferendis sint enim!</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="">
                        <div class="d-flex align-items-center mb-1">
                            <span class="iconify pdf mr-2" data-icon="carbon:document-pdf"></span>     
                            <p class="mb-0">Augmentative.pdf</p>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <span class="iconify pdf mr-2" data-icon="carbon:document-pdf"></span>     
                            <p class="mb-0">Augmentative.pdf</p>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <span class="iconify pdf mr-2" data-icon="carbon:document-pdf"></span>     
                            <p class="mb-0">Augmentative.pdf</p>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <span class="iconify pdf mr-2" data-icon="carbon:document-pdf"></span>     
                            <p class="mb-0">Augmentative.pdf</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="font-w-600 h2">
            Worksheets
        </p>
        <div id="accordion">


            <?php
            if ($this->session->userdata('USER_LOGGED')) {
                $isTestFirst    = true;
                $statusAllowed  = 'cursor: pointer;';
                foreach ($courses as $item) {
                    $statusWSM  = $item->STATUS_WSM != null ? $item->STATUS_WSM : "kosong";

                    // Content Worksheet
                    $contentWorksheet = '
                        <div id="' . $item->ID_WS . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div id="display-' . $item->ID_WS . '" class="card-body">
                            </div>
                        </div>
                        ';

                    // Check Status
                    if ($item->STATUS_WSM == "0") {
                        $status = '<div class="ml-auto label"><span class="inprogress">In Progress</span></div>';
                        $isTestFirst = false;
                    } else if ($item->STATUS_WSM == "1") {
                        $status = '<div class="ml-auto label"><span class="waitingforresponse">Waiting For Response</span></div>';
                        $isTestFirst = false;
                    } else if ($item->STATUS_WSM == "2") {
                        $status = '<div class="ml-auto label">' . $item->SCOREFINAL_WSM . ' <span class="passed">Passed</span></div>';
                    } else if ($item->STATUS_WSM == "3") {
                        $status = '<div class="ml-auto label">' . $item->SCOREFINAL_WSM . ' <span class="failed">Failed</span></div>';
                        $isTestFirst = false;
                    } else {
                        if ($isTestFirst == true) {
                            $status = '<div class="ml-auto label"><span class="taketest">Take Test</span></div>';
                            $isTestFirst = false;
                        } else {
                            $status = '<div class="ml-auto label"><span class="taketest disabled">Take Test</span></div>';
                            $statusAllowed      = 'cursor: not-allowed;';
                            $contentWorksheet   = "";
                        }
                    }

                    echo '
                        <div class="card">
                            <div class="card-header collapsed flex-column flex-md-row pick-ws list-group-item list-group-item-action" id="headingTwo" style="background: #fff;' . $statusAllowed . '" data-toggle="collapse" data-status="' . $statusWSM . '" data-myval="' . $item->ID_WS . '" data-idwsm="' . $item->ID_WSM . '" data-target="#' . $item->ID_WS . '">
                                <div style="color: #333;font-size: 16px;font-weight: bold;" class="mr-auto mb-4 md-mb-0">
                                ' . $item->NAMA_WS . '
                                </div>
                                ' . $status . '
                                <span class="iconify ml-3 d-none d-md-block" data-icon="akar-icons:chevron-up"></span>
                                </div>
                            ' . $contentWorksheet . '
                            </div>
                            ';
                }
            }
            ?>


            <!-- =================CONTOH TEMPLATE ( AMBIL BODY NYA SAJA )================= -->
            <div class="card">
                <div class="card-header bg-white collapsed flex-column flex-md-row" id="headingTemplate" data-toggle="collapse" data_target="#" aria-expanded="false" aria-controls="templateOne">
                    <div style="color: #333;font-size: 18px;font-weight: bold;" class="mr-auto mb-4 md-mb-0">
                        Contoh Template
                    </div>
                    <div class="ml-auto label"><span class="waitingforresponse">Waiting For Response</span></div>
                    <span class="iconify ml-3  d-none d-md-block" data-icon="akar-icons:chevron-up"></span>
                </div>
                <div id="templateOne" class="collapse show" aria-labelledby="headingTemplate" data-parent="#accordion">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center opacity-70">
                        <p><b>Duration:</b> <br> 1h 30m </p>
                        <p><b>Questions:</b> <br> 10 Questions </p>
                        <p><b>Score:</b> <br> 93/100 </p>
                        <a href="#" class="viewWrk-btn">View Worksheet</a>
                    </div>
                </div>
            </div>
            <!-- =================END OF CONTOH TEMPLATE================= -->

        </div>

        <p class="font-w-600 h2 mt-5">
            Contoh page worksheet 
        </p>
        <div class="card mb-5 py-3 px-5">
            <p class="h2 font-w-700 mt-3">Worksheet 1</p>
            <p class="opacity-70">Augmentative text 1</p>
        </div>
        
        <div class="card mb-3 p-5">
            <p>Question 1</p>
            <p class="h3 font-w-700">What is Argumentation?</p>
            <div class="input-group">
                <input type="radio" name="question1" value="a" id="a">
                <label for="a">A. An argument is a rationale in which the reason presents evidence</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="b" id="b">
                <label for="b">B. Its purpose is to provide a basis for believing the conclusion to be true</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="c" id="c">
                <label for="c">C. An explanation is a rationale in which the reason presents</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="d" id="d">
                <label for="d">D. A cause of some fact represented by the conclusion.</label>
            </div>
        </div>
        <div class="card mb-3 p-5">
            <p>Question 2</p>
            <p class="h3 font-w-700 mb-5">What is Argumentation?</p>

            <input type="text" class="question-text" placeholder="Your Answer">
        </div>
        <div class="card mb-3 p-5">
            <p>Question 3</p>
            <p class="h3 font-w-700 mb-5">What is Argumentation?</p>

            <div class="d-flex flex-wrap">
                <p>An argument is a <input type="text" class="input-isian"> in which the reason <input type="text" class="input-isian"> in support of a claim made in the conclusion. Its purpose is to <input type="text" class="input-isian"> a basis for believing the conclusion to be true. An explanation is a rationale in which the reason presents a cause of some <input type="text" class="input-isian"></p>
                
            </div>
        </div>
        <a href="#" class="viewWrk-btn mr-auto w-50">Submit Test</a>
    </div>

    


</div>
<script>
    $(document).ready(function() {
        $('.pick-ws').click(function(e) {
            var id = $(this).data('myval');
            var idWSM = $(this).data('idwsm');
            var status = $(this).data('status')
            $.ajax({
                url: `<?= site_url('mhs/CourseController/getQuestion/') ?>${id}/${idWSM}/${status}`,
                type: 'GET',
                success: function(res) {
                    $('#display-' + id).html(res);
                }
            });
        });
    });
</script>