<main class="page-content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6 class="mb-0 text-uppercase">
                <i class="bi bi-view-list"></i>
                Students List
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
                                    <th>Name</th>
                                    <th>NPM</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($students as $item) {
                                        if($item->EMAIL_MHS == null){
                                            break;
                                        }
                                        
                                        $status = "";
                                        $btnVerif = "";
                                        if($item->ISVERIF_MHS == '1'){
                                            $status = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Verified
                                                </span>
                                            ';
                                            $btnVerif = '<a href="#" data-id="'.$item->NPM_MHS.'" data-isverif="0" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Unverify"><i class="bi bi-x-circle-fill"></i></a>';
                                        }else{
                                            $status = '
                                            <span class="badge bg-light-danger text-danger w-100">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Unverified
                                            </span>
                                            ';
                                            $btnVerif = '<a href="#" data-id="'.$item->NPM_MHS.'" data-isverif="1" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Verify"><i class="bi bi-check-circle-fill"></i></a>';
                                        }

                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_MHS.'</td>
                                                <td>'.$item->NPM_MHS.'</td>
                                                <td>'.$item->EMAIL_MHS.'</td>
                                                <td>'.$item->TELP_MHS.'</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="#" class="text-info mdlDetail" data-id="'.$item->NPM_MHS.'" data-jk="'.$item->JK_MHS.'" data-status="'.$item->ISVERIF_MHS.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-file-text-fill"></i></a>
                                                        '.$btnVerif.'
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
<!-- Modal Change Status -->
<div class="modal fade" id="mdlStatus" tabindex="-1" aria-labelledby="mdlStatus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlStatus">Change Student Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/student/changeStatus')?>" method="post">
                    <div class="modal-body">
                        <h5>Are you sure you want to change the status of this user to <code id="mdlStatus_status"></code> </h5>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlStatus_id" class="form-control" name="NPM_MHS">
                <input type="hidden" id="mdlStatus_isverif" class="form-control" name="ISVERIF_MHS">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tblUser').DataTable()
    })
    $('#tblUser tbody').on('click', '.mdlStatus', function(){
        $('#mdlStatus').modal('show');
        const id = $(this).data('id')
        const isverif = $(this).data('isverif')
        isverif == "0" ? $('#mdlStatus_status').html('unverified') : $('#mdlStatus_status').html('verified')
        $('#mdlStatus_id').val(id)
        $('#mdlStatus_isverif').val(isverif)
    })
    $('#tblUser tbody').on('click', '.mdlDetail', function() {        
        $('#mdlDetail').modal('show');
        const id = $(this).data('id')
        const jk = $(this).data('jk')
        const status = $(this).data('status')
        jk == "1" ? $('#mdlDetail_jk').html('Laki-laki') : $('#mdlDetail_jk').html('Perempuan')
        status == "1" ? $('#mdlDetail_status').html('Verified') : $('#mdlDetail_status').html('Unverified')
        $.ajax({
            url: "<?= site_url('admin/student/ajxGet') ?>",
            type: "post",
            dataType: 'json',
            data: {
                NPM_MHS: id
            },
            success: res => {
                $('#namaMhs').html(res[0].NAMA_MHS)
                $('#npmMhs').html(res[0].NPM_MHS)
                $('#emailMhs').html(res[0].EMAIL_MHS)
                $('#alamatMhs').html(res[0].ALAMAT_MHS)
                $('#telpMhs').html(res[0].TELP_MHS)
            }
        })
    })
</script>