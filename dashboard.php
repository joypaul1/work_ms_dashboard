<?php include_once('./_helper/com_conn.php'); ?>


<div class="content-wrapper">
	<div class="row">
		<div class=" grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-8 d-flex grid-margin stretch-card">
							<div class="card sale-diffrence-border">
								<div class="card-header font-weight-bold text-center text-info" style="font-weight: bold;font-size: 20px;"><span class="mdi mdi-cloud-download-outline"></span> Apps Download Link: </div>
								<div class="card-body">
									<h5 class="text-success mb-2">
										<span class="mdi mdi-arrow-decision-auto fwo-bold"></span>
										<strong>
											<a href="http://202.40.181.98:9090/rangs_workshoop_rml/ws.apk"> http://202.40.181.98:9090/rangs_workshoop_rml/ws.apk
											</a>
										</strong>
									</h5>
									<p class="card-title mb-2 ">
										<span class="mdi mdi-arrow-right-bold-hexagon-outline"></span>
										Apps Default Password = 555
									</p>
									<!-- <small class="text-muted">APRIL 2019</small> -->
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-4">
							<h4 class="card-title">Sales Difference</h4>
							<canvas id="salesDifference"></canvas>
						</div> -->
						<!-- <div class="col-lg-5">
							<h4 class="card-title">Best Sellers</h4>
							<div class="row">
								<div class="col-sm-4">
									<ul class="graphl-legend-rectangle">
										<li><span class="bg-danger"></span>Automotive</li>
										<li><span class="bg-warning"></span>Books</li>
										<li><span class="bg-info"></span>Software</li>
										<li><span class="bg-success"></span>Video games</li>
									</ul>
								</div>
								<div class="col-sm-8 grid-margin">
									<canvas id="bestSellers"></canvas>
								</div>
							</div>
							
						</div> -->
						<?php

						$strSQL  = oci_parse(
							$objConnect,
							"SELECT
							COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' AND IS_ACTIVE = 1 THEN 1 END) AS ACTIVE_USER,
							COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' AND IS_ACTIVE = 0 THEN 1 END) AS DEACTIVE_USER,
							COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' THEN 1 END) AS TOTAL_USER,
							ROUND(
								COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' AND IS_ACTIVE = 1 THEN 1 END) * 100.0 / 	COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' THEN 1 END), 2) AS ACTIVE_USER_PERCENTAGE,
    						ROUND(
								COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' AND IS_ACTIVE = 0 THEN 1 END) * 100.0 / COUNT(CASE WHEN ACCESS_APP='RML_WSHOP' THEN 1 END), 2) AS DEACTIVE_USER_PERCENTAGE
							FROM  DEVELOPERS.RML_COLL_APPS_USER"
						);
						oci_execute($strSQL);
						$number = 0;


						while ($userRow = oci_fetch_assoc($strSQL)) {
							$number++;
						?>
							<div class="col-lg-3">
								<h4 class="card-title">COLL. APP USER </h4>
								<div class="row">
									<div class="col-sm-12">
										<div class="progress progress-lg grouped mb-2">
											<div class="progress-bar  bg-success" role="progressbar" style="width:<?= $userRow['ACTIVE_USER_PERCENTAGE'] ?>%" aria-valuenow="<?= $userRow['ACTIVE_USER_PERCENTAGE'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
											<div class="progress-bar bg-danger" role="progressbar" style="width:<?= $userRow['DEACTIVE_USER_PERCENTAGE'] ?>%" aria-valuenow="<?= $userRow['DEACTIVE_USER_PERCENTAGE'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="col-sm-12">
										<ul class="graphl-legend-rectangle">
											<li><span class="bg-info"></span>TOTAL USER (<?= $userRow['TOTAL_USER'] ?>)</li>
											<li><span class="bg-success"></span>ACTIVE USER (<?= $userRow['ACTIVE_USER'] ?>)</li>
											<li><span class="bg-danger"></span>INACTIVE USER (<?= $userRow['DEACTIVE_USER'] ?>)</li>
											<!-- <li><span class="bg-success"></span>Youtube (40%)</li> -->
										</ul>
									</div>
								</div>
								<!-- <p class="mb-0 mt-2">Lorem ipsum dolor sit amet,
								consectetur adipisicing elit.
							</p> -->
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-lg-4 mb-3 mb-lg-0">
			<div class="card congratulation-bg text-center">
				<div class="card-body pb-0">
					<img src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png" alt="">
					<h2 class="mt-3 text-white mb-3 font-weight-bold">Congratulations
						<?php echo $_SESSION['USER_WK_ADMIN']['name'] ?>
					</h2>
				</div>
			</div>
		</div> -->
	</div>
	<!-- <div class="row">
		<div class="col-sm-8 flex-column d-flex stretch-card">
			<div class="row">
				<div class="col-lg-4 d-flex grid-margin stretch-card">
					<div class="card bg-primary">
						<div class="card-body text-white">
							<h3 class="font-weight-bold mb-3">18,39 (75GB)</h3>
							<div class="progress mb-3">
								<div class="progress-bar  bg-warning" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<p class="pb-0 mb-0">Bandwidth usage</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 d-flex grid-margin stretch-card">
					<div class="card sale-diffrence-border">
						<div class="card-body">
							<h2 class="text-dark mb-2 font-weight-bold">$6475</h2>
							<h4 class="card-title mb-2">Sales Difference</h4>
							<small class="text-muted">APRIL 2019</small>
						</div>
					</div>
				</div>
				<div class="col-lg-4 d-flex grid-margin stretch-card">
					<div class="card sale-visit-statistics-border">
						<div class="card-body">
							<h2 class="text-dark mb-2 font-weight-bold">$3479</h2>
							<h4 class="card-title mb-2">Visit Statistics</h4>
							<small class="text-muted">APRIL 2019</small>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 grid-margin d-flex stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex align-items-center justify-content-between">
								<h4 class="card-title mb-2">Sales Difference</h4>
								<div class="dropdown">
									<a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
									<a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="settingsDropdownsales">
										<i class="mdi mdi-dots-horizontal"></i></a>
									<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="settingsDropdownsales">
										<a class="dropdown-item">
											<i class="mdi mdi-grease-pencil text-primary"></i>
											Edit
										</a>
										<a class="dropdown-item">
											<i class="mdi mdi-delete text-primary"></i>
											Delete
										</a>
									</div>
								</div>
							</div>
							<div>
								<ul class="nav nav-tabs tab-no-active-fill" role="tablist">
									<li class="nav-item">
										<a class="nav-link active ps-2 pe-2" id="revenue-for-last-month-tab" data-bs-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Revenue for last month</a>
									</li>
									<li class="nav-item">
										<a class="nav-link ps-2 pe-2" id="server-loading-tab" data-bs-toggle="tab" href="#server-loading" role="tab" aria-controls="server-loading" aria-selected="false">Server loading</a>
									</li>
									<li class="nav-item">
										<a class="nav-link ps-2 pe-2" id="data-managed-tab" data-bs-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Data managed</a>
									</li>
									<li class="nav-item">
										<a class="nav-link ps-2 pe-2" id="sales-by-traffic-tab" data-bs-toggle="tab" href="#sales-by-traffic" role="tab" aria-controls="sales-by-traffic" aria-selected="false">Sales by traffic</a>
									</li>
								</ul>
								<div class="tab-content tab-no-active-fill-tab-content">
									<div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
										<div class="d-lg-flex justify-content-between">
											<p class="mb-4">+5.2% vs last 7 days</p>
											<div id="revenuechart-legend" class="revenuechart-legend">f</div>
										</div>
										<canvas id="revenue-for-last-month-chart"></canvas>
									</div>
									<div class="tab-pane fade" id="server-loading" role="tabpanel" aria-labelledby="server-loading-tab">
										<div class="d-flex justify-content-between">
											<p class="mb-4">+5.2% vs last 7 days</p>
											<div id="serveLoading-legend" class="revenuechart-legend">f</div>
										</div>
										<canvas id="serveLoading"></canvas>
									</div>
									<div class="tab-pane fade" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
										<div class="d-flex justify-content-between">
											<p class="mb-4">+5.2% vs last 7 days</p>
											<div id="dataManaged-legend" class="revenuechart-legend">f</div>
										</div>
										<canvas id="dataManaged"></canvas>
									</div>
									<div class="tab-pane fade" id="sales-by-traffic" role="tabpanel" aria-labelledby="sales-by-traffic-tab">
										<div class="d-flex justify-content-between">
											<p class="mb-4">+5.2% vs last 7 days</p>
											<div id="salesTrafic-legend" class="revenuechart-legend">f</div>
										</div>
										<canvas id="salesTrafic"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 flex-column d-flex stretch-card">
			<div class="row flex-grow">
				<div class="col-sm-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-8">
									<h3 class="font-weight-bold text-dark">Canada,Ontario</h3>
									<p class="text-dark">Monday 3.00 PM</p>
									<div class="d-lg-flex align-items-baseline mb-3">
										<h1 class="text-dark font-weight-bold">23<sup class="font-weight-light"><small>o</small><small class="font-weight-medium">c</small></sup></h1>
										<p class="text-muted ms-3">Partly cloudy</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="position-relative">
										<img src="images/dashboard/live.png" class="w-100" alt="">
										<div class="live-info badge badge-success">Live</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 mt-4 mt-lg-0">
									<div class="bg-primary text-white px-4 py-4 card">
										<div class="row">
											<div class="col-sm-6 pl-lg-5">
												<h2>$1635</h2>
												<p class="mb-0">Your Iincome</p>
											</div>
											<div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
												<h2>$2650</h2>
												<p class="mb-0">Your Spending</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row pt-3 mt-md-1">
								<div class="col">
									<div class="d-flex purchase-detail-legend align-items-center">
										<div id="circleProgress1" class="p-2"></div>
										<div>
											<p class="font-weight-medium text-dark text-small">Sessions</p>
											<h3 class="font-weight-bold text-dark  mb-0">26.80%</h3>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="d-flex purchase-detail-legend align-items-center">
										<div id="circleProgress2" class="p-2"></div>
										<div>
											<p class="font-weight-medium text-dark text-small">Users</p>
											<h3 class="font-weight-bold text-dark  mb-0">56.80%</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="d-flex align-items-center justify-content-between">
										<h4 class="card-title mb-0">Visits Today</h4>
										<div class="dropdown">
											<a href="#" class="text-success btn btn-link  px-1"><i class="mdi mdi-refresh"></i></a>
											<a href="#" class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none" data-bs-toggle="dropdown" id="profileDropdownvisittoday"><i class="mdi mdi-dots-horizontal"></i></a>
											<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdownvisittoday">
												<a class="dropdown-item">
													<i class="mdi mdi-grease-pencil text-primary"></i>
													Edit
												</a>
												<a class="dropdown-item">
													<i class="mdi mdi-delete text-primary"></i>
													Delete
												</a>
											</div>
										</div>
									</div>
									<p class="mt-1">Calculated in last 30 days</p>
									<div class="d-lg-flex align-items-center justify-content-between">
										<h1 class="font-weight-bold text-dark">4332</h1>
										<div class="mb-3">
											<button type="button" class="btn btn-outline-light text-dark font-weight-normal">Day</button>
											<button type="button" class="btn btn-outline-light text-dark font-weight-normal">Month</button>
										</div>
									</div>
									<canvas id="visitorsToday"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-success font-weight-bold">18390</h2>
						<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="newClient"></canvas>
				<div class="line-chart-row-title">MY NEW CLIENTS</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-danger font-weight-bold">839</h2>
						<i class="mdi mdi-refresh mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="allProducts"></canvas>
				<div class="line-chart-row-title">All Products</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-info font-weight-bold">244</h2>
						<i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="invoices"></canvas>
				<div class="line-chart-row-title">NEW INVOICES</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-warning font-weight-bold">3259</h2>
						<i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="projects"></canvas>
				<div class="line-chart-row-title">All PROJECTS</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-secondary font-weight-bold">586</h2>
						<i class="mdi mdi-cart-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="orderRecieved"></canvas>
				<div class="line-chart-row-title">Orders Received</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-dark font-weight-bold">7826</h2>
						<i class="mdi mdi-cash text-dark mdi-18px"></i>
					</div>
				</div>
				<canvas id="transactions"></canvas>
				<div class="line-chart-row-title">TRANSACTIONS</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">Support Tracker</h4>
						<h4 class="text-success font-weight-bold">Tickets<span class="text-dark ms-3">163</span></h4>
					</div>
					<div id="support-tracker-legend" class="support-tracker-legend"></div>
					<canvas id="supportTracker"></canvas>
				</div>
			</div>
		</div>
		<div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-lg-flex align-items-center justify-content-between mb-4">
						<h4 class="card-title">Product Orders</h4>
						<p class="text-dark">+5.2% vs last 7 days</p>
					</div>
					<div class="product-order-wrap padding-reduced">
						<div id="productorder-gage" class="gauge productorder-gage"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
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