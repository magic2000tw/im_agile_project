<?php
session_start();
require_once('loginModel.php');
$action =$_REQUEST['act'];

switch ($action) {
case 'login':
	$loginMail = $_POST['loginMail']; 
	$passWord = $_POST['password'];
	
	if ($id = checkUP($loginMail,$passWord) ) {
		$_SESSION['userid'] = $id;
		//$_SESSION['username']=$row['userName'];
		header('Location:hot.php');
		// echo "Login OK <br />";
		// echo '<a href="home.html">VIEW</a> ';
	} else {
		echo "Invalid Username or Password - Please try again <br />";
		echo '<a href="test_login.php">Login again</a> ';
	}
	break;
}
?>