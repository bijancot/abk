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
    <form id="form-submit" action="<?= site_url('admin/question/store')?>" method="post">
    <input type="hidden" name="ID_WS" value="<?= $idWS?>" />
    <input type="hidden" name="TIPE" value="<?= $worksheet->TYPEQUESTION_WS?>" />
    <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
        <div class="col-md-12 col-sm-12">
            <a id="btn-save" style="float: right;" class="btn btn-sm btn-success"><i class="bi bi-save"></i> Save</a>
        </div>
    </div>
    <?php
        $countMC = 1;
        for($no = 1; $no <= $worksheet->TOTALQUESTION_WS; $no++) {
            if($worksheet->TYPEQUESTION_WS == "1"){
                $grade = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->GRADE_ES : "";
                $idQuest = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->ID_ES : "kosong";

                $typeContent =  '
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea id="ckEditor'.$no.'" class="editor" name="ESSAY_QUESTION[]" required></textarea>
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
                
                $typeContent = '
                <div class="form-group mb-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea id="ckEditor'.$no.'" class="editor" name="MULTI_QUESTION[]" required></textarea>
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
                $idQuest     = !empty($worksheetDetail[$no-1]) ? $worksheetDetail[$no-1]->ID_MS : "kosong";
                $typeContent = '
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Question <span class="text-danger">*</span></label>
                        <textarea name="MISSING_QUESTION[]" id="ckEditor'.$no.'" class="editor"></textarea>
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
    let quest = []
    let questFilled = []
    let missingResp = []
    <?php
        if($worksheetDetail != null){
            for ($i=0; $i < count($worksheetDetail); $i++) { 
                if($worksheetDetail[$i]->TYPEQUESTION_WS == '1'){
                    echo 'questFilled['.$i.'] = "'.$worksheetDetail[$i]->SOAL_ES.'";';
                }else if($worksheetDetail[$i]->TYPEQUESTION_WS == '2'){
                    echo 'questFilled['.$i.'] = "'.$worksheetDetail[$i]->SOAL_MC.'";';
                }else if($worksheetDetail[$i]->TYPEQUESTION_WS == '3'){
                    echo 'questFilled['.$i.'] = "'.$worksheetDetail[$i]->SOAL_MS.'";';
                    
                    echo 'missingResp['.$i.'] = [';
                        $resp = explode(';', $worksheetDetail[$i]->KUNCIJAWABAN_MS);
                        for($x = 0; $x < count($resp); $x++) {
                            echo '{resp: "'.$resp[$x].'"},';
                        }
                    echo '];';
                }
            }
        }
    ?>
    $(document).ready(function(){
        const totalQuest = '<?= $worksheet->TOTALQUESTION_WS;?>'
        var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
            let x = 0;
            ClassicEditor
                .create(allEditors[i])
                .then(editor => {
                    quest.push(editor)
                    // editor.keystrokes.set('space', (key, stop) => {
                    //     editor.execute('input', {
                    //         text: ' '
                    //     });
                    //     stop();
                    // });
                    
                })
                .finally(() => {
                    let x = 0
                    for(const item of quest){
                        if(questFilled[x] != null || questFilled[x] != undefined){
                            item.setData(questFilled[x])
                            
                            // const type = "<?= $worksheet->TYPEQUESTION_WS?>"
                            // if(type == "3"){
                            //     $(".type_missing_content_"+x).html(questFilled[x].split("_").join(` <input class="typeMiss_resp_${x}" style="border: 1px solid #ced4da;border-radius: .25rem;padding: 5px;" placeholder="Enter Answer" type="text" name="MISSING_RESPONSE_${x}[]" required /> `))

                            //     let inputMissResp = $(`.typeMiss_resp_${x}`)
                            //     for(let i = 0; i < missingResp.length; i++){
                            //         for(const item of missingResp[i]){
                            //             inputMissResp[i].val(item.resp)
                            //             console.log(inputMissResp.find('input')[i].val(item.resp))
                            //             inputMissResp[0].val("Ilham")
                            //             console.log(inputMissResp[0])
                            //         }
                            //     }
                            // }
                        }
                        x++
                    }

                    // missing sentence config
                    <?php
                        for ($i=0; $i < $worksheet->TOTALQUESTION_WS; $i++) { 
                            if($worksheet->TYPEQUESTION_WS == '3'){
                                echo '
                                    quest['.$i.'].editing.view.document.on( "keyup", ( evt, data ) => {
                                        let text = quest['.$i.'].getData()
                                        $(".type_missing_content_"+'.$i.').html(text.split("_").join(` <input class="typeMiss_resp_${i}" style="border: 1px solid #ced4da;border-radius: .25rem;padding: 5px;" placeholder="Enter Answer" type="text" name="MISSING_RESPONSE_'.$i.'[]" required /> `))
                                    });
                                ';
                            }
                        }
                    ?>
                    
                })
        }

        
    })
    $('#btn-save').click(function(){
        // $('#form-submit').submit()
        const status = $('#form-submit').valid()
        let statusQuest = true
        for(const item of quest){
            if(item.getData() == ""){
                statusQuest = false
                break;
            }
        }

        if(status && statusQuest){
            $('#form-submit').submit()
        }else{
            warning_noti("Some forms are not filled yet!")
        }
        // }
    })
    const keyPressMC = idResp => {
        const val = $(`#textResp_${idResp}`).val()
        $(`#radResp_${idResp}`).val(val)
    } 
    // Number only input
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>