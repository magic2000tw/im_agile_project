<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'im_agile';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//mysqli 預設編號為latin-1，建立資料庫已指定utf8編碼，所以要指定連線時所用編碼
$mysqli->query("SET NAMES utf8");
 ?>
