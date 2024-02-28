<?php
$wkshopbaseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
// $wkshopBasePath =  $wkshopbaseUrl . '/rml_apps'; // --> live server
$wkshopBasePath    = $wkshopbaseUrl . '/sfcm'; //--> test server 
$rs_img_path = "../../../sfcm/";  // --> live server
// $rs_img_path = "../resale_product_image/";  // --> test server

?>