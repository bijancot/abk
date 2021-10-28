<main class="page-content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6 class="mb-0 text-uppercase">
                <i class="bi bi-view-list"></i>
                Assignment - <?= $student[0]->NAMA_MHS. ' ('. $student[0]->NPM_MHS .')' ?>
            </h6>
        </div>
    </div>
    
    <hr/>
    
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblUser" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Worksheet</th>
                                    <th>Type</th>
                                    <th>Score</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($worksheet as $item) {
                                        $nilai = '-';
                                        $catatan = '-';
                                        $status = '-';

                                        $type = '';                                                         
                                        if($item->TYPEQUESTION_WS == 1){
                                            $type = 'Essay';
                                        }else if($item->TYPEQUESTION_WS == 2){
                                            $type = 'Multiple Choice';
                                        }else if($item->TYPEQUESTION_WS == 3){
                                            $type = 'Missing Sentence';
                                        }else if($item->TYPEQUESTION_WS == 4){
                                            $type = 'Matching';
                                        }else if($item->TYPEQUESTION_WS == 5){
                                            $type = 'True or False';
                                        }

                                        foreach ($ws_mhs as $items){
                                            if($item->ID_WS == $items->ID_WS){
                                                $nilai = $items->SCOREFINAL_WSM;
                                                //$catatan = $items->CATATAN_WSM;
                                                $status = $items->STATUS_WSM;

                                                                                           
                                                if($status == null){
                                                    $status = 'Have not taken test';
                                                }else if($status == 0){
                                                    $status = 'In progress';
                                                }else if ($status == 1) {
                                                    $status = 'Waiting for response';
                                                } else if ($status == 2){
                                                    $status = 'Passed';
                                                } else {
                                                    $status = 'Failed';
                                                }
                                            } 
                                        }
                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_WS.'</td>
                                                <td>'.$type.'</td>
                                                <td>'.$nilai.'</td>
                                                <td>-</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="'. site_url("admin/wsdetail/".$student[0]->NPM_MHS."/".$item->ID_WS."/".$item->TYPEQUESTION_WS) .'" class="btn btn-sm btn-info text-white" style="font-size: 13px;">History</a>
                                                    </div>
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
    </div>
</main>

<!-- Modal Detail -->
<div class="modal fade" id="mdlDetail" tabindex="-1" aria-labelledby="mdlDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDetail">Student Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h5><label for="nama">Nama</label></h5>
                            <span id="namaMhs"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h5><label for="npm">NPM</label></h5>
                            <span id="npmMhs"></span>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h5><label for="email">Email</label></h5>
                            <span id="emailMhs"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <h5><label for="jenkel">Jenis Kelamin</label></h5>
                            <span id="mdlDetail_jk"></span>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h5><label for="alamat">Alamat</label></h5>
                            <span id="alamatMhs"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h5><label for="telp">Telepon</label></h5>
                            <span id="telpMhs"></span>
                        </div>
                    </div>
                </div><br>                        
                <div class="form-group">
                    <h5><label for="status">Status</label></h5>
                    <span id="mdlDetail_status"></span>
                </div>
            </div>                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tblUser').DataTable()
    })
</script>