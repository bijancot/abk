 <!--start content-->
 <?php
    // Students Activity Yearly
    $ws_month = "";
    $ws_total = null;
    foreach ($studentActivity as $item) {
        $m = $item->month;
        $ws_month .= "'$m'" . ", ";
        $total = $item->total;
        $ws_total .= "$total" . ", ";
    }

    // Student Status
    $st_null = null;
    $st_ip = null;
    $st_wr = null;
    $st_p = null;
    $st_f = null;
    $st_total = null;
    $st_totalp = null;
    foreach ($studentStatus as $item) {
        $status = $item->status;
        $temp = $item->total;
        // Haven't Take
        if ($status == null) {
            $st_null += $temp;
        }
        // In Progress
        else if ($status == 0) {
            $st_ip += $temp;
        }
        // Waiting for Response
        else if ($status == 1) {
            $st_wr += $temp;
        }
        // Passed
        else if ($status == 2) {
            $st_p += $temp;
        }
        // Failed
        else if ($status == 3) {
            $st_f += $temp;
        }
        $st_total += $temp;
    }
    $st_nullp = $st_null / $st_total * 100;
    $st_ipp = $st_ip / $st_total * 100;
    $st_wrp = $st_wr / $st_total * 100;
    $st_pp = $st_p / $st_total * 100;
    $st_fp = $st_f / $st_total * 100;
    $st_totalp = $st_ipp + $st_wrp + $st_pp + $st_fp;

    $nama_ws = null;
    $st_passed = null;
    $total_p = 0;
    $st_failed = null;
    $total_f = 0;
    foreach ($passRates as $item) {
        $ws = $item->NAMA_WS;
        if ($ws != $temp) {
            $nama_ws .= "'$ws'" . ", ";
        }
        $status = $item->STATUS_WSM;
        if ($item->STATUS_WSM == 2) {
            $st_passed .= "$item->TOTAL" . ", ";
            $total_p += $item->TOTAL;
        } else {
            $st_failed .= "$item->TOTAL" . ", ";
            $total_f += $item->TOTAL;
        }
        $temp = $ws;
    }

    $nama_mhs = "";
    $points = null;
    foreach ($studentRanking as $item) {
        $nm = $item->NAMA_MHS;
        $nama_mhs .= "'$nm'" . ", ";
        $p = $item->TOTAL;
        $points .= "$p" . ", ";
    }
    ?>
 <main class="page-content">

     <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
         <div class="col">
             <div class="card overflow-hidden radius-10">
                 <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                         <div class="w-50">
                             <p>Total of Students</p>
                             <h4 class=""><?= $studentTotal->total ?></h4>
                         </div>
                         <div class="w-50 d-flex justify-content-center">
                             <i class="bi bi-people-fill" style="font-size: 3rem; color: #4EBBFF"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col">
             <div class="card overflow-hidden radius-10">
                 <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                         <div class="w-50">
                             <p>Students Verified</p>
                             <h4 class=""><?= $studentVTotal->total ?></h4>
                         </div>
                         <div class="w-50 d-flex justify-content-center">
                             <i class="bi bi-person-check-fill" style="font-size: 3rem; color: #4EBBFF"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col">
             <div class="card overflow-hidden radius-10">
                 <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                         <div class="w-50">
                             <p>Total of Worksheets</p>
                             <h4 class=""><?= $worksheetTotal->total ?></h4>
                         </div>
                         <div class="w-50 d-flex justify-content-center">
                             <i class="bi bi-file-earmark-text-fill" style="font-size: 3rem; color: #4EBBFF"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col">
             <div class="card overflow-hidden radius-10">
                 <div class="card-body">
                     <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                         <div class="w-50">
                             <p>Worksheets Published</p>
                             <h4 class=""><?= $worksheetPTotal->total ?></h4>
                         </div>
                         <div class="w-50 d-flex justify-content-center">
                             <i class="bi bi-file-earmark-check-fill" style="font-size: 3rem; color: #4EBBFF"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--end row-->

     <div class="row">
         <div class="col-12 col-lg-12 d-flex">
             <div class="card radius-10 w-100">
                 <div class="card-body">
                     <div class="d-flex align-items-center">
                         <h6 class="mb-0">Student Activity <?= date('Y') ?></h6>
                     </div>
                     <div id="chartStudentActivity"></div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12 col-lg-6 d-flex">
             <div class="card radius-10 w-100">
                 <div class="card-body">
                     <div class="d-flex align-items-center">
                         <h6 class="mb-0">Student Status</h6>
                     </div>
                     <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                         <div class="col-lg-7 col-xl-7 col-xxl-6">
                             <div class="by-device-container">
                                 <div class="piechart-legend">
                                     <h2 class="mb-1"><?= number_format((float)$st_totalp, 2, '.', '') ?>%</h2>
                                     <h6 class="mb-0">Total Status</h6>
                                 </div>
                                 <canvas id="chartStudentStatus"></canvas>
                             </div>
                         </div>
                         <div class="col-lg-5 col-xl-5 col-xxl-6">
                             <div class="">
                                 <ul class="list-group list-group-flush">
                                     <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                         <i class="bi bi-file-text me-2 text-primary" style="font-size: 2rem; color: #4EBBFF"></i> <span>Haven't Take</span> <span><?= number_format((float)$st_nullp, 2, '.', '') ?>%</span>
                                     </li>
                                     <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                         <i class="bi bi-file-earmark-text me-2 text-primary" style="font-size: 2rem; color: #4EBBFF"></i> <span>In Progress</span> <span><?= number_format((float)$st_ipp, 2, '.', '') ?>%</span>
                                     </li>
                                     <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                         <i class="bi bi-exclamation-triangle me-2 text-primary" style="font-size: 2rem; color: #4EBBFF"></i> <span>Waiting for Response</span> <span><?= number_format((float)$st_wrp, 2, '.', ''); ?>%</span>
                                     </li>
                                     <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                         <i class="bi bi-check-circle me-2 text-primary" style="font-size: 2rem; color: #4EBBFF"></i> <span>Passed</span> <span><?= number_format((float)$st_pp, 2, '.', ''); ?>%</span>
                                     </li>
                                     <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                         <i class="bi bi-x-circle me-2 text-primary" style="font-size: 2rem; color: #4EBBFF"></i> <span>Failed</span> <span><?= number_format((float)$st_fp, 2, '.', ''); ?>%</span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-12 col-lg-6 d-flex">
             <div class="card radius-10 w-100">
                 <div class="card-body">
                     <div class="d-flex align-items-center">
                         <h6 class="mb-0">Pass Rates</h6>
                     </div>
                     <div id="chartStudentRates" class=""></div>
                     <div class="d-flex align-items-center gap-5 justify-content-center p-2 radius-10 border">
                         <div class="text-center">
                             <h3 class="mb-2 text-primary"><?= $total_p ?></h3>
                             <p class="mb-0">Students Passed</p>
                         </div>
                         <div class="border-end sepration"></div>
                         <div class="text-center">
                             <h3 class="mb-2 text-primary-2"><?= $total_f ?></h3>
                             <p class="mb-0">Students Failed</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12 col-lg-12 d-flex">
             <div class="card radius-10 w-100">
                 <div class="card-body">
                     <div class="d-flex align-items-center">
                         <h6 class="mb-0">Student Ranking <?= date('Y') ?></h6>
                     </div>
                     <div id="chartStudentRanking"></div>
                 </div>
             </div>
         </div>
     </div>
     <!--end row-->

 </main>
 <!--end page main-->

 <script src="<?= site_url() ?>/assets/adm/js/index.js"></script>
 <script>
     $(function() {
         "use strict";
         // chart 5
         var options = {
             series: [{
                 name: "Submissions",
                 data: [<?= $ws_total ?>]
             }],
             chart: {
                 type: 'area',
                 height: 280,
                 toolbar: {
                     show: false
                 }
             },
             plotOptions: {
                 bar: {
                     horizontal: true,
                     columnWidth: '35%',
                     endingShape: 'rounded'
                 }
             },
             dataLabels: {
                 enabled: false
             },
             colors: ['#4EBBFF'],
             xaxis: {
                 categories: [<?= $ws_month ?>],
             },
             yaxis: {
                 labels: {
                     formatter: function(val) {
                         return val.toFixed(0)
                     }
                 }
             }
         };
         var chart = new ApexCharts(document.querySelector("#chartStudentActivity"), options);
         chart.render();

         // Chart 6
         new Chart(document.getElementById("chartStudentStatus"), {
             type: 'doughnut',
             data: {
                 labels: ["Haven't Take", "In Progress", "Waiting for Response", "Passed", "Failed"],
                 datasets: [{
                     backgroundColor: ["#4EBBFF", "#61c2ff", "#78cbff", "#8fd4ff", "#a8deff"],
                     data: [<?php echo $st_null . ', ' . $st_ip . ', ' . $st_wr . ', ' . $st_p . ', ' . $st_f ?>]
                 }]
             },
             options: {
                 cutoutPercentage: 65,
                 legend: {
                     display: false
                 },
                 maintainAspectRatio: false,
             }
         });

         // Chart Students Rates
         var options = {
             series: [{
                 name: 'Students Passed',
                 data: [<?php echo $st_passed ?>]
             }, {
                 name: 'Students Failed',
                 data: [<?php echo $st_failed ?>]
             }],
             chart: {
                 type: 'bar',
                 height: 210,
                 stacked: true,
                 toolbar: {
                     show: false
                 },
                 zoom: {
                     enabled: true
                 }
             },
             responsive: [{
                 breakpoint: 480,
                 options: {
                     legend: {
                         show: false,
                     }
                 }
             }],
             plotOptions: {
                 bar: {
                     horizontal: false,
                     borderRadius: 10
                 },
             },
             xaxis: {
                 //  type: 'datetime',
                 labels: {
                     show: false,
                 },
                 categories: [<?php echo $nama_ws ?>],
             },
             yaxis: {
                 labels: {
                     formatter: function(val) {
                         return val.toFixed(0)
                     }
                 }
             },
             colors: ["#4EBBFF", "#8ea8fd"],
             legend: {
                 show: false
             }
         };

         var chart = new ApexCharts(document.querySelector("#chartStudentRates"), options);
         chart.render();


         // Student Ranking
         var options = {

             series: [{
                 name: "Points",
                 data: [<?= $points ?>]
             }],
             chart: {
                 type: 'bar',
                 height: 500,
                 toolbar: {
                     show: false
                 }
             },
             plotOptions: {
                 bar: {
                     borderRadius: 4,
                     horizontal: true,
                 }
             },
             dataLabels: {
                 enabled: false
             },
             colors: ['#4EBBFF'],
             xaxis: {
                 categories: [<?= $nama_mhs ?>],
             }
         };

         var chart = new ApexCharts(document.querySelector("#chartStudentRanking"), options);
         chart.render();

     });
 </script>