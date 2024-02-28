<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="footer-wrap">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#" class="text-primary fw-bold">RMWL </a> <?= date('Y') ?></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">If you encounter or experience any kind of problem, please feel free to contact the <a href="#" class="text-primary fw-bold"> RML-IT TEAM</a> for assistance.</span>
        </div>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="<?php echo $wkshopBasePath ?>/vendors/base/vendor.bundle.base.js"></script>
<script src="<?php echo $wkshopBasePath ?>/js/template.js"></script>
<script src="<?php echo $wkshopBasePath ?>/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo $wkshopBasePath ?>/vendors/progressbar.js/progressbar.min.js"></script>
<script src="<?php echo $wkshopBasePath ?>/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
<script src="<?php echo $wkshopBasePath ?>/vendors/justgage/raphael-2.1.4.min.js"></script>
<script src="<?php echo $wkshopBasePath ?>/vendors/justgage/justgage.js"></script>
<script src="<?php echo $wkshopBasePath ?>/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo $wkshopBasePath ?>/js/dashboard.js"></script>
<!-- End custom js for this page-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.js" integrity="sha512-7x7HoEikRZhV0FAORWP+hrUzl75JW/uLHBbg2kHnPdFmScpIeHY0ieUVSacjusrKrlA/RsA2tDOBvisFmKc3xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--app JS-->

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="<?php echo $wkshopBasePath ?>/assets/js/app.js"></script>
<?php if (isset($dynamic_link_js) && count($dynamic_link_js) > 0) {
    foreach ($dynamic_link_js as $key => $linkJs) {
        echo "<script src='$linkJs'></script>";
    }
} ?>

<?php
if (!empty($_SESSION['noti_message'])) {
    if ($_SESSION['noti_message']['status'] == 'false') {
        echo "<script>toastr.warning('{$_SESSION['noti_message']['text']}');</script>";
    }
    if ($_SESSION['noti_message']['status'] == 'true') {
        echo "<script>toastr.success('{$_SESSION['noti_message']['text']}');</script>";
    }
    unset($_SESSION['noti_message']);
}
?>
</body>

</html>