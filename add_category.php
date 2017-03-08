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
<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/main.css" id="colors">
 <script src="scripts/sweetalert.min.js"></script>
  <script src="scripts/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script>
function delete_cat(cid){
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
                                     
                                      
                                      swal(ajaxRequest.responseText);

                                   };
                                 };

                                 // Now get the value from user and pass it to
                                 // server script
                                 ajaxRequest.open("GET", "delete_cat.php?cid=" + cid, true);

                                 ajaxRequest.send(); 
                                 location.reload();
}
function show_cat(){
if(document.getElementById('cat').style.display == 'none')
	 document.getElementById('cat').style.display = "block";
else
	 document.getElementById('cat').style.display = "none";	
if(document.getElementById('subcat').style.display == 'block')
	document.getElementById('subcat').style.display = "none";	
}
function show_subcat(){
if(document.getElementById('subcat').style.display == 'none')
	 document.getElementById('subcat').style.display = "block";
else
	 document.getElementById('subcat').style.display = "none";	
if(document.getElementById('cat').style.display == 'block')
	document.getElementById('cat').style.display = "none";
}
</script>
<script>
function add_cat(){

	var modal=document.getElementById('addCategory');
        modal.style.display="block";
}
function open_edit(category_id){
	//alert(category_id);
	document.getElementById('cate').value=category_id
	//var modal=document.getElementById('editCategory');
        //modal.style.display="block";
         jQuery("#editCategory").modal();
}
/*jQuery(document).on("click", ".open", function () {
     var categoryId = jQuery(this).data('id');
     jQuery(".modal-body #cate").val( categoryId );
    
});*/
</script>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


<?php include "header.php" ?>
	<div class="clearfix"></div>
	<!-- Topbar / End -->


	
	<!-- Header / End -->


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

				<h2>Add Category/Sub-Category</h2>
				
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>Elements</li>
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
 <?php
    if(isset($_POST['add_cat_submit']))
    {
    	$cat=$_POST['category'];
    	$qry1="SELECT * from category WHERE CName='$cat'";
		$run1=mysqli_query($db,$qry1);
		if(!(mysqli_num_rows($run1) > 0)){
		 $qry5="ALTER TABLE category AUTO_INCREMENT = 1;";
		 $run5=mysqli_query($db,$qry5);
		$query="SELECT Cid from category ORDER BY Cid DESC limit 1";
		$run=mysqli_query($db,$query);
		$exe1=mysqli_fetch_assoc($run);
		$last_cid=$exe1['Cid'];
		$new=$last_cid+1;
		$link='product.php?cid='.$new;
		$qry2="INSERT INTO category(Pid, CName, Link, Status) VALUES ('$new','$cat','$link','I')";
		$run2=mysqli_query($db,$qry2);
		if($run2){
			?>
			<script>
			swal("Added Successfully");
			</script>
			<?php
		}
		else{
			?>
			<script>
			swal("Could not add");
			</script>
			<?php
		}
		}
		else{
			?>
			<script>
			swal("Already there");
			</script>
			<?php
		}
    }
    if(isset($_POST['sub_cat_submit'])){
    	$parent_id=$_POST['cat'];
		$subcat=$_POST['subCategory'];
		$qry1="SELECT * from category WHERE CName='$subcat'";
		$run1=mysqli_query($db,$qry1);
		if(!(mysqli_num_rows($run1) > 0))
		{
		$qry5="ALTER TABLE category AUTO_INCREMENT = 1;";
		$run5=mysqli_query($db,$qry5);
		$query="SELECT Cid from category ORDER BY Cid DESC limit 1";
		$run=mysqli_query($db,$query);
		$exe1=mysqli_fetch_assoc($run);
		$last_cid=$exe1['Cid'];
		$new=$last_cid+1;
		$link='product.php?cid='.$new;
		$qry2="INSERT INTO category(Pid, CName, Link, Status) VALUES ('$parent_id','$subcat','$link','I')";
		$run2=mysqli_query($db,$qry2);
		if($run2){
			?>
			<script>
			swal("Added Successfully");
			</script>
			<?php
		}
		else{
			?>
			<script>
			swal("Could not add");
			</script>
			<?php
		}
		}
		else{
			?>
			<script>
			swal("Already there");
			</script>
			<?php
		}


    }
    if(isset($_POST['update_cat'])){
    	if($_POST['cate'] && $_POST['editcategory']){
			$new_cat_name=$_POST['editcategory'];
			$cid=$_POST['cate'];
			$qry="UPDATE category SET CName='$new_cat_name' WHERE Cid='$cid'";
			$run=mysqli_query($db,$qry) or die();
			if($run){
				?>
			<script>
			swal('Updated Successfully');
			</script>
			<?php
			
			}
			else{
				?>
			<script>
			swal("could not update");
			</script>
			<?php
			
			}
    	}
    	else{
    		?>
			<script>
			swal("Something is wrong");
			</script>
			<?php
    	}
    }
    ?>
