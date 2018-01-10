<?php include("dbconnect.php");?>

<?php
 $Id = $_GET['Id'];
 $Title =$_REQUEST['Title'];
 $Content = $_REQUEST['Content'];
 $Member_id = $_REQUEST['Member_id'];
 $Date = $_REQUEST['Date'];
 $Pic = $_REQUEST['Pic'];
 
  $sql_update = "UPDATE blog Set `Title` = $Title, `Content` = $Content, `Member_id` = $Member_id, `Date` = $Date, `Pic` = $Pic WHERE `Id` = $Id";
  $result = mysqli_query($conn,$sql_update) or die('MySQL Update error');
  $up_row = mysqli_fetch_array($result);

  $updateGoTo = "blog_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  ?>