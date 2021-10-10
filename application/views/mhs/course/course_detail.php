<!-- Content -->
<div class="contentt">

    <div class="container welcome mx-auto"> <!-- class 'welcome' iki khusus gawe page iki, soale gawe padding e gambar illustrasi ndek isor -->

        <div class="card mb-5 py-3 px-5">
            <p class="h2 font-w-700 mt-3">Worksheet <?= $noWS?></p>
            <p class="opacity-70"><?= $worksheet->NAMA_WS?></p>
            <?php
                if($worksheet->PATH_PDF != null){
                    echo '
                        <iframe src="'.$worksheet->PATH_PDF.'" style="height: 800px;" frameborder="0"></iframe>
                    ';  
                }
            ?>
            
        </div>
        <?= $questions?>
        <!-- <div class="card mb-3 p-5">
            <p>Question 1</p>
            <p class="h3 font-w-700">What is Argumentation?</p>
            <div class="input-group">
                <input type="radio" name="question1" value="a" id="a">
                <label for="a">A. An argument is a rationale in which the reason presents evidence</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="b" id="b">
                <label for="b">B. Its purpose is to provide a basis for believing the conclusion to be true</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="c" id="c">
                <label for="c">C. An explanation is a rationale in which the reason presents</label>
            </div>
            <div class="input-group">
                <input type="radio" name="question1" value="d" id="d">
                <label for="d">D. A cause of some fact represented by the conclusion.</label>
            </div>
        </div>
        <div class="card mb-3 p-5">
            <p>Question 2</p>
            <p class="h3 font-w-700 mb-5">What is Argumentation?</p>

            <textarea type="text" class="question-text" placeholder="Your Answer"></textarea>
        </div>
        <div class="card mb-3 p-5">
            <p>Question 3</p>
            <p class="h3 font-w-700 mb-5">What is Argumentation?</p>

            <div class="d-flex flex-wrap">
                <p>An argument is a <input type="text" class="input-isian"> in which the reason <input type="text" class="input-isian"> in support of a claim made in the conclusion. Its purpose is to <input type="text" class="input-isian"> a basis for believing the conclusion to be true. An explanation is a rationale in which the reason presents a cause of some <input type="text" class="input-isian"></p>
                
            </div>
        </div> -->
        <!-- <a href="#" class="viewWrk-btn mr-auto w-50">Submit Test</a> -->
    </div>

    


</div>
<script>
    $(document).ready(function() {
        $('.pick-ws').click(function(e) {
            var id = $(this).data('myval');
            var idWSM = $(this).data('idwsm');
            var status = $(this).data('status')
            $.ajax({
                url: `<?= site_url('mhs/CourseController/getQuestion/') ?>${id}/${idWSM}/${status}`,
                type: 'GET',
                success: function(res) {
                    $('#display-' + id).html(res);
                }
            });
        });
    });
    $('.collapsed').click(function(){
        const item = $(this).data('item')

    })
</script>