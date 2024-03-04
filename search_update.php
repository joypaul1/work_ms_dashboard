<?php include_once('./_helper/com_conn.php'); ?>


<div class="content-wrapper">
	<div class="row">
		<div class="col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<span class="d-flex align-items-center justify-content-between">

						<h4 class="card-title">
							<i class="mdi mdi-database-search menu-icon"></i>Search User For Update or Check Information
						</h4>
					</span>

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "UTF-8"); ?>" method="post" class="d-flex align-items-center justify-content-center  gap-3 ">
						<div class="col-3">
							<input type="text" name="emp_id" value="<?php echo isset($_POST['emp_id']) ? $_POST['emp_id'] : '' ?>" placeholder="EMP-ID (EX:955)" class="form-control form-control-sm" style="border:1px solid gray">
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary btn-sm mb-3"><i class="mdi mdi-account-search-outline menu-icon"></i> Search User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12 grid-margin stretch-card">
			<?php
			$emp_session_id = $_SESSION['USER_WK_ADMIN']['emp_id'];
			@$emp_id 		= $_REQUEST['emp_id'];
			@$emp_concern 	= $_REQUEST['emp_concern'];
			@$emp_status 	= $_REQUEST['emp_status'];

			if (isset($_POST['emp_id'])) {
				$strSQL  = @oci_parse($objConnect, "SELECT ID,RML_ID,IS_ACTIVE,REMARKS,UPDATED_BY,EMP_NAME,MOBILE_NO,CREATED_DATE,LEASE_USER,USER_FOR,AREA_ZONE,IEMI_NO  FROM RML_COLL_APPS_USER WHERE RML_ID='$emp_id' AND ACCESS_APP='RML_WSHOP'");
				@oci_execute($strSQL);
				while ($row = @oci_fetch_assoc($strSQL)) {
			?>
					<div class="card">
						<div class="card-header text-danger fw-bold text-center text-uppercase">
							<i class="mdi mdi-alert menu-icon"></i> You will be respondible if you update anything here. <i class="mdi mdi-alert menu-icon"></i>
						</div>
						<div class="card-body">
							<form method="POST" action="<?php echo $wkshopBasePath . "/action/self_panel.php"; ?>">
								<div class="row">
									<input type="hidden" name="actionType" value="update">
									<div class="col-3">
										<label for="form_rml_id" class="form-label">Emp ID:</label>
										<input type="text" class="form-control form-control-sm" id="form_rml_id" name="form_rml_id" value="<?php echo $row['RML_ID']; ?>" readonly>
									</div>
									<div class="col-3">
										<label for="MOBILE_NO" class="form-label">Mobile:</label>
										<input type="number" class="form-control form-control-sm" id="MOBILE_NO" value="<?php echo $row['MOBILE_NO']; ?>" readonly>
									</div>
									<div class="col-3">
										<label for="CREATED_DATE" class="form-label">User Created Date:</label>
										<input type="text" class="form-control form-control-sm" id="CREATED_DATE" name="form_res2_id" value="<?php echo $row['CREATED_DATE']; ?>" readonly>
									</div>
									<div class="col-3">
										<label for="UPDATED_BY" class="form-label">User Created By:</label>
										<input type="text" class="form-control form-control-sm" id="UPDATED_BY" name="form_zone_name" value="<?php echo $row['UPDATED_BY']; ?>" readonly>
									</div>
									<div class="col-3">
										<label for="REMARKS" class="form-label">Remarks:</label>
										<input type="text" class="form-control form-control-sm" id="REMARKS" name="form_iemi_no" value="<?php echo $row['REMARKS']; ?>" readonly>
									</div>
									<div class="col-3">
										<label for="emp_status" class="form-label">User Status:</label>
										<select required="" name="emp_status" id="emp_status" class="form-control form-control-lg">
											<?php
											if ($row['IS_ACTIVE'] == '1') {
											?>
												<option value="1">Active</option>
												<option value="0">In-Active</option>
											<?php
											} else {
											?>
												<option value="0">In-Active</option>
												<option value="1">Active</option>
											<?php
											}
											?>

										</select>
									</div>
									<div class="col-3">
										<label for="title" class="form-label">Workshoop Name:</label>
										<input type="text" class="form-control form-control-sm" id="title" name="form_zone_name" value="<?php echo $row['AREA_ZONE']; ?>">
									</div>
									<div class="col-3">
										<label for="title" class="form-label">IEMI NO:</label>
										<input type="text" class="form-control form-control-sm" id="title" name="form_iemi_no" value="<?php echo $row['IEMI_NO']; ?>">
									</div>
									<div class="text-center mt-3">
										<button type="submit" class="btn btn-primary btn-icon-text">
											Update Data <i class="mdi mdi-file	 btn-icon-append"></i>
										</button>
									</div>

								</div>
							</form>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>

	</div>
</div>

<!-- content-wrapper ends -->


<!-- base:js -->
<?php include_once('./_includes/footer.php') ?>
<!-- End custom js for this page-->