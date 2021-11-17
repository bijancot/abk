<!-- Content -->
<div class="contentt">

    <div class="container xtra-padding-lg welcome mx-auto">
        <!-- class 'welcome' iki khusus gawe page iki, soale gawe padding e gambar illustrasi ndek isor -->

        <div class="card mb-5 py-4 px-5 relative">
            <p class="h2 font-w-700 mt-4">Welcome Back, <?= strtok($this->session->userdata('NAMA_MHS'), " ") ?>!</p>
            <p>What would you like to do today?</p>

            <img src="<?= base_url('assets/src/img/illust.svg'); ?>" class="illust-home">
        </div>

        <div class="card p-0 mb-5">
            <div class="embed-responsive embed-responsive-16by9 rounded-15">
                <iframe width="560" height="315" src="<?= site_url('assets/video/video_argumentative.mp4')?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="card mb-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                    <a class="nav-item nav-link" id="nav-video-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-video" aria-selected="true">Videos</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">An argument is a rationale in which the reason presents evidence in support of a claim made in the conclusion. Its purpose is to provide a basis for believing the conclusion to be true. An explanation is a rationale in which the reason presents a cause of some fact represented by the conclusion.</div>
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
                <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
                    <div class="table-responsive">
                        <table id="tblVideo" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    function getYoutubeEmbedUrl($url) {
                                        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                                        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                                        
                                        if (preg_match($longUrlRegex, $url, $matches)) {
                                            $youtube_id = $matches[count($matches) - 1];
                                        }
                                        
                                        if (preg_match($shortUrlRegex, $url, $matches)) {
                                            $youtube_id = $matches[count($matches) - 1];
                                        }
                                        return 'https://www.youtube.com/embed/' . $youtube_id ;
                                    }
                                    $no = 1;
                                    foreach ($videos as $item) {
                                        if($item->ID_VD == null){
                                            break;
                                        }
                                        
                                        if (strpos($item->LINK_VD, 'https://www.youtube.com') || strpos($item->LINK_VD, 'https://youtu.be')) {
                                            $item->LINK_VD = getYoutubeEmbedUrl($item->LINK_VD);
                                        }

                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_VD.'</td>
                                                <td>
                                                    <iframe width="640" height="360" src="'.$item->LINK_VD.'" title="'.$item->NAMA_VD.'" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </td>
                                            </tr>
                                        ';
                                        $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <p class="font-w-600 h2">
            Worksheets
        </p>
        <?php
            if ($this->session->tempdata("auth_msg")) {
                echo '
                    <div class="card mb-5 mt-5 pt-3 pb-3 pl-3">
                        <span>'.$this->session->tempdata('auth_msg').'</span>
                    </div>
                ';
            }

            if ($this->session->userdata('USER_ISVERIF') == '0') {
                echo '
                        <div class="card mb-5 mt-5 pt-3 pb-3 pl-3" style="color: #FF6C5A;">
                            <span>Opps, your account has not been verified!<a href="'.site_url('email-verification').'" style="font-weight: bold;color: #FF6C5A;text-decoration:underline"> activate now</a></span>
                        </div>
                    ';
            }
            if($this->session->userdata('USER_ISACTIVE') == '0'){
                echo '
                    <div class="card mb-5 mt-5 pt-3 pb-3 pl-3" style="color: #FF6C5A;">
                        <span>Opps, your account has disabled by admin.</span>
                    </div>
                ';
            }
        
        ?>

        <div id="accordion">
            <?php
            if ($this->session->userdata('USER_LOGGED')) {
                if ($this->session->userdata('USER_ISVERIF') == '0' || $this->session->userdata('USER_ISACTIVE') == '0') {
                    $isTestFirst    = false;
                    $statusContent = false;
                } else {
                    $isTestFirst    = true;
                    $statusContent = true;
                }
                $statusAllowed  = 'cursor: pointer;';
                $no = 1;
                foreach ($courses as $item) {

                    // Desc type question
                    $type = "";
                    if ($item->TYPEQUESTION_WS == "1") {
                        $type = "Essay";
                    } else if ($item->TYPEQUESTION_WS == "2") {
                        $type = "Multiple Choice";
                    } else if ($item->TYPEQUESTION_WS == "3") {
                        $type = "Missing Sentence";
                    }else if($item->TYPEQUESTION_WS == "4"){
                        $type = "Matching";
                    }else if($item->TYPEQUESTION_WS == "5"){
                        $type = "True or False";
                    }

                    // Check Status
                    $btnStatusWS = '<a href="' . site_url('course/' . $item->ID_WS . "/" . $item->ID_WSM . "/" . $no) . '" class="viewWrk-btn">View Worksheet</a>';
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
                            <form action="' . site_url('course/takeTest') . '" method="post">
                                <input type="hidden" name="ID_WS" value="' . $item->ID_WS . '">
                                <input type="hidden" name="ID_WSM" value="' . $item->ID_WSM . '">
                                <input type="hidden" name="noWS" value="' . $no . '">
                                <input type="hidden" name="STATUS_WSM" value="0">
                                <button type="submit" class="viewWrk-btn">Re-Take Test</button>
                            </form>
                        ';
                    } else {
                        if ($isTestFirst == true) {
                            $status = '<div class="ml-auto label"><span class="taketest">Take Test</span></div>';
                            $isTestFirst = false;
                            $btnStatusWS = '
                                <form action="' . site_url('course/takeTest') . '" method="post">
                                    <input type="hidden" name="ID_WS" value="' . $item->ID_WS . '">
                                    <input type="hidden" name="ID_WSM" value="' . $item->ID_WSM . '">
                                    <input type="hidden" name="noWS" value="' . $no . '">
                                    <input type="hidden" name="STATUS_WSM" value="0">
                                    <button type="submit" class="viewWrk-btn">Take Test</button>
                                </form>
                            ';
                        } else {
                            $status = '<div class="ml-auto label"><span class="taketest disabled">Unavailable</span></div>';
                            $statusAllowed      = 'cursor: not-allowed;';
                            $statusContent = false;
                        }
                    }

                    // Content Worksheet
                    $contentWorksheet = '';
                    if ($statusContent == true) {
                        $scoreFinal = $item->SCOREFINAL_WSM == null? '-' : $item->SCOREFINAL_WSM . '/100';
                        $contentWorksheet = '
                            <div id="' . $item->ID_WS . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center opacity-70">
                                    <p><b>Type:</b> <br> ' . $type . ' </p>
                                    <p><b>Questions:</b> <br> ' . $item->TOTALQUESTION_WS . ' Questions </p>
                                    <p><b>Passing Grade:</b> <br> ' . $item->PASSGRADE_WS . '</p>
                                    <p><b>Score:</b> <br> ' . $scoreFinal . ' </p>
                                    ' . $btnStatusWS . '
                                </div>
                            </div>
                        ';
                    }

                    echo '
                        <div class="card">
                            <div class="card-header bg-white collapsed flex-column flex-md-row" data-toggle="collapse" style="' . $statusAllowed . '" aria-expanded="false" aria-controls="worksheet' . $no . '" data-target="#' . $item->ID_WS . '">
                                <div class="mr-auto md-mb-0">
                                    <div style="color: #333;font-size: 18px;font-weight: bold;">
                                        Worksheet ' . $no . '
                                    </div>
                                    <div style="color: #797D85;font-size: 14px;">
                                        ' . $item->NAMA_WS . '
                                    </div>    
                                </div>
                                
                                ' . $status . '
                                <span class="iconify ml-3  d-none d-md-block" data-icon="akar-icons:chevron-up"></span>
                            </div>
                            ' . $contentWorksheet . '
                        </div>
                    ';
                    $no++;
                }
            }
            ?>

        </div>

        <!-- <div class="card mb-3 p-5">
            <p class="h5 font-w-700 mb-3">Question 1</p>

            <div class="row">
                <div class="col-12 col-md-6 primary-bg p-3 rounded-15">
                    <p><b>Lorem ipsum</b> dolor, sit amet consectetur adipisicing elit. Libero unde laboriosam provident voluptate dolorum quidem, quia corporis aut dolore dolorem labore architecto aspernatur natus odio quam distinctio saepe repellendus ipsam.</p>
                </div>
                <div class="col-12 col-md-6 px-0 pl-md-3 mt-3 mt-md-0">
                    <select class="custom-select" id="gender2">
                        <option selected>Choose...</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-3 p-5">
            <button class="btn btn-primary" onclick="alertSuccess();">
                Debug Game Modal
            </button>
        </div> -->

    </div>

    <div class="modal fade pl-0" id="mdlGame" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Puzzle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-game">

                        <div class="webgl-wrapper">
                            <div class="aspect" style="margin-top: calc(100% / 400 * 600);"></div>
                            <div class="webgl-content">
                                <div id="unityContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tblVideo').DataTable()
        <?php
        if ($this->session->flashdata('alert') == '1') {
            echo 'alertWaiting();';
        } else if ($this->session->flashdata('alert') == '2') {
            echo 'alertSuccess();';
        } else if ($this->session->flashdata('alert') == '3') {
            echo 'alertFailed();';
        }

        if ($this->session->flashdata('err_noti')) {
            echo 'alertNoti("' . $this->session->flashdata('err_noti') . '")';
        }
        ?>
    });
</script>