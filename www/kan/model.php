<?php
require("dbconnect.php");
function getUsername($id){
	global $conn;
	$sql="select * from user where id=$id";
	return mysqli_query($conn,$sql);
}
function getTripList($userName){
	global $conn;
	$user=mysqli_real_escape_string($conn, $userName);
	$sql="select * from trip where userName!='$user'";
	return mysqli_query($conn, $sql);
}

function getmyTrip($userName){
	global $conn;
	$user=mysqli_real_escape_string($conn, $userName);
	$sql="select * from trip where userName='$user'";
	return mysqli_query($conn, $sql);
}

function getTripDetail($id){
	global $conn;
	$id=(int) $id;
	$sql="select * from trip_detail where trip_id=$id";
	return mysqli_query($conn, $sql);
}

function addFollow($userId,$userName,$tripName){
	global $conn;
	$userId=(int)$userId;
	$userName=mysqli_real_escape_string($conn, $userName);
	$tripName=mysqli_real_escape_string($conn, $tripName);
	$sql="select * from follow where userName='$userName' and followTrip='$tripName'";
	$sql2="insert into follow (userId,userName,followTrip) values ('$userId','$userName','$tripName')";
	$result=mysqli_query($conn,$sql);
	if($result && mysqli_num_rows($result)==0){
		mysqli_query($conn,$sql2);
	}else{
		return false;
	}
}
function getFollowList($userName){
	global $conn;
	$userName=mysqli_real_escape_string($conn,$userName);
	$sql="select * from follow where userName='$userName'";
	return mysqli_query($conn,$sql);
}
function deleteFollow($id){
	global $conn;
	$id=(int)$id;
	$sql="delete from follow where id=$id";
	return mysqli_query($conn,$sql);
}	
function copyTrip($userId,$userName,$tripName){
	global $conn;
	$userId=(int)$userId;
	$userName=mysqli_real_escape_string($conn, $userName);
	$tripName=mysqli_real_escape_string($conn, $tripName);
	$sql="insert into trip";
	$sql="insert into trip_detail";
}
?>