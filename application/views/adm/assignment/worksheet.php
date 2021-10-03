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
                                    <th>Score</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $temp = '';
                                    foreach ($worksheet as $item) {
                                        $nilai = 'Not Yet';
                                        $catatan = '-';
                                        $status = '-';
                                        if($item->ID_WS == null){
                                            break;
                                        }                                                                              

                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_WS.'</td>
                                                
                                        ';
                                        foreach ($ws_mhs as $items){
                                            if($items->ID_WSM == null){
                                                break;
                                            }else if($item->ID_WS == $items->ID_WS && $items->NILAI_WSM > $nilai){
                                                $nilai = $items->NILAI_WSM;
                                                $catatan = $items->CATATAN_WSM;
                                                $status = $items->STATUS_WSM;
                                            }
                                        }
                                        $temp = '
                                                <td>'.$nilai.'</td>
                                                <td>'.$catatan.'</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="'. site_url("admin/wsdetail/".$student[0]->NPM_MHS."/".$item->ID_WS."/".$item->TYPEQUESTION_WS) .'" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Worksheet"><i class="bi bi-archive-fill"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';  
                                        echo $temp;
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