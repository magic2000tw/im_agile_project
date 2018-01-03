<?php include("dbconnect.php");?>
<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("model.php");
$userid=$_SESSION['userid'];
$results=getUsername($userid);
$rss=mysqli_fetch_array($results);

?>
<?php 
//頁碼
if(isset($_GET['blog_Id'])){   
        $blog_Id = $_GET['blog_Id'];
        $sql_count = mysqli_query($conn,"SELECT * FROM `blog` WHERE `Id` = $blog_Id");
}else{
        $sql_count = mysqli_query($conn,"SELECT * FROM `blog`");
}    
//echo mysql_errno() . ": " . mysql_error(). "\n";
$total_count = mysqli_num_rows($sql_count);      //總筆數
$page_num = 6;                    //預設產品數
$total_page = ceil($total_count/$page_num);     //總頁數
$mod_num = fmod($total_count,$page_num);        //取餘數
$per_count = $page_num;           //每頁筆數
$start = 0;                       //起始資料序號
$end = $page_num;                 //取得瀏覽頁數,沒有則設為第一頁

if(isset($_GET['blog_Id'])){ 
  
  if(isset($_GET['page'])){
              $page = $_GET['page'];
              if ($page!=""){ $page=$_GET['page'];}else{  $page=1;}
              $begin = ($page-1) * $page_num; 
              $sql = mysqli_query("SELECT * FROM blog WHERE Id=$blog_Id ORDER BY Id ASC LIMIT $begin,$per_count");
          }else {
              $sql = mysqli_query("SELECT * FROM blog WHERE Id=$blog_Id ORDER BY Id ASC LIMIT $per_count");
          }
  
             
if(isset($_GET['start'],$_GET['end'])){
                        $start = $_GET['start']+1;
                        if($_GET['page'] == $total_page){
                              $end = $total_count;                                                          
                        }else{
                              $end = $_GET['end']+1;
                        }
                    }else{
                        $start=1;
                        $end=$page_num;
                       }
}else{
  if(isset($_GET['page'])){
                $page = $_GET['page'];
                if ($page!=""){ $page=$_GET['page'];}else{  $page=1;}
                $begin = ($page-1) * $page_num; 
                $sql = mysqli_query($conn,"SELECT * FROM `blog` ORDER BY `Id` ASC LIMIT $begin,$per_count");
            }else{
                $sql = mysqli_query($conn,"SELECT * FROM `blog` ORDER BY `Id` ASC LIMIT $per_count");
               }            
  if(isset($_GET['start'],$_GET['end'])){
                          $start = $_GET['start']+1;
                          if($_GET['page'] == $total_page){
                                  $end = $total_count;                                                          
                            }else{
                                $end = $_GET['end']+1;
                            }
                      }else{
                            $start=1;
                          $end=$page_num;
                      }
}//else的
?>

<!doctype html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>遊記專區</title>

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
                        <a href="hot.php"><img class="img-responsive"src="img/logo.png" height="80px"align="center"></a>
                        <a href="hot.php"><img class="img-responsive"src="img/name3.png" height="50px" align="center"></a>
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
            <!-- ========== Blog Posts ========== -->
          <div class="container col-md-8" style="background-color:white">
            <a class="page-header " style="font-size:50px;font-weight:bold;color:#5b88fc" >遊記專區</a>
              
            <div class="col-md-8 mt-2" >
              
              <?php while($row=mysqli_fetch_array($sql)){?>
              <!-- Blog Post 1 -->
              <div class="col-md-12">
                <div class="blog_post" data-wow-delay=".1s" data-wow-duration="2s">
                <!-- Image -->
                <a href="blog_post.php?Id=<?php echo $row['Id'];?>" class="post-img"><img src="img/<?php echo $row['Pic'];?>.jpg" alt="image"></a>
                <div class="bp-content">              
                  <!-- Meta data -->
                      <span><?php echo $row['Date'];?></span>
                  <!-- Post Title -->
                  <a href="blog_post.php?Id=<?php echo $row['Id'];?>" class="post-title"><h3><?php echo $row['Title'];?></h3></a>
                  <!-- <div class="content">
                    <?php echo $row['Content'];?>
                  </div> -->
                  <a href="blog_post.php?Id=<?php echo $row['Id'];?>" class="btn btn-small">Read More</a>
                </div><!-- / .bp-content -->
                </div><!-- / .blog-post -->
              </div><!-- / .col-md-12 --> 
              <?php } ?>       
              
              <!-- Pagination -->
              <nav class="page">
                <ul class="pagination">
                  <?php  
                for($i=1; $i<=$total_page;$i++){  
                  $start = ($i-1)*$page_num;    //每頁起始資料序號
                  $end = $start + $page_num-1;  //每頁結束資料序號  ?>
                       <li style="border:1px #666 solid;" align="center"><a href="blog.php?page=<?php echo $i;?><?php if(isset($blog_Id)){echo "&blog_Id=$blog_Id";}?>">&nbsp;&nbsp;<?php echo $i;?>&nbsp;&nbsp;</a></li>
                      &nbsp;&nbsp;&nbsp;                  
                  <?php }?>
                </ul>
              </nav>
            </div><!-- / .col-md-8 -->
          </div><!-- / .row -->
        </div><!-- container -->
        </div><!-- / .container -->
      </div>



        <!-- ========== Footer ========== -->
        
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
