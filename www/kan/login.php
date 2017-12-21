<?php
session_start();
$_SESSION['sID'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>登入</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet"><style>
        body{
        font-family: 'Pangolin', cursive;
        }
    </style> -->
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <style>

        body{
            font-family: 'Pangolin', cursive;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        
        <!-- Page Content -->
        <nav class="navbar navbar-light " style="background-color:#5b88fc">
            <div class="container">
                <div class="navbar-brand">
                <!-- Logo -->
                    <div>
                        <a><img class="img-responsive"src="logo.png" width="15%" align="center"></a>
                        <a><img class="img-responsive"src="name3.png" width="50%" align="center"></a>
                    </div>
                
                </div><!-- / .navbar-header -->
                
            </div>
        </nav>
        <div class="container col-md-6">
            <div class="card mt-4 mb-4" style="margin:0 auto;">
                <div class="card-header" style="background-color:#ebebeb">登入</div>
                <div class="card-body">
                    <form method="post" action="https://localhost/pro/loginControl.php">
                        <input type="hidden" name="act" value="login">
                        <div class="form-group">
                            <label>用戶名/電郵</label>
                            <input type="text" class="form-control" name="loginMail"placeholder="輸入用戶名或電郵">
                        </div>
                        <div class="form-group">
                            <label>帳密</label>
                            <input type="password" class="form-control" name="password" placeholder="輸入密碼">
                        </div>
                        <button type="submit" class="btn col-md-2" >登入</button>
                        <button type="button" class="btn col-md-2" onclick="window.location='signup.html'">註冊</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
