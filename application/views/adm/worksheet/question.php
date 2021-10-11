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
    <form id="form-submit" action="<?= site_url('admin/question/store')?>" enctype="multipart/form-data" method="post">
    <input type="hidden" name="ID_WS" value="<?= $idWS?>" />
    <input type="hidden" name="TIPE" value="<?= $worksheet->TYPEQUESTION_WS?>" />
    
    <?php
        $countMC = 1;
        if($worksheet->TYPEQUESTION_WS == "1"){
            echo '
                <div class="form-group mb-3">
                    <label class="form-label" for="pdf-source">Upload PDF (Optional)</label>
                    <input  type="file" class="form-control" name="pdffile" id="pdf-source" style="width: 30%;">
                </div>';
        }
        for($no = 1; $no <= $worksheet->TOTALQUESTION_WS; $no++) {
            if($worksheet->TYPEQUESTION_WS == "1"){
                $grade   = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->GRADE_ES : "";
                $quest   = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->SOAL_ES : "";
                $idQuest = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->ID_ES : "kosong";

                $typeContent =  '
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea id="ckEditor'.$no.'" class="editor" name="ESSAY_QUESTION[]" required>'.$quest.'</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Grading (points) <span class="text-danger">*</span></label>
                        <input class="form-control" onkeypress="return isNumberKey(event)" value="'.$grade.'" name="ESSAY_GRADE[]" style="width: 30%;" type="number" required>
                    </div>
                    <input class="form-control"  value="'.$idQuest.'" name="ID_QUEST[]" style="width: 30%;" type="hidden" required>
                ';
            }else if($worksheet->TYPEQUESTION_WS == "2"){
                $idQuest     = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->ID_MC : "kosong";
                $multiResp   = !empty($worksheetDetail[$no-1]) ? explode(';', $worksheetDetail[$no-1]->PILIHAN_MC) : "";
                $rightAns    = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->KUNCIJAWABAN_MC : "kosong";
                $tempResp    = $no-1;
                $quest       = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->SOAL_MC : "";
                
                $typeContent = '
                <div class="form-group mb-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea id="ckEditor'.$no.'" class="editor" name="MULTI_QUESTION[]" required>'.$quest.'</textarea>
                    </div>

                    <label class="form-label" for="">Response <span class="text-danger">*</span></label>
                    <div class="type_multiple_content" style="margin-bottom: -10px;">
                ';

                for($x = 0; $x < 4; $x++){
                    $resp = !empty($multiResp[$x]) && $multiResp[$x] != "" ? $multiResp[$x] : "";
                    $checked = $resp == $rightAns ? "checked" : "";
                    $typeContent .= '
                        <div class="input-group mb-3 type_multiple_input" id="type_multiple_content_1">
                            <input class="form-control" value="'.$resp.'" id="textResp_'.$countMC.'" onkeyup="keyPressMC('.$countMC.')" name="MULTI_RESPONSE_'.$tempResp.'[]" type="text" required>
                            <div class="input-group-text">
                                <input class="form-check-input" value="'.$resp.'" type="radio" id="radResp_'.$countMC.'" name="MULTI_RIGHTANS_'.$tempResp.'" '.$checked.' required>
                            </div>
                        </div>
                    ';
                    $countMC++;
                }

                $typeContent .= '
                        <input class="form-control"  value="'.$idQuest.'" name="ID_QUEST[]" style="width: 30%;" type="hidden" required>
                        </div>
                    </div>
                ';
            }else if($worksheet->TYPEQUESTION_WS == "3"){
                $idQuest    = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->ID_MS : "kosong";
                $quest     = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->SOAL_MS : "";
                $typeContent = '
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea name="MISSING_QUESTION[]" id="editor'.($no-1).'" data-item="'.($no-1).'" class="editor" required>'.$quest.'</textarea>
                        <span class="text-secondary" style="font-size: 10px;">Use "_" underscores to specify where you would like a blank to appear in the text below</span>
                    </div>
                    <input type="hidden" id="typeMissResp" />
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Responses <span class="text-danger">*</span></label>
                        <div class="type_missing_content_'.($no-1).'"></div>
                        <span class="text-secondary" style="font-size: 10px;">Students will have to answer in the exact order for the question to be marked as correct</span>
                    </div>
                    <input class="form-control"  value="'.$idQuest.'" name="ID_QUEST[]" style="width: 30%;" type="hidden" required>
                ';
            }

            echo '
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-title mb-0">Question '.$no.'</h5>
                        </div>
                        <div class="card-body">
                            '.$typeContent.'
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
    ?>
    <div class="row" style="margin-top: 5px;">
        <div class="col-md-12 col-sm-12">
            <a id="btn-save" style="float: right;" class="btn btn-sm btn-success"><i class="bi bi-save"></i> Save</a>
        </div>
    </div>
    </form>
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
    let msResp = []
    <?php
        if($worksheet->TYPEQUESTION_WS == "3"){
            echo 'let countRes;';
            for ($i=0; $i < count($worksheetDetail); $i++) {
                echo 'msResp['.$i.'] = [];';
                
                $res = explode(';', $worksheetDetail[$i]->KUNCIJAWABAN_MS);
                for ($j=0; $j < count($res); $j++) {
                    echo 'msResp['.$i.']['.$j.'] = "'.$res[$j].'";';
                }
                echo "
                    printMSResp(".$i.", `".$worksheetDetail[$i]->SOAL_MS."`);
                    countResp = (`".$worksheetDetail[$i]->SOAL_MS."`.match(new RegExp('_', 'g')) || []).length;
                    fillMSResp(".$i.", countResp);
                ";
            }
            
        }
    ?>
    $(document).ready(function(){
        const totalQuest = '<?= $worksheet->TOTALQUESTION_WS;?>'
        $('.editor').summernote({height: 150});
    })
    $('.editor').on('summernote.change', function(we, contents, $editable) {
        const item = $(this).data('item')

        printMSResp(item, contents)
        const countResp = (contents.match(new RegExp("_", "g")) || []).length
        if(!msResp[item]){
            msResp.push([])
        }else{
            if(countResp < msResp[item].length){
                msResp[item].pop()
            }
        }
        fillMSResp(item, countResp);
    });


    $('#btn-save').click(function(){
        const status = $('#form-submit').valid()
        if(status){
            $('#form-submit').submit()
        }else{
            warning_noti("Some forms are not filled yet!")
        }
    })
    
    const keyPressMC = idResp => {
        const val = $(`#textResp_${idResp}`).val()
        $(`#radResp_${idResp}`).val(val)
    }
    function printMSResp(item, contents){
        $(".type_missing_content_"+item).html(contents.split("_").join(` <input class="typeMiss_resp_${item}" onkeyup="setMSResp(${item})" style="border: 1px solid #ced4da;border-radius: .25rem;padding: 5px;" placeholder="Enter Answer" type="text" name="MISSING_RESPONSE_${item}[]" required /> `))
    }
    const setMSResp = item => {
        var ek = $('.typeMiss_resp_'+item).map((_,el) => el.value).get()
        for(let i=0; i < ek.length; i++){
            msResp[item][i] = ek[i]
        }
    }
    function fillMSResp(item, countResp){
        for(let i = 0; i < countResp; i++){
            if(msResp[item][i]){
                $('.type_missing_content_'+item).find('input')[i].value = msResp[item][i]
            }else{
                $('.type_missing_content_'+item).find('input')[i].value = ""
            }
        }
    }
    // Number only input
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>