<!DOCTYPE html>
<head>
<?php require "dbconnect.php" ?>
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

					<h2>NEW Launches</h2>
					
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>NEW Launches</li>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">

		<div class="col-md-12">


			<!-- Sorting / Layout Switcher -->
			<div class="row margin-bottom-15">

				<div class="col-md-6"></div>

				<div class="col-md-6">
					<!--<div class="layout-switcher">
						<a href="#" class="list"><i class="fa fa-th-list"></i></a>
						<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
					</div>-->
				</div>
			</div>

			
			<!-- Listings -->
			<div class="listings-container grid-layout">

				<!-- Listing Item -->
				<?php $q3="Select Cid,Name,image from image where status='I' and New='Y' LIMIT 10";
							$qr3=mysqli_query($db,$q3);
							while($exe3=mysqli_fetch_assoc($qr3)){
							$cid2=$exe3['Cid'];
						  ?>
				<div class="listing-item">

					<a href="product.php?cid=<?php echo "$cid2"?>" class="listing-img-container">

						<div class="listing-badges">
						<span class="featured">NEW</span>
						</div>

						<div class="listing-img-content">
							<span class="listing-price"><?php echo $exe3['Name']?></span>
							<!--<span class="like-icon tooltip"></span>--->
						</div>

						<div class="listing-carousel">
							<div><img src="Products/<?php echo $exe3['image']?>" alt=""></div>
						</div>
					</a>
					
					<!--<div class="listing-content">

						<div class="listing-title">
							<h4><a href="single-property-page-1.html"><?php echo $exe1['Name']?></a></h4>
							<a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
								<i class="fa fa-map-marker"></i>
								9364 School St. Lynchburg, NY
							</a>

							<a href="single-property-page-1.html" class="details button border">Details</a>
						</div>

						<ul class="listing-details">
							<li>530 sq ft</li>
							<li>1 Bedroom</li>
							<li>3 Rooms</li>
							<li>1 Bathroom</li>
						</ul>

						<div class="listing-footer">
							<a href="#"><i class="fa fa-user"></i> David Strozier</a>
							<span><i class="fa fa-calendar-o"></i> 1 day ago</span>
						</div>

					</div>-->

				</div>
					  <?php  } ?>

			</div>
			<!-- Listings Container / End -->
			

		</div>

	</div>
</div>
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
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</div>
<!-- Wrapper / End -->


</body>
</html>