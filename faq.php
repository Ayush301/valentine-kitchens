<!DOCTYPE html>
<head>
<?php require "dbconnect.php";?>
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

				<h2>FAQs</h2>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>FAQs</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
</div>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-10">
			<h4 class="headline margin-top-0 margin-bottom-20">FAQs</h4>

			<!-- Toggles Container -->
			<div class="style-2">
				 <?php $q1="Select ques,ans from faq where status !='D'";
					   $qr1=mysqli_query($db,$q1);
					   while($exe1=mysqli_fetch_assoc($qr1)){
					   ?>
				
				<div class="toggle-wrap">
					<span class="trigger "><a href="#"><?php echo $exe1['ques']?><i class="sl sl-icon-plus"></i></a></span>
					<div class="toggle-container">
						<p><?php echo $exe1['ans']?></p>
					</div>
				</div>
					   <?php } ?>
				
			</div>
			<!-- Toggles Container / End -->
		</div>
	</div>
</div>
<!-- Container / End -->


<!-- Footer
================================================== -->
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