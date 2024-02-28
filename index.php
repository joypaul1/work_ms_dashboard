<?php
session_start();

require_once('_config/sqlConfig.php');
include_once('./config_file_path.php');

if (isset($_POST['login_submit'])) {
	if (!empty($_POST['employee_id']) && !empty($_POST['password'])) {
		$employee_id 		= trim($_POST['employee_id']);
		$password 			= trim($_POST['password']);
		$md5Password 		= md5($password);
		$sql 				= "SELECT * FROM tbl_users WHERE emp_id = '" . $employee_id . "' AND password = '" . $md5Password . "'";
		$rs = mysqli_query($conn, $sql);
		$getNumRows = mysqli_num_rows($rs);
		if ($getNumRows == 1) {
			$getUserRow = mysqli_fetch_assoc($rs);
			unset($getUserRow['password']);
			$_SESSION['USER_WK_ADMIN']   	= $getUserRow;
			$_SESSION['wkshopbaseUrl']     		= $wkshopbaseUrl;
			$_SESSION['wkshopBasePath']     = $wkshopBasePath;
			$_SESSION['rs_img_path'] 		= $rs_img_path;
			header('location:dashboard.php');
			exit;
		} else {
			$errorMsg = "Wrong EMP-ID or password";
		}
	}
}

if (isset($_GET['logout']) && $_GET['logout'] == true) {
	session_destroy();
	header("location:index.php");
	exit;
}


if (isset($_GET['lmsg']) && $_GET['lmsg'] == true) {
	$errorMsg = "Login required to access dashboard";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	<title>RMWL-WORKSHOP</title>
	<!-- base:css -->
	<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
	<!-- endinject -->
	<link rel="stylesheet" href="css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
				<div class="row flex-grow">
					<div class="col-lg-6 login-half-bg d-flex flex-row">
						<p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?php echo date('Y') ?> All rights reserved.</p>
					</div>
					<div class="col-lg-6 d-flex align-items-center justify-content-center">
						<div class="auth-form-transparent text-left p-3">
							<div class="brand-logo">
								<img src="images/workshop.png" alt="logo" style="width: 100%">
							</div>

							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="pt-3">
								<div class="form-group">
									<label for="exampleInputEmail">Username</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-account-outline text-primary"></i>
											</span>
										</div>
										<input type="text" name="employee_id" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Password</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-primary"></i>
											</span>
										</div>
										<input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
									</div>
								</div>
								<div class="text-center my-3">
									<button name="login_submit" type="submit" class="btn btn-block btn-baseWk btn-lg font-weight-medium auth-form-btn">LOGIN</button>
								</div>

								<div class="text-center mt-4 font-weight-light">
									New on our platform? Contract With <strong><u>RML IT &amp; ERP</u>.</strong>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- base:js -->
	<script src="vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="js/template.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- Custom js for this page-->
	<!-- End custom js for this page-->
</body>

</html>