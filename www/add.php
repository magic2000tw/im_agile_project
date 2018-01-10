<?php include("dbconnect.php");?>
<?php
 $Title =$_POST['Title'];
 $Content = $_POST['Content'];
 $Member_id = $_POST['Member_id'];
 $Date = $_POST['Date'];
 $Pic = $_POST['Pic'];
$sql_insert = "INSERT INTO `blog` (`Title`, `Content`, `Member_id`, `Date`, `Pic`) VALUES ('$Title','$Content',$Member_id,'$Date','$Pic')";
$result = mysqli_query($conn,$sql_insert) or die('MySQL insert error');
$row = mysqli_fetch_array($result);

$insertGoTo = "blog_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
?>