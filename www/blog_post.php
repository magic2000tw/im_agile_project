<?php include("dbconnect.php");?>

<?php 
$id = $_GET['Id'];//接收Id

$query_blog = "SELECT * FROM blog WHERE Id = $id";
$sql = mysqli_query($conn,$query_blog) or die(mysqli_error());
$row = mysqli_fetch_assoc($sql);

// $sql = mysql_query("SELECT * FROM `blog` WHERE `Id`=$id");
// $row = mysql_fetch_array($sql);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>遊記文章 - <?php echo $row['Title'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <style>
        body{
            font-family: 'Pangolin', cursive;
        }

        #bodydiv{
          padding-left: 50px;
        }
    </style>
</head>
<body style="background-color:#ebebeb">
  <div id="wrapper">
    <div id="sidebar-wrapper" style="background-color:white">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="card mt-4" style="background-color:#5b88fc">
                      
                          <div class="card-body">
                              
                              <img src="img/user1.png" width="80%" style="display: block;margin:0 auto;">
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
        <a href="#menu-toggle" class="btn btn-sm btn-secondary" id="menu-toggle"><img src="img/menu.png" vertical-align="center" height="20px"></a>
        <div class="container" >

            <div class="navbar-header">
            
                <div>
                    <a><img class="img-responsive"src="img/logo.png" height="80px"align="center"></a>
                    <a><img class="img-responsive"src="img/name3.png" height="50px" align="center"></a>
                </div>
            </div>
            <div class="input-group col-lg-4">
                <input type="search" class="form-control" placeholder="搜尋">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button"><img src="img/search.png" height="30px"></button>
                </span>
            </div>
        </div>
    </nav>
    <div id="bodydiv" alt="內容">
      <div class="container col-md-8" style="background-color:white">
        <div id="blog" class="section blog-classic">
          <div class="row">
            <div class="container mt-3 ml-2">
              <a href="../kan/blog.php" class="btn btn-small">返回</a>
              <a href="#" class="btn btn-small ml-2">追蹤</a>
              <a href="#" class="btn btn-small ml-2">加入我的行程</a>
            </div>
              
            <div class="col-md-12 mb-sm-160">
              
              <!-- Blog Post -->
              <div class="col-md-12 blog-post" data-wow-delay=".1s" data-wow-duration="2s">

                <!-- Image -->
                <img class="post-img" src="img/<?php echo $row['Pic'];?>.jpg" alt="image" style="width:100%">

                <!-- Meta data -->
                <div class="post-meta">
                    <span><?php echo $row['Date'];?></span>
                </div><!-- / .meta -->
                <!-- Title -->
                <h2 class="post-title"><?php echo $row['Title'];?></h2>
                <div class="content-post">
                  <!-- Intro -->
                  <?php echo $row['Content'];?>
                </div>
                
              </div><!-- / .blog-post-single -->
            </div>
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