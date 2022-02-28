<?php 
    include'include/session.php';
    
    $tableNamex="staff";
    $tableName="student";
    $tableName1="admitted";
    $tableName2="alumni";
    $tableName3="faculty";
    $tableName4="course";
    $tableName5="studentFee";
    $tableName6="unit";
    $tableName7="coursework";
    $tableName8="semisterPeriod";
    
    $sqlx = "SELECT COUNT(*) as num FROM $tableNamex WHERE category != 'Principal'"; 
    $pagesx = mysql_fetch_array(mysql_query($sqlx));
    $totalStaff = $pagesx['num'];
    
    $sql8 = "SELECT start,end FROM $tableName8 ORDER BY periodID DESC LIMIT 1"; 
    $pages8 = mysql_fetch_array(mysql_query($sql8));
    
    $sql = "SELECT COUNT(*) as num FROM $tableName WHERE status='Pre-Admitted' "; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $totalPreAdmitted = $pages['num'];
    
    $sql1 = "SELECT COUNT(*) as num FROM $tableName1"; 
    $pages1 = mysql_fetch_array(mysql_query($sql1));
    $totalAdmitted = $pages1['num'];
    
    $sql2 = "SELECT COUNT(*) as num FROM $tableName2"; 
    $pages2 = mysql_fetch_array(mysql_query($sql2));
    $totalAlumni = $pages2['num'];
    
    $sql3 = "SELECT COUNT(*) as num FROM $tableName3"; 
    $pages3 = mysql_fetch_array(mysql_query($sql3));
    $totalFaculty = $pages3['num'];
    
    $sql4 = "SELECT COUNT(*) as num FROM $tableName4"; 
    $pages4 = mysql_fetch_array(mysql_query($sql4));
    $totalCourse = $pages4['num'];
    
    $sql5 = "SELECT SUM(t1.balance) AS num FROM $tableName5 t1
            JOIN (SELECT studentID, MAX(dop) dop FROM $tableName5 GROUP BY studentID) t2
              ON t1.studentID = t2.studentID AND t1.dop = t2.dop"; 
    $pages5 = mysql_fetch_array(mysql_query($sql5));
    $totalArrears = $pages5['num'];
    
    $sql6 = "SELECT COUNT(*) as num FROM $tableName6"; 
    $pages6 = mysql_fetch_array(mysql_query($sql6));
    $totalUnit = $pages6['num'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Principal | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/fonts/material-icons.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../../../assets/css/Data-Table1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS.css">
    <link rel="stylesheet" href="../../../assets/css/JLX-Fixed-Nav-on-Scroll.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS1.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../../assets/css/Pretty-Table.css">
    <link rel="stylesheet" href="../../../assets/css/Pretty-Table1.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit1.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
    <link rel="stylesheet" href="../../../assets/css/tabela-mloureiro1973.css">
    <link rel="stylesheet" href="../../../assets/css/Team-Clean.css">
</head>

<body style="background-color:rgba(42,63,84,0);">
    <nav class="navbar navbar-default" style="background-color:rgb(62,140,228);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(62,140,228);">
                   Principal | WAKA CMEC Training Institute
                </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(62,140,228);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?>  <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav visible-xs-block visible-sm-block" id="mobile-nav">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> </i> <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></li>
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
                        <li class="active" role="presentation">
                            <a href="index.php">
                                <i class="fa fa-table" style="margin-right:5px;"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                    Students 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="view-preadmitted.php">Pre-Admitted </a></li>
                                <li role="presentation"><a href="view-admitted.php">Admitted </a></li>
                                <li role="presentation"><a href="view-completed.php">Alumni </a></li>
                            </ul>
                        </li>
                        <li role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                        
                        <li role="presentation">
                            <a href="view-fee.php">
                                <i class="fa fa-money" style="margin-right:5px;"></i>
                                Fee 
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-book" style="margin-right:5px;"></i>
                                    Library Books 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="view-book.php">View Books</a></li>
                                <li role="presentation"><a href="staff-due.php">Staff Due Books</a></li>
                                <li role="presentation"><a href="student-due.php">Student Due Books </a></li>
                            </ul>
                        </li>
                        <li role="presentation">
                            <a href="staff.php">Staff</a>
                        </li>
                        <li role="presentation">
                            <a href="assignments.php">Assignments</a>
                        </li>
                        <li role="presentation">
                            <a href="exams.php">Exam</a>
                        </li>
                        <li role="presentation">
                            <a href="lecture-room.php">Lecture Room</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;padding-bottom:3%;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-12">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</h2>
                </div>
        </div>
        <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">Semester </p>
                        <?php
                            if($pages8['end']==NULL && $pages8['start']==NULL )
                            {
                        ?>
                            <p class="bg-warning text-warning" style="font-weight:normal;font-size:16px;text-align:center;"> 
                                <i class="fa fa-warning text-warning"></i> &nbsp;Awaiting Semester Period
                            </p>
                        <?php 
                            }else
                            if(date_format(date_create($pages8['end']),"Y-m-d") < date('Y-m-d'))
                            {
                        ?>
                            <p class="bg-warning text-warning" style="font-weight:normal;font-size:16px;text-align:center;"> 
                                <i class="fa fa-warning text-warning"></i> &nbsp;Awaiting Next Semester Period
                            </p>
                        <?php }else{?>
                             <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                                <?php echo date_format(date_create($pages8['start']),"M. Y")." -to- ".date_format(date_create($pages8['end']),"M. Y");?>
                            </p>
                        <?php }?>
                        <a>
                            <button style="border:1px solid white;background-color:transparent;border-radius:8px;width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">&nbsp;</button>
                        </a>
                    </div>
                </div>
                 <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                            Total Arrears
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($totalPreAdmitted > 999 && $totalPreAdmitted <= 999999) {
                                    echo "Kshs.".number_format(($totalArrears / 1000),2). ' K';
                                }else
                                if($totalPreAdmitted > 999999 && $totalPreAdmitted <= 999999999) {
                                    echo "Kshs.".number_format(($totalArrears / 1000000),2). ' M';
                                }else
                                if($totalPreAdmitted > 999999999 && $totalPreAdmitted <= 999999999999) {
                                    echo "Kshs.".number_format(($totalArrears / 1000000000),2). ' B';
                                }else
                                if($totalPreAdmitted > 999999999999 && $totalPreAdmitted <= 999999999999999) {
                                    echo "Kshs.".number_format(($totalArrears / 1000000000000),2). ' T';
                                }else {echo "Kshs.".number_format($totalArrears,2); } 
                            ?> 
                        </p>
                        <a href="view-fee.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View Fee</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">Pre-Admitted </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($totalPreAdmitted > 999 && $totalPreAdmitted <= 999999) {
                                    echo number_format(($totalPreAdmitted / 1000),1). ' K';
                                }else
                                if($totalPreAdmitted > 999999 && $totalPreAdmitted <= 999999999) {
                                    echo number_format(($totalPreAdmitted / 1000000),1). ' M';
                                }else
                                if($totalPreAdmitted > 999999999 && $totalPreAdmitted <= 999999999999) {
                                    echo number_format(($totalPreAdmitted / 1000000000),1). ' B';
                                }else
                                if($totalPreAdmitted > 999999999999 && $totalPreAdmitted <= 999999999999999) {
                                    echo number_format(($totalPreAdmitted / 1000000000000),1). ' T';
                                }else {echo $totalPreAdmitted;}
                            ?> 
                        </p>
                        <a href="view-preadmitted.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">Admitted </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php
                                if($totalAdmitted > 999 && $totalAdmitted <= 999999) {
                                    echo number_format(($totalAdmitted / 1000),1). ' K';
                                }else
                                if($totalAdmitted > 999999 && $totalAdmitted <= 999999999) {
                                    echo number_format(($totalAdmitted / 1000000),1). ' M';
                                }else
                                if($totalAdmitted > 999999999 && $totalAdmitted <= 999999999999) {
                                    echo number_format(($totalAdmitted / 1000000000),1). ' B';
                                }else
                                if($totalAdmitted > 999999999999 && $totalAdmitted <= 999999999999999) {
                                    echo number_format(($totalAdmitted / 1000000000000),1). ' T';
                                }else {echo $totalAdmitted;}
                            ?> 
                        </p>
                        <a href="view-admitted.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
            </div> 
            </div>
        <hr>
        <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">Alumni </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;">
                            <?php  
                                if($totalAlumni > 999 && $totalAlumni <= 999999) {
                                    echo number_format(($totalAlumni / 1000),1). ' K';
                                }else
                                if($totalAlumni > 999999 && $totalAlumni <= 999999999) {
                                    echo number_format(($totalAlumni / 1000000),1). ' M';
                                }else
                                if($totalAlumni > 999999999 && $totalAlumni <= 999999999999) {
                                    echo number_format(($totalAlumni / 1000000000),1). ' B';
                                }else
                                if($totalAlumni > 999999999999 && $totalAlumni <= 999999999999999) {
                                    echo number_format(($totalAlumni / 1000000000000),1). ' T';
                                }else {echo $totalAlumni;}
                            ?> 
                        </p>
                        <a href="view-completed.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                            Faculty 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalFaculty; ?> </p>
                        <a href="view-faculty.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                            Course 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalCourse; ?> </p>
                        <a href="view-course.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                            Unit 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalUnit; ?> </p>
                        <a href="view-unit.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
        
        <hr>
        <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                            Staff
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalStaff; ?> </p>
                        <a href="staff.php">
                            <button style="width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>