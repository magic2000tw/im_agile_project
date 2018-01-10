
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