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
                $no = 1;
                foreach ($courses as $item) {
                    // Desc type question
                    $type = "";
                    if($item->TYPEQUESTION_WS == "1"){
                        $type = "Essay";
                    }else if($item->TYPEQUESTION_WS == "2"){
                        $type = "Multiple Choice";
                    }else if($item->TYPEQUESTION_WS == "3"){
                        $type = "Missing Sentence";
                    }

                    // Check Status
                    $btnStatusWS = '<a href="'.site_url('course/'.$item->ID_WS."/".$item->ID_WSM."/".$no).'" class="viewWrk-btn">View Worksheet</a>';
                    if ($item->STATUS_WSM == "0") {
                        $status = '<div class="ml-auto label"><span class="inprogress">In Progress</span></div>';
                        $isTestFirst = false;
                    } else if ($item->STATUS_WSM == "1") {
                        $status = '<div class="ml-auto label"><span class="waitingforresponse">Waiting</span></div>';
                        $isTestFirst = false;
                    } else if ($item->STATUS_WSM == "2") {
                        $status = '<div class="ml-auto label"><span class="passed">Completed</span></div>';
                    } else if ($item->STATUS_WSM == "3") {
                        $status = '<div class="ml-auto label"><span class="failed">Failed</span></div>';
                        $isTestFirst = false;
                        $btnStatusWS = '
                            <form action="'.site_url('course/takeTest').'" method="post">
                                <input type="hidden" name="ID_WS" value="'.$item->ID_WS.'">
                                <input type="hidden" name="ID_WSM" value="'.$item->ID_WSM.'">
                                <input type="hidden" name="noWS" value="'.$no.'">
                                <input type="hidden" name="STATUS_WSM" value="0">
                                <button type="submit" class="viewWrk-btn">Re-Take Test</button>
                            </form>
                        ';
                    } else {
                        if ($isTestFirst == true) {
                            $status = '<div class="ml-auto label"><span class="taketest">Take Test</span></div>';
                            $isTestFirst = false;
                            $btnStatusWS = '
                                <form action="'.site_url('course/takeTest').'" method="post">
                                    <input type="hidden" name="ID_WS" value="'.$item->ID_WS.'">
                                    <input type="hidden" name="ID_WSM" value="'.$item->ID_WSM.'">
                                    <input type="hidden" name="noWS" value="'.$no.'">
                                    <input type="hidden" name="STATUS_WSM" value="0">
                                    <button type="submit" class="viewWrk-btn">Take Test</button>
                                </form>
                            ';
                        } else {
                            $status = '<div class="ml-auto label"><span class="taketest disabled">Unavailable</span></div>';
                            $statusAllowed      = 'cursor: not-allowed;';
                            $contentWorksheet   = "";
                        }
                    }

                      // Content Worksheet
                      $scoreFinal = $item->SCOREFINAL_WSM == null ? '' : $item->SCOREFINAL_WSM.'/100';
                      $contentWorksheet = '
                      <div id="' . $item->ID_WS . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center opacity-70">
                              <p><b>Type:</b> <br> '.$type.' </p>
                              <p><b>Questions:</b> <br> '.$item->TOTALQUESTION_WS.' Questions </p>
                              <p><b>Score:</b> <br> '.$scoreFinal.' </p>
                              '.$btnStatusWS.'
                          </div>
                      </div>
                  ';

                    echo '
                        <div class="card">
                            <div class="card-header bg-white collapsed flex-column flex-md-row" data-toggle="collapse" style="'.$statusAllowed.'" aria-expanded="false" aria-controls="worksheet'.$no.'" data-target="#' . $item->ID_WS . '">
                                <div class="mr-auto md-mb-0">
                                    <div style="color: #333;font-size: 18px;font-weight: bold;">
                                        Worksheet '.$no.'
                                    </div>
                                    <div style="color: #797D85;font-size: 14px;">
                                        ' . $item->NAMA_WS . '
                                    </div>    
                                </div>
                                
                                '.$status.'
                                <span class="iconify ml-3  d-none d-md-block" data-icon="akar-icons:chevron-up"></span>
                            </div>
                            '.$contentWorksheet.'
                        </div>
                    ';
                    $no++;
                }
            }
            ?>

        </div>
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
    $('.collapsed').click(function(){
        const item = $(this).data('item')

    })
</script>