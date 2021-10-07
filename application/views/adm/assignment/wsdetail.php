<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $student[0]->NAMA_MHS ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-view-list"></i></a>
                        <?= empty($ws[0]->NAMA_WS) ? "" : $ws[0]->NAMA_WS ?>
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
                        <?php
                            foreach ($attempts as $items) {
                                if($items->created_at) {
                                    echo '
                                        <div class="mx-1 mb-2">
                                            <a class="btn btn btn-success cardFilled cardNo" data-idws="'.$wsid.'" data-npm="'.$npm.'" data-created="'.str_replace(" ", "%", $items->created_at).'" style="width:200px;">
                                                <span>'.$items->created_at.'</span>
                                            </a>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                        <!-- <div class="mx-1 mb-2">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div id="answers_content" class="card-body">
                    <span>Click any attempts</span>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('.cardNo').click(function(e){
            var id_ws = $(this).data('idws');
            var npm_mhs = $(this).data('npm');
            var created_at = $(this).data('created');
            $.ajax({
                url: `<?= site_url('adm/AssignmentController/getAnswers/') ?>${id_ws}/${npm_mhs}/${created_at}`,
                type: 'GET',
                success: function(res) {
                    $('#answers_content').html(res);
                }
            });
        });
    });
</script>