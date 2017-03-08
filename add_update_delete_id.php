-<!DOCTYPE html>
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
<link rel="stylesheet" href="css/w3.css">
<script>
function req(){
	document.getElementById('file').required=false;
	document.getElementById('new').required=false;
}
function description(){
	document.getElementById('desc').required=false;
}

function image(){
if(document.getElementById('img').style.display == 'none')
{
	document.getElementById('img').style.display = "block";

	if(document.getElementById('descrp').style.display = "block")
		document.getElementById('descrp').style.display = "none";
	if(document.getElementById('view_pro1').style.display = "block")
		document.getElementById('view_pro1').style.display = "none";
		
	 
	}
	else
	  document.getElementById('img').style.display = "none";	
}
function desc(){

if(document.getElementById('descrp').style.display == 'none')
{
	document.getElementById('descrp').style.display = "block";

	if(document.getElementById('img').style.display = "block")
		document.getElementById('img').style.display = "none";
	
	if(document.getElementById('view_pro').style.display = "block")
		document.getElementById('view_pro').style.display = "none";
	
	}
	else
	  document.getElementById('descrp').style.display = "none";	
}
   function change(imid){
       
         document.getElementById('imid').value=imid;
        var modal=document.getElementById('id01');
        modal.style.display="block";
                document.getElementById('im').required="true";
                 document.getElementById('image_name').required="true";
    
       }
       function change_desc(desid){
       
        document.getElementById('desid').value=desid;
        var modal=document.getElementById('id02');
        modal.style.display="block";
        document.getElementById('descrptn').value=document.getElementById('sh_d').innerHTML;
                document.getElementById('descrptn').required="true";
    
       }
function delete_pro(pid,which_a){
	
	  var ajaxRequest;  // The variable that makes Ajax possible!
  
                                  try{
                                   // Opera 8.0+, Firefox, Safari
                                   ajaxRequest = new XMLHttpRequest();
                                 }catch (e){
                               // Internet Explorer Browsers
                                   try{
                                      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                                   }catch (e) {
                                      try{
                                         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                      }catch (e){
                                         // Something went wrong
                                         alert("Your browser broke!");
                                         return false;
                                      }
                                   }
                                 }
                                 // Create a function that will receive data 
                                 // sent from the server and will update
                                 // div section in the same page.
                                 ajaxRequest.onreadystatechange = function(){
                                   if(ajaxRequest.readyState === 4){
                                     
                                      
                                      alert(ajaxRequest.responseText);

                                   };
                                 };

                                 // Now get the value from user and pass it to
                                 // server script
                                 ajaxRequest.open("GET", "delete_product.php?pid=" + pid +"&&a="+which_a, true);

                                 ajaxRequest.send(); 
                                 location.reload();
}

</script>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<!-- Header Container
================================================== -->
<?php include 'header.php'; ?>
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
				<h2><i class="fa fa-plus-circle"></i> Add Delete Image/Description</h2>
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

	<div class="row">
	<div class="col-md-3"></div>
<div class="col-md-3">
	<input type="button" onclick="image()" class="submit button" value="Image" >
</div> 
<div class="col-md-3">
	<input type="button" onclick="desc()" class="submit button" value="Description" >
</div>                                                                                     
</div>
<br/><br/><br/>
		


		<!-- Section -->
		<!--<h3>Gallery</h3>
		<div class="submit-section">
			<form action="http://www.vasterad.com/file-upload" class="dropzone" ></form>
		</div>-->
		<!-- Section / End -->
					<div id="img" style="display:none">
					<form method="post"  name="form" id="form" enctype="multipart/form-data" autocomplete="on">
	
					<div>
						<select name="cat"  id="cat1"  required="required" />
						<option value="">Choose Category</option>
						<?php
						$query="SELECT * from category";
						$run=mysqli_query($db,$query);
						while($exe1=mysqli_fetch_assoc($run)){
							
							$cid=$exe1['Cid'];
							$cname=$exe1['CName'];
							?>
							<option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>
							<?php
						}
						?>
					</select>
					</div>
					<br/>
					<div>
						<select name="new"  id="new"  required="required" />
						<option value="">Choose New Launch</option>
						<option value="Y">Yes</option>
						<option value="N">No</option>
					</select>
					</div>
					<div>
						<input name="image_name" type="text" id="image_name" placeholder="Image Name"  />
					</div>
