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
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" allowfullscreen></iframe>
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
                                <h1 class="h2 text-uppercase verso-mb-1 verso-mt-2">Worksheets</h2>
                            </div>
                            <div id="accordion">
                                <?php 
                                    if($this->session->userdata('USER_LOGGED')) {
                                        foreach ($courses as $item) {
                                            echo '
                                                <div class="card">
                                                    <div class="card-header list-group-item list-group-item-action verso-demo-bg-color-quicksand" id="headingTwo">
                                                        <div class="list-group-item-content">
                                                            <button id="dropdown" class="pick-ws btn btn-link collapsed verso-text-light" data-myval="'.$item->ID_WS.'" data-toggle="collapse" data-target="#'.$item->ID_WS.'" aria-expanded="false" aria-controls="'.$item->ID_WS.'">
                                                                '.$item->NAMA_WS.'
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div id="'.$item->ID_WS.'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                        <div id="display-'.$item->ID_WS.'" class="card-body">
                                                        </div>
                                                    </div>
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



</div>
<script>
    $(document).ready(function() {
        $('.pick-ws').click(function(e){
            var id = $(this).data('myval');
            $.ajax({
                url: "<?= site_url('mhs/CourseController/getQuestion/') ?>"+id,
                type: 'GET',
                success: function(res) {
                    console.log(id);
                    $('#display-'+id).html(res);
                }
            });
        });
    });
</script>