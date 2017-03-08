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
<title>Valentine kitchens</title>
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
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Add FAQs</h2>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Content
================================================== -->
<div class="container">
<div class="row">

	<!-- Submit Page -->
	<div class="col-md-12">
		<div class="submit-page">


		<!-- Section -->
		<h3>Add New FAQs</h3>
		<div class="submit-section">
		<?php
if(isset($_POST['que'])and isset($_POST['ans']) and !empty($_POST['que'])and !empty($_POST['ans']))
	{  $a=$_POST['ans'];
       $q=$_POST['que'];
		$q1="Insert into faq (ques,ans) values ('$q','$a')";
		$qr1=mysqli_query($db,$q1);
	}
		?>
			<!-- Title -->
			<div class="form" >
				<h5>Question</h5>
				<form name="add" action="add_faq.php" method="POST">
				<input class="search-field" type="text" name="que" value=""/>
				<h5>Answer</h5>
				<input class="search-field" type="text" name="ans" value=""/>
			    <input class="preview margin-bottom-5" type="submit" name="questions" value="ADD"/>
			
			
			</div>
		<!-- Section -->
		<h3>Previous FAQs</h3>
		<div class="submit-section">
            			<div class="style-2">
				 <?php $q1="Select faqid,ques,ans from faq where status !='D'";
					   $qr1=mysqli_query($db,$q1);
					   while($exe1=mysqli_fetch_assoc($qr1)){
					   ?>
				
				<div class="toggle-wrap">
					<span class="trigger "><a href="#"><?php echo $exe1['ques']?><i class="sl sl-icon-plus"></i></a></span>
					<div class="toggle-container">
						<p><?php echo $exe1['ans']?></p>
						<a href="afaq.php?fd=<?php echo $exe1['faqid']?>&d=y" class="button preview margin-top-5">Delete</a>
					</div>
				</div>
					   <?php } ?>
				
			</div>
			
		</div>
		</div>
</div>
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
<script type="text/javascript" src="scripts/masonry.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>


</div>
<!-- Wrapper / End -->


</body>
</html>