<?php 
$host_name = "localhost";  //主機名稱
$user_name = "root";       //管理者帳號
$password = "123456789";   //管理者密碼
$db_name = "blog";         //資料庫名稱

$link = mysql_connect($host_name, $user_name, $password);   //連接mysql伺服器
mysql_select_db($db_name,$link);                          //連接資料庫

// Check connection
// if (!mysql_ping ($link)) {
//     if ($link->connect_error) {
//         die("連線失敗！！Connection failed: " . $link->connect_error);
//     } else {
//     echo "連線成功！ Connected successfully";
//     }
//     $link->close();
// } else {
//    echo "無法連線....";
// }

mysql_query("SET NAMES utf8");      //解決亂碼
session_start();                    //開啟紀錄登入者身分

//修改資料庫資訊
$blog_cn = mysql_pconnect($host_name, $user_name, $password) or trigger_error(mysql_error(),E_USER_ERROR);
?>