<?php 
    include'include/session.php';
    
    $tableName="view_assignment";
    
    if(isset($_GET['id'])){
        $id = mysql_real_escape_string($_GET['id']);
    
        $sql = "SELECT * FROM $tableName WHERE staffID ='$staffID' AND assignmentID='$id' ORDER BY assignmentID DESC";
        $query = mysql_query($sql);
        $rowcount=  mysql_num_rows($query);
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Assignments | Lecturer | WAKA CMEC</title>
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
                    <a class="bg-info" href="view-assignments.php">View Assignments</a>
                    <a href="exam.php" style="color:rgb(255,255,255);">View Exam</a>
                    <a href="assigned-units.php" style="color:rgb(255,255,255);">View Units</a>
                </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
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
    
        <div class="col-md-12 ">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
                    <h3 class="panel-title">
                        <em class="fa fa-book"></em> 
                        <b>Submitted Assignments</b>
                     </h3>
                  </div>
                </div>
                
            </div> 
            <?php 
                if(empty($query)){
                    echo'<div class="alert alert-danger absolue center text-center">
                            <strong class="text-danger">Error occured while trying to retrieve assignment details</strong>
                        </div>';
                }else{
                    while ($rows = mysql_fetch_array($query)) {
            ?>
            <div class="row bg-info" style="margin:0px;padding:0px;">
                <div class="col col-xs-12" style="margin:0px;padding:0px;">
                    <div class="col col-xs-4">
                        <label>Assignment:</label>&nbsp;<?php echo $rows['title'];?>
                    </div>
                    <div class="col col-xs-2">
                        <label>Code:</label>&nbsp;<?php echo $rows['code'];?>
                    </div>
                    <div class="col col-xs-2">
                        <label>Uploaded:</label>&nbsp;<?php echo date_format(date_create($rows['uploaded']),"d-M-Y");?>
                    </div>
                    <div class="col col-xs-2">
                        <label>Start Date:</label>&nbsp;<?php echo date_format(date_create($rows['startDate']),"d-M-Y");?>
                    </div>
                    <div class="col col-xs-2">
                        <label>Deadline:</label>&nbsp;<?php echo date_format(date_create($rows['deadline']),"d-M-Y");?>
                    </div>
                </div>
                
                <div class="col col-xs-12" style="margin:0px;padding:0px;">
                    <div class="col col-xs-6">
                        <label>Unit:</label>&nbsp;<?php echo $rows['unit'];?>
                    </div>
                    <div class="col col-xs-6">
                        <label>Course:</label>&nbsp;<?php echo $rows['course'];?>
                    </div>
                </div>
                
                <div class="col col-xs-12" style="margin:0px;padding:0px;">
                    <div class="col col-xs-3">
                        <label>Year of Study:</label>&nbsp;<?php 
                                                                $yos = $rows['YOS'];
                                                                function ordinal($yos){
                                                                    $ends = array('th','st','nd','rd','th','th','th','th','th');
                                                                    if((($yos % 100) >= 11 ) &&(($yos % 100) <= 13)){
                                                                        return $yos.'th';
                                                                    }else{ return $yos.$ends[$yos % 100];}
                                                                }
                                                                echo ordinal($yos)." Year";
                                                            ?>
                    </div>
                    <div class="col col-xs-3">
                        <label>Semister:</label>&nbsp;<?php echo $rows['semister'];?>
                    </div>
                    <div class="col col-xs-3">
                        <label>Marks:</label>&nbsp;<?php echo $rows['marks'];?>
                    </div>
                    <div class="col col-xs-3">
                        <label>Submitted:</label>&nbsp;<?php //echo $rows['marks'];?>
                    </div>
                </div>
                <div class="col col-xs-12" style="margin:0px;padding:0px 10px 0px 10px;">
                    <label>Remarks:</label>&nbsp;<?php echo $rows['details'];?>
                </div>
            </div>
            <?php
                }}
                if(isset($_SESSION['mark'])=="true"){
                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-success">Marks Successfully Updated</span>
                        </div>';
                    unset($_SESSION['mark']); 
                }
            ?>
              
            <div class="panel-body">
                <table class="table table-striped" id="myTable">
                  <thead style="background-color:rgb(62,140,228);color:rgb(252,254,255);">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Submitted</th>
                        <th class="text-center">Marks</th>
                        <th class="text-center">%</th>
                        <th style="text-align: center;"><em class="fa fa-cog"></em> &nbsp;&nbsp; </th>
                    </tr> 
                  </thead>
                  <tbody>
                        <?php 
                            if(empty($query)){
                                echo'<tr>
                                        <td colspan="10">
                                            <div class="alert alert-danger absolue center text-center">
                                                <strong class="text-danger">Error occured</strong>
                                            </div>
                                        </td>
                                    </tr>';
                            }else{
                                $sql1 = "SELECT * FROM submitted WHERE assignmentID='$id' ORDER BY submitted DESC";
                                $query1 = mysql_query($sql1);
                                $r=1;
                                while ($rw = mysql_fetch_array($query1)) {
                                    
                            ?>
                        <tr>  
                            <td align="center"><?php echo $r++; ?></td>
                            <td><a href="#"><?php echo $rw['adm']; ?></a></td>
                            <td><?php echo date_format(date_create($rw['submitted']),"D d-M, Y.")." ".date(" g:i A", strtotime($rw['submitted'])); ?></td>
                            <td align="center"><?php if($rw['marks'] != NULL){echo $rw['marks'];}else{echo "_";} ?></td>
                            <td align="center"><?php if($rw['percentage'] != NULL){echo $rw['percentage'];}else{echo "_";} ?></td>
                            <td align="center">
                                <?php if($rw['marks'] == NULL){ ?>
                                <a style="color:black;" title="Edit/Update Marks"  role="button" title="Edit/Update Marks permission revoked" onclick="return alert('You cannot Edit or Update marks for assignment that has not been marked');"><em class="fa fa-pencil"></em></a>&nbsp; &nbsp; 
                                <?php }else{ ?>
                                <a href="update-mark.php?id=<?php echo $rw['assignmentID']?>&sid=<?php echo $rw['studentID']?>" class="text-primary" title="Edit/Update Marks"  role="button"><em class="fa fa-pencil"></em></a>&nbsp; &nbsp; 
                                <?php } ?>
                                <a href="../../uploads/submit/<?php echo $rw['assignment']; ?>" class="text-info"  role="button"><em class="fa fa-download"></em></a>
                            </td>
                        </tr>
                        <?php }}?>
                        </tbody>
                </table>
            
              </div>
            </div>

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