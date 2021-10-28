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
                                        if($item->ISACTIVE_MHS == null){
                                            $status = '
                                                <span class="badge bg-light-warning text-warning w-100">
                                                    <i class="bi bi-info-circle-fill"></i>
                                                    Not Verified
                                                </span>
                                            ';
                                        }else if($item->ISACTIVE_MHS == '1'){
                                            $status = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Actived
                                                </span>
                                            ';
                                            $btnVerif = '<a href="#" data-id="'.$item->NPM_MHS.'" data-isactive="0" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><i class="bi bi-x-circle-fill"></i></a>';
                                        }else{
                                            $status = '
                                            <span class="badge bg-light-danger text-danger w-100">
                                            <i class="bi bi-x-circle-fill"></i>
                                                Disabled
                                            </span>
                                            ';
                                            $btnVerif = '<a href="#" data-id="'.$item->NPM_MHS.'" data-isactive="1" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate"><i class="bi bi-check-circle-fill"></i></a>';
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
                                                        <a href="#" class="text-info mdlDetail" data-id="'.$item->NPM_MHS.'" data-status="'.$item->ISACTIVE_MHS.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-file-text-fill"></i></a>
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
                            <h5><label for="telp">Telepon</label></h5>
                            <span id="telpMhs"></span>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="form-group">
                        <h5><label for="jenkel">Jenis Kelamin</label></h5>
                            <span id="mdlDetail_jk"></span>
                        </div>
                    </div> -->
                </div><br>
                <!-- <div class="row">
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
                </div><br>                         -->
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
                <input type="hidden" id="mdlStatus_isactive" class="form-control" name="ISACTIVE_MHS">
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
        const isactive = $(this).data('isactive')
        isactive == "0" ? $('#mdlStatus_status').html('disable') : $('#mdlStatus_status').html('active')
        $('#mdlStatus_id').val(id)
        $('#mdlStatus_isactive').val(isactive)
    })
    $('#tblUser tbody').on('click', '.mdlDetail', function() {        
        $('#mdlDetail').modal('show');
        const id = $(this).data('id')
        // const jk = $(this).data('jk')
        const status = $(this).data('status')
        // jk == "1" ? $('#mdlDetail_jk').html('Laki-laki') : $('#mdlDetail_jk').html('Perempuan')
        if(status == "1"){
            $('#mdlDetail_status').html('Active')
        }else if(status == "0"){
            $('#mdlDetail_status').html('Disable')
        }else{
            $('#mdlDetail_status').html('Not Verified')
        }
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
                // $('#alamatMhs').html(res[0].ALAMAT_MHS)
                $('#telpMhs').html(res[0].TELP_MHS)
            }
        })
    })
</script>