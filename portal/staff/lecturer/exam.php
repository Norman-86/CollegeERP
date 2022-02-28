<?php 
    include'include/session.php';
    
    $tableName="exam";
    $tableName1="unit";
    $tableName2="course";
    $tableName3="semisterperiod";
    $tableName4="staffunit";
    $tableName5="staff";
    
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
                WHERE sf.staffID = $staffID 
                ORDER BY e.start DESC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam | Lecturer | WAKA CMEC</title>
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
    <link rel="stylesheet" href="../../../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../../../assets/css/Data-Table1.css">    
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
                    <a href="index.php" style="color:rgb(255,255,255);">Home</a>
                    <a href="course-work.php" style="color:rgb(255,255,255);">Course Work</a>
                    <!--<a href="timetable.php" style="color:rgb(255,255,255);">Time Table</a>-->
                    <a href="view-assignments.php" style="color:rgb(255,255,255);">View Assignments</a>
                    <a class="bg-info">View Exam</a>
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
                        <hr style="margin:0px;" />
<br>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
    
        <div class="col-md-12 ">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title"><em class="fa fa-book"></em> <b>Exams</b></h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                        <table class="table table-striped" id="myTable">
                            <thead style="background-color:rgb(62,140,228);color:rgb(254,255,255);">
                                <tr>
                                    <th style="width:7%;">Code</th>
                                    <th>Course</th>
                                    <th>Unit</th>
                                    <th>YoS/Sem.</th>
                                    <th>Start</th>
                                    <th>Deadline</th>
                                    <th>Time</th>
                                    <th>Semister</th>
                                    <th>Status</th>
                                    <th style="width:80px;"><i class="fa fa-cog ml-3x"></i> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    while($row = mysql_fetch_array($result)) { 
                                ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['examNo'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['course'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['unit'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo "Yr.".$row['yosID'].",Sem.".$row['semisterID'];?> </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo date_format(date_create($row['start']),"D d-M, Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo date_format(date_create($row['deadline']),"D d-M, Y");?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php 
                                                $time=$row['time'];
                                                $function = "convertToHoursMins".$i;
                                                $function=function($time, $format = '%02d:%02d') {
                                                    if ($time < 1) {
                                                        return;
                                                    }
                                                    $hours = floor($time / 60);
                                                    $minutes = ($time % 60);
                                                    return sprintf($format, $hours, $minutes);
                                                };
                                                echo $function($time, '%2d Hrs. %2d min.');
                                            ?> 
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo date_format(date_create($row['semStart']),"M,Y")." - ".date_format(date_create($row['semEnd']),"M,Y");?>
                                        </td>
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
                                        <td style="font-size:12px;font-weight:normal;padding-left:0px;padding-right:0px;"> 
                                                <a href="quiz.php?id=<?php echo $row['examNo']?>" title="Click to view questions">
                                                    <i class="fa fa-eye" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                                <a href="scores.php?eid=<?php echo $row['examNo']?>" title="Click to view scores">
                                                    <i class="fa fa-check" style="font-size:14px;"></i>
                                                </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            
              </div>
            </div>

</div></div></div>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>