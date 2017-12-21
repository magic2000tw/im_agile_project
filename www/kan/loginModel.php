<?php
if(!isset($_SESSION)){
  session_start();
}
require("dbconnect.php");
$sID=$_SESSION['sID'];
function checkUP($loginMail,$passWord) {
	global $conn;
	$loginMail = mysqli_real_escape_string($conn,$loginMail);
	$sql = "SELECT password, id FROM user WHERE loginMail='$loginMail'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['password'] == $passWord) { 
				return $row['id'];
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	} else{
		return 0;
	}
}
?>