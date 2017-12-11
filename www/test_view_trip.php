<?php
if(!isset($_SESSION)){
	session_start();
}
require_once("model.php");
$userid=$_SESSION['userid'];
$results=getUsername($userid);
$rss=mysqli_fetch_array($results);
echo $rss['userName'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test view</title>
</head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<body>
    <p>trip view all</p>
    <table width="500" borger="2">
    	<tr>
    		<th>id</th>
    		<th>username</th>
    		<th>trip name</th>
    		<th>start_date</th>
    		<th>end_date</th>
    	</tr>
    	<?php
    		require_once("model.php");
    		$userName=$rss['userName'];
    		$_SESSION['username'] = $userName;
    		$results=getTripList();
    		while($rs=mysqli_fetch_array($results)){
    			echo "<tr><td>", $rs['id'] ,
    			"</td><td>" , $rs['username'] ,
    			"</td><td>" , $rs['name'] ,
    			"</td><td>" , $rs['start_date'],
    			"</td><td>" , $rs['end_date'],
    			"</td><td>" , "<a href='test_view_trip_detail.php?id=",$rs['id'] ,"'>Detail</a>",
    			"</td><td>" , "<a href='control.php?act=addFollow&name=",$rs['name'] ,"'>Follow this trip</a>",
    			"</td></tr>";	
    		}
    	?>
    </table>
    <p>myfollow</p>
    <table width="500" borger="2">
    	<tr>
    		<th>Follow id</th>
    		<th>Trip id</th>
    		<th>userID</th>
    		<th>userName</th>
    		<th>followTrip</th>
    		<th>option</th>
    	</tr>
    	<?php
    		require_once("model.php");
    		//echo $rss['userName'];
    		$userName=$rss['userName'];
    		$results=getFollowList($userName);
    		while($rs=mysqli_fetch_array($results)){
    			echo "<tr><td>", $rs['id'] ,
    			"</td><td>" , $rs['trip_id'] ,
    			"</td><td>" , $rs['userId'] ,
    			"</td><td>" , $rs['userName'] ,
    			"</td><td>" , $rs['followTrip'],
    			"</td><td>" , "<a href='test_view_trip_detail.php?id=",$rs['trip_id'] ,"'>Detail</a>",
    			"<a href='control.php?act=deleteFollow&id=",$rs['id'] ,"'> Delete</a>", 
    			"</td></tr>";	
    		}
    	?>
    </table>
</body>