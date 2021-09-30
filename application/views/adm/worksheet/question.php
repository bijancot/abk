<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Question</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-view-list"></i></a>
                        <?= $worksheet->NAMA_WS?>
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
                        <h5 class="card-title">List Question</h5>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap justify-content-start">
                        <?php
                            if($worksheetDetail != null){
                                $no = 1;
                                foreach ($worksheetDetail as $item) {
                                    $statusActive = $no == 1 ? 'btn btn-primary' : 'btn btn-outline-primary';
                                    echo '
                                    <div class="mx-1 mb-2">
                                        <a id="cardNo_'.$no.'" onclick="cardNoClick('.$item->ID_WSD.', '.$no.')" class="btn '.$statusActive.' cardNo">
                                            <span>'.$no.'</span>
                                        </a>
                                    </div>
                                    ';
                                    $no++;
                                }
                                echo '
                                    <div class="mx-1 mb-2">
                                        <a class="btn btn-outline-success">
                                            <span>+</span>
                                        </a>
                                    </div>
                                ';
                            }else{
                                echo '
                                    <div class="mx-1 mb-2">
                                        <a id="cardNo_1" class="btn btn-primary cardNo">
                                            <span>1</span>
                                        </a>
                                    </div>
                                    <div class="mx-1 mb-2">
                                        <a class="btn btn-outline-success">
                                            <span>+</span>
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Random Question</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h5 id="question_title" class="card-title">Question 1</h5>
                        </div>
                        <div class="col-md-6 col-sm-12" style="text-align: right;">
                            <button id="btn-save" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Save</button>
                        </div>
                    </div>
                    <hr>
                    <form id="formSubmit" action="<?= site_url('admin/question/store')?>" method="post">
                        <input type="hidden" name="TIPE" value="<?= $worksheet->TYPEQUESTION_WS?>">
                        <input type="hidden" name="ID_WS" value="<?= $idWS?>">
                        <div id="question_content">
                            <?php
                                if($worksheet->TYPEQUESTION_WS == "1"){
                                    echo '
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                            <textarea id="ckEditor" name="ESSAY_QUESTION"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                                            <input class="form-control" id="essay_grade" name="ESSAY_GRADE" style="width: 30%;" type="number" required> 
                                        </div>
                                    ';
                                }else if($worksheet->TYPEQUESTION_WS == "2"){
                                    echo '
                                        <div class="form-group mb-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                                <textarea id="ckEditor" name="MULTI_QUESTION" required></textarea>
                                            </div>
                                            
                                            <label class="form-label" for="">Response <span class="text-danger">*</span></label>
                                            <div class="type_multiple_content" style="margin-bottom: -10px;">
                                                <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_1">
                                                    <input class="form-control" name="MULTI_RESPONSE[]" type="text">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" value="tes" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(1)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_2">
                                                    <input class="form-control" name="MULTI_RESPONSE[] type="text">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(2)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_3">
                                                    <input class="form-control" name="MULTI_RESPONSE[] type="text">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(3)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_3">
                                                    <input class="form-control" name="MULTI_RESPONSE[] type="text">
                                                    <div class="input-group-text">
                                                        <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(4)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span id="type_multiple_add" class="text-primary mb-3" style="font-size: 10px;margin-top: -20px;cursor: pointer;">+ Add new response</span>
                                            <div class="form-check form-switch" style="margin-top: 20px;">
                                                <input class="form-check-input" name="MULTI_ISRANDOM" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Random Response</label>
                                            </div>
                                        </div>
                                    ';
                                }else if($worksheet->TYPEQUESTION_WS == "3"){
                                    echo '
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                            <textarea id="ckEditor"></textarea>
                                            <span class="text-secondary" style="font-size: 10px;">Use "_" underscores to specify where you would like a blank to appear in the text below</span>
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= site_url()?>/assets/adm/js/sortable.min.js"></script>
<script>
    let typeMulti = 4
    $(document).ready(function(){
        ClassicEditor
            .create( document.querySelector( '#ckEditor' ) )
            .catch( error => {
                console.error( error );
            } );
    })
    let dataItem = 2;
    $("#select_type").change(function(){
        const val = $(this).val()
        if(val == "1"){
            $('.type_multiple').attr('hidden', true);
            $('.type_missing').attr('hidden', true);
            $('.type_essay').attr('hidden', false);
        }else if(val == "2"){
            $('.type_missing').attr('hidden', true);
            $('.type_essay').attr('hidden', true);
            $('.type_multiple').attr('hidden', false);
        }else if(val == "3"){
            $('.type_multiple').attr('hidden', true);
            $('.type_essay').attr('hidden', true);
            $('.type_missing').attr('hidden', false);
        }
    })
    $('#type_multiple_add').click(function(){
        const html = `
            <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_${typeMulti}">
                <input class="form-control" name="MULTI_RESPONSE[] type="text">
                <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" onclick="deleteResponse(${typeMulti})" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                </div>
            </div>
        `
        typeMulti++
        $('.type_multiple_delete').attr('hidden', false)
        $('.type_multiple_content').append(html)
    })
    $('#btn-save').click(function(){
        const valRightAns = $('input[name=MULTI_RIGHTANS]:checked', '#formSubmit').parent().siblings().val()
        $('input[name=MULTI_RIGHTANS]:checked', '#formSubmit').val(valRightAns)
        $('#formSubmit').submit()
    })
    const deleteResponse = (id) => {
        $('#type_multiple_content_'+id).remove()
        
        const length = $('.type_multiple_input').length
        length == 2 && $('.type_multiple_delete').attr('hidden', true)
    }
    const cardNoClick = (idWSD, no) => {
        $('.cardNo').attr('class', 'btn btn-outline-primary cardNo')
        $('#cardNo_'+no).attr('class', 'btn btn-primary cardNo')
        
        const type = "<?= $worksheet->TYPEQUESTION_WS?>"
        $.ajax({
            url: "<?= site_url('admin/question/ajxGet')?>",
            method: 'post',
            data: {TYPEQUESTION_WS: type, ID_WSD: idWSD},
            success: function(res){
                $('#question_title').html('Question '+no)
                if(type == "1"){
                    $('#ckEditor').html(res[0].SOAL_ES)
                    $('#essay_grade').val(res[0]['GRADE_ES'])
                }
            }
        })
    }
    function htmlEssay(){
        let html = `
            <div class="form-group mb-3">
                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                <textarea id="ckEssay" name="ESSAY_QUESTION"></textarea>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                <input class="form-control" name="GRADE" style="width: 30%;" type="number" required> 
            </div>
        `
        $('#question_content').html(html)
    }
    function htmlMultiple(){
        let html = `
            <div class="form-group mb-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                    <textarea id="ckMulti" name="MULTI_QUESTION" required></textarea>
                </div>
                
                <label class="form-label" for="">Response <span class="text-danger">*</span></label>
                <div class="type_multiple_content" style="margin-bottom: -10px;">
                    <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_1">
                        <input class="form-control" name="MULTI_RESPONSE[]" type="text">
                        <div class="input-group-text">
                            <input class="form-check-input" type="radio" value="tes" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(1)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                    <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_2">
                        <input class="form-control" name="MULTI_RESPONSE[] type="text">
                        <div class="input-group-text">
                            <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(2)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                    <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_3">
                        <input class="form-control" name="MULTI_RESPONSE[] type="text">
                        <div class="input-group-text">
                            <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(3)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                    <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_3">
                        <input class="form-control" name="MULTI_RESPONSE[] type="text">
                        <div class="input-group-text">
                            <input class="form-check-input" type="radio" value="" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(4)" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                </div>
                <span id="type_multiple_add" class="text-primary mb-3" style="font-size: 10px;margin-top: -20px;cursor: pointer;">+ Add new response</span>
                <div class="form-check form-switch" style="margin-top: 20px;">
                    <input class="form-check-input" name="MULTI_ISRANDOM" type="checkbox" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Random Response</label>
                </div>
            </div>
        `
        $('#question_content').html(html)
    }
    function htmlMissing(){
        let html = `
            <div class="form-group mb-3">
                <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                <textarea id="ckMissing"></textarea>
                <span class="text-secondary" style="font-size: 10px;">Use '_' underscores to specify where you would like a blank to appear in the text below</span>
            </div>
        `
        $('#question_content').html(html)
    }

</script>