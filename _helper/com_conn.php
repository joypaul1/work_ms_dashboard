<?php
session_start();

if (!isset($_SESSION['USER_WK_ADMIN'])) {
    $currentScriptPath = __FILE__;
    $directoryPath     = dirname($currentScriptPath);
    $includeFilePath   = $directoryPath . '/../config_file_path.php';
    $realIncludePath   = realpath($includeFilePath);
    require($includeFilePath);
    header("Location:" . $wkshopBasePath);
    exit;
}
echo $_SESSION['wkshopBasePath'];
die();
$wkshopBasePath =NULL;
$wkshopBasePath = $_SESSION['wkshopBasePath'];
include_once('../_config/connoracle.php');
include_once('../_includes/header.php');
include_once('../_includes/sidebar.php');
include_once('../_includes/top_header.php');
