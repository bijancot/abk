<main class="page-content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6 class="mb-0 text-uppercase">
                <i class="bi bi-book"></i>
                <?= $worksheet[0]->NAMA_WS ?> - Student Score
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
                                    <th>NPM</th>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($students as $item) {
                                        $nilai = '-';
                                        $catatan = '-';
                                        $status = '-';
                                        foreach ($score as $items){
                                            if($item->NPM_MHS == $items->NPM_MHS){
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
                                                <td>'.$item->NPM_MHS.'</td>
                                                <td>'.$item->NAMA_MHS.'</td>
                                                <td>'.$nilai.'</td>
                                                <td>-</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="'. site_url("admin/wsdetail/".$item->NPM_MHS."/".$worksheet[0]->ID_WS."/".$worksheet[0]->TYPEQUESTION_WS) .'" class="text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Answer"><i class="bi bi-archive-fill"></i></a>
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