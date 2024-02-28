<?php
session_start();
$wkshopBasePath = $_SESSION['wkshopBasePath'];
if (!isset($_SESSION['USER_WK_ADMIN'])) {
    $currentScriptPath = __FILE__;
    $directoryPath     = dirname($currentScriptPath);
    $includeFilePath   = $directoryPath . '../../config_file_path.php';
    $realIncludePath   = realpath($includeFilePath);
    require($includeFilePath);
    header("Location:" . $wkshopBasePath);
    exit;
}

include_once('../_config/sqlConfig.php');
include_once('../_config/connoracleConfig.php');
include_once('../_includes/header.php');
include_once('../_includes/top_header.php');
include_once('../_includes/sidebar.php');
