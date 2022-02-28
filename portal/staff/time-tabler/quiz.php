<?php 
    include'include/session.php';
    
    $tableName="exam";
    $tableName1="unit";
    $tableName2="course";
    $tableName3="semisterperiod";
    $tableName4="staffunit";
    $tableName5="staff";
    
    if(isset($_GET['id'])){
        $qid = mysql_real_escape_string($_GET['id']);
        // Get page data
        $query1 = "SELECT e.*,u.abbreviation AS unit,u.yosID,u.semisterID,c.abbreviation AS course,sp.start AS semStart,sp.end AS semEnd,CONCAT(s.fname,' ',s.lname,' ',s.sname) AS staff
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
                    WHERE e.examNo='$qid'
                    ORDER BY e.start DESC";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
        
        $query2 = "SELECT * FROM quiz WHERE examNo='$qid' ORDER BY quizID ASC";
        $results = mysql_query($query2);
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exam Questions | Time Tabler | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);z">Time Tabler | Waka CMEC Training Institute</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(52,73,94);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
                        <li role="presentation">
                            <a href="class.php">
                                Class
                            </a>
                        </li>
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Time Table 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <!--<li role="presentation"><a href="view-time-tables.php">Lectures </a></li>-->
                                <li class="active" role="presentation"><a href="exams.php">Exams </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST" >
            <?php 
                if(isset($_SESSION['success'])=="true"){
                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-success">Quiz successfully updated</span>
                        </div>';
                        unset($_SESSION['success']); 
                }
                if(isset($_SESSION['del'])=="True"){
                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-success">Delete successful</span>
                        </div>';
                        unset($_SESSION['del']); 
                }
                if(empty($result)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
                    include 'validate/delete.php';
                    
            ?>
            <div class="col-md-12" style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">View Exam Questions</h2>
            </div>
            
            
            <?php 
                while($row = mysql_fetch_array($result)) { 
                    $examDate = date_format(date_create($row['deadline']),"Y-m-d");
            ?>
                
                <div class="col-md-12">
                    <div class="col-md-2">
                        <label>Exam Code</label>
                        <input type="text" class="form-control" value="<?php echo $row['examNo'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Unit</label>
                        <input type="text" class="form-control" value="<?php echo $row['unit'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Course</label>
                        <input type="text" class="form-control" value="<?php echo $row['course'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>YoS/Sem</label>
                        <input type="text" class="form-control" value="<?php echo "Yr.".$row['yosID'].",Sem.".$row['semisterID'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Start</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['start']),"D d-M, Y");?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Deadline</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['deadline']),"D d-M, Y");?>" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2">
                        <label>Time</label>
                        <input type="text" class="form-control" 
                                          value="<?php 
                                                $time=$row['time'];
                                                function convertToHoursMins($time, $format = '%02d:%02d') {
                                                    if ($time < 1) {
                                                        return;
                                                    }
                                                    $hours = floor($time / 60);
                                                    $minutes = ($time % 60);
                                                    return sprintf($format, $hours, $minutes);
                                                }
                                                echo convertToHoursMins($time, '%2d Hrs. %2d min.');
                                            ?>" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Sem. Period</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['semStart']),"M,Y")." - ".date_format(date_create($row['semEnd']),"M,Y");?>" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Lecturer</label>
                        <input type="text" class="form-control" value="<?php echo $row['staff'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Status</label>
                        <input type="text" style="color:white; background-color:
                                                  <?php 
                                                        if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d")){
                                                            echo '#B8860B';
                                                        }else
                                                        if(date_format(date_create($row['start']),"Y-m-d") <= date('Y-m-d') && date_format(date_create($row['deadline']),"Y-m-d") >= date('Y-m-d')){
                                                            echo '#00BFFF';
                                                        }else
                                                        if (date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                            echo '#006400';
                                                        }

                                                    ?>;"
                               class="form-control" readonly 
                                value="<?php 
                                            if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d") ){
                                                echo 'Pending';
                                            }else
                                            if(date('Y-m-d') >= date_format(date_create($row['start']),"Y-m-d") && date('Y-m-d') <= date_format(date_create($row['deadline']),"Y-m-d")){
                                                echo 'Ongoing';
                                            }else
                                            if (date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                echo 'Done';
                                            }                                            
                                        ?>
                                    ">
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            <?php } ?>
            
            
                <div class="col-md-12" style="width:100%;">
                    <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                        <table class="table table-striped" id="myTable">
                            <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                <tr>
                                    <th style="width:7%;text-align:center;">#</th>
                                    <th>Question</th>
                                    <th>Option</th>
                                    <th>Answer</th>
                                    <th style="width:80px;">Marks</th>
                                    <th style="width:80px;"><i class="fa fa-cog ml-3x"></i> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    while($rw = mysql_fetch_array($results)) { 
                                ?>
                                    <tr>
                                        <td style="text-align:center;font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $i++;?> </td>
                                        
                                        <td style="font-size:12px;font-weight:normal;"> 
                                            <p><label>Question:</label> <?php echo $rw['quiz'];?></p>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;"> 
                                            <p><label>Option A:</label> <?php echo $rw['option_a'];?></p>
                                            <p><label>Option B:</label> <?php echo $rw['option_b'];?></p>
                                            <p><label>Option C:</label> <?php echo $rw['option_c'];?></p>
                                            <p><label>Option D:</label> <?php echo $rw['option_d'];?></p>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;"> 
                                            <p><label>Answer:</label> <?php echo $rw['answer'];?></p>
                                        </td>
                                        
                                        <td style="font-size:12px;font-weight:normal;"> 
                                            <p><label>Marks:</label> <?php echo $rw['marks'];?></p>
                                        </td>
                                        <td>
                                            <?php 
                                                if($examDate < date('Y-m-d')){
                                            ?>
                                                <a href="" title="Edit/Update permission revoked" onClick="alert('You are NOT ALLOWED to update exams that have already ended!');">
                                                    <i class="fa fa-edit" style="font-size:14px;color:rgb(1,1,1);margin-right:10px;"></i>
                                                </a>
                                                <button value="" title="Delete permission revoked" onClick="alert('You are NOT ALLOWED to delete exams that have already ended!');" style="background-color:transparent;border:none;">
                                                    <i class="fa fa-trash" style="font-size:14px;color:rgb(1,1,1);"></i>
                                                </button>
                                           <?php }else{ ?>
                                                <a href="update-quiz.php?id=<?php echo $rw['quizID']?>&e=<?php echo $rw['examNo']?>" title="Click to edit/update">
                                                    <i class="fa fa-edit" style="font-size:14px;color:rgb(62,140,228);margin-right:10px;"></i>
                                                </a>
                                                <button name="deleteQuiz" value="<?php echo $rw['quizID']?>" title="Click to delete" onClick="return confirm('Deleting this Question might alter other CRITICAL records.\nWant to continue?');" style="background-color:transparent;border:none;">
                                                    <i class="fa fa-trash" style="font-size:14px;color:rgb(254,17,2);"></i>
                                                </button>
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