<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Question</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-view-list"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
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
                        <h5 class="card-title">Info</h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h5 class="card-title">List Question</h5>
                        </div>
                        <div class="col-md-6 col-sm-12" style="text-align: right;">
                            <a href="#" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Save</a>
                        </div>
                    </div>
                    
                    <hr>
                    <form action="">
                        <ul class="list-group" id="demo1"  style="font-size: 15px;">
                        <li class="list-group-item" data-item="1" >
                                <div data-bs-toggle="collapse" data-bs-target="#collapseExample" style="cursor: pointer;font-weight: 600;"><i class="bi bi-grip-vertical handle"></i> Question 1</div>
                                <div class="collapse" id="collapseExample" style="z-index: 3;">
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="">Type</label>
                                        <select name="" id="select_type" class="form-select" style="width: 30%;">
                                            <option value="1">Essay</option>
                                            <option value="2">Multiple Choice</option>
                                            <option value="3">Missing Sentence</option>
                                        </select>
                                    </div>
                                    <div id="question_content">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="" id="" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                                            <input class="form-control" style="width: 30%;" type="number"> 
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" data-item="1" >
                                <div data-bs-toggle="collapse" data-bs-target="#collapseExample2" style="cursor: pointer;font-weight: 600;"><i class="bi bi-grip-vertical handle"></i> Question 2</div>
                                <div class="collapse" id="collapseExample2" style="z-index: 3;">
                                    <hr>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="">Type</label>
                                        <select name="" id="select_type" class="form-select" style="width: 30%;">
                                            <option value="1">Essay</option>
                                            <option value="2">Multiple Choice</option>
                                            <option value="3">Missing Sentence</option>
                                        </select>
                                    </div>
                                    <div id="question_content">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="" id="" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                                            <input class="form-control" style="width: 30%;" type="number"> 
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <!-- <form action="#" method="post">
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Type</label>
                            <select name="" id="select_type" class="form-select" style="width: 30%;">
                                <option value="1">Essay</option>
                                <option value="2">Multiple Choice</option>
                                <option value="3">Missing Sentence</option>
                            </select>
                        </div>
                        <div id="question_content">
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="" id="" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Grading <span class="text-danger">*</span></label>
                                <input class="form-control" style="width: 30%;" type="number"> points
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= site_url()?>/assets/adm/js/sortable.min.js"></script>
<script>
    $(document).ready(function(){
        Sortable.create(demo1, {
            animation: 100,
            group: 'list-1',
            // draggable: '.list-group-item',
            handle: '.handle',
            sort: true,
            filter: '.sortable-disabled',
            chosenClass: 'active'
        });
    })
    $("#select_type").change(function(){
        const val = $(this).val()
        if(val == "1"){
            htmlEssay()
        }else if(val == "2"){
            htmlChoice()
        }else if(val == "3"){

        }
    })
    // $('.list-group-item').click(function(){
    //     alert($(this).data('item'))
    // })
    const htmlEssay = () => {
        const html = `
            <div class="form-group mb-3">
                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                <textarea class="form-control" name="" id="" rows="5"></textarea>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                <input class="form-control" style="width: 30%;" type="number"> 
            </div>
        `
        $('#question_content').html(html);
    }
    const htmlChoice = () => {
        const html = `
            <div class="form-group mb-3">
                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                <textarea class="form-control" name="" id="" rows="5"></textarea>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Response <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <input class="form-control" type="text">
                    <div class="input-group-text">
                        <input class="form-check-input" type="radio" value="" name="formMulti[]" required><a style="margin-left: 5px;margin-top: 2px;font-size: 13px;" class="text-danger"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text">
                    <div class="input-group-text">
                        <input class="form-check-input" type="radio" value="" name="formMulti[]" required><a style="margin-left: 5px;margin-top: 2px;font-size: 13px;" class="text-danger"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" type="text">
                    <div class="input-group-text">
                        <input class="form-check-input" type="radio" value="" name="formMulti[]" required><a style="margin-left: 5px;margin-top: 2px;font-size: 13px;" class="text-danger"><i class="bi bi-x-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                <input class="form-control" style="width: 30%;" type="number">
            </div>
        `
        $('#question_content').html(html);
    }
</script>