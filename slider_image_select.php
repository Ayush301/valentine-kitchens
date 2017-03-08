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
<title>Valentine Kitchen</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">
<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
 <script src="scripts/sweetalert.min.js"></script>
 <script src="scripts/jquery.min.js"></script>

<style>
.listing{
	height:141px;
	width:250px;
}
.listing-img-container{
	
	width:250px;
}
</style>

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<!-- Header Container
================================================== -->

<?php include "header.php" ?>
<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><i class="fa fa-plus-circle"></i> Add Slider Images</h2>
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
		<h3>Slider Images</h3>
		

		<!-- Section -->
	
		<div class="submit-section">
			<form action="upload.php" method="POST" id="form" class="dropzone" >

				
			</form>
			<!--<input type="button" onclick="document.getElementById('form').submit();" name="submit">-->
			
		</div>
		<br/>
		<?php 
		if(isset($_POST['submit'])){
			$imid=$_POST['image_id'];
			$qry="UPDATE slider SET status='D' WHERE Sid='$imid'";
			$run=mysqli_query($db,$qry) or die();
			if($run){
				?>
				<script>
				swal('deleted successfully');
				</script>
				<?php
			
			}
			else{
				?>
				<script>
				swal('could not delete');
				</script>
				<?php
			
			}
		}
		?>
	
	
		<!-- Section / End -->
		<div  id="gallery">
		<h3>GALLERY</h3>
		<br/>
			<!-- Listings -->
			<div class="listings-container grid-layout-three ">

				<!-- Listing Item -->
				<?php
		include 'dbconnect.php';
		$query="SELECT Sid,image from slider where status NOT LIKE 'D'";
		$run=mysqli_query($db,$query) or die();
		while($row=mysqli_fetch_assoc($run))
		{
			?>

				<div class="listing-item">

					<a  class="listing-img-container">

						
				
						<div class="listing">
							<div><img src="slider/<?php echo $row['image']; ?>" height="141px" width="250px" alt=""></div>
							
						</div>
					</a>
					
					<div class="listing-content">

					<form id="form" method="POST">
					<input type="hidden" name="image_id"  value="<?php echo $row['Sid']; ?>" />
					<input type="submit" style="float:right;" class = "btn btn-danger"  value="Delete" name="submit" >
					</form>

					</div>

				</div>
				<?php
			}
				?>
				<!-- Listing Item / End -->
			</div>
		</div>
		
		


		</div>
	</div>

</div>
</div>
<!-- Footer
================================================== -->
<?php include 'footer.php'; ?>
<div class="margin-top-55"></div>

<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
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
 <script src="scripts/jquery.min.js"></script>


<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="scripts/dropzone.js"></script>
<script>
	Dropzone.autoDiscover = false;
	jQuery(".dropzone").dropzone({
		dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
	});
	
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners

</script>
</div>
<!-- Wrapper / End -->


</body>
</html>