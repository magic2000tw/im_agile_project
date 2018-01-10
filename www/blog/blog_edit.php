<?php include("dbconnect.php");?>

<?php
$Id = $_GET['Id'];
$edit_sql = mysqli_query($conn,"SELECT * FROM `blog` WHERE `Id`=$Id");
$row = mysqli_fetch_array($edit_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>遊記編輯</title>
    <!-- 文字 -->
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
    <div id="bodydiv" alt="內容">
        <h1>文章編輯</h1>
        <form action="" name="form1" method="POST" id="blog">
            <label for="Title">標題:</label>
            <input name="Title" type="text" id="Title" value="<?php echo $row['Title'];?>" >
            <label for="Member_id">會員:</label>
            <input name="Member_id" type="text" id="Member_id" value="<?php echo $row['Member_id'];?>">
            <label for="date">日期:</label>
            <input type="date" name="Date" id="today" value="<?php echo $row['Date'];?>">
            <textarea name="Content" cols="83" rows="15" id="Content"><?php echo $row['Content'];?></textarea><br>
            <label for="Pic">圖片:</label>
            <input name="Pic" type="text" id="Pic" value="<?php echo $row['Pic'];?>">
            <a href="update.php?Id=<?php echo $row['Id'];?>"><input value="更新" type="submit" onclick="form1.action='update.php?Id=<?php echo $row['Id'];?>';form1.submit();"/></a>
        </form>
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
    <!-- 文字 -->
    <script src="dist/js/medium-editor.js"></script>
    <script>

        $('#edit').html();
        $('#save').on('click', function () {
            console.log( $('#edit').html());
                });
    </script>
</body>
</html>