<?php
###### db ##########
$db_username = 'root';
$db_password = '';
$db_name = '';
$db_host = 'localhost';
################


if(isset($_POST["username"]))
{
	
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	
	$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
	
	
	$username =  strtolower(trim($_POST["username"])); 
	
	
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	
	$results = mysqli_query($connecDB,"SELECT id FROM username_list WHERE username='$username'");
	
	
	$username_exist = mysqli_num_rows($results); //total records
	
	
	if($username_exist) {
		die('username exists <img src="imgs/not-available.png" />');
	}else{
		die('<img src="imgs/available.png" />');
	}
	
	
	mysqli_close($connecDB);
}
?>