<div class="container">
	   <div class="row">
                <a class="btn btn-primary btn-lg btn-block"  data-toggle="modal" data-target="#addCategory"><i
                            class="fa fa-plus"></i> Add New Category</a>
                <hr>
               <?php
               $query="SELECT CName,Cid from category where Cid=Pid AND Status NOT LIKE 'D'";
               $run=mysqli_query($db,$query) or die();
               while($exe=mysqli_fetch_assoc($run))
               {
               	$cid=$exe['Cid'];
               ?>
                    <div class="col-sm-8 col-md-4 col-xs-12" id="">
                        <h1><?php echo $exe['CName']; ?></h1>
                        <div class="btn-group" id="">
                            <a class="btn btn-info "  class="open" onclick="open_edit('<?php echo $cid; ?>')"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger" onclick="delete_cat('<?php echo $cid; ?>')"><i class="fa fa-times"></i> Delete</a>
                        </div>
                        <hr>
                        <ul class="list-group" style="height: 300px;overflow-y: scroll;">
                        	<?php

                        $cid=$exe['Cid'];
						 $query1="SELECT CName,Cid from category where Pid='$cid' AND Status NOT LIKE 'D'";
						$run1=mysqli_query($db,$query1) or die();
						while($exe1=mysqli_fetch_assoc($run1))
						{
							$cid1=$exe1['Cid'];
							?>
                                <li class="list-group-item" id="">
                                    <div class="btn-group pull-right" id="">
                                        <a class="badge btn-info"  onclick="open_edit('<?php echo $cid1; ?>')"  class="open" ><i class="fa fa-pencil"></i></a>
                                        <a class="badge btn-danger" onclick="delete_cat('<?php echo $cid1; ?>')"><i class="fa fa-times"></i></a>
                                    </div>
                                   
                                    <?php
                                    echo $exe1['CName'];
                                    ?>
                                </li>
                                <?php
                            }
                                ?>
                          
                        <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#addSubCategory" onclick=""><i class="fa fa-plus"></i> Add Sub-Category</a>
                    </div>
             <?php
         }
             ?>
            </div>


    <div id="addCategory" class="modal fade" role="dialog"  data-backdrop="static">
        <div class="modal-dialog">
            <form class="form-horizontal" method="post" action="">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Category</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class=" col-md-4 control-label">Category Name</label>
                            <div class="col-md-6 ">
                                <input type="text" class="form-control" name="category" placeholder="Enter Category Name.." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   
                    <button type="submit" name="add_cat_submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
   <div id="addSubCategory" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <form class="form-horizontal" id="editCatForm" method="post" action="">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Sub Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label class=" col-md-4 control-label">Category Name</label>
                                <div class="col-md-6 ">
                                    <select class="form-control" name="cat" id="selectCategory">
                                    	<option value="">Choose One</option>
                                      <?php
										$query="SELECT Cid,CName from category";
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
                            </div>
                            <div class="form-group">
                                <label class=" col-md-4 control-label">Sub Category Name</label>
                                <div class="col-md-6 ">
                                    <input type="text" class="form-control" name="subCategory"  placeholder="Enter Sub Category Name.." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" name="sub_cat_submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Sub Category</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="editCategory" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <form class="form-horizontal" id="editCatForm" method="post" action="">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label class=" col-md-4 control-label">Category Name</label>
                                <div class="col-md-6 ">
                                	<input type="hidden" name="cate" id="cate">
                                    <input type="text" class="form-control" name="editcategory" id="editCatName" placeholder="Enter Category Name.." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" name="update_cat" class="btn btn-info"><i class="fa fa-pencil"></i> Update Category</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!--<div class="col-md-12">
	<div class="col-md-3"></div>
