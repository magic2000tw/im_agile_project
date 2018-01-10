<?php include("dbconnect.php");?>

<?php
$query_blog = "SELECT * FROM blog ORDER BY Id ASC";
$blog = mysqli_query($conn, $query_blog) or die(mysqli_error());
$row_blog = mysqli_fetch_assoc($blog);
$totalRows_cn_blog = mysqli_num_rows($blog);
?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>遊記後台管理</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
              <a class="btn text-left" style="color:white;background-color:#5b88fc"href="home.html">我的行程</a>
            </div>
            <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc"href="love.html">收藏景點</a>
              </div>
              <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc"href="blog.php">遊記專區</a>
              </div>
              <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc"href="blog_admin.php">遊記後台管理</a>
              </div>
                <div class="card mt-1">
                <a class="btn text-left" style="color:white;background-color:#5b88fc"href="login.html">登出</a>
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

          <div class="row">
            <div class="col-lg-12">
                  <div class="box">
                      <header>
                          <div class="icons"><i class="fa fa-table"></i></div>
                          <h5>遊記管理</h5><p>    </p><a href="blog_add.php"><input type="submit" value="新增文章"></a>
                      </header>
                      <div id="collapse4" class="body">
                         
                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                              <thead>
                                <tr>
                                  <th>編號</th>
                                  <th>標題</th>
                                  <th>分類</th>
                                  <th>修改</th>
                                  <th>刪除</th>
                                </tr>
                                </thead>
                              <tbody>
                               <?php do { ?>
                                <tr>
                                  <td><?php echo $row_blog['Id']; ?></td>
                                  <td><?php echo $row_blog['Title']; ?></td>
                                  <td><?php echo $row_blog['Member_id']; ?></td>
                                  <td><a href="blog_edit.php?Id=<?php echo $row_blog['Id']; ?>">Edit</a></td>
                                  <td><a href="blog_del.php?Id=<?php echo $row_blog['Id']; ?>">刪除</a>
</td>
                                  </tr>
                                <?php } while ($row_blog = mysqli_fetch_assoc($blog)); ?>
                              </tbody>
                            </table>
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