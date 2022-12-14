<?php
session_start();
ob_start();
include('./functions.php');
include('./db.php');


$org = getOrgById($_GET['id']);
$orgImages = explode('/', $org['images']);
array_shift($orgImages);
$orgDocs = explode('/', $org['docs']);
array_shift($orgDocs);

// var_dump($org['id']);
// var_dump($org['id']);

$message = "Update details";

if (isset($_POST['submit'])) {

	$org_name = $_POST['orgName'];
	$shares_on_sale = $_POST['sharesOnSale'];
	$share_value = $_POST['shareValue'];
	$email = $_POST['email'];

	// var_dump($_SESSION);

	// update organizations
	$response = updateOrgDetails($org_name, $shares_on_sale, $share_value, $email, $org['id']);
	// var_dump($response);

	if($response){
		// set organization id , 
		$_SESSION["email"] = $email;
		$_SESSION["org_id"] = $org["id"];

		$org = getOrgById($_GET['id']);  // ge the new updated valued from the database

		$message = "Profile updated";
	} else {
		echo 'Share details not updated';
	}

	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>View Org</title>
	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="assets/css/demo_1/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="../img/favicon.png" />

	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="assets/vendors/dropzone/dropzone.min.css">
	<link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="assets/css/demo_1/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="../img/favicon.png" />
</head>

<body class="sidebar-dark">
	<div class="main-wrapper">


		<!-- partial:../../partials/_sidebar.html -->
		<!-- partial:../../partials/_sidebar.html -->
		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="org-home.php" class="sidebar-brand" style="margin:12px 0px 12px 0px">
					<p class="text-center">

						<img src="../img/logo_white.png" style="width:90%;height:90%">

					</p>
				</a>
				<div class="sidebar-toggler not-active">
					<span style="background-color: gold;"></span>
					<span style="background-color: gold;"></span>
					<span style="background-color: gold;"></span>
				</div>
			</div>

			<div class="sidebar-body" style="border-right: 1px gold solid;">
				<ul class="nav">

					<li class="nav-item nav-category" style="margin-top:60px;color:gold;font-size:1rem;text-transform:capitalize">Hi <?= $org['org_name'] ?></li>




				</ul>
			</div>


		</nav>

		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<?= getShortcutsNavSeeker() ?>
			</nav>
			<!-- partial -->

			<div class="page-content">

				<div class="row">
					<div class="col-md-12 main-content pl-xl-4 pr-xl-5">



						<div class="example">
							<div class="row">
								<div class="col-md-12 text-center">
									<h6 style="margin:12px;font-weight:750;font-size:1.1rem"><?= $ownerLand['title'] ?></h6>
								</div>

								<br>


								<div class="col-md-12" style="margin-top:12px">
									<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding:12px">

										<?php
										if (count($orgImages) > 0) {
											echo ('<ol class="carousel-indicators">');
											echo ('<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>');

											for ($i = 1; $i < count($orgImages); $i++) {
												echo ('<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>');
											}
											echo ('</ol>');

											echo ('<div class="carousel-inner">');
											echo ('<div class="carousel-item active">
														<img src="orgs/images/' . $orgImages[0] . '" class="d-block w-100" alt="...">
													</div>');


											for ($i = 1; $i < count($orgImages); $i++) {
												echo ('<div class="carousel-item">
														<img src="land/images/' . $orgImages[$i] . '" class="d-block w-100" alt="...">
													</div>');
											}
											echo ('</div> ');;
										}

										?>







										<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div>

								<br>

							</div>

							<br>

							<div class="row">


								<div class="col-md-8">
									<h5 class="text-left lead">
										<br>
										Company details
									</h5>
								</div>
		
								<div class="col-md-4 float-right" style="margin-top: 24px;">
									<p class="text-right">
										<a style="padding: 12px;color: darkgreen" <?php
																					$url =  $org['site_url'];
																					echo ('href="' . $url . '"')

																					?>>
											<i data-feather="link"></i>Website
										</a>

									</p>
								</div>


								<table class="table table-striped" style="margin-top:30px">
									<thead>

									</thead>
									<tbody>
										<?php

										echo ('
											<tr>
											<td class="text-left">Company Name:</td>
											<td>' . $org['org_name'] . '</td>
										</tr>
											');

										echo ('
											<tr>
											<td class="text-left">
											Market Value:    
											</td>
											<td>US$' . $org['shares_on_sale'] * $org['share_value'] . '</td>
										</tr>
											');

										echo ('
											<tr>
											<td class="text-left">
											Stock on sale:   
											</td>
											<td>US$' . $org['shares_on_sale'] . '</td>
										</tr>
											');



										?>


									</tbody>
								</table>
								<div class="col-md-12">
									<p class="text-justify">
										<br>
										<?php echo ($org['details']); ?>
									</p>
								</div>

								<!-- add the update form to change stocks on sale and stock price -->

								<div class="col-md-12 d">
									<div class="card" style="background: whitesmoke;">
										<div class="card-body">
											<h6 class="card-title"><?= $message ?></h6>
											<form class="forms-sample" method="post" >
												<div class="form-group row">
													<!-- <div class="col-sm-9">
														<p style="margin-top:12px"><?= $org['org_name'] ?></p>
													</div> -->
												</div>
												
												<div class="form-group row">
													<label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
													<div class="col-sm-9">
														<input name="orgName" type="text" class="form-control" id="company_name" value="<?= $org['org_name'] ?>">
													</div>
												</div>

												<div class="form-group row">
													<label for="email" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9">
														<input name="email" type="email" class="form-control" id="email" value="<?= $org['email'] ?>">
													</div>
												</div>

												<!-- $org['total_shares'] * $org['share_value'] -->
												<div class="form-group row">
													<label for="sharesOnSale" class="col-sm-3 col-form-label">Stocks on sale</label>
													<div class="col-sm-9">
														<input name="sharesOnSale" type="text" class="form-control" id="sharesOnSale" value="<?= $org['shares_on_sale'] ?>">
													</div>
												</div>

												<div class="form-group row">
													<label for="share_value" class="col-sm-3 col-form-label">Share Value</label>
													<div class="col-sm-9">
														<input name="shareValue" type="text" class="form-control" id="stocksOnSale" value="<?= $org['share_value'] ?>">
													</div>
												</div>
												

												<input type="submit" name="submit" class="btn btn-primary mr-2" style="color:black;background:gold;width:150px" value="Update">
											</form>
										</div>
									</div>
								</div>
							</div>

						</div>


					</div>
				</div>



			</div>

			<!-- partial:../../partials/_footer.html -->
			<?= getSysFooter() ?>
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
	<script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
	<script src="assets/vendors/inputmask/jquery.inputmask.min.js"></script>
	<script src="assets/vendors/select2/select2.min.js"></script>
	<script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
	<script src="assets/vendors/dropzone/dropzone.min.js"></script>
	<script src="assets/vendors/dropify/dist/dropify.min.js"></script>
	<script src="assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="assets/vendors/moment/moment.min.js"></script>
	<script src="assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="assets/js/form-validation.js"></script>
	<script src="assets/js/bootstrap-maxlength.js"></script>
	<script src="assets/js/inputmask.js"></script>
	<script src="assets/js/select2.js"></script>
	<script src="assets/js/typeahead.js"></script>
	<script src="assets/js/tags-input.js"></script>
	<script src="assets/js/dropzone.js"></script>
	<script src="assets/js/dropify.js"></script>
	<script src="assets/js/bootstrap-colorpicker.js"></script>
	<script src="assets/js/datepicker.js"></script>
	<script src="assets/js/timepicker.js"></script>
	<script src="js/land-listing.js"></script>
</body>

</html>