<div class="col-md-3">
	<input type="button" onclick="show_cat()" class="submit button" value="Add Category" >
</div> 
<div class="col-md-3">
	<input type="button" onclick="show_subcat()" class="submit button" value="Add Sub Category" >
</div>                                                                                     
</div>
<br/><br/><br/>
<div id="cat" style="display:none;">
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<section id="category">
				<h4 class="headline margin-bottom-35">ADD CATEGORY</h4>



					<form method="post" action="" name="form" id="form" enctype="multipart/form-data" autocomplete="on">

				
						
							<div>
								<input name="name" type="text" id="cat_name" placeholder="Category" required="required" />
							</div>
						
						
			

					<input type="submit" class="submit button" name="submit" id="submit" value="Submit" />
					
					

					</form>
			</section>
		</div>
	</div>
	</div>-->
	<?php 
	/*if(isset($_POST['submit'])){
		$cat=$_POST['name'];
		$qry1="SELECT * from category WHERE CName='$cat'";
		$run1=mysqli_query($db,$qry1);
		if(!(mysqli_num_rows($run1) > 0)){
		 $qry5="ALTER TABLE category AUTO_INCREMENT = 1;";
		 $run5=mysqli_query($db,$qry5);
		$query="SELECT Cid from category ORDER BY Cid DESC limit 1";
		$run=mysqli_query($db,$query);
		$exe1=mysqli_fetch_assoc($run);
		$last_cid=$exe1['Cid'];
		$new=$last_cid+1;
		$link='product.php?cid='.$new;
		$qry2="INSERT INTO category(Pid, CName, Link, Status) VALUES ('$new','$cat','$link','I')";
		$run2=mysqli_query($db,$qry2);
		if($run2){
			?>
			<script>
			alert("Added Successfully");
			</script>
			<?php
		}
		else{
			?>
			<script>
			alert("Could not add");
			</script>
			<?php
		}
		}
		else{
			?>
			<script>
			alert("Already there");
			</script>
			<?php
		}
	}
	if(isset($_POST['but'])){

	}*/
	?>
	<!--<div id="subcat" style="display:none;">
		<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<section id="category">
				<h4 class="headline margin-bottom-35">ADD SUB CATEGORY</h4>



					<form method="post" action="" name="form" id="form1" enctype="multipart/form-data" autocomplete="on">
						
						
					<div>
						<select name="cat"  id="cat"  required="required" />
						<option value="">Choose Category</option>
						<?php
						$query="SELECT Cid,CName from category";
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

					<div>
						<input name="subcat_name" type="text" id="sub_name"  placeholder="Sub Category" required="required" />
					</div>


					
					<input type="submit" class="submit button" name="submit1" id="submit1" value="Submit" />
					

					</form>
			</section>
		</div>
	</div>
	</div>-->
	<?php 
	/*if(isset($_POST['submit1'])){
		$parent_id=$_POST['cat'];
		$subcat=$_POST['subcat_name'];
		$qry1="SELECT * from category WHERE CName='$subcat'";
		$run1=mysqli_query($db,$qry1);
		if(!(mysqli_num_rows($run1) > 0))
		{
		$qry5="ALTER TABLE category AUTO_INCREMENT = 1;";
		$run5=mysqli_query($db,$qry5);
		$query="SELECT Cid from category ORDER BY Cid DESC limit 1";
		$run=mysqli_query($db,$query);
		$exe1=mysqli_fetch_assoc($run);
		$last_cid=$exe1['Cid'];
		$new=$last_cid+1;
		$link='product.php?cid='.$new;
		$qry2="INSERT INTO category(Pid, CName, Link, Status) VALUES ('$parent_id','$subcat','$link','I')";
		$run2=mysqli_query($db,$qry2);
		if($run2){
			?>
			<script>
			alert("Added Successfully");
			</script>
			<?php
		}
		else{
			?>
			<script>
			alert("Could not add");
			</script>
			<?php
		}
		}
		else{
			?>
			<script>
			alert("Already there");
			</script>
			<?php
		}

	}*/
	?>

	
</div>
<!-- Container / End -->


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>




<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<?php include "footer.php";?>
<!-- Scripts
================================================== -->
<script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
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