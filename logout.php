<?php 
session_start();
?>

<?php
require 'dbconnect.php';
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'index.php';
 $_SESSION['hash1'] = NULL;
 $_SESSION['Name']=NULL;
unset($_SESSION['hash1']);
unset($_SESSION['Name']);
session_destroy();
header('Refresh:0;URL='.$redirect1);
?>