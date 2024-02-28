<?php
$wkshopbaseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
// $wkshopBasePath =  $wkshopbaseUrl . '/rml_apps'; // --> live server
$wkshopBasePath    = $wkshopbaseUrl . '/workshop_ms_dashboard'; //--> test server 
$rs_img_path = "../../../workshop_ms_dashboard/";  // --> live server
// $rs_img_path = "../resale_product_image/";  // --> test server
