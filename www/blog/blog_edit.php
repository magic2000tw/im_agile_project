<?php include("connections/connections.php");?>

<?php
$id = "-1";//接收Id
if (isset($_GET['Id'])) {
  $id = $_GET['Id'];
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
  {
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "blog")) {
  $updateSQL = sprintf("UPDATE blog SET Title=%s, Content=%s, Member_id=%s, Date=%s, Pic=%s WHERE Id=%s",
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Content'], "text"),
                       GetSQLValueString($_POST['Member_id'], "text"),
                       GetSQLValueString($_POST['Date'], "date"),
                       GetSQLValueString($_POST['Pic'], "text"));
                       //GetSQLValueString($_POST['Id'], "int"));


  $Result1 = mysql_query($updateSQL, $link) or die(mysql_error());

  $updateGoTo = "blog_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

// $colname_cn_user = "-1";
// if (isset($_SESSION['MM_Username'])) {
//   $colname_cn_user = $_SESSION['MM_Username'];
// }
// mysql_select_db($db_name, $blog_cn);
// $query_cn_user = sprintf("SELECT * FROM `user` WHERE Login_id = %s", GetSQLValueString($colname_cn_user, "text"));
// $cn_user = mysql_query($query_cn_user, $blog_cn) or die(mysql_error());
// $row_cn_user = mysql_fetch_assoc($cn_user);
// $totalRows_cn_user = mysql_num_rows($cn_user);

$query_cn_blog = sprintf("SELECT * FROM blog WHERE Id = $id", GetSQLValueString($id, "int"));
$edit_sql = mysql_query($query_cn_blog, $link) or die(mysql_error());
$row = mysql_fetch_assoc($edit_sql);

// $edit_sql = mysql_query("SELECT * FROM `blog` WHERE `Id`=$id");
// $row = mysql_fetch_array($edit_sql);
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
        <form action="<?php echo $editFormAction; ?>" method="POST" name="blog" id="blog">
            <label for="Title">標題:</label>
            <input name="Title" type="text" id="Title" value="<?php echo $row['Title'];?>" >
            <label for="Member_id">會員:</label>
            <input name="Member_id" type="text" id="Member_id" value="<?php echo $row['Member_id'];?>">
            <label for="date">日期:</label>
            <input type="date" name="Date" id="today" value="<?php echo $row['Date'];?>">
            <textarea name="Content" cols="83" rows="15" id="Content"><?php echo $row['Content'];?></textarea><br>
            <label for="Pic">圖片:</label>
            <input name="Pic" type="text" id="Pic" value="<?php echo $row['Pic'];?>">
            <input type="submit" name="up" id="up" value="送出">
            <input type="hidden" name="MM_update" value="blog">
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
        // var editor = new MediumEditor('.editable', {
        //         toolbar: {
        //             buttons: ['bold', 'italic', 'underline', 'strikethrough', 'quote', 'anchor',  'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'superscript', 'subscript', 'orderedlist', 'unorderedlist', 'pre', 'removeFormat', 'outdent', 'indent','h1', 'h2', 'h3', 'h4'],
        //         },
        //         buttonLabels: 'fontawesome',
        //         anchor: {
        //             targetCheckbox: true
        //         }
        //     });
        // var editor = new MediumEditor('.editable');
        
        // $(function () {
        //     $('.editable').mediumInsert({
        //         editor: editor,
        //         addons: {
        //             images: {
        //                 fileUploadOptions: {
        //                     url: 'upload.php'
        //                 }
        //             }
        //         }
        //     });
        // });

        //抓取輸入框內容
        $('#edit').html();
        $('#save').on('click', function () {
            console.log( $('#edit').html());
                });
    </script>
</body>
</html>