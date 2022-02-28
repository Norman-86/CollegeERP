<?php 
    include'include/session.php';
    
    $tableName='assignedunit';
    $tableName1='assignment';
    $tableName3='supplier';
    $tableName4='exam';
    
    $sql = "SELECT COUNT(*) as num FROM $tableName WHERE staffID=".$staffID; 
    $t_p = mysql_fetch_array(mysql_query($sql));
    $total_pages = $t_p['num'];
    
    
    $sql1 = "SELECT COUNT(*) as num FROM $tableName1 WHERE staffID=".$staffID; 
    $t_p1 = mysql_fetch_array(mysql_query($sql1));
    $totalAssignments = $t_p1['num'];
    
    
    $sql3 = "SELECT COUNT(*) as num FROM $tableName3 "; 
    $t_p3 = mysql_fetch_array(mysql_query($sql3));
    $total_pages3 = $t_p3['num'];
    
    $sql4 = "SELECT COUNT(*) as num FROM $tableName4 WHERE staffID=".$staffID; 
    $t_p4 = mysql_fetch_array(mysql_query($sql4));
    $total_exam = $t_p4['num'];
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Lecturer | WAKA CMEC</title>
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

<body style="background-color:rgb(252,252,252);">
    <div></div>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:rgb(62,140,228);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="color:rgb(255,255,255);"> 
                    <a href="#" style="font-weight:bold;color:rgb(254,254,254);">Lecturer | WAKA CMEC</a>
                </li>
                <li style="color:rgb(252,253,254);"> 
                    <a class="bg-info">Home</a>
                    <a href="course-work.php" style="color:rgb(255,255,255);">Course Work</a>
                    <!--<a href="timetable.php" style="color:rgb(255,255,255);">Time Table</a>-->
                    <a href="view-assignments.php" style="color:rgb(255,255,255);">View Assignments</a>
                    <a href="exam.php" style="color:rgb(255,255,255);">View Exam</a>
                    <a href="assigned-units.php" style="color:rgb(255,255,255);">View Units</a>
                </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="dropdown" style="width:150px;float:right;margin-top:5px;">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width:150px;background-color:rgb(252,252,252);color:rgb(20,19,19);border:1px solid rgb(252,252,252);text-align:right;"><i class="fa fa-user"></i> &nbsp; <?php echo $lec;?> <span class="caret"></span></button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="settings.php"><i class="fa fa-wrench"></i> &nbsp;Settings</a></li>
                        <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
                    </ul>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12">
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="panel panel-default panel-table">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col col-xs-12">
                                                        <h3 class="panel-title">
                                                            <em class="fa fa-dashboard"></em> 
                                                            <b>Dahboard</b>
                                                         </h3>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row bg-info" style="margin:5px;padding:0px;margin-bottom:4%;">
                                                <div class="col col-xs-12 text-center" style="margin:0px;padding:0px;color:#000000;">
                                                    <div class="col col-xs-3" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Units</h3>
                                                        <hr>
                                                        <p>
                                                            <?php 
                                                                if($total_pages > 999 && $total_pages <= 999999) {
                                                                    echo number_format(($total_pages / 1000),1). ' K';
                                                                }else
                                                                if($total_pages > 999999 && $total_pages <= 999999999) {
                                                                    echo number_format(($total_pages / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages > 999999999 && $total_pages <= 999999999999) {
                                                                    echo number_format(($total_pages / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages > 999999999999 && $total_pages <= 999999999999999) {
                                                                    echo number_format(($total_pages / 1000000000000),1). ' T';
                                                                }else {echo $total_pages;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="assigned-units.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-search"></i> View</p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-3" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Assignments</h3>
                                                        <hr>
                                                        <p>
                                                            <?php 
                                                                if($totalAssignments > 999 && $totalAssignments <= 999999) {
                                                                    echo number_format(($totalAssignments / 1000),1). ' K';
                                                                }else
                                                                if($totalAssignments > 999999 && $totalAssignments <= 999999999) {
                                                                    echo number_format(($totalAssignments / 1000000),1). ' M';
                                                                }else
                                                                if($totalAssignments > 999999999 && $totalAssignments <= 999999999999) {
                                                                    echo number_format(($totalAssignments / 1000000000),1). ' B';
                                                                }else
                                                                if($totalAssignments > 999999999999 && $totalAssignments <= 999999999999999) {
                                                                    echo number_format(($totalAssignments / 1000000000000),1). ' T';
                                                                }else {echo $totalAssignments;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="upload-assignment.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-upload"></i> Upload</p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-3" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Exams</h3>
                                                        <hr>
                                                        <p class="text-info">
                                                            <?php 
                                                                if($total_exam > 999 && $total_exam<= 999999) {
                                                                    echo number_format(($total_exam / 1000),1). ' K';
                                                                }else
                                                                if($total_exam > 999999 && $total_exam <= 999999999) {
                                                                    echo number_format(($total_exam / 1000000),1). ' M';
                                                                }else
                                                                if($total_exam > 999999999 && $total_exam <= 999999999999) {
                                                                    echo number_format(($total_exam / 1000000000),1). ' B';
                                                                }else
                                                                if($total_exam > 999999999999 && $total_exam <= 999999999999999) {
                                                                    echo number_format(($total_exam / 1000000000000),1). ' T';
                                                                }else {echo $total_exam;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="exam.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-search"></i> View</p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-3" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Units</h3>
                                                        <hr>
                                                        <p class="text-info">
                                                            <?php 
                                                                if($total_pages > 999 && $total_pages <= 999999) {
                                                                    echo number_format(($total_pages / 1000),1). ' K';
                                                                }else
                                                                if($total_pages > 999999 && $total_pages <= 999999999) {
                                                                    echo number_format(($total_pages / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages > 999999999 && $total_pages <= 999999999999) {
                                                                    echo number_format(($total_pages / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages > 999999999999 && $total_pages <= 999999999999999) {
                                                                    echo number_format(($total_pages / 1000000000000),1). ' T';
                                                                }else {echo $total_pages;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="assigned-units.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-search"></i> View</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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
    
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>