<?php
// session_start();
require('lib/php/dbconn.php');
header('Content-Type: text/html;charset=UTF-8');
$jsonStr = trim(file_get_contents("php://input"));
$jsonArr = json_decode($jsonStr,true);
$tripid =  $jsonArr["trip_id"];
$userid = $jsonArr["user_id"];
$trip_title = $jsonArr["trip_title"];
$start_date = $jsonArr["start_date"];
$end_date = $jsonArr["end_date"];
$trip_details = $jsonArr["trip_detail"];
$sql1 = "INSERT INTO `trip_detail`".
 "(trip_id, place_name, place_addr, place_id,`date`,no,start_time,end_time,img_url)".
  "VALUES (?, ?, ?, ?, STR_TO_DATE(?,'%m/%d/%Y'), ?, STR_TO_DATE(?,'%H:%i'), STR_TO_DATE(?,'%H:%i'), ?)";
$sql2 = "DELETE FROM `trip_detail` WHERE `trip_id` = ?";
$sql3 = "SELECT * FROM `trip_detail` where trip_id = ?";
$sql4 = "UPDATE `trip` SET `title` = ?, `start_date` = STR_TO_DATE(?,'%m/%d/%Y'), `end_date` = STR_TO_DATE(?,'%m/%d/%Y') WHERE `id` = ? and `userid` = ?";
function deleteTrip($tripid){
    global $mysqli,$sql2;
    $stmt = $mysqli->prepare($sql2);
    $stmt->bind_param('s',$tripid);
    $stmt->execute();
    $stmt->close();
    $mysqli->query("commit");
}
function insertTrip($tripid,$trip_details){
    global $mysqli,$sql1;
    $stmt = $mysqli->prepare($sql1);
    foreach ($trip_details as $trip_detail) {
        $stmt->bind_param('sssssisss',$tripid,$trip_detail["place_name"],
                          $trip_detail["place_addr"],$trip_detail["place_id"],
                          $trip_detail["date"],$trip_detail["no"],$trip_detail["start_time"],
                          $trip_detail["end_time"],$trip_detail["img_url"]);
        $stmt->execute();
    }
    $stmt->close();
    $mysqli->query("commit");
}
function updateTripTitle($tripid,$userid,$trip_title,$start_date,$end_date){
    global $mysqli,$sql4;
    $stmt = $mysqli->prepare($sql4);
    $stmt->bind_param('sssss',$trip_title,$start_date,$end_date,$tripid,$userid);
    $stmt->execute();
    $stmt->close();
    $mysqli->query("commit");
}
updateTripTitle($tripid,$userid,$trip_title,$start_date,$end_date);
deleteTrip($tripid);
insertTrip($tripid,$trip_details);
$mysqli->close();
echo "儲存成功!";
// $stmt1 = $mysqli->prepare($sql1);
// $stmt->bind_param('i',$sn);
// $stmt->execute();
// $stmt->bind_result($id,$userid,$title,$start_date,$end_date);

// while($stmt->fetch()){
//     echo $sn." , ".$id." , ".$userid." , ".$title." , ".$start_date."$end_date";
// }
// $action =$_REQUEST['act'];
?>
