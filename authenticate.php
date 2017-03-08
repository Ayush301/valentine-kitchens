<?php 
	session_start();
	require "dbconnect.php";
	$hash1 = (isset($_POST['username'])) ? trim($_POST['username']) : '';
	$hash2 = (isset($_POST['password'])) ? $_POST['password'] : '';
	$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'Loginretry.php';
	$redirect7 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'admin.php';
	
	if (isset($_POST['submit'])) {
		$query = 'select user,pass from login where user = "'.mysqli_real_escape_string($db,$hash1).'"AND '.'pass = "'.mysqli_real_escape_string($db,$hash2).'"';
		
		
		
		
		
		echo "sddf";
		if (preg_match('/\s/', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		if (preg_match('/[\'"]/', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/[\/\\\\]/', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(AND|null|where|limit)/i', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(union|select|from|where)/i', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		if (preg_match('/(order|having|limit)/i', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(into|file|case)/i', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash1)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/\s/', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		if (preg_match('/[\'"]/', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		if (preg_match('/[\/\\\\]/', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		if (preg_match('/(and|null|where|limit)/i', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(union|select|from|where)/i', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		
		if (preg_match('/(order|having|limit)/i', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		if (preg_match('/(into|file|case)/i', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		if (preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash2)) exit(header('Refresh: 0; URL='.$redirect6));
		
		$result = mysqli_query($db,$query) or die(mysqli_error($db));
		if (mysqli_num_rows($result) > 0) {
			
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['hash1'] = $row['user'];
				$_SESSION['Name'] = $row['pass'];
				header('Refresh: 0; URL='.$redirect7);
			die();
			}
		}else {
			$error = header('Refresh: 0; URL='.$redirect6);
			
		}
	}	
?>