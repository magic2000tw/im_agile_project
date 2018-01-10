<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("model.php");
$userid=$_SESSION['userid'];
$results=getUsername($userid);
$rss=mysqli_fetch_array($results);

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>我的行程</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    
    
    <!-- jQuery js -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
            
    
    <style>
        body{
            font-family: 'Pangolin', cursive;
        }
        .modal {
        }
        .vertical-alignment-helper {
            display:table;
            height: 100%;
            width: 100%;
            }
        .vertical-align-center {
            /* To center vertically */
            display: table-cell;
            height: 250px;
            width: 300px;
            vertical-align: middle;
            }
        .modal-content {
            /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
            width:inherit;
            height:inherit;
            /* To center horizontally */
            margin: 0 auto;
        }
        .font-vertical {
            width:"300";
            height:"300";
        }
    </style>
</head>

<body style="background-color:#ebebeb">
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:white">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card mt-4" style="background-color:#5b88fc">
                  <div class="card-img-top" style="overflow:hidden">
                    <?php
                    require_once("model.php");
                    $results=getUsername($_SESSION['userid']);
                    $rs=mysqli_fetch_array($results);
                    echo '
                    <img src="',$rs['profile_location'],'" width="100%" >';
                    ?>
                  </div>
                  <div class="card-footer d-flex justify-content-center"style="background-color:gray;">
                      <small style="color:white;font-size:30px"><?php echo $rss['userName'];?></small>
                  </div>
              
                </div>
              </div>
            </div>
          </div>
          <div class="container mt-4">
            <div class="card mt-4">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="home.php">我的行程</a>
            </div>
            <div class="card mt-1">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="love.php">收藏景點</a>
            </div>
            <div class="card mt-1">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="hot.php">人氣景點</a>
            </div>
            <div class="card mt-1">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="blog.php">遊記專區</a>
            </div>
            <div class="card mt-1">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="blog_admin.php">遊記後台管理</a>
            </div>
              <div class="card mt-1">
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="login.php">登出</a>
            </div>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <nav class="navbar navbar-light " style="background-color:#5b88fc">
            <a href="#menu-toggle" class="btn btn-sm btn-secondary" id="menu-toggle"><img src="menu.png" vertical-align="center" height="20px"></a>
            <div class="container" >

                <div class="navbar-header">
                
                    <div>
                        <a href="hot.php"><img class="img-responsive"src="logo.png" height="80px"align="center"></a>
                        <a href="hot.php"><img class="img-responsive"src="name3.png" height="50px" align="center"></a>
                    </div>
                </div>
                <div class="input-group col-lg-4">
                    <input type="search" class="form-control" placeholder="搜尋">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><img src="search.png" height="30px"></button>
                    </span>
                </div>
            </div>
        </nav>
        <div class="container col-md-8" style="background-color:white">
              <a class="page-header " style="font-size:50px;font-weight:bold;color:#5b88fc" >我的行程</a>
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" align="right" style="font-weight:bold;color:white" >新增</button>
            
            
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content" >
                        <div class="modal-header" style="color:white;background-color:#5b88fc">
                        </div>
                        <div class="modal-body">
                        <p>行程名稱：<input type="text" class="font-vertical" style="font-size:12px" name="tripName"></p>
                        <p>開始日期：<input type="text" id="datepicker1" align='center' valign="middle" style="font-size:12px" name="startdate"></p>
                        <script>
                            $("#datepicker1").datepicker();
                        </script>
                        <p>結束日期：<input type="text" id="datepicker2" style="font-size:12px" name="enddate" id="datepicker2"></p>
                        <script>
                            $("#datepicker2").datepicker();
                        </script>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-primary">確認</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <div class="row mt-2">
                <div class="col-md-12" >
                    <?php
                        require_once("model.php");
                        $userName=$rss['userName'];
                        $_SESSION['username'] = $userName;
                        $results=getmyTrip($userName);
                        while($rs=mysqli_fetch_array($results)){
                            echo "<div class='card mb-4'>
                                <div class='card-img-top ' style='height:250px;overflow:hidden'>
                                 <img src='",$rs['cover_location'],"' width='100%'> </div>
                                <div class='card-body'>
                                    <h4 class='card-title'>",$rs['name'],"</h4>
                                    <p class='card-text'>",$rs['about'],"</p>
                                    <a href='#'' class='btn btn-primary btn-sm'>查看</a>
                                </div>
                                    <div class='card-footer text-muted'>
                                        ",$rs['start_date']," 至 ",$rs['end_date'],"
                                    </div>
                                </div>";   
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <footer class="py-5 bg-dark">
            <div>
                <p class="m-0 text-center text-white">Thank you</p>
            </div>
        </footer>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
</body>

</html>
