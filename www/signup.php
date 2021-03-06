<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>註冊</title>

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
            <div class="card mt-3 mb-4" style="margin:0 auto;">
                <div class="card-header">註冊</div>
                <div class="card-body">
        <form action="signUpControl.php" method="post">
            <div class="row">
                <div class="container">
                    <div class="form-group">
                        <label>用戶名</label>
                        <input type="text" name="userName" class="form-control" placeholder="輸入用戶名">
                    </div>
                    <div class="form-group">
                        <label>電子郵件</label>
                        <input type="email" name="loginMail" class="form-control" placeholder="輸入電子郵件">
                    </div>
                    <div class="form-group">
                        <label>設立帳密</label>
                        <input type="password" name="password" class="form-control" placeholder="輸入帳密">
                    </div>
                    <button type="submit" class="btn btn-sm" >立即註冊</button>
                    <button type="button" class="btn btn-sm" onclick="window.location='login.php'">返回</button>
                </div>
            </div>
        </form>
    </div></div></div></div>
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
