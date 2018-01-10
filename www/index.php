<?php
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../www/login.php");
    exit(0);
  }else {
  	header("Location: ../www/hot.php");
    exit(0);
  }
?>