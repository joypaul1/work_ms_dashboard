<?php
session_start();
if (!isset($_SESSION['USER_WK_ADMIN'])) {
    $currentScriptPath = __FILE__;
    $directoryPath     = dirname($currentScriptPath);
    $includeFilePath   = $directoryPath . '../../../../config_file_path.php';
    $realIncludePath   = realpath($includeFilePath);
    require($includeFilePath);
    header("Location:" . $wkshopBasePath);
    exit;
}
$wkshopBasePath = $_SESSION['wkshopBasePath'];
include_once('../../../../_includes/header.php');

if ($_SESSION['USER_WK_ADMIN']['USER_TYPE'] == 'HOD') {
    include_once('../../../../_includes/sidebar.php');
}
if ($_SESSION['USER_WK_ADMIN']['USER_TYPE'] == 'COORDINATOR') {
    include_once('../../../../_includes/coordinator_sidebar.php');
}
if ($_SESSION['USER_WK_ADMIN']['USER_TYPE'] == 'SALE EXECUTIVE') {
    include_once('../../../../_includes/executive_sidebar.php');
}
if ($_SESSION['USER_WK_ADMIN']['USER_TYPE'] == 'RETAILER') {
    include_once('../../../../_includes/retailer_sidebar.php');
}
if ($_SESSION['USER_WK_ADMIN']['USER_TYPE'] == 'MECHANICS') {
    include_once('../../../../_includes/mechanics_sidebar.php');
}
include_once('../../../../_includes/top_header.php');
