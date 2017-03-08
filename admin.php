<!DOCTYPE html>
<head>
<?php 
session_start();
require "dbconnect.php";
if (!isset($_SESSION['Name'])){
	header('Refresh:0;URL=index.php');
}
	?>
<!-- Basic Page Needs
================================================== -->
<title>Valentine Kitchens</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
<?php include "header.php" ?>
<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="images/listings-parallax.jpg"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Admin Panel</h2>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>Admin Panel</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
</div>

<!-- Pricing Tables
================================================== -->

<!-- Container / Start -->
<div class="container">

	<!-- Row / Start -->
	<div class="row">

		<div class="col-md-12">
			<div class="pricing-container margin-top-30">

			<!-- Plan #1 -->

				<div class="plan">

					<div class="plan-price">
						<span class="value">Category</span>
						<span class="period">Main Headings of the product</span>
					</div>

					<div class="plan-features">
						<a class="button border" href="add_category.php">Modify</a>
					</div>

				</div>

				<!-- Plan #3 -->
				<div class="plan featured">


					<div class="plan-price">
						<span class="value">Image</span>
						<span class="period">Images of the different products</span>
					</div>
					<div class="plan-features">
						<a class="button" href="add_update_delete_id.php">Modify</a>
					</div>
				</div>

				<!-- Plan #3 -->
				<div class="plan">

					<div class="plan-price">
						<span class="value">Slider</span>
						<span class="period">Images on first page</span>
					</div>

					<div class="plan-features">
						<a class="button border" href="slider_image_select.php">Modify</a>
					</div>
				</div>
				<div class="plan featured">

					<div class="plan-price">
						<span class="value">Description</span>
						<span class="period">A Brief Information about the product.</span>
					</div>
					<div class="plan-features">
						
						<a class="button" href="add_update_delete_id.php">Modify</a>
					</div>
				</div>
				<div class="plan">

					<div class="plan-price">
						<span class="value">FAQs</span>
						<span class="period">Frequently Asked Questions</span>
					</div>

					<div class="plan-features">
						
						<a class="button border" href="add_faq.php">Modify</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->
<?php include "footer.php"?>

<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
<script type="text/javascript" src="scripts/rangeSlider.js"></script>
<script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</div>
<!-- Wrapper / End -->


</body>
</html>