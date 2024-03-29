<?php 
    include'include/session.php';
    
    $query1="SELECT * FROM faculty ORDER BY name ASC";
    $result1 = mysql_query($query1);
    $rowcount1=  mysql_num_rows($result1);
    
    if(isset($_GET['id'])){
        $staffID = mysql_real_escape_string($_GET['id']);
        // Get page data
        $query2 = "SELECT * FROM staff WHERE staffID='$staffID'";
        $result2 = mysql_query($query2);
        $rowcount2=  mysql_num_rows($result2);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff | Administrator | WAKA CMEC</title>
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
                        <li class="active" role="presentation">
                            <a href="staff.php">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Staff 
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="faculty.php">Faculty</a>
                        </li>
                        <li role="presentation">
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
    <div class="row" style="width:80%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;max-width:960px;">
        
        <form method="POST">
            <?php 
                if(empty($result2)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Error occured while trying to fetch Staff info.</span>
                        </div>';
                }else
                {
                while ($name1 = mysql_fetch_array($result2)) {
            ?>
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-refresh"></i> &nbsp;Update Staff Info.</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    
                    <?php 
                        include 'validate/updateStaff.php';
                        
                        if(isset($_SESSION['success'])=="true"){
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-success">Password successfully updated</span>
                                </div>';
                            unset($_SESSION['success']); 
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">First Name: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['fname'];?>" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Last Name: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['lname'];?>" name="lastname">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Surname: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['sname'];?>" name="surname">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Staff No.: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['staffNo'];?>" readonly="" placeholder="Staff No." name="staffNo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Gender &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" name="gender">
                                    <option value="">- Select Gender -</option>
                                    <optgroup label="Gender">
                                        <option value="Male" <?php if($name1['gender']=="Male"){echo "selected=selected";}?> >Male</option>
                                        <option value="Female" <?php if($name1['gender']=="Female"){echo "selected=selected";}?> >Female</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">ID / Passport No.: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['id'];?>" placeholder="ID / Passport No." name="id">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Phone &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['phone'];?>" placeholder="Phone No." name="phone1">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Phone 2 (optional)</label>
                                <input class="form-control" type="text"value ="<?php echo $name1['phone1'];?>" placeholder="Phone No (optional)" name="phone2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">E-mail &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $name1['mail'];?>" placeholder="example@mail.com" name="mail1">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">E-mail 2 (optional)</label>
                                <input class="form-control" type="text" value ="<?php echo $name1['mail1'];?>" placeholder="optional" name="mail2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Category: &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" name="category">
                                    <option value="">- Select Category -</option>
                                    <optgroup label="Category">
                                        <option value="Accounts" <?php if($name1['category'] == "Accounts"){echo 'selected="selected"';}?> >Accounts</option>
                                        <option value="Admissions" <?php if($name1['category'] == "Admissions"){echo 'selected="selected"';}?> >Admissions</option>
                                        <option value="Lecturer" <?php if($name1['category'] == "Lecturer"){echo 'selected="selected"';}?> >Lecturer</option>
                                        <option value="Librarian" <?php if($name1['category'] == "Librarian"){echo 'selected="selected"';}?> >Librarian</option>
                                        <option value="Procurement" <?php if($name1['category'] == "Procurement"){echo 'selected="selected"';}?> >Procurement</option>
                                        <option value="Principal" <?php if($name1['category'] == "Principal"){echo 'selected="selected"';}?> >Principal</option>
                                        <option value="Secretary" <?php if($name1['category'] == "Secretary"){echo 'selected="selected"';}?> >Secretary</option>
                                        <option value="TimeTabler" <?php if($name1['category'] == "TimeTabler"){echo 'selected="selected"';}?> >Time Tabler</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Faculty (optional):</label>
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
                                                <option value="<?php echo $row['facultyID'];?>" <?php if($name1['facultyID'] == $row['facultyID']){echo 'selected="selected"';}?> > <?php echo $row['name'];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-center">
                            <button name="update" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </form>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>