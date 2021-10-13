<!-- Content -->
<div class="contentt">

    <div class="container welcome mx-auto">
        <!-- class 'welcome' iki khusus gawe page iki, soale gawe padding e gambar illustrasi ndek isor -->

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
        <?php
        if ($this->session->userdata('USER_ISVERIF') == '0') {
            echo '
                    <div class="card mb-5 mt-5 pt-3 pb-3 pl-3" style="color: #FF6C5A;font-weight: bold;">
                        Opps, your account has not been verified by admin!
                    </div>
                ';
        }
        ?>

        <div id="accordion">
            <?php
            if ($this->session->userdata('USER_LOGGED')) {
                if ($this->session->userdata('USER_ISVERIF') == '0') {
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
                        $scoreFinal = $item->SCOREFINAL_WSM == null ? '' : $item->SCOREFINAL_WSM . '/100';
                        $contentWorksheet = '
                            <div id="' . $item->ID_WS . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center opacity-70">
                                    <p><b>Type:</b> <br> ' . $type . ' </p>
                                    <p><b>Questions:</b> <br> ' . $item->TOTALQUESTION_WS . ' Questions </p>
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

        <div class="card mb-3 p-5">
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
        </div>

    </div>

    <div class="modal fade" id="mdlGame" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="webgl-content">
                        <div id="unityContainer"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
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