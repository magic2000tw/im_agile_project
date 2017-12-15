<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'agile';
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection');
mysqli_query($conn,"SET NAMES utf8"); 
?>