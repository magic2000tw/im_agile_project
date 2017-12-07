<?php
require_once('loginModel.php');
$action =$_REQUEST['act'];

switch ($action) {
case 'login':
	$loginMail = $_POST['loginMail']; 
	$passWord = $_POST['password'];
	
	if ($id = checkUP($loginMail,$passWord) ) {
		echo "OK";
		echo '<a href="test_login.php">Login again</a> ';
	} else {
		echo "Invalid Username or Password - Please try again <br />";
		echo '<a href="test_login.php">Login again</a> ';
	}
	break;
}
?>