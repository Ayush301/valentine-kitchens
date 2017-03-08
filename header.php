<header id="header-container">
	<div id="top-bar">
	<div class="container">
<?php require_once("dbconnect.php");
	function data($cid)
	{ require("dbconnect.php");
								    
									$q2="Select Cid,Pid,CName,Link from category where Status='I' and Pid='$cid' and Pid!=Cid";
								$qr2=mysqli_query($db,$q2);
								if(mysqli_num_rows($qr2)!=0){
								echo '<ul>';
								while($exe2=mysqli_fetch_assoc($qr2)){
									?>
									<li><a href="<?php echo $exe2['Link'];?>"><?php echo $exe2['CName'];?></a>
									
									
								<?php  
									data($exe2['Cid']);
									echo "</li>";
									} 
								echo '</ul>';
								}
								else return 0;
		
		}
	?> 
			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Top bar -->
				<ul class="top-bar-menu">
					<li><i class="fa fa-phone"></i> +91 - 9899137892 </li>
					<li><i class="fa fa-envelope"></i>goelr20@yahoo.com</li>
					
				</ul>
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Left Side Content -->
			<div class="right-side">

				<!-- Social Icons -->
				<!--<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
				</ul>-->

			</div>
			<!-- Left Side Content / End -->

		</div>
	</div>
	<div class="clearfix"></div>
<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="home.php"><img src="images/logo.png" alt=""></a>
				</div>


				<!-- Mobile Navigation -->
				<div class="menu-responsive">
					<i class="fa fa-reorder menu-trigger"></i>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="home.php">Home</a>
						</li>

						<li><a href="#">Products</a>
							<ul>
							<?php $q1="Select Cid,Pid,CName,Link from category where Status='I' and Cid=Pid";
								$qr1=mysqli_query($db,$q1);
								while($exe1=mysqli_fetch_assoc($qr1)){
								$cid=$exe1['Cid'];
								?>
								<li><a href="<?php echo $exe1['Link'];?>"><?php echo $exe1['CName'];?></a>
								<?php data($cid);?>
									</li>
								<?php } ?>
							</ul>
						</li>

						<li><a href="new_products.php">New Launches</a></li>

						<li><a href="faq.php">FAQs</a>
						</li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					<!--<a href="login-register.html" class="sign-in"><i class="fa fa-user"></i> Log In / Register</a>-->
					<?php
					if (isset($_SESSION['Name']))
					{
					?>
					<a href="admin.php" class="button ">DashBoard</a>
					<a href="logout.php" class="button border">Logout</a>
					<?php } ?>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	</header>