<main class="page-content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6 class="mb-0 text-uppercase">
                <i class="bi bi-collection-play"></i>
                Videos List
            </h6>
        </div>
        <div class="col-md-6 col-sm-12">
            <button style="float: right;" data-bs-toggle="modal" data-bs-target="#mdlAdd"  class="btn btn-success"><i class="bi bi-plus-lg"></i> Create New</button>
        </div>
    </div>
    
    <hr/>
    
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblVideo" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($videos as $item) {
                                        if($item->ID_VD == null){
                                            break;
                                        }
                                        $status = "";
                                        $btnVerif = "";
                                        if($item->STATUS_VD == 0){
                                            $status = '
                                                <span class="badge bg-light-danger text-danger w-100">
                                                <i class="bi bi-x-circle-fill"></i>
                                                    Unpublished
                                                </span>
                                            ';
                                            $btnPublish = '<a href="#" data-id="'.$item->ID_VD.'" data-ispublish="1" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Publish"><i class="bi bi-cloud-arrow-up-fill"></i></a>';
                                        }else if($item->STATUS_VD == 1){
                                            $status = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Published
                                                </span>
                                            ';
                                            $btnPublish = '<a href="#" data-id="'.$item->ID_VD.'" data-ispublish="0" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Unpublish"><i class="bi bi-cloud-slash-fill"></i></a>';
                                        }
                                        $link = $item->LINK_VD;
                                        if (strlen($link) > 50) {
                                            $link = substr($item->LINK_VD, 0, 50).'...';
                                        } 

                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_VD.'</td>
                                                <td><a href="'.$item->LINK_VD.'" target="_blank" maxlength="10">'.$link.'</a></td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="#" class="text-primary mdlEdit" data-id="'.$item->ID_VD.'" data-name="'.$item->NAMA_VD.'" data-link="'.$item->LINK_VD.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Video"><i class="bi bi-pen-fill"></i></a>
                                                        '.$btnPublish.'
                                                        <a href="#" class="text-danger mdlDelete" data-id="'.$item->ID_VD.'" data-name="'.$item->NAMA_VD.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Video"><i class="bi bi-trash-fill"></i></a>
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

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Add Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/video/store')?>" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="NAMA_VD" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Link</label>
                            <input type="text" class="form-control" placeholder="Link" name="LINK_VD" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Status</label>
                            <select name="STATUS_VD" id="select_type" class="form-select" style="width: 50%;">
                                <option value="0">Unpublished</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="mdlEdit" tabindex="-1" aria-labelledby="mdlEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEdit">Edit Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/video/edit')?>" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="mdlEdit_name" placeholder="Name" name="NAMA_VD" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Link</label>
                            <input type="text" class="form-control" id="mdlEdit_link" placeholder="Link" name="LINK_VD" required>
                        </div>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlEdit_id" class="form-control" placeholder="New Video" name="ID_VD">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Change Status -->
<div class="modal fade" id="mdlStatus" tabindex="-1" aria-labelledby="mdlStatus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlStatus">Change Status Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/video/changeStatus')?>" method="post">
                    <div class="modal-body">
                        <p>Are you sure you want to change the status of this video to <code id="mdlStatus_status"></code> ? </p>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlStatus_id" class="form-control" placeholder="New Video" name="ID_VD">
                <input type="hidden" id="mdlStatus_ispublish" class="form-control" placeholder="New Video" name="STATUS_VD">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDelete">Delete Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/video/delete')?>" method="post">
                    <div class="modal-body">
                        <p>Are you sure to delete this video <code id="mdlDelete_video"></code>?</p>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlDelete_id" class="form-control" name="ID_VD">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tblVideo').DataTable()
    })
    $('#tblVideo tbody').on('click', '.mdlEdit', function(){
        $('#mdlEdit').modal('show');
        const id = $(this).data('id')
        const name = $(this).data('name')
        const link = $(this).data('link')

        $('#mdlEdit_id').val(id)
        $('#mdlEdit_name').val(name)
        $('#mdlEdit_link').val(link)
    })
    $('#tblVideo tbody').on('click', '.mdlStatus', function(){
        $('#mdlStatus').modal('show');
        const id = $(this).data('id')
        const ispublish = $(this).data('ispublish')
        ispublish == 0 ? $('#mdlStatus_status').html('publish') : $('#mdlStatus_status').html('unpublish')
        $('#mdlStatus_id').val(id)
        $('#mdlStatus_ispublish').val(ispublish)
    })
    $('#tblVideo tbody').on('click', '.mdlDelete', function(){
        $('#mdlDelete').modal('show');
        const id = $(this).data('id')
        const name = $(this).data('name')
        $('#mdlDelete_id').val(id)
        $('#mdlDelete_video').html(name)
    })
    // Number only input
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>