<?php include_once('./_helper/com_conn.php'); ?>


<div class="content-wrapper">
	<div class="row">
		<div class="col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<span class="d-flex align-items-center justify-content-between">

						<h4 class="card-title">
							<i class="mdi mdi-database-search menu-icon"></i> LIST OF APPS USER
						</h4>
						<button type="button" class="btn btn-primary btn-icon-text" id="exportButton" onclick="exportF(this)">
							Export To Excel
							<i class="mdi mdi-cloud-download btn-icon-append"></i>
						</button>
					</span>
					<div class="table-responsive pt-3">
						<table class="table table-primarys table-bordered" id="downloadData">
							<thead class="cust-table-head">
								<tr>
									<th scope="col">Sl</th>
									<th scope="col">Login User ID</th>
									<th scope="col">User Name</th>
									<th scope="col">Last Login Date</th>
									<th scope="col">Area Zone</th>
									<th scope="col">Mobile</th>
									<th scope="col">Create Date</th>
									<th scope="col">Created By</th>
									<th scope="col">Remarks</th>
									<th scope="col">User Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//$emp_id = $_SESSION['emp_id'];


								$strSQL  = oci_parse(
									$objConnect,
									"SELECT A.ID,
						                    EMP_NAME,
											RML_ID,
						                    (SELECT MAX(B.SESSTION_TIME) FROM HR_APPS_USER_SESSION B WHERE B.RML_COLL_APPS_USER_ID=A.ID) LAST_LOGIN,
						                    IS_ACTIVE,
											MOBILE_NO,
											CREATED_DATE,
											AREA_ZONE,
											REMARKS,
											UPDATED_BY
									FROM  RML_COLL_APPS_USER A
									WHERE ACCESS_APP='RML_WSHOP' 
									ORDER BY IS_ACTIVE"
								);
								oci_execute($strSQL);
								$number = 0;


								while ($row = oci_fetch_assoc($strSQL)) {
									$number++;
								?>
									<tr>
										<td><?php echo $number; ?></td>
										<td><?php echo $row['RML_ID']; ?></td>
										<td><?php echo $row['EMP_NAME']; ?></td>

										<td><?php echo $row['LAST_LOGIN']; ?></td>
										<td><?php echo $row['AREA_ZONE']; ?></td>
										<td><?php echo $row['MOBILE_NO']; ?></td>
										<td><?php echo $row['CREATED_DATE']; ?></td>
										<td><?php echo $row['UPDATED_BY']; ?></td>
										<td><?php echo $row['REMARKS']; ?></td>
										<td class="text-center">
											<?php if ($row['IS_ACTIVE']) {
												echo '<button type="button" class="btn btn-success btn-rounded btn-fw text-white">Active</button>';
											} else {
												echo '<button type="button" class="btn btn-danger btn-rounded btn-fw text-white">Deactive</button>';
											} ?>
										</td>

									</tr>
								<?php

								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- content-wrapper ends -->


<!-- base:js -->
<?php include_once('./_includes/footer.php') ?>
<!-- End custom js for this page-->
<script>
	function exportF() {
		// Get table element
		var table = document.getElementById("downloadData");

		// Create an HTML table element clone
		var cloneTable = table.cloneNode(true);

		// Create a new HTML table element
		var htmlTable = document.createElement('table');

		// Add class to the new HTML table element
		htmlTable.className = 'table';

		// Append the cloned table to the new table element
		htmlTable.appendChild(cloneTable);

		// Convert the new HTML table to a string
		var html = htmlTable.outerHTML;

		// Create a Blob object
		var blob = new Blob(['\ufeff', html], {
			type: 'application/vnd.ms-excel'
		});

		// Create a URL for the Blob object
		var url = URL.createObjectURL(blob);

		// Create a link element
		var link = document.createElement('a');

		// Set the href attribute to the URL of the Blob object
		link.href = url;

		// Set the download attribute to the file name
		link.download = 'user_list_' + getCurrentDate() + '.xls';

		// Append the link to the document body
		document.body.appendChild(link);

		// Click the link to trigger the download
		link.click();

		// Remove the link from the document body
		document.body.removeChild(link);
	}

	function getCurrentDate() {
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
		var yyyy = today.getFullYear();
		return yyyy + '-' + mm + '-' + dd;
	}
</script>