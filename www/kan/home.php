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
              
                  <div class="card-body">
                      <?php
                      require_once("model.php");
                      $results=getUsername($_SESSION['userid']);
                      $rs=mysqli_fetch_array($results);
                      echo '
                      <img src="',$rs['profile_location'],'" width="70%" style="display: block;margin:0 auto;">';
                      ?>
                  </div>
              
              
                  <div class="card-footer d-flex justify-content-center"style="background-color:gray;">
                      <small style="color:white;"><?php echo $rss['userName'];?></small>
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
                        <a><img class="img-responsive"src="logo.png" height="80px"align="center"></a>
                        <a><img class="img-responsive"src="name3.png" height="50px" align="center"></a>
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
            <h2 class="page-header col-md-4 mt-2" style="font-weight:bold;color:#5b88fc" >我的行程</h2><button type="button" class="btn btn-sm btn-success mt-2" align="right
            " style="font-weight:bold;color:white" >新增</button>
            
            <div class="row mt-2">
                <div class="col-md-8" >
                    <?php
                        require_once("model.php");
                        $userName=$rss['userName'];
                        $_SESSION['username'] = $userName;
                        $results=getmyTrip($userName);
                        while($rs=mysqli_fetch_array($results)){
                            echo "<div class='card mb-4'>
                                <img class='card-img-top ' style='height:250px;overflow:hidden' src='",$rs['cover_location'],"'>
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
