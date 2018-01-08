<?php
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../kan/login.php");
    exit(0);
  }
?>