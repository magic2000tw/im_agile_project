<?php
require('lib/php/dbconn.php');
header('Content-Type: text/html;charset=UTF-8');
$sql1 = "SELECT title, start_date, end_date FROM `trip` where id = ? and userid = ?";
$sql2 = "SELECT place_name,place_addr,place_id,start_time,end_time,img_url,`date`,no FROM trip_detail where `trip_id` = ? ORDER BY `date`,no ASC";
$sql3 = "SELECT DISTINCT `date` FROM trip_detail WHERE `trip_id` = ? ORDER BY date ASC";
$userid = '0001';
$tripid = '0001';
$date_results = array();
$stmt1 = $mysqli->prepare($sql1);
$stmt2 = $mysqli->prepare($sql2);
$stmt3 = $mysqli->prepare($sql3);
$stmt1->bind_param('ss',$tripid,$userid);
$stmt2->bind_param('s',$tripid);
$stmt3->bind_param('s',$tripid);
$stmt1->execute();
$stmt1->bind_result($trip_title,$start_date,$end_date);
$stmt1->fetch();
$stmt1->close();
// $stmt3->execute();
// $stmt3->bind_result($date);
// $stmt3->close();
// while ($stmt3->fetch()) {
//     array_push($date_results)
// }
$stmt2->execute();
$stmt2->bind_result($place_name,$place_addr,$place_id,$start_time,$end_time,$img_url,$date,$no);
// $stmt2->fetch();
// $temp = array($place_name,$place_addr,$place_id,$start_time,$end_time,$img_url);
// $date_results[$date] = array($temp);
// // echo var_dump($date_results[$date]);
// $stmt2->fetch();
// $temp = array($place_name,$place_addr,$place_id,$start_time,$end_time,$img_url);
// array_push($date_results[$date],$temp);
// echo var_dump($date_results[$date]);
while ($stmt2->fetch()) {
    $temp = array(
        "place_name" => $place_name,
        "place_addr" => $place_addr,
        "place_id" => $place_id,
        "start_time" => $start_time,
        "end_time" => $end_time,
        "img_url" => $img_url
    );
    if(!empty($date_results[$date])){
        array_push($date_results[$date],$temp);
    }else {
        $date_results[$date] = array($temp);
    }
}
// echo var_dump($date_results);
// foreach ($date_results as $key => $value){
//     echo $key."\n";
//     echo var_dump($value);
// }
    // echo $trip_title." , ".$start_date." , ".$end_date;
$stmt2->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>收藏景點</title>

    <!-- basic bootstrap setting -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- sidebar setting -->
    <link href="lib/css/simple-sidebar.css" rel="stylesheet">
    <!-- webfont setting-->
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="trip.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet">
</head>

