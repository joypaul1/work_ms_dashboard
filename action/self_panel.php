<?php
session_start();
require_once('../config_file_path.php');
require_once('../_config/connoracleConfig.php');
$wkshopBasePath     = $_SESSION['wkshopBasePath'];
$log_user_id        = $_SESSION['USER_WK_ADMIN']['id'];
$emp_session_id     = $_SESSION['USER_WK_ADMIN']['emp_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && trim($_POST["actionType"]) == 'create') {

    @$emp_form_name     = $_POST['emp_form_name'];
    @$form_rml_id       = $_POST['form_rml_id'];
    @$emp_mobile        = $_POST['emp_mobile'];
    @$iemi_no           = $_POST['iemi_no'];
    @$workshop_name    = $_POST['workshop_name'];
    @$remarks           = $_POST['remarks'];

    // Prepare the SQL statement
    $query = "INSERT INTO RML_COLL_APPS_USER (EMP_NAME, PASS_MD5, IS_ACTIVE, RML_ID, MOBILE_NO, CREATED_DATE, IEMI_NO, ACCESS_APP,AREA_ZONE,REMARKS, UPDATED_BY)
    VALUES ( '$emp_form_name','15DE21C670AE7C3F6F3F1F37029303C9',1,'$form_rml_id','$emp_mobile',SYSDATE,'$iemi_no','RML_WSHOP','$workshop_name','$remarks','$emp_session_id')";

    $strSQL = @oci_parse($objConnect, $query);

    // Execute the query
    if (@oci_execute($strSQL)) {

        $message = [
            'text'   => 'Data Saved successfully.',
            'status' => 'true',
        ];

        $_SESSION['noti_message'] = $message;
        echo "<script> window.location.href = '{$wkshopBasePath}/cerate_user.php'</script>";
        exit();
    } else {
        $e                        = @oci_error($strSQL);
        $message                  = [
            'text'   => htmlentities($e['message'], ENT_QUOTES),
            'status' => 'false',
        ];
        $_SESSION['noti_message'] = $message;
        echo "<script> window.location.href = '{$wkshopBasePath}/cerate_user.php'</script>";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && trim($_POST["actionType"]) == 'update') {
    $form_rml_id    = $_POST['form_rml_id'];
    $form_zone_name = $_POST['form_zone_name'];
    $form_iemi_no   = $_POST['form_iemi_no'];
    $user_status    = $_POST['emp_status'];
    $query = "UPDATE RML_COLL_APPS_USER 
                    SET IEMI_NO='$form_iemi_no',
                        AREA_ZONE='$form_zone_name',
                        IS_ACTIVE='$user_status'
                    WHERE RML_ID='$form_rml_id'
                    AND ACCESS_APP='RML_WSHOP'";

    $strSQL = oci_parse($objConnect, $query);

    // Execute the query
    oci_execute($strSQL);

    // Check for errors after executing each query
    if (oci_error($strSQL)) {
        $e                        = @oci_error($strSQL);
        $message                  = [
            'text'   => htmlentities($e['message'], ENT_QUOTES),
            'status' => 'false',
        ];
        $_SESSION['noti_message'] = $message;
        echo "<script> window.location.href = '{$wkshopBasePath}/search_update.php?'</script>";
        exit();
    }
    $message = [
        'text'   => 'Data Updated Successfully.',
        'status' => 'true',
    ];

    $_SESSION['noti_message'] = $message;
    echo "<script> window.location.href = '{$wkshopBasePath}/search_update.php?'</script>";
    exit();
}
