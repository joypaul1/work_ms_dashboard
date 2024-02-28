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
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="d-flex align-items-center justify-content-center  gap-3 ">
						<div class="col-3">
							<input type="text" name="emp_id" value="<?php echo isset($_POST['emp_id']) ? $_POST['emp_id'] : '' ?>" placeholder="EMP-ID (EX:955)" class="form-control" style="border:1px solid gray">
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary btn-sm mb-3">Confirm identity</button>
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