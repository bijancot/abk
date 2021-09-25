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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Worksheet</th>
                                    <th>Total Question</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($worksheets as $item) {
                                        $created_at = date_create($item->created_at);
                                        $updated_at = date_create($item->updated_at);
                                        
                                        $status = "";
                                        if($item->ISPUBLISHED_WS == '1'){
                                            $status = '
                                                <span class="badge bg-light-success text-success w-100">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    Published
                                                </span>
                                            ';
                                        }else{
                                            $status = '
                                                <span class="badge bg-light-danger text-danger w-100">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                    Unpublished
                                                </span>
                                            ';
                                        }

                                        echo '
                                            <tr>
                                                <td>'.$item->NAMA_WS.'</td>
                                                <td>'.$item->TOTAL_QUESTION.'</td>
                                                <td>'.date_format($created_at, 'd M Y').'</td>
                                                <td>'.date_format($updated_at, 'd M Y').'</td>
                                                <td>'.$status.'</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                        <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Worksheet"><i class="bi bi-pen-fill"></i></a>
                                                        <a href="#" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Question"><i class="bi bi-kanban-fill"></i></a>
                                                        <a href="#" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Unpublish"><i class="bi bi-cloud-slash-fill"></i></a>
                                                        <a href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Worksheet"><i class="bi bi-trash-fill"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                                <!-- <tr>
                                    <td>Worksheet 2</td>
                                    <td>5</td>
                                    <td>12 Jan 2021</td>
                                    <td>12 Jan 2021</td>
                                    <td>
                                        <span class="badge bg-light-danger text-danger w-100">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Unpublished
                                        </span>
                                    </td>
                                    <td>
                                        <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                            <a href="#" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Worksheet"><i class="bi bi-pen-fill"></i></a>
                                            <a href="#" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Question"><i class="bi bi-kanban-fill"></i></a>
                                            <a href="#" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Publish"><i class="bi bi-cloud-arrow-up-fill"></i></a>
                                            <a href="#" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Worksheet"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr> -->
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/worksheet/store')?>" method="post">
                    <div class="modal-body">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="New Worksheet" name="NAMA_WS" required>
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