<?php
require("dbconnect.php");
global $conn;
$userName=$_POST['userName'];
$loginMail=$_POST['loginMail'];
$password=$_POST['password'];
$sql="select count(*) as A from user where userName='$userName'";
$results=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($results);
if($row['A'] >= 1) {
    echo $row['A'];
    echo "User Already in Exists<br/>";
}else{

    echo $userName,$loginMail,$password;
    $newUser="INSERT INTO user (loginMail,userName,password) values ('$loginMail','$userName','$password')";
    if (mysqli_query($conn,$newUser)){
        echo "You are now registered<br/>";
    }else{
        echo "Error adding user in database<br/>";
    }
  }
?>
