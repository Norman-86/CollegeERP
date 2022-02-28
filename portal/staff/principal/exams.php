<?php 
    include'include/session.php';
    
    $tableName="exam";
    $tableName1="unit";
    $tableName2="course";
    $tableName3="semisterperiod";
    $tableName4="staffunit";
    $tableName5="staff";
    
    // Get page data
    $query1 = "SELECT e.*,u.abbreviation AS unit,u.yosID,u.semisterID,c.abbreviation AS course,sp.start AS semStart,sp.end AS semEnd,s.staffNo AS staff
                FROM $tableName e
                LEFT JOIN $tableName1 u
                ON e.unitID = u.unitID
                LEFT JOIN $tableName2 c
                ON u.courseID = c.courseID
                LEFT JOIN $tableName3 sp
                ON e.periodID = sp.periodID
                LEFT JOIN $tableName4 sf
                ON sf.unitID = u.unitID
                LEFT JOIN $tableName5 s
                ON sf.staffID = s.staffID
                ORDER BY e.start DESC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exams | Principal| WAKA CMEC Training Institute</title>
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
                        <li role="presentation">
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
                        <li class="active" role="presentation">
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
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        
        <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
            <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">View Exam</h2>
        </div>
        <form method="POST">
            <div class="col-md-12">
            <?php 
                if(empty($result)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
            ?>            
                <div class="col-md-12" style="width:100%;">
                    <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                        <table class="table table-striped" id="myTable">
                            <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                <tr>
                                    <th style="width:20px;">#</th>
                                    <th style="width:7%;text-align:center;">Code</th>
                                    <th>Course</th>
                                    <th>Unit</th>
                                    <th>YoS/Sem.</th>
                                    <th>Start</th>
                                    <th>Deadline</th>
                                    <th>Time</th>
                                    <th>Semister</th>
                                    <th>Lecturer</th>
                                    <th>Status</th>
                                    <th><i class="fa fa-cog ml-3x"></i> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    while($row = mysql_fetch_array($result)) { 
                                ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $i++;?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['examNo'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['course'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['unit'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo "Yr.".$row['yosID'].",Sem.".$row['semisterID'];?> </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo date_format(date_create($row['start']),"d-m-Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo date_format(date_create($row['deadline']),"d-m-Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['time']." Mins.";?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo date_format(date_create($row['semStart']),"M,Y")." - ".date_format(date_create($row['semEnd']),"M,Y");?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['staff'];?> </td>
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
                                        <td style="font-size:12px;font-weight:normal;"> 
                                                <a href="quiz.php?id=<?php echo $row['examNo']?>" title="Click to view questions">
                                                    <i class="fa fa-eye" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            </div>
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