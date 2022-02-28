<?php 
    include'include/session.php';
    
    $tableName="exam";
    $tableName1="unit";
    $tableName2="course";
    $tableName3="semisterperiod";
    $tableName4="staffunit";
    $tableName5="staff";
    
    $now=date("Y-m-d")." 00:00:00";
    // Get page data
    $query1 = "SELECT e.*,u.name AS unit
                FROM $tableName e
                LEFT JOIN $tableName1 u
                ON e.unitID = u.unitID
                WHERE u.courseID='$course' 
                AND u.yosID='$yos' 
                AND u.semisterID='$sem'
                AND '$now' >= e.start 
                ORDER BY e.examID DESC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
    
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam | Student | WAKA CMEC</title>
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
                            <li role="presentation"><a href="password.php"><i class="fa fa-lock fa-fw"></i> Password</a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav visible-xs-block visible-sm-block" id="mobile-nav">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> </i> <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="password.php"><i class="fa fa-lock fa-fw"></i> Password</a></li>
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
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">View Exams</h2>
            </div>
            <?php 
                if(isset($_SESSION['signOut'])==true){
                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-success">You have successfully signed out of exam!</span>
                        </div>';
                    unset($_SESSION['signOut']);
                }else
                if(isset($_SESSION['timeout'])=="true"){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">Exam time has ended!</span>
                        </div>';
                    unset($_SESSION['timeout']);
                    unset($_SESSION['loginTime']);
                    unset($_SESSION['timeLeft']);
                    unset($_SESSION['exam']);
                    unset($_SESSION['timeFailure']);
                    unset($_SESSION["end_time"]);
                }else
                if(isset($_SESSION['timeError'])==true){
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">Opps!! Failed to fetch exam time limit. Please try again!</span>
                                </div>';
                            unset($_SESSION['success']); 
                        }
                if(empty($result)){
                    echo'<div class="col-md-12 alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
                    
            ?>
            
                <div class="col-md-12" style="width:100%;">
                    <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                        <table class="table table-striped" id="myTable">
                            <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                <tr>
                                    <th>Unit</th>
                                    <th>Start</th>
                                    <th>Deadline</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>%</th>
                                    <th style="width:80px;"><i class="fa fa-cog ml-3x"></i> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    while($row = mysql_fetch_array($result)) { 
                                        // Get page data
                                        $q = "SELECT marks,percentage
                                                    FROM scores
                                                    WHERE examNo='".$row['examNo']."'
                                                    AND studentID='$studentID' ";
                                        $r = mysql_query($q);
                                        $num=  mysql_num_rows($r);
                                ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['unit'];?> </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo date_format(date_create($row['start']),"d/m/Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo date_format(date_create($row['deadline']),"d/m/Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['time']." Mins.";?> </td>
                                        <td style="font-size:12px;font-weight:normal;
                                                    color:
                                                        <?php 
                                                        if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d")){
                                                            echo '#B8860B';
                                                        }else
                                                        if(date_format(date_create($row['start']),"Y-m-d") <= date('Y-m-d') && date_format(date_create($row['deadline']),"Y-m-d") >= date('Y-m-d')){
                                                            echo '#00BFFF';
                                                        }else
                                                        if(date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                            echo '#006400';
                                                        }

                                                    ?>;"> 
                                            <?php 
                                                if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d") ){
                                                echo 'Pending';
                                                }else
                                                if(date('Y-m-d') >= date_format(date_create($row['start']),"Y-m-d") && date('Y-m-d') <= date_format(date_create($row['deadline']),"Y-m-d")){
                                                    echo 'Ongoing';
                                                }else
                                                if(date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                    echo 'Done';
                                                }                                         
                                            ?>
                                        </td>
                                        <?php
                                            if($num == 0){
                                        ?>        
                                            <td style="font-size:12px;font-weight:normal;"> ___</td>
                                        <?php
                                            }else{
                                            while($rwo = mysql_fetch_array($r)) { 
                                        ?>    
                                            <td style="font-size:12px;font-weight:normal;"> <?php echo $rwo['percentage']." %";?> </td>
                                        <?php }} ?>
                                        
                                        <td style="font-size:12px;font-weight:normal;"> 
                                            <?php 
                                                if(date_format(date_create($row['deadline']),"Y-m-d") < date('Y-m-d')){
                                            ?>
                                                <a href="" title="Click to answer questions" onClick="alert('You CANNOT to answer quiz to exams that have already ended!');">
                                                    <i class="fa fa-eye-slash" style="font-size:14px;color:rgb(1,1,1);margin-right:10px;"></i>
                                                </a>
                                                
                                           <?php }else{ ?>
                                                <a href="exam_validation.php?id=<?php echo $row['examID']?>" title="Click to do this exam">
                                                    <i class="fa fa-eye" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                           <?php }?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </form>    
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
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>