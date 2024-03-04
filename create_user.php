<?php include_once('./_helper/com_conn.php'); ?>


<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-header text-danger fw-bold text-center text-uppercase">
					<i class="mdi mdi-alert menu-icon"></i> You will be respondible if you update anything here. <i class="mdi mdi-alert menu-icon"></i>
				</div>
				<div class="card-body">


					<form action="<?php echo $wkshopBasePath . "/action/self_panel.php"; ?>" method="post" class="d-flex align-items-center justify-content-center  gap-3 ">
						<div class="row">
							<input type="hidden" name="actionType" value="create">
							<div class="col-3">
								<label for="form_rml_id" class="form-label">Emp ID :<span class="text-danger">*</span> </label>
								<input type="text" class="form-control form-control-sm" id="form_rml_id" name="form_rml_id" required>
							</div>
							<div class="col-3">
								<label for="emp_form_name" class="form-label"> Full Name : <span class="text-danger">*</span> </label>
								<input type="text" class="form-control form-control-sm" placeholder="Official Name" id="emp_form_name" name="emp_form_name" required>
							</div>
							<div class="col-3">
								<label for="emp_mobile" class="form-label"> Mobile No : <span class="text-danger">*</span> </label>
								<input type="number" class="form-control form-control-sm" placeholder="Official Mobile Number" id="emp_mobile" name="emp_mobile" required>
							</div>
							<div class="col-3">
								<label for="workshop_name" class="form-label"> Workshoop Name : <span class="text-danger">*</span> </label>
								<input type="text" class="form-control form-control-sm" placeholder="workshop_name" id="workshop_name" name="workshop_name" required>
							</div>
							<div class="col-3">
								<label for="iemi_no" class="form-label">IEMI NO : <span class="text-danger">*</span> </label>
								<input type="text" class="form-control form-control-sm" placeholder="workshop_name" id="iemi_no" name="iemi_no" required>
							</div>
							<div class="col-3">
								<label for="remarks" class="form-label">Remarks : <span class="text-danger">*</span> </label>
								<input type="text" class="form-control form-control-sm" placeholder="remarks" id="remarks" name="remarks" required>
							</div>

							<div class="text-center mt-3">
								<button type="submit" class="btn btn-primary btn-icon-text">
									Create Data <i class="mdi mdi-file btn-icon-append"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


	</div>
</div>

<!-- content-wrapper ends -->


<!-- base:js -->
<?php include_once('./_includes/footer.php') ?>
<!-- End custom js for this page-->