<main class="page-content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6 class="mb-0 text-uppercase">
                <i class="bi bi-view-list"></i>
                List Worksheet
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
                        <table id="tblWorksheet" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Worksheet</th>
                                    <th>Type Question</th>
                                    <th>Total Question</th>
                                    <th>Question</th>
                                    <th>Pass Grade (%)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($worksheets as $item) {
                                        if($item->ID_WS == null){
                                            break;
                                        }

                                        $typeLabel = "";
                                        $type = $item->TYPEQUESTION_WS;
                                        if($type == "1"){
                                            $typeLabel = "Essay";
                                        }else if($type == "2"){
                                            $typeLabel = "Multiple Choice";
                                        }else if($type == "3"){
                                            $typeLabel = "Missing Sentence";
                                        }else if($type == "4"){
                                            $typeLabel = "Matching";
                                        }else if($type == "5"){
                                            $typeLabel = "True or False";
                                        }
                                        
                                        $status = "";
                                        $btnPublish = "";
                                        if($item->ISPUBLISHED_WS == '1'){
                                            $status = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Published
                                                </span>
                                            ';
                                            $btnPublish = '<a href="#" data-id="'.$item->ID_WS.'" data-ispublish="0" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Unpublish"><i class="bi bi-cloud-slash-fill"></i></a>';
                                        }else{
                                            $status = '
                                            <span class="badge bg-light-danger text-danger w-100">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Unpublished
                                            </span>
                                            ';
                                            $btnPublish = '<a href="#" data-id="'.$item->ID_WS.'" data-ispublish="1" class="text-secondary mdlStatus" data-bs-toggle="tooltip" data-bs-placement="top" title="Publish"><i class="bi bi-cloud-arrow-up-fill"></i></a>';
                                        }
                                        
                                        $statusQuest = "";
                                        if($item->ISREADY_WS == '1'){
                                            $statusQuest = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Ready
                                                </span>
                                            ';
                                        }else{
                                            $btnPublish = "";
                                            $statusQuest = '
                                            <span class="badge bg-light-danger text-danger w-100">
                                            <i class="bi bi-x-circle-fill"></i>
                                                Not Ready
                                            </span>
                                            ';
                                        }

                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$item->NAMA_WS.'</td>
                                                <td>'.$typeLabel.'</td>
                                                <td>'.$item->TOTALQUESTION_WS.'</td>
                                                <td>'.$statusQuest.'</td>
                                                <td>'.$item->PASSGRADE_WS.'</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="#" class="text-primary mdlEdit" data-id="'.$item->ID_WS.'" data-name="'.$item->NAMA_WS.'" data-type="'.$item->TYPEQUESTION_WS.'" data-grade="'.$item->PASSGRADE_WS.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Worksheet"><i class="bi bi-pen-fill"></i></a>
                                                        <a href="'.site_url('admin/question/manage/'.$item->ID_WS).'" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Question"><i class="bi bi-kanban-fill"></i></a>
                                                        '.$btnPublish.'
                                                        <a href="#" class="text-danger mdlDelete" data-id="'.$item->ID_WS.'" data-name="'.$item->NAMA_WS.'" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Worksheet"><i class="bi bi-trash-fill"></i></a>
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
                <h5 class="modal-title" id="mdlAdd">Create Worksheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/worksheet/store')?>" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="NAMA_WS" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Type Question</label>
                            <select name="TYPEQUESTION_WS" id="select_type" class="form-select" style="width: 50%;">
                                <option value="1">Essay</option>
                                <option value="2">Multiple Choice</option>
                                <option value="3">Missing Sentence</option>
                                <option value="4">Matching</option>
                                <option value="5">True or False</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Total Questions</label>
                            <input type="number" onkeypress="return isNumberKey(event)" class="form-control" style="width: 50%;" placeholder="Total Questions" name="TOTALQUESTION_WS" required>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Pass Grade</label>
                            <div class="input-group mb-3 type_multiple_input" style="width: 50%;" id="type_multiple_content_1">
                                <input class="form-control" onkeypress="return isNumberKey(event)" type="number" value="80" placeholder="Pass Grade" name="PASSGRADE_WS">
                                <div class="input-group-text">
                                    %
                                </div>
                            </div>
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
                <h5 class="modal-title" id="mdlEdit">Edit Worksheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/worksheet/edit')?>" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="mdlEdit_name" placeholder="Name" name="NAMA_WS" required>
                        </div>
                    </div>
                    <!-- <div class="modal-body">
                        <div class="col">
                            <label for="">Pass Grade</label>
                            <div class="input-group mb-3 type_multiple_input" style="width: 50%;" id="type_multiple_content_1">
                                <input class="form-control" type="number" id="mdlEdit_grade" value="80" placeholder="Pass Grade" name="PASSGRADE_WS">
                                <div class="input-group-text">
                                    %
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlEdit_id" class="form-control" placeholder="New Worksheet" name="ID_WS">
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
                <h5 class="modal-title" id="mdlStatus">Change Status Worksheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/worksheet/changeStatus')?>" method="post">
                    <div class="modal-body">
                        <p>Are you sure you want to change the status of this worksheet to <code id="mdlStatus_status"></code> ? </p>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlStatus_id" class="form-control" placeholder="New Worksheet" name="ID_WS">
                <input type="hidden" id="mdlStatus_ispublish" class="form-control" placeholder="New Worksheet" name="ISPUBLISHED_WS">
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
                <h5 class="modal-title" id="mdlDelete">Delete Worksheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/worksheet/softDestroy')?>" method="post">
                    <div class="modal-body">
                        <p>Are you sure to delete this worksheet  <code id="mdlDelete_worksheet"></code> ? </p>
                    </div>
                </div>
                
            <div class="modal-footer">
                <input type="hidden" id="mdlDelete_id" class="form-control" placeholder="New Worksheet" name="ID_WS">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tblWorksheet').DataTable()
    })
    $('#tblWorksheet tbody').on('click', '.mdlEdit', function(){
        $('#mdlEdit').modal('show');
        const id = $(this).data('id')
        const name = $(this).data('name')
        const type = $(this).data('type')
        const grade = $(this).data('grade')

        $('#mdlEdit_id').val(id)
        $('#mdlEdit_name').val(name)
        $('#mdlEdit_type').val(type)
        $('#mdlEdit_grade').val(grade)
    })
    $('#tblWorksheet tbody').on('click', '.mdlStatus', function(){
        $('#mdlStatus').modal('show');
        const id = $(this).data('id')
        const ispublish = $(this).data('ispublish')
        ispublish == "0" ? $('#mdlStatus_status').html('unpublish') : $('#mdlStatus_status').html('publish')
        $('#mdlStatus_id').val(id)
        $('#mdlStatus_ispublish').val(ispublish)
    })
    $('#tblWorksheet tbody').on('click', '.mdlDelete', function(){
        $('#mdlDelete').modal('show');
        const id = $(this).data('id')
        const name = $(this).data('name')
        $('#mdlDelete_id').val(id)
        $('#mdlDelete_worksheet').html(name)
    })
    // Number only input
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>