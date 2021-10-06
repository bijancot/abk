<!-- Content -->
<div class="verso-content">

    <div class="section">
        <div class="section-background">
            <div class="section-bg-image section-bg-image-size-cover section-bg-image-position-top verso-demo-bg-image-01"></div>
        </div>
        <div class="section-content">
            <div class="container">

                <div class="row verso-pb-18 verso-pt-25">
                    <div class="col-lg-12">

                        <div class="card verso-shadow-10 verso-shadow-hover-15 verso-transition verso-mb-3 verso-os-animation verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".3s">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h1 class="h2 card-title text-uppercase verso-mb-1">
                                    Argument
                                </h1>
                                <!-- <h4 class="verso-mb-2 text-muted">
                                    by
                                    <a href="tutor.html" class="text-muted">John Langan</a>
                                </h4> -->
                                <p class="card-text verso-mb-0">The most critical first step to becoming a web designer is learning how to code HTML. By the end of this short course you’ll know what HTML is, how it works, and how to use its most common elements. You’ll go from a blank slate to having your first fully functioning, basic hand-coded page. This will give you the fundamental foundation on which all your future designs can be built. So let’s jump into “Start Here: Learn Basic HTML”.</p>
                            </div>
                        </div>
                        <h2 class="verso-mb-2 verso-mt-2">
                            Worksheets
                        </h2>
                        <div id="accordion">
                            <?php 
                                if($this->session->userdata('USER_LOGGED')) {
                                    $isTestFirst    = false;
                                    $statusAllowed  = 'cursor: pointer;';
                                    foreach ($courses as $item) {
                                        $statusWSM  = $item->STATUS_WSM != null ? $item->STATUS_WSM : "kosong";
                                        
                                        // Content Worksheet
                                        $contentWorksheet = '
                                            <div id="'.$item->ID_WS.'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div id="display-'.$item->ID_WS.'" class="card-body">
                                                </div>
                                            </div>
                                        ';

                                        // Check Status
                                        if($item->STATUS_WSM == "0"){
                                            $status = '<div style="float: right;background: #FFE66D;padding: 3px 10px;color: white;border-radius: 15px;font-weight: 600;">In Progress</div>';
                                        }else if($item->STATUS_WSM == "1"){
                                            $status = '<div style="float: right;background: #56CBF9;padding: 3px 10px;color: #fff;border-radius: 15px;font-weight: 600;">Waiting For Response</div>';
                                        }else if($item->STATUS_WSM == "2"){
                                            $status = '<div style="float: right;background: #27ae60;padding: 3px 10px;color: #fff;border-radius: 15px;font-weight: 600;">Passed</div>';
                                            $isTestFirst = true;
                                        }else if($item->STATUS_WSM == "3"){
                                            $status = '<div style="float: right;background: #e74c3c;padding: 3px 10px;color: #fff;border-radius: 15px;font-weight: 600;">Failed</div>';
                                        }else{
                                            if($isTestFirst == true){
                                                $status = '<div style="float: right;background: #F0803C;padding: 3px 10px;color: white;border-radius: 15px;font-weight: 600;">Take Test</div>';
                                                $isTestFirst = false;
                                            }else{
                                                $status = '<div style="float: right;background: #D7D7D7;padding: 3px 10px;color: #555555;border-radius: 15px;font-weight: 600;">Take Test</div>';
                                                $statusAllowed      = 'cursor: not-allowed;';
                                                $contentWorksheet   = "";
                                            }
                                        }

                                        echo '
                                            <div class="card">
                                                <div class="card-header pick-ws list-group-item list-group-item-action" id="headingTwo" style="background: #fff;'.$statusAllowed.'" data-toggle="collapse" data-status="'.$statusWSM.'" data-myval="'.$item->ID_WS.'" data-idwsm="'.$item->ID_WSM.'" data-target="#'.$item->ID_WS.'">
                                                    <div style="color: #333;font-size: 16px;font-weight: bold;">
                                                        '.$item->NAMA_WS.'
                                                    </div>
                                                    '.$status.'
                                                </div>
                                                '.$contentWorksheet.'
                                            </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



</div>
<script>
    $(document).ready(function() {
        $('.pick-ws').click(function(e){
            var id = $(this).data('myval');
            var idWSM = $(this).data('idwsm');
            var status = $(this).data('status')
            $.ajax({
                url: `<?= site_url('mhs/CourseController/getQuestion/') ?>${id}/${idWSM}/${status}`,
                type: 'GET',
                success: function(res) {
                    $('#display-'+id).html(res);
                }
            });
        });
    });
</script>