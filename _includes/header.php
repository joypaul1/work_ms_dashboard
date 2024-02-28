<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor5  headercolor8">

<head>
    <title>WORKSHOP-MASTER-DASHBOARD | RML</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!--favicon-->
    <link rel="icon" href="<?php echo $wkshopBasePath ?>/assets/images/favicon-32x32.png" type="image/png">
    <link rel="stylesheet" href="<?php echo $wkshopBasePath ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $wkshopBasePath ?>/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <?php
    if (isset($dynamic_link_css) && count($dynamic_link_css) > 0) {
        foreach ($dynamic_link_css as $key => $linkCss) {
            echo "<link rel='stylesheet' type='text/css' href='$linkCss'>";
        }
    }
    ?>

</head>

<body>