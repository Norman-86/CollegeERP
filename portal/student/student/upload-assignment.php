<?php 
    include'include/session.php';
    
    $tableName="view_assignment";
    
     if(isset($_GET['id'])){
        $id = mysql_real_escape_string($_GET['id']);
        
        $sql = "SELECT *
                FROM $tableName
                WHERE courseID ='$course'
                AND YOS ='$yos'
                AND semister='$sem' 
                AND startDate <= NOW()
                AND assignmentID='$id'
                ORDER BY assignmentID ASC";
        $query = mysql_query($sql);
        $rowcount=  mysql_num_rows($query);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Assignment | Student | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit1.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
</head>

<body style="background-color:rgba(42,63,84,0);">
    <nav class="navbar navbar-default" style="background-color:rgb(52,73,94);">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">Student | Waka CMEC Training Institute</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(52,73,94);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?>  <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="password.php"><i class="fa fa-lock fa-w"></i> Password</a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i> Logout </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav visible-xs-block visible-sm-block" id="mobile-nav">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> </i> <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="password.php"><i class="fa fa-lock fa-fw"></i> Password</a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i> Logout </a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="top">
        <nav class="navbar navbar-default" id="navbar-main">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand hidden navbar-link" href="#" style="padding:0px;"> </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation">
                            <a href="index.php">
                                <i class="fa fa-table" style="margin-right:5px;"></i>
                                Dashboard
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="assignments.php">
                                <i class="fa fa-bookmark" style="margin-right:5px;"></i>
                                Assignments
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="unit.php">Units</a>
                        </li>
                        <li role="presentation">
                            <a href="coursework.php">Course Work</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>   
    <div class="row" style="width:100%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;max-width:960px;">
        
        <form method="POST" enctype="multipart/form-data">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-upload"></i> &nbsp;Submit Assignment</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    
                    <?php 
                        if(isset($_SESSION['success'])=="true"){
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-success">Assignment Successfully Submitted</span>
                                            </div>';
                                        unset($_SESSION['success']); 
                                    }
                            if(!isset($_GET['id'])){
                                echo'<div class="col-md-12 alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">Error eccured. Select Assignment to submit</span>
                                    </div>';
                            }else
                            if(empty($query)){
                                echo'<div class="col-md-12 alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">No records found</span>
                                    </div>';
                            }else{ 
                            include'validate/upload-assignment.php';
                            while ($row = mysql_fetch_array($query)) {
                    ?>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group bg-info">
                                <label class="text-info" style="margin:5px;font-weight:normal;">
                                    <i class="fa fa-info-circle"></i> &nbsp; For more than 1 files on an assignment, ensure to zip them.
                                    <br>
                                    <b>NB:</b> <b>1)</b> Only files of extensions; pdf, .doc, .docx, .ppt, .pptx, .xlsx, .xls, .rar, .zip are allowed
                                    <br>
                                    <i class="fa fa-fw"></i> &nbsp; <b>2)</b> Only last file uploaded before deadline will be marked. 
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Upload:</label>
                                <input type="hidden" name="deadline" class="form-control" value="<?php echo date_format(date_create($row['deadline']),"Y-m-d");?>" readonly="" hidden="" style="font-family:Roboto, sans-serif;font-weight:normal;" />
                                <input type="file" name="file" class="form-control" style="font-family:Roboto, sans-serif;font-weight:normal;" />
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-center">
                            <button name="upload" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Upload</button>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </form>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>