<br/>
					<div>
						<input name="image" type="file" id="file" placeholder="Upload Image" required="required" />
					</div>


					

					<input type="submit" class="submit button" name="submit" id="submit" value="Submit" />
					<input type="submit"  class="submit button" style="width:20%;" name="but" id="but" onclick="req()" value="View Previous"/>

					</form>
				</div>
				
					<?php
					if(isset($_POST['but'])) {
						if($_POST['cat']){
							$cid=$_POST['cat'];
							?>
							<div class="col-md-12" id="view_pro" >
		<br/>
		<div class="col-md-2"></div>
			<div class="col-md-8">
			<table class="manage-table responsive-table">

				<tr>
					<th><?php
					$qry3="SELECT CName from category WHERE Cid='$cid'; ";
					$run3=mysqli_query($db,$qry3) or die();
					$row3=mysqli_fetch_assoc($run3);
					echo $row3['CName']; 
					?></th>
				
					<th></th>
					<th></th>
				</tr>
							<?php
						 $qry3="SELECT* from image where Status NOT LIKE 'D' AND Cid='$cid'; ";
						$run3=mysqli_query($db,$qry3) or die();

						while($row3=mysqli_fetch_assoc($run3))
						{
						?>
						<tr>
						<td class="title-container">
						<img src="Products/<?php echo $row3['image']; ?>" alt="">
						
						</td>
						<td class="expire-date"></td>
						<td class="action">
						<a onclick="javascript:change('<?php echo $row3['imid']; ?>');"><i class="fa fa-pencil"></i> Edit</a>

						<a  class="delete" onclick="javascript:delete_pro('<?php echo $row3['imid']; ?>',1)"><i class="fa fa-remove"></i> Delete</a>
						</td>
						</tr>
						<?php
						}
						?>
						</table>
	
		</div>

	</div>
						<?php
						}
					}
			if(isset($_POST['submit'])){
			
			$cat=$_POST['cat'];
			$new=$_POST['new'];
			$name=$_POST['image_name'];
			if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size =$_FILES['image']['size'];
			$file_tmp =$_FILES['image']['tmp_name'];
			$file_type=$_FILES['image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}

			if($file_size > 2097152){
			$errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
			move_uploaded_file($file_tmp,"Products/".$file_name);
			$image_name=$_FILES['image']['name'];

			$upload=1;
			}else{
			print_r($errors);
			$image_name='';
			}
			}
			else{
				$image_name='';
			}
			 $add="INSERT INTO image(Cid, image,Name, New) VALUES ('$cat','$image_name','$name','$new')";
			$run2=mysqli_query($db,$add);
			if($run2){
				?>
				<script>
				alert('Added Successfully');
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert('Could not be added successfully');
				</script>
				<?php
			
			}
			}
			?>

				<div id="descrp" style="display:none">

					<form method="post" action="#" name="form" id="form" enctype="multipart/form-data" autocomplete="on">

				
						
						
						
					<div>
						<select name="cat"  id="cat2"  required="required" />
						<option value="">Choose One</option>
						<?php
						$query="SELECT * from category";
						$run=mysqli_query($db,$query);
						while($exe1=mysqli_fetch_assoc($run)){
							
							$cid=$exe1['Cid'];
							$cname=$exe1['CName'];
							?>
							<option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>
							<?php
						}
						?>
					</select>
					</div>

				<br/>

					<div>
						<textarea name="desc" cols="40" rows="3" id="desc" placeholder="Description" spellcheck="true" required="required"></textarea>
					</div>
					<br/>
					<input type="submit" class="submit button" name="submit1" id="submit1" value="Submit" />
					<input type="submit"  class="submit button" style="width:20%;" onclick="description()" name="butt" id="butt" value="View Previous"/>

					</form>
				</div>
				<?php
					if(isset($_POST['butt'])) {

						if($_POST['cat']){
							$cid=$_POST['cat'];

							?>
							<div class="col-md-12" id="view_pro1" >
		<br/>
		<div class="col-md-2"></div>
			<div class="col-md-8">
			<table class="manage-table responsive-table">

				<tr>
					<th><?php
					$qry3="SELECT CName from category WHERE Cid='$cid'; ";
					$run3=mysqli_query($db,$qry3) or die();
					$row3=mysqli_fetch_assoc($run3);
					echo $row3['CName']; 
					?></th>
				
					<th></th>
					<th></th>
				</tr>
							<?php
						 $qry3="SELECT* from description where Status NOT LIKE 'D' AND Cid='$cid'; ";
						$run3=mysqli_query($db,$qry3) or die();

						while($row3=mysqli_fetch_assoc($run3))
						{
						?>
						<tr>
						<td class="title-container">
							<div class="title">
							
							<span><p id="sh_d"><?php echo $row3['description']; ?></p></span>
						</div>
						
						</td>
						<td class="expire-date"></td>
						<td class="action">
						<a onclick="javascript:change_desc('<?php echo $row3['desid']; ?>');"><i class="fa fa-pencil"></i> Edit</a>

						<a  class="delete" onclick="javascript:delete_pro('<?php echo $row3['desid']; ?>',2)"><i class="fa fa-remove"></i> Delete</a>
						</td>
						</tr>
						<?php
						}
						?>
						</table>
	
		</div>

	</div>
						<?php
						}
					}

			if(isset($_POST['submit1'])){

		
			$descp=$_POST['desc'];
			$cat=$_POST['cat'];

			 $add="INSERT INTO description(Cid, description) VALUES ('$cat','$descp')";
			$run2=mysqli_query($db,$add);
			if($run2){
				?>
				<script>
				alert('Added Successfully');
				</script>
				<?php
			}
			else{
				?>
				<script>
				alert('Could not be added successfully');
				</script>
				<?php
			
			}
			}
			?>

				
		<div class="divider"></div>
		

		</div>
	</div>

