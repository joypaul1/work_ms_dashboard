<?php
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
// $wkshopBasePath =  $baseUrl . '/rml_apps'; // --> live server
$wkshopBasePath    = $baseUrl . '/sfcm'; //--> test server 
$rs_img_path = "../../../sfcm/";  // --> live server
// $rs_img_path = "../resale_product_image/";  // --> test server

?>