<?php 
include 'dbconnect.php';
if($_GET['cid'])
{

$cid=$_GET['cid'];

	$qry="UPDATE category SET Status='D' WHERE Cid='$cid'";
	$run=mysqli_query($db,$qry) or die();
	if($run){
		echo 'deleted';
	}
	else{
		echo 'could not delete';
	}
}
else{
	echo 'select category to delete';
}


?>