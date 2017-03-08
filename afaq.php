<?php 
	require "dbconnect.php";
	if(isset($_GET['fd']) and isset($_GET['d']))
	{  echo $fd=$_GET['fd'];
echo $d=$_GET['d'];
         if($d='d')
		 {$q1="DELETE FROM `faq` WHERE faqid='$fd'";
	      $qr1=mysqli_query($db,$q1);
		  header('Refresh:0;URL=add_faq.php');
		  }
		header('Refresh:0;URL=add_faq.php');
		}
	?>