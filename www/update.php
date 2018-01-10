<?php include("dbconnect.php");?>

<?php
 $Id = $_GET['Id'];
 $Title =$_POST['Title'];
 $Content = $_POST['Content'];
 $Member_id = $_POST['Member_id'];
 $Date = $_POST['Date'];
 $Pic = $_POST['Pic'];
 
  $sql_update = "UPDATE `blog` Set `Title` = '$Title', `Content` = '$Content', `Member_id` = $Member_id, `Date` = '$Date', `Pic` = '$Pic' WHERE `blog`.`Id` = $Id";
  $result = mysqli_query($conn,$sql_update) or die('MySQL Update error');
  $up_row = mysqli_fetch_array($result);

  $updateGoTo = "blog_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
  ?>