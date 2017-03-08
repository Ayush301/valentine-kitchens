<!DOCTYPE html>
<head>
	
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
		
		
		<!-- Header Container
		================================================== -->
		<?php include "header.php" ?>
		<div class="clearfix"></div>
		<!-- Header Container / End -->
		
		<div class="fullwidth-home-slider margin-bottom-0">
			<!--<div class="main-search-container">
			<h2>Find Your Dream Home</h2></div>-->
			<?php 
				$q1="Select image from slider where status='I'";
				$qr1=mysqli_query($db,$q1);
				while($exe1=mysqli_fetch_assoc($qr1)){
				?>
				<!-- Slide -->
				<div data-background-image="Slider/<?php echo $exe1['image']?>" class="item">
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="home-slider-container">
									
									<!-- Slide Title -->
									<div class="home-slider-desc">
									</div>
									<!-- Slide Title / End -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		
		
		<!-- Content
		================================================== -->
		<section class="fullwidth" data-background-color="#f7f7f7">
			
			<!-- Box Headline -->
			<h3 class="headline-box">Valentine Kitchens</h3>
			
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<div class="testimonials-subtitle">
							<p>As the name suggests, we believe in providing kitchens that make you fall in love with them.We give the complete solution for the kitchen such as accessories, shutter, appliances & hardware. We aim at providing high-quality product in appropriate time at best price.
								</p><p>
								We serve requirement for each customer which means whether it is a customer with the limited budget or a customer going for high-end kitchens. The company also markets quality kitchen component & hardware through its showroom & dealers.
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</section>
		<section class="fullwidth" data-background-color="#f7f7f7">
			
			<!-- Box Headline -->
			<h3 class="headline-box">Achieving Dream Kitchens</h3>
			
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<div class="testimonials-subtitle">
							We follow a basic step in an organized way in giving you your dream kitchen starting from designs in 3-D software to presentations then measurement of sizes and finally very important stage, installation. Each step is taken very very carefully so that working is done very smoothly.
						</div>
					</div>
				</div>
			</div>
			
		</section>
		<section class="fullwidth" data-background-color="#f7f7f7">
			
			<!-- Box Headline -->
			<h3 class="headline-box">What makes Valentine Unique?</h3>
			
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<div class="testimonials-subtitle">
							Valentine prime focus is to deliver your dream kitchen in time while keeping your budget in mind. We give you complete solution under one roof. Our production process takes place in Ghaziabad (U.P.). Our prime focus is to deliver every product of premium quality. So we deliver every product after complete inspection from the plant.
						</div>
					</div>
				</div>
			</div>
			
		</section>
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-12">
					<h3 class="headline margin-bottom-25 margin-top-65">New Launches</h3>
				</div>
				
				<!-- Carousel -->
				<div class="col-md-12">
					<div class="carousel">
						<?php $q3="Select Cid,Name,image from image where status='I' and New='Y' LIMIT 6";
							$qr3=mysqli_query($db,$q3);
							while($exe3=mysqli_fetch_assoc($qr3)){
								$cid2=$exe3['Cid'];
							?>
							<!-- Listing Item -->
							<div class="carousel-item">
								<div class="listing-item">
									
									<a href="product.php?cid=<?php echo $cid2?>" class="listing-img-container">
										
										<div class="listing-badges">
											<span class="featured">NEW</span>
										</div>
										
										<div class="listing-img-content">
											<span class="listing-price"><?php echo $exe3['Name']?> </span>
											
										</div>
										
										<div class="listing-carousel">
											<div><img src="Products/<?php echo $exe3['image']?>" alt=""></div>
										</div>
										
									</a>
									
								</div>
								</div>
							<?php } ?>
							<!-- Listing Item / End -->
							
						</div>
					</div>
					<!-- Carousel / End -->
					
				</div>
			</div>
			
			
			<div class="parallax margin-bottom-70"
			data-background="images/base.jpg"
			data-color="#36383e"
			data-color-opacity="0.7"
			data-img-width="800"
			data-img-height="505">
				
				<!-- Infobox -->
				<div class="text-content white-font">
					<div class="container">
						
						<div class="row">
							<div class="col-lg-6 col-sm-8">
								<h2>About Us</h2>
								<p>Valentine Kitchens is a proud manufacturer of high quality modular kitchens and wardrobes. As the name suggests "valentine" we aim to provide the customers such a product which makes them fall in love with it.We visualize to give modular kitchens with a promise that not only optimizes the utilization capacity of the customer but also looks very creative and distinctive.</p>
								
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Infobox / End -->
				
			</div>
			<!-- Parallax / End -->
			
			
			<!-- Flip banner -->
			<a href="index.php" class="flip-banner parallax" data-background="images/flip-banner-bg.jpg" data-color="#274abb" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
				
				<div class="flip-banner-content">
					<h2 class="flip-visible">Valentine Kitchens Makes you fall in love with your kitchen</h2>
					<h2 class="flip-hidden">Valentine Kitchens</h2>
				</div>
			</a>
			<!-- Flip banner / End -->
			
			
			
			
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