</div>
</div>
        <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container w3-dark-grey "> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-closebtn">&times;</span>
        <h3 style="color:white;font-size:120%">Change Image</h3>
        <br/>
      </header>
      <div class="w3-container">
      	<br/>
        <form class="form-horizontal" method="POST"  enctype="multipart/form-data"  action="" role="form" onsubmit="return validate();">
                              <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="image">Browse Image</label>

                    <div class="col-sm-8">
                       <input type="file"  class="form-control" 
                        id="im" name="im" />

                    </div>
                    <br/>
                    <div class="form-group">
                    	 <label  class="col-sm-2 control-label"
                              for="image_name">Image Name</label>

                    <div class="col-sm-8">
                       <input type="text"  class="form-control" 
                        id="image_n" name="image_n" />
                    </div>
                   <input type="hidden" id="imid" name="imid">
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit2" value="submit" class="btn btn-default">Change</button>
                      <br/>
                    </div>
                  </div>
                  <br/>
        </form>
      </div>
      
    </div>
    
  </div>
</div>
</div>
  <?php 
  if(isset($_POST['submit2'])){

 
  	if(isset($_POST['imid']) && isset($_FILES['im'])){
  		$imid=$_POST['imid'];
  		$errors= array();
			$file_name = $_FILES['im']['name'];
			$file_size =$_FILES['im']['size'];
			$file_tmp =$_FILES['im']['tmp_name'];
			$file_type=$_FILES['im']['type'];
			/*$file_ext=strtolower(end(explode('.',$_FILES['im']['name'])));

			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}*/

			if($file_size > 2097152){
			$errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
			move_uploaded_file($file_tmp,"Products/".$file_name);
			$image_name=$_FILES['im']['name'];

			$upload=1;
			}else{
			print_r($errors);
			$image_name='';
			}
			if(isset($_POST['image_n']))
			$name=$_POST['image_n'];
			else
				$name='';
			$qry="UPDATE image SET image='$image_name',Name='$name' WHERE imid='$imid'";
			$run=mysqli_query($db,$qry);
  		if($run)
  		{
  			?>
  		<script>alert("Changed Successfully");</script>
  		<?php
  	}
  		else 
  		{
  			?>
  		<script>alert("Could not change");</script>
  		<?php
  	}

  	}
  	else{
  		?>
  		<script>alert("Select an image");</script>
  		<?php

  	}

  }
  if(isset($_POST['submit3']) && isset($_POST['desid'])){

  	if($_POST['descrptn']){
  		$new_desc=$_POST['descrptn'];
  		$pid=$_POST['desid'];
  		$query="UPDATE description SET description='$new_desc' WHERE desid='$pid';";
  		$run=mysqli_query($db,$query);
  		if($run)
  		{
  			?>
  		<script>alert("Edited Successfully");</script>
  		<?php
  	}
  		else 
  		{
  			?>
  		<script>alert("Could not edit");</script>
  		<?php
  	}

  	}
  	else{
  		?>
  		<script>alert("Select description to edit");</script>
  		<?php

  	}
  }
  ?>
     <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container w3-dark-grey "> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-closebtn">&times;</span>
        <h3 style="color:white;font-size:120%">Edit Description</h3>
        <br/>
      </header>
      <div class="w3-container">
        <form class="form-horizontal" method="POST"  action="" role="form" onsubmit="return validate();">
                              <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="image">Description</label>

                    <div class="col-sm-8">
                       <input type="text"  class="form-control" 
                        id="descrptn" name="descrptn" />

                    </div>
                   <input type="hidden" name="desid" id="desid">
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit3" value="submit" class="btn btn-default">Change</button>
                      <br/><br/>
                    </div>
                  </div>
                  <br/>
        </form>
      </div>
      
    </div>
    
  </div>
<!-- Footer
================================================== -->
<div class="margin-top-55"></div>


<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


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



<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="scripts/dropzone.js"></script>
<script>
	$(".dropzone").dropzone({
		dictDefaultMessage: "<i class='sl sl-icon-plus'></i> Click here or drop files to upload",
	});
</script>
</div>
<!-- Wrapper / End -->


</body>
</html>