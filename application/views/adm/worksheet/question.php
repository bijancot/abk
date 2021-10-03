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
                    <div id="list-question" class="d-flex flex-wrap justify-content-start">
                        <?php
                            $no = 1;
                            if($worksheetDetail != null){

                                foreach ($worksheetDetail as $item) {
                                    $statusActive = $no == 1 ? 'btn btn-primary' : 'btn btn-success';
                                    if($this->session->flashdata('statEdit') == $item->ID_WSD){
                                        $statusActive = 'btn btn-primary';
                                    }

                                    echo '
                                    <div class="mx-1 mb-2">
                                        <a id="cardNo_'.$no.'" data-idWSD="'.$item->ID_WSD.'" onclick="cardNoClick('.$item->ID_WSD.', '.$no.')" class="btn '.$statusActive.' cardFilled cardNo">
                                            <span>'.$no.'</span>
                                        </a>
                                    </div>
                                    ';
                                    $no++;
                                }
                            }else{
                                echo '
                                    <div class="mx-1 mb-2">
                                        <a id="cardNo_1" class="btn btn-primary cardNoFilled cardNo">
                                            <span>'.$no.'</span>
                                        </a>
                                    </div>
                                ';
                            }
                            echo '
                                <div class="mx-1 mb-2">
                                    <a id="cardNo_'.$no.'" onclick="cardNoClick(null, '.$no.')" class="btn btn-outline-primary cardNoFilled cardNo">
                                        <span>'.$no.'</span>
                                    </a>
                                </div>
                            ';
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
                            <button id="btn-delete" style="display: none;" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                            <button id="btn-save" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Save</button>
                        </div>
                    </div>
                    <hr>
                    <form id="formSubmit" action="<?= site_url('admin/question/store')?>" method="post">
                        <input type="hidden" name="TIPE" value="<?= $worksheet->TYPEQUESTION_WS?>">
                        <input type="hidden" id="idWS" name="ID_WS" value="<?= $idWS?>">
                        <input type="hidden" id="idWSD" name="idWSD">
                        <input type="hidden" id="idQuest" name="ID_QUEST">
                        <input type="hidden" id="no" name="no">
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
                                                <input class="form-check-input" name="MULTI_ISRANDOM" type="checkbox" id="randomResponse">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Random Response</label>
                                            </div>
                                        </div>
                                    ';
                                }else if($worksheet->TYPEQUESTION_WS == "3"){
                                    echo '
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                                            <textarea name="MISSING_QUESTION" id="ckEditor"></textarea>
                                            <span class="text-secondary" style="font-size: 10px;">Use "_" underscores to specify where you would like a blank to appear in the text below</span>
                                        </div>
                                        <input type="hidden" id="typeMissResp" />
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="">Responses <span class="text-danger">*</span></label>
                                            <div class="type_missing_content"></div>
                                            <span class="text-secondary" style="font-size: 10px;">Students will have to answer in the exact order for the question to be marked as correct</span>
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
    <!-- Modal Delete -->
    <div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlDelete">Delete Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin/question/softDestroy')?>" method="post">
                        <div class="modal-body">
                            <p>Are you sure to delete this question ? </p>
                        </div>
                    </div>
                    
                <div class="modal-footer">
                    <input type="hidden" id="mdlDelete_idWS" class="form-control"  name="ID_WS">
                    <input type="hidden" id="mdlDelete_idWSD" class="form-control"  name="ID_WSD">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="<?= site_url()?>/assets/adm/js/sortable.min.js"></script>
<script>
    let typeMulti = 4
    let no = "<?= $no?>"
    let ckEditor
    let typeMiss_resp = []
    $(document).ready(function(){
        ClassicEditor
            .create( document.querySelector( '#ckEditor' ) )
            .then(editor => {
                ckEditor = editor;
                editor.editing.view.document.on( 'keyup', ( evt, data ) => {
                    const type = "<?= $worksheet->TYPEQUESTION_WS?>"
                    if(type == "3"){
                        let text = editor.getData()
                        setMissingResp(text)
                    }
                });
            })
    })
    let dataItem = 2;
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

        const idQuest = $('#idQuest').val()
        if(idQuest == ''){
            $('#formSubmit').attr('action', '<?= site_url('admin/question/store')?>')    
        }else{
            $('#formSubmit').attr('action', '<?= site_url('admin/question/edit')?>')    
        }

        $('#formSubmit').submit()
    })
    $('#btn-delete').click(function(){
        const idWS = $('#idWS').val()
        const idWSD = $('#idWSD').val()

        $('#mdlDelete_idWS').val(idWS)
        $('#mdlDelete_idWSD').val(idWSD)
        $('#mdlDelete').modal('show')
    })
    const deleteResponse = (id) => {
        $('#type_multiple_content_'+id).remove()
        
        const length = $('.type_multiple_input').length
        length == 2 && $('.type_multiple_delete').attr('hidden', true)
    }
    const missingRespKeyUp = () => {
        let inputs = $('.typeMiss_resp')
        typeMiss_resp = []
        for(var i = 0; i < inputs.length; i++){
            typeMiss_resp[i] = $(inputs[i]).val()
        }
    }
    const setMissingResp = text => {
        $('.type_missing_content').html(text.split("_").join(` <input class="typeMiss_resp" onkeyup="missingRespKeyUp()" style='border: 1px solid #ced4da;border-radius: .25rem;padding: 5px;' placeholder='Enter Answer' type='text' name='MISSING_RESPONSE[]' /> `))
        let inputResps = $('.typeMiss_resp')
        for(let i = 0; i < inputResps.length; i++){
            $(inputResps[i]).val(typeMiss_resp[i])
        }
    }
    const cardNoClick = (idWSD, no) => {
        const type = "<?= $worksheet->TYPEQUESTION_WS?>"
        
        $('.cardFilled').attr('class', 'btn btn-success cardFilled')
        $('.cardNoFilled').attr('class', 'btn btn-outline-primary cardNoFilled')

        const statusCard = $('#cardNo_'+no).hasClass('cardFilled')
        if(statusCard === true){
            $('#cardNo_'+no).attr('class', 'btn btn-primary cardFilled')
        }else{
            $('#cardNo_'+no).attr('class', 'btn btn-primary cardNoFilled')
        }

        if(idWSD == null){
            resetForm(type)
            $('#btn-delete').css('display', 'none')
        }else{
            $('#idWSD').val(idWSD)
            $('#no').val(no)
            $('#btn-delete').css('display', 'initial')
            getData(type, idWSD, no)
        }
    }
    function getData(type, idWSD, no){
        $.ajax({
            url: "<?= site_url('admin/question/ajxGet')?>",
            method: 'post',
            data: {TYPEQUESTION_WS: type, ID_WSD: idWSD},
            success: function(res){
                $('#question_title').html('Question '+no)
                res = JSON.parse(res)
                if(type == "1"){
                    $('#idQuest').val(res.ID_ES)
                    ckEditor.setData(res.SOAL_ES);
                    $('#essay_grade').val(res.GRADE_ES)
                }else if(type == "2"){
                    $('#idQuest').val(res.ID_MC)
                    ckEditor.setData(res.SOAL_MC);
                    
                    let html = ""
                    const lstResp = res.PILIHAN_MC.split(";")
                    for (const item of lstResp) {
                        const rightAns = item == res.KUNCIJAWABAN_MC ? true : false
                        html += `
                            <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_${typeMulti}">
                                <input class="form-control" name="MULTI_RESPONSE[]" type="text" value="${item}">
                                <div class="input-group-text">
                                    <input class="form-check-input" type="radio" value="tes" name="MULTI_RIGHTANS" required ${rightAns && 'checked'}><a onclick="deleteResponse(${typeMulti})" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                                </div>
                            </div>
                        `
                        typeMulti++
                    }
                    $('.type_multiple_content').html(html)
                    console.log(res.ISRAND_MC)
                    if(res.ISRAND_MC == "1"){
                        $('#randomResponse').attr('checked', true)
                    }else{
                        $('#randomResponse').attr('checked', false)
                    }
                }else if(type == "3"){
                    $('#idQuest').val(res.ID_MS)
                    ckEditor.setData(res.SOAL_MS);
                    typeMiss_resp = res.KUNCIJAWABAN_MS.split(';')
                    setMissingResp(res.SOAL_MS)
                }
            }
        })
    }
    const resetForm = type => {
        $('#idQuest').val('')
        $('#idWSD').val('')
        $('#question_title').html('New Question')
        ckEditor.setData("");
        if(type == "1"){
            $('#essay_grade').val("");
        }else if(type == "2"){
            let html = ""
            for (let x = 1; x <= 4; x++) {
                html += `
                    <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_${typeMulti}">
                        <input class="form-control" name="MULTI_RESPONSE[]" type="text" value="">
                        <div class="input-group-text">
                            <input class="form-check-input" type="radio" value="tes" name="MULTI_RIGHTANS" required><a onclick="deleteResponse(${typeMulti})" style="margin-left: 5px;margin-top: 2px;font-size: 13px;cursor: pointer;" class="text-danger type_multiple_delete"><i class="bi bi-x-lg"></i></a>
                        </div>
                    </div>
                `
                typeMulti++
            }
            $('.type_multiple_content').html(html)
            $('#randomResponse').attr('checked', false)
        }else if(type == "3"){
            typeMiss_resp = []
            $('.type_missing_content').html("")
        }
    }

</script>