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
<div id="titlebar" class="property-titlebar margin-bottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
					$cid=$_GET['cid'];
					
					  $q2="Select CName from category where Cid=$cid";
					  $qr2=mysqli_query($db,$q2);
					  $exe2=mysqli_fetch_assoc($qr2);
					?>
				
				<div class="property-title">
					<h2><?php echo $exe2['CName']?></h2>
					
				</div>

				


			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row margin-bottom-50">
		<div class="col-md-12">
		
			<!-- Slider -->
			<div class="property-slider default">
			<?php 
				$q1="Select Cid,Name,image from image where Cid=$cid and Status='I'";
					  $qr1=mysqli_query($db,$q1);
					  while($exe1=mysqli_fetch_assoc($qr1)){
				?>
				<a href="Products/<?php echo $exe1['image']?>" data-background-image="Products/<?php echo $exe1['image']?>" class="item mfp-gallery"></a>
					  <?php }?>
				
			</div>

			<!-- Slider Thumbs -->
			<div class="property-slider-nav">
			<?php 
				$q1="Select Cid,Name,image from image where Cid=$cid and Status='I'";
					  $qr1=mysqli_query($db,$q1);
					  while($exe1=mysqli_fetch_assoc($qr1)){
				?>
				<div class="item"><img src="Products/<?php echo $exe1['image']?>" alt=""></div>
				<?php }?>
				
			</div>

		</div>
	</div>
</div>


<div class="container">
	<div class="row">

		<!-- Property Description -->
		<div class="col-lg-8 col-md-7">
			<div class="property-description">

				<!-- Main Features -->
				
				<!-- Description -->
				<h3 class="desc-headline">Description</h3>
				<div class="show-more">
					<p>
					<?php $q3="Select description from description where Cid=$cid";
					  $qr3=mysqli_query($db,$q3);
					  $exe3=mysqli_fetch_assoc($qr3);
					  echo $exe3['description']?>
					</p>
					<a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
				</div>
				<!-- Similar Listings Container -->
				
				<!-- Similar Listings Container / End -->

			</div>
		</div>
		<!-- Property Description / End -->


		<!-- Sidebar -->
		<div class="col-lg-4 col-md-5">
			<div class="sidebar sticky right">

				
				<!-- Widget -->
				<div class="widget">
					<h3 class="margin-bottom-35">NEW Launches</h3>

					<div class="listing-carousel outer">
						<!-- Item -->
						
						<?php $q3="Select Cid,Name,image from image where status='I' and New='Y' LIMIT 6";
							$qr3=mysqli_query($db,$q3);
							while($exe3=mysqli_fetch_assoc($qr3)){
							$cid2=$exe3['Cid'];
							?>
						<div class="item">
							<div class="listing-item compact">

								<a href="product.php?cid=<?php echo $cid2?>" class="listing-img-container">

									<div class="listing-badges">
										<span class="featured">NEW</span>
									</div>

									<div class="listing-img-content">
										<span class="listing-compact-title"><?php echo $exe3['Name']?></span>

									</div>

									<img src="Products/<?php echo $exe3['image']?>" alt="">
								</a>

							</div>
						</div>
							<?php } ?>
						<!-- Item / End -->

					</div>

				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<h2 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Products</h2>

				<!-- Layout Switcher -->

				<div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
				<div class="listings-container grid-layout">
<?php $q1="Select Distinct (Cid),Name,image,New from image where Cid<>$cid and Status='I' group by Cid limit 6";
					  $qr1=mysqli_query($db,$q1);
					  while($exe1=mysqli_fetch_assoc($qr1)){
						  $Cid1=$exe1['Cid'];
						  $q2="Select CName from category where Cid=$Cid1";
					  $qr2=mysqli_query($db,$q2);
					  $exe2=mysqli_fetch_assoc($qr2);
						  ?>
				<div class="listing-item">

					<a href="product.php?cid=<?php echo $Cid1?>" class="listing-img-container">

						<div class="listing-badges">
						<?php 
							  if($exe1['New']=="Y"){
							?><span class="featured">NEW</span>
					  <?php } ?>
						</div>

						<div class="listing-img-content">
							<span class="listing-price"><?php echo $exe2['CName']?></span>
							<!--<span class="like-icon tooltip"></span>--->
						</div>

						<div class="listing-carousel">
							<div><img src="Products/<?php echo $exe1['image']?>" alt=""></div>
						</div>
					</a>
					</div>
					  <?php } ?>

				</div>
		<!-- Sidebar / End -->

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

<!-- Maps -->
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>-->
<script type="text/javascript" src="scripts/infobox.min.js"></script>
<script type="text/javascript" src="scripts/markerclusterer.js"></script>
<script type="text/javascript" src="scripts/maps.js"></script>
</div>
<!-- Wrapper / End -->
</body>
</html>