<body style="background-color:#ebebeb">

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:white">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card mt-4" style="background-color:#5b88fc">

                              <div class="card-body">

                                  <img src="res/user1.png" width="80%" style="display: block;margin:0 auto;">
                              </div>


                              <div class="card-footer d-flex justify-content-center"style="background-color:gray;">
                                  <small style="color:white;">賬戶名</small>
                              </div>

                      </div>
                  </div>
              </div>
          </div>
          <div class="container mt-4">
            <div class="card mt-4">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="home.html">我的行程</a>
            </div>
            <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc" href="love.html">收藏景點</a>
              </div>
                <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc" href="login.html">登出</a>
              </div>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <nav class="navbar navbar-light " style="background-color:#5b88fc">
            <a href="#menu-toggle" class="btn btn-sm btn-secondary" id="menu-toggle"><img src="res/menu.png" height="20px"></a>
            <div class="container">

                <div class="navbar-header">
                <!-- Logo -->
                    <div>
                        <a><img class="img-responsive"src="res/logo.png" height="80px"align="center"></a>
                        <a><img class="img-responsive"src="res/name3.png" height="70px" align="center"></a>
                    </div>
                </div><!-- / .navbar-header -->
                <div class="input-group col-lg-4">
                    <input type="search" class="form-control" placeholder="搜索">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><img src="res/search.png" height="30px"></button>
                    </span>
                </div>
            </div>
        </nav>
        <div class="trip">
            <div id="trip-container">
                <div class="trip-title">
                    <img src="res/landscape1.jpg" class="trip-title-background"/>
                    <img src="res/dog2.jpg" class="trip-title-profile-img"/>
                    <input id="trip-title-font" placeholder="行程標題" value="<?php echo $trip_title ?>">
                    <div id="trip-title-datetime">
                        <input  id="trip-title-dep-day" type="text" style="color:white; font-size:200%;" placeholder="出發日期" value="<?php echo $start_date ?>">
                        <span style="font-size:200%;">~</span>
                        <span style="font-size:200%;" id="trip-title-back-day"><?php echo $end_date ?></span>
                    </div>
                </div>
                <ul id="trip-day-list">
                    <?php foreach ($date_results as $date_key => $trip_detail){?>
                        <li>
                            <div class="trip-day">
                                <a href="#<?php echo $date_key ?>-collapse"  data-toggle="collapse" aria-expanded="false" aria-controls="day1-spot-list">
                                    <span class="day-flag" id="day-flag-comp"><?php echo str_replace("-","/",$date_key) ?></>
                                </a>
                                <div id="<?php echo $date_key ?>-collapse" class="collapse">
                                    <ul class="trip-list">
                                        <?php foreach ($date_results[$date_key] as $detail){?>
                                            <li>
                                              <div  class="trip-cell">
                                                  <ul class="trip-list-number" style="float:left;">
                                                    <li><input class="timepicker" value="<?php echo $detail["start_time"] ?>"></li>
                                                    <li><i class="fas fa-map-marker-alt fa-3x"></i></li>
                                                    <li><input class="timepicker" value="<?php echo $detail["end_time"] ?>"></li>
                                                  </ul>
                                                  <div class="trip-list-title" >
                                                      <img class="trip-list-title-img" src="<?php echo $detail["img_url"] ?>"></img>
                                                      <dummy>
                                                          <p class="trip-list-title-name"><?php echo $detail["place_name"] ?></p>
                                                          <p class="trip-list-title-addr"><?php echo $detail["place_addr"] ?></p>
                                                      </dummy>
                                                      <i class="fas fa-times-circle fa-3x deleteSpot" onclick="deleteSpot(this.parentElement.parentElement.parentElement)"></i>
                                                      <i class="fas fa-car fa-3x drive-dir-btn"></i>
                                                      <small hidden ><?php echo $detail["place_id"] ?></small>
                                                  </div>
                                                  <ul class="sort-btns">
                                                      <li onclick="moveUp(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-up fa-5x" ></i></li>
                                                      <li onclick="moveDown(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-down fa-5x" ></i></li>
                                                  </ul>
                                              </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="trip-list-addbtn"><i class="fas fa-plus-square fa-3x">新增旅遊景點</i></div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
    <i class="fas fa-plus-circle fa-7x" id="addDayBtn" title="新增行程天數"></i>
    <i class="far fa-save fa-7x" id="saveBtn" title="儲存行程"></i>
    <div id="dialog" style="display:none;">
        <!-- <input id="autocomplete" placeholder="Enter your address" type="text" class="controls"> -->
        <div class="input-group" id="searchBar">
          <input type="text" class="form-control" placeholder="搜尋景點" aria-label="搜尋景點" id="autocomplete">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">Go!</button>
          </span>
        </div>
        <div id="closeMapIcon"><i class="fa fa-window-close fa-5x" aria-hidden="true"></i></div>
        <div id="map"></div>
        <div id="listing">
          <table id="resultsTable">
            <tbody id="results"></tbody>
          </table>
        </div>
        <div style="display: none">
          <div id="info-content">
            <table class=".table-striped">
              <tr id="iw-url-row" class="iw_table_row">
                <td id="iw-icon" class="iw_table_icon"></td>
                <td id="iw-url"></td>
              </tr>
              <tr id="iw-address-row" class="iw_table_row">
                <td class="iw_attribute_name">Address:</td>
                <td id="iw-address"></td>
              </tr>
              <tr id="iw-phone-row" class="iw_table_row">
                <td class="iw_attribute_name">Telephone:</td>
                <td id="iw-phone"></td>
              </tr>
              <tr id="iw-rating-row" class="iw_table_row">
                <td class="iw_attribute_name">Rating:</td>
                <td id="iw-rating"></td>
              </tr>
              <tr id="iw-website-row" class="iw_table_row">
                <td class="iw_attribute_name">Website:</td>
                <td id="iw-website"></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
    <div style="display:none;" id="trip-cell-comp">
        <li>
          <div  class="trip-cell">
              <ul class="trip-list-number" style="float:left;">
                <li><input class="timepicker"></li>
                <li><i class="fas fa-map-marker-alt fa-3x"></i></li>
                <li><input class="timepicker"></li>
              </ul>
              <div class="trip-list-title" >
                  <img class="trip-list-title-img"></img>
                  <dummy></dummy>
                  <i class="fas fa-times-circle fa-3x deleteSpot" onclick="deleteSpot(this.parentElement.parentElement)"></i>
                  <i class="fas fa-car fa-3x drive-dir-btn"></i>
                  <small hidden ></small>
              </div>
              <ul class="sort-btns">
                  <li onclick="moveUp(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-up fa-5x" ></i></li>
                  <li onclick="moveDown(this.parentElement.parentElement.parentElement)"><i class="fas fa-sort-down fa-5x" ></i></li>
              </ul>
          </div>
      </li>
    </div>
    <div id="trip-day-comp" style="display:none">
        <li>
            <div class="trip-day">
                <a href="#trip-list-comp-collapse"  data-toggle="collapse" aria-expanded="false" aria-controls="day1-spot-list">
                    <span class="day-flag" id="day-flag-comp"></>
                </a>
                <div id="trip-list-comp-collapse" class="collapse">
                    <ul class="trip-list" id="trip-list-comp">
                    </ul>
                    <div class="trip-list-addbtn"><i class="fas fa-plus-square fa-3x">新增旅遊景點</i></div>
                </div>
            </div>
        </li>
    </div>
    <!-- <footer class="py-5 bg-dark">
            <div>
                <p class="m-0 text-center text-white">Thank you</p>
            </div>
    </footer> -->
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQoy_tqD6vBnTFbPqpiezn3aUIGjGsOsU&libraries=places&callback=initMap"  async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"> </script>
    <script src="lib/js/trip.js"></script>

</body>

</html>
