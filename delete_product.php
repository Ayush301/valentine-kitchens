<?php 
include 'dbconnect.php';
$pid=$_GET['pid'];
$a=$_GET['a'];
if($a == 1){
	$qry="UPDATE image SET Status='D' WHERE imid='$pid'";
}
else if($a == 2){
		$qry="UPDATE description SET Status='D' WHERE desid='$pid'";
}
	$run=mysqli_query($db,$qry) or die();
	if($run){
		echo 'deleted';
	}
	else{
		echo 'could not delete';
	}


?>