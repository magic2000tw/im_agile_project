<?php
session_start();
require_once('model.php');
$action =$_REQUEST['act'];

switch ($action) {
	case 'getripDetail':
		$id=$_REQUEST['id'];
		getTripDetail($id);
		break;

	case 'addFollow':
//		$tripName=$_REQUEST($name);
		$userName=$_SESSION['username'];
		$userId=$_SESSION['userid'];
		$tripName=$_REQUEST['name'];
		addFollow($userId,$userName,$tripName);
		header('Location:test_view_trip.php');
		break;

	case 'deleteFollow':
		$id=$_REQUEST['id'];
		deleteFollow($id);
		header('Location:test_view_trip.php');
		break;
	case 'copyTrip':
		$userName=$_SESSION['username'];
		$userId=$_SESSION['userid'];
		$tripName=$_REQUEST['name'];
		copyTrip($userId,$userName,$tripName);
		header('Location:test_view_trip.php');
		break;
}
?>
