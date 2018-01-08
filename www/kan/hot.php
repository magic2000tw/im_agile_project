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

    <title>人氣景點</title>
    
    <!-- basic bootstrap setting -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- sidebar setting -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- webfont setting-->
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <style>

        body{
            font-family: 'Pangolin', cursive;
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
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="myTrip.php">我的行程</a>
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
            <a href="#menu-toggle" class="btn btn-sm btn-secondary" id="menu-toggle"><img src="menu.png" height="20px"></a>
            <div class="container">

                <div class="navbar-header">
                <!-- Logo -->
                    <div>
                        <a href="hot.php"><img class="img-responsive"src="logo.png" height="80px"align="center"></a>
                        <a href="hot.php"><img class="img-responsive"src="name3.png" height="50px" align="center"></a>
                    </div>
                </div><!-- / .navbar-header -->
                <div class="input-group col-lg-4">
                    <input type="search" class="form-control" placeholder="搜索">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><img src="search.png" height="30px"></button>
                    </span>
                </div>
            </div>
        </nav>
        <div class="container" style="background-color:white">
            <a class="page-header col-md-4 mt-2" style="font-size:50px;font-weight:bold;color:#5b88fc" >人氣景點</a>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="card mb-2" >
                        <div class="card-img-top" style="height:300px;overflow:hidden"> 
                          <img src="http://placehold.it/100x100" width="100%"/>
                        </div>
                        <div class="card-body" >
                          <h4>景點名稱</h4>
                          <small>瀏覽次數：</small>
                          <a href="#" class="btn btn-primary btn-sm">查看</a>
                          <a href="#" class="btn btn-success btn-sm">收藏</a>
                        </div>
                    </div>

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
