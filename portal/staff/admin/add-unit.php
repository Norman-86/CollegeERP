<?php 
    include'include/session.php';
    
    // Get page data
    $query1 = "SELECT * FROM faculty ORDER BY name ASC ";
    $result = mysql_query($query1);
    
    $query2="SELECT * FROM semister ORDER BY sem ASC";
    $result2= mysql_query($query2);
    $rowcount2=  mysql_num_rows($result2);
    
    if(isset($_POST['f_id'])) {
      $sql = "select years from `course` where `courseID`=".mysql_real_escape_string($_POST['f_id']);
      $res = mysql_query($sql);
      if(mysql_num_rows($res) > 0) {
        while($row = mysql_fetch_array($res)){
            echo '<option value="">- Select Year of Study -</option>';
            $y=$row['years'];
            $sq = mysql_query("select * from yos where yos <=".$y);
            while($raw = mysql_fetch_array($sq)) {
                echo "<option value='".$raw['yosID']."'>Year ".$raw['yos']."</option>";
            }
        }
        
      }
        exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Unit | Administrator | WAKA CMEC</title>
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
                        <li role="presentation">
                            <a href="course.php">Course</a>
                        </li>
                        <li role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                        <li class="active" role="presentation">
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
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class=""></i> &nbsp;Add Unit</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    
                    <?php 
                        if(isset($_SESSION['success'])=="true"){
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-success">Unit successfully added</span>
                                </div>';
                            unset($_SESSION['success']); 
                        }
                        include 'validate/addUnit.php';
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Unit: &nbsp;<a class="text-danger">*</a></label>
                                <input class="form-control" type="text" value ="<?php echo $unit;?>" placeholder="Unit Name" name="unit" style="text-transform: capitalize;">
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
                                <label class="control-label">Course: &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" id="course" name="course">
                                    <option value="">- Select Course -</option>
                                    <?php 
                                        if(empty($result)){
                                            echo '<option class="bg-danger text-danger" value="">No faculty found</option>';
                                        }else
                                        {
                                            while($row = mysql_fetch_array($result)) {
                                    ?>
                                    <optgroup label="<?php echo $row['name'];?>">
                                        <?php 
                                            $sql = "select * from `course` where `facultyID`=".mysql_real_escape_string($row['facultyID']);
                                            $res = mysql_query($sql);
                                            if(empty($res)){
                                                echo '<option class="bg-danger text-danger" value="">No course found</option>';
                                            }else
                                            if(mysql_num_rows($res) < 1) {
                                                echo '<option class="bg-danger text-danger" value="">No course found</option>';
                                            }else{
                                                while($rw = mysql_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $rw['courseID'];?>" 
                                            <?php 
                                                if($course==$rw['courseID']){
                                                    echo 'selected="selected"';
                                                }
                                            ?> 
                                        >
                                            <?php echo $rw['name'];?>
                                        </option>
                                        <?php }} ?>
                                    </optgroup>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Year of Study: &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" id="yos" name="yos">
                                    <option value="">- Select Year of Study -</option>
                                    <?php
                                        if($course){
                                            $sql = "select years from `course` where `courseID`=".$course;
                                            $res = mysql_query($sql);
                                            if(mysql_num_rows($res) > 0) {
                                                while($row = mysql_fetch_array($res)){
                                                  $sq = mysql_query("select * from yos where yos <=".$row['years']);
                                                    while($raw = mysql_fetch_array($sq)) {
                                    ?>
                                    <option value='<?php echo $raw['yosID']; ?>' <?php if($yos==$raw['yosID']){echo "selected='selected'";}?>> <?php echo "Year ".$raw['yos']; ?></option>
                                    <?php
                                                    }
                                                }
                                            } 
                                        } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Semester: &nbsp;<a class="text-danger">*</a></label>
                                <select class="form-control" name="sem">
                                    <option value="">- Select Semester -</option>
                                    <option value="1" <?php if($sem==1){ echo "selected=selected";}?> >Semester 1</option>
                                    <option value="2" <?php if($sem==2){ echo "selected=selected";}?> >Semester 2</option>
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
    <script src="ajax.js"></script>
</body>

</html>