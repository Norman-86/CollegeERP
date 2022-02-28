<?php 
    ob_start();
    session_start();
    if(isset($_SESSION['studentID']))
    { 
        header("location:student/index.php");
    }
    include '../../db_connect.php';
    date_default_timezone_set("Africa/Nairobi");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | WAKA Student Portal</title>
    <link rel="shortcut icon" href="../../assets/img/logo.png" />
    
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-header  navbar-default navbar-static-top   page-nav-header">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="#">
                        WAKA CMEC | Student Portal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-right">                        
                        <li><a href="#" >Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
    <br><br><br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-md-offset-2 login-box">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div id="login-box-heading" class="panel-heading">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <?php include 'validate/login.php';?>
                                <div class="form-group">
                                    <label for="email" class="control-label col-md-4 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" required value="<?php echo $username;?>" class="form-control change" id="user" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label col-md-4">Password </label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" value="<?php echo $pass;?>" required class="form-control change" id="password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-primary" name="submit" type="submit">Login </button>
                                        <a href="forgot-password" class="btn btn-link">Forgot Your Password?</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>