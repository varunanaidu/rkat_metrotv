<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      <!-- <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
          <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
            <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank"> Purchase</a></li>
          </ul>
        </div>
    </footer> -->

    <!-- BEGIN VENDOR JS-->
    <script type="text/javascript"> var base_url = "<?= base_url(); ?>" </script>
    <!-- <script src="<?= base_url(); ?>assets/vendor/jquery/dist/jquery.min.js" type="text/javascript"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>front/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="<?= base_url(); ?>front/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>front/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- Page Script -->
    <?php 
    if ( isset($js) ) {
      for ( $i = 0; $i < sizeof($js); $i++) { 
        ?>
        <script src="<?= $js[$i] ?>"></script>
        <?php 
    }
}
?>
</body>
</html>