<?php 
    include'include/session.php';
    
    $query="SELECT * FROM level ORDER BY levelID ASC";
    $result = mysql_query($query);
    $rowcount=  mysql_num_rows($result);
    
    $query1="SELECT * FROM faculty ORDER BY name ASC";
    $result1 = mysql_query($query1);
    $rowcount1=  mysql_num_rows($result1);
    
    
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course | Administrator | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(62,140,228);">Administrator | Waka CMEC Training Institute</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(62,140,228);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
                            <a href="staff.php">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Staff 
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="faculty.php">Faculty</a>
                        </li>
                        <li class="active" role="presentation">
                            <a href="course.php">Course</a>
                        </li>
                        <li role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                        <li role="presentation">
                            <a href="unit.php">Unit</a>
                        </li>
                        <li role="presentation">
                            <a href="assigned-unit.php">
                                <i class="fa fa-bookmark" style="margin-right:5px;"></i>
                                Assigned Units
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="period.php">Semester Period</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:100%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;max-width:960px;">
        
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class=""></i> &nbsp;Add Course</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    
                    <?php 
                        if(isset($_SESSION['success'])=="true"){
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-success">Course successfully added</span>
                                </div>';
                            unset($_SESSION['success']); 
                        }
                        include 'validate/addCourse.php';
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Course: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $course;?>" placeholder="Course Name" name="course" style="text-transform: capitalize;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Acronym: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $acronym;?>" placeholder="Acronym" name="acronym" style="text-transform:uppercase;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Level of Study: &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" name="level">
                                    <?php 
                                        if(empty($result)){
                                            echo'<option value="" class="bg-danger text-danger">- Error occured on Level -</option>';
                                        }else
                                        if($rowcount < 1){
                                            echo'<option value="" class="bg-danger text-danger">- No records found -</option>';
                                        }else{
                                    ?>
                                        <option value="">- Select Level -</option>
                                        <optgroup label="level of Study">
                                            <?php while ($row = mysql_fetch_array($result)) { ?>
                                                <option value="<?php echo $row['levelID'];?>" <?php if($level == $row['levelID']){echo 'selected="selected"';}?> > <?php echo $row['level'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Years of Study &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" name="years">
                                    <option value="">- Select Years of Study -</option>
                                    <optgroup label="Years of Study">
                                        <option value="1" <?php if($years == 1){echo 'selected="selected"';}?> > 1 Year</option>
                                        <option value="2" <?php if($years == 2){echo 'selected="selected"';}?> > 2 Years</option>
                                        <option value="3" <?php if($years == 3){echo 'selected="selected"';}?> > 3 Years</option>
                                        <option value="4" <?php if($years == 4){echo 'selected="selected"';}?> > 4 Years</option>
                                        <option value="5" <?php if($years == 5){echo 'selected="selected"';}?> > 5 Years</option>
                                        <option value="6" <?php if($years == 6){echo 'selected="selected"';}?> > 6 Years</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Faculty: &nbsp;<a class="text-danger">*</a> </label>
                                <select class="form-control" name="faculty">
                                    <?php 
                                        if(empty($result1)){
                                            echo'<option value="" class="bg-danger text-danger">- Error occured on Faculty -</option>';
                                        }else
                                        if($rowcount1 < 1){
                                            echo'<option value="" class="bg-danger text-danger">- No records found -</option>';
                                        }else{
                                    ?>
                                        <option value="">- Select Faculty -</option>
                                        <optgroup label="Faculty">
                                            <?php while ($row = mysql_fetch_array($result1)) { ?>
                                                <option value="<?php echo $row['facultyID'];?>" <?php if($faculty == $row['facultyID']){echo 'selected="selected"';}?> > <?php echo $row['name'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <button name="submit" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Submit</button>
                        </div>
                    </div>
                </div>
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

</html>