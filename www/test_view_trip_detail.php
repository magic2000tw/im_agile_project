<?php
if(!isset($_SESSION)){
	session_start();
}
$id=$_REQUEST['id'];
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
    <p>trip view <?php echo $id ?></p>
    <table width="500" borger="2">
    	<tr>
    		<th>trip_id</th>
    		<th>username</th>
    		<th>place</th>
    		<th>day</th>
    		<th>no</th>
            <th>staytime</th>
    	</tr>
    	<?php
    		require("model.php");
    		$results=getTripDetail($id);
    		while($rs=mysqli_fetch_array($results)){
    			echo "<tr><td>", $rs['trip_id'] ,
    			"</td><td>" , $rs['userName'] ,
    			"</td><td>" , $rs['place'] ,
    			"</td><td>" , $rs['day'],
    			"</td><td>" , $rs['no'],
    			"</td><td>" , $rs['staytime'],
    			"</td></tr>";	
    		}
    	?>
    </table>
</body>