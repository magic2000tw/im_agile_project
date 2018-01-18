<?php include("dbconnect.php");?>

<?php
 $Id = $_GET['Id'];
  $sql = sprintf("DELETE FROM `blog` WHERE `Id` = %s;",mysqli_real_escape_string($conn,$Id));
  $result = mysqli_query($conn,$sql) or die(mysqli_error());
  $row = mysqli_fetch_array($result);

  $deleteGoTo = "blog_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>刪除文章</title>
</head>

<body>
</body>
</html>