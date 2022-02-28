<?php 
    include'include/session.php';
    
    $tableName="unitdetails";
    
    if(isset($_GET['id'])){
        $unitID = mysql_real_escape_string($_GET['id']);
        
        $query="SELECT cw.*,u.name AS unit,u.yosID,u.semisterID,c.abbreviation AS course
                FROM coursework cw
                LEFT JOIN unit u 
                ON cw.unitID = u.unitID 
                LEFT JOIN course c
                ON u.courseID = c.courseID
                LEFT JOIN assignedunits a
                ON a.unitID = u.unitID
                LEFT JOIN staff s 
                ON a.staffID = s.staffID
                WHERE cw.unitID = '$unitID'
                AND a.staffID = '$staffID'
                ORDER BY u.name ASC";
        $result = mysql_query($query);
    }else{
        $query="SELECT cw.*,u.name AS unit,u.yosID,u.semisterID,c.abbreviation AS course
                FROM coursework cw
                LEFT JOIN unit u 
                ON cw.unitID = u.unitID 
                LEFT JOIN course c
                ON u.courseID = c.courseID
                LEFT JOIN assignedunits a
                ON a.unitID = u.unitID
                LEFT JOIN staff s 
                ON a.staffID = s.staffID
                WHERE a.staffID = '$staffID'
                ORDER BY u.name ASC";
        $result = mysql_query($query);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Work | Lecturer | WAKA CMEC</title>
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
                    <a class="bg-info">Course Work</a>
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
                                                            <em class="fa fa-book"></em> 
                                                            <b>Course Work</b>
                                                         </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-bottom:1%;">
                                                <div class="col-md-12">
                                                <?php
                                                    if(empty($result)){
                                                        echo'<div class="col-md-12 alert alert-danger absolue center text-center" role="alert">
                                                                <span class="text-danger">No records found</span>
                                                            </div>';
                                                    }else{
                                                ?>
                                                    <div class="col-md-12" style="width:100%;margin-top:1%;">
                                                            <table class="table table-striped" id="myTable">
                                                                <thead style="background-color:rgb(62,140,228);color:rgb(254,255,255);">
                                                                    <tr>
                                                                        <th style="width:7%;text-align:center;"># </th>
                                                                        <th>Unit</th>
                                                                        <th>Course</th>
                                                                        <th>YoS / Sem.</th>
                                                                        <th>Course Work</th>
                                                                        <th style="width:80px;"><i class="fa fa-cog ml-3x"></i> </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                        $i=1;
                                                                        while($row = mysql_fetch_array($result)) { 
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align:center;font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $i++;?> </td>
                                                                            <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo $row['unit'];?> </td>
                                                                            <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo $row['course'];?> </td>
                                                                            <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo "Yr.".$row['yosID'].", Sem.".$row['semisterID'];?> </td>
                                                                            <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo $row['doc'];?> </td>
                                                                            <td style="font-size:12px;font-weight:normal;"> 
                                                                                <a href="../../uploads/course-work/<?php echo $row['doc']; ?>" class="text-info" title="Download" role="button" style="margin-right:10px;"><em class="fa fa-download"></em></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                <?php } ?>
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
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    
</body>
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>