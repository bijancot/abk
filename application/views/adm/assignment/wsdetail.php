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
                    <table style="width:100%;margin-top:10px;">
                        <tr style="text-align:center;height:20px;">
                            <th style="border-right: solid 1px #bbb; width:50%;">Total</th>      
                            <th style="width:50%;">Failed</th>                      
                        </tr>
                        <tr style="text-align:center;">
                            <td style="border-right: solid 1px #bbb;"><?= $totalattempt ?></td>
                            <td><?= $totalfailed ?></td>
                        </tr>
                    </table>
                    <hr>
                    <div id="list-attempts" class="d-flex flex-wrap justify-content-center">
                        <?php
                            foreach ($attempts as $items) {
                                if($items->created_at) {
                                    echo '
                                        <div class="mx-1 mb-2">
                                            <a class="btn btn ';
                                            if($items->STATUS_WSMD == 2) {
                                                echo 'btn-danger';
                                            } else if ($items->STATUS_WSMD == 1) {
                                                echo 'btn-success';
                                            } else {
                                                echo 'btn-warning';
                                            }
                                    echo ' cardFilled cardNo" data-idws="'.$wsid.'" data-npm="'.$npm.'" data-tipe="'.$tipe.'" data-created="'.str_replace(" ", "%", $items->created_at).'" style="width:200px;">
                                                <span>'.date_format(date_create($items->created_at), "d M Y H:i:s").'</span>
                                            </a>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div id="answers_content" class="card-body">                    
                    <?php 
                        $created_at = '404';
                        if($latest != NULL){
                            $created_at = str_replace(" ", "%", $latest);                            
                        };                        
                    ?>                    
                    <span>Loading...</span>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= site_url('adm/AssignmentController/getAnswers/'.$wsid.'/'.$npm.'/'.$tipe.'/'.$created_at) ?>",
            type: "GET",
            success: function(res) {
                $('#answers_content').html(res);
            }
        });

        $('.cardNo').click(function(e){
            var id_ws = $(this).data('idws');
            var npm_mhs = $(this).data('npm');
            var tipe = $(this).data('tipe');
            var created_at = $(this).data('created');
            $.ajax({
                url: `<?= site_url('adm/AssignmentController/getAnswers/') ?>${id_ws}/${npm_mhs}/${tipe}/${created_at}`,
                type: 'GET',
                success: function(res) {
                    $('#answers_content').html(res);
                }
            });
        });
    });
    // Number only input
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    };

    $(function () {
       $( "#numberBox" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              $(this).val(max);
          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
          }       
        }); 
    });
</script>