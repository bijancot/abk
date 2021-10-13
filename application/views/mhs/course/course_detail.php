<!-- Content -->
<div class="contentt">

    <div class="container mx-auto"> <!-- class 'welcome' iki khusus gawe page iki, soale gawe padding e gambar illustrasi ndek isor -->

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