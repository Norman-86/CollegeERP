<?php include'include/session.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Assignment | Lecturer | WAKA CMEC</title>
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
    <link href="../../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                    <a href="view-assignments.php" class="bg-info">View Assignments</a>
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
                        <hr style="margin:0px;">
                        <h2>Upload Assignment</h2>
                        <hr style="margin:0px;">
                    </div>
                </div>
            </div>
            <div class="container">
                <div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group" style="margin-top:30px;">
                            <div id="formdiv">
                                <?php 
                                    include'validate/upload-assignment.php';
                                    
                                    if(isset($_SESSION['success'])=="true"){
                                        echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-success">Assignment Successfully Uploaded</span>
                                            </div>';
                                        unset($_SESSION['success']); 
                                    }
                                ?>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;"> Unit: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <select class="form-control" name="unit" required="" autofocus="" style="font-family:Roboto, sans-serif;font-weight:normal;">
                                            <option>- Unit -</option>
                                            <optgroup label="Select unit">
                                                <?php while ($row = mysql_fetch_array($au)) {?>
                                                <option value="<?php echo $row['unitID'];?>" <?php if($unit==$row['unitID']){echo "selected";}?> > <?php echo $row['unit'].' <b>,</b> '.$row['course'].' , Yr.'.$row['YOS'].', Sem.'.$row['sem'];?></option>
                                                <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1" style="padding-right:0px;">
                                        <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;">Title: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="text" placeholder="Assignment Title" name="title" value="<?php echo $title;?>" class="form-control" required style="font-family:Roboto, sans-serif;" />
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p for="dtp_input2" style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;">Start Date: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="date" placeholder="yyyy-mm-dd" name="start" required value="<?php echo $startDate;?>" style="font-family:Roboto, sans-serif;font-weight:normal;" />
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="" />
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p for="dtp_input2" style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;">Deadline: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" type="date" placeholder="yyyy-mm-dd" name="deadline" required value="<?php echo $deadline;?>" style="font-family:Roboto, sans-serif;font-weight:normal;" />
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="" />
                                    </div>
                                </div>
                                
                                
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;">Upload: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1" style="height:36px;">
                                        <input type="file" name="file" class="form-control" style="font-family:Roboto, sans-serif;font-weight:normal;" />
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;">Total Marks: <b class="text-danger">*</b></p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <input class="form-control" type="number" name="marks" step="any" min="5" placeholder="Enter total marks" required value="<?php echo $marks;?>" style="font-family:Roboto, sans-serif;font-weight:normal;" />                          
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-8 col-md-offset-1">
                                        <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:14px;font-weight:bold;"><strong>Remarks </strong>(Optional):</p>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <textarea class="form-control" name="remarks" placeholder="Remarks" style="font-family:Roboto, sans-serif;font-size:14px;height:200px;"><?php echo $remark;?></textarea>
                                    </div>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                                    <div class="col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0">
                                        <button name="upload" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <script type="text/javascript" src="../../../assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   
    <script type="text/javascript" src="../../../assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</body>
    <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</html>