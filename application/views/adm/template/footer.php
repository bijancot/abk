       <!--start overlay-->
       <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        </div>
  <!--end wrapper-->



  <!--plugins-->
  <script src="<?= site_url()?>/assets/adm/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= site_url()?>/assets/adm/js/pace.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/chartjs/js/Chart.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="<?= site_url()?>/assets/adm/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

  <script src="<?= site_url()?>assets/adm/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?= site_url()?>assets/adm/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= site_url()?>assets/adm/js/table-datatable.js"></script>
  <script src="<?= site_url()?>assets/adm/js/component-popovers-tooltips.js"></script>
  <script src="<?= site_url()?>/assets/adm/js/jquery-validate.min.js"></script>
  <!--notification js -->
	<script src="<?= site_url()?>assets/adm/plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?= site_url()?>assets/adm/plugins/notifications/js/notifications.min.js"></script>
	<script src="<?= site_url()?>assets/adm/plugins/notifications/js/notification-custom-script.js"></script>
  <script src="<?= site_url()?>assets/adm/js/pace.min.js"></script>
  <!--app-->
  <script src="<?= site_url()?>/assets/adm/summernote/summernote.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/js/app.js"></script>
  <!-- <script>
    new PerfectScrollbar(".best-product")
 </script> -->
<script>
    <?php
      if($this->session->flashdata('succ')){
        echo 'success_noti("'.$this->session->flashdata('succ').'")';
      }else if($this->session->flashdata('err')){
        echo 'error_noti("'.$this->session->flashdata('err').'")';
      }else if($this->session->flashdata('warn')){
        echo 'warning_noti("'.$this->session->flashdata('warn').'")';
      }
    ?>
</script>

</body>

</html>