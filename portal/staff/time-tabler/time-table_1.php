<?php 
    include'include/session.php';
    
    $tableName="faculty";
    $tableName1="course";
    $tableName2="semister";
    $tableName3="semisterPeriod";
    $tableName4="unit";
    $tableName5="class";
    
    // Get page data
    $query1 = "SELECT * FROM $tableName ORDER BY name ASC ";
    $result = mysql_query($query1);
    
    // Get page data
    $query2 = "SELECT * FROM $tableName2 ORDER BY sem ASC ";
    $result2 = mysql_query($query2);
    
    // Get page data
    $query3 = "SELECT * FROM $tableName3 GROUP BY start,end ORDER BY start DESC ";
    $result3 = mysql_query($query3);
    
    if(isset($_GET['cid'])){
        $cid=mysql_real_escape_string($_GET['cid']);
        // Get page data
        $query4 = "SELECT * FROM $tableName4 WHERE courseID=".$cid." ORDER BY name ASC ";
        $result4 = mysql_query($query4);
        
    }
    
    // Get page data
    $query5 = "SELECT * FROM $tableName5 ORDER BY name ASC ";
    $result5 = mysql_query($query5);
    
    
    if(isset($_POST['f_id'])) {
      $sql = "select years from `course` where `courseID`=".mysql_real_escape_string($_POST['f_id']);
      $res = mysql_query($sql);
      if(mysql_num_rows($res) > 0) {
        echo "<option value=''>- Select YoS -</option>";
        while($row = mysql_fetch_array($res)){
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
    <title>Create Time Table | Time Tabler | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">Time Tabler | Waka CMEC Training Institute</a>
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
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Time Table 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="view-time-tables.php">Lectures </a></li>
                                <li role="presentation"><a href="exams.php">Exams </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <div style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
            <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">Create Time Table</h2>
        </div>
        <form method="POST">
            <?php 
                include 'validate/timeTable.php';
                        
                if(isset($_SESSION['success'])=="true"){
                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-success">Time Table successfully Created</span>
                        </div>';
                    unset($_SESSION['success']); 
                }
            ?>
        <div class="col-md-12" style="margin-bottom:1%;">
                <div class="col-md-4">
                    <label>Course</label>
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
                                    }else 
                                    if(isset($_GET['cid'])){
                                        $c=$_GET['cid'];
                                        if($c==$rw['courseID']){
                                            echo 'selected="selected"';
                                        }
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
                <div class="col-md-2">
                    <label>Year of Study</label>
                    <select class="form-control" id="yos" name="yos">
                        <option value="">- Select YoS -</option>
                        <?php
                            if(isset($_GET['yos'])) {
                                $y=$_GET['yos'];
                                $sql = "select years from `course` where `courseID`=".$_GET['cid'];
                                $res = mysql_query($sql);
                                if(mysql_num_rows($res) > 0) {
                                    while($row = mysql_fetch_array($res)){
                                      $sq = mysql_query("select * from yos where yos <=".$row['years']);
                                        while($raw = mysql_fetch_array($sq)) {
                        ?>
                                <option value='<?php echo $raw['yosID']; ?>' <?php if($y==$raw['yosID']){echo "selected='selected'";}?>> <?php echo "Year ".$raw['yos']; ?></option>
                        <?php
                                        }
                                    }
                                } 
                            } else
                            if($course) {
                                $sql = "select years from `course` where `courseID`=".$course;
                                $res = mysql_query($sql);
                                if(mysql_num_rows($res) > 0) {
                                    while($row = mysql_fetch_array($res)){
                                      $sq = mysql_query("select * from yos where yos <=".$row['years']);
                                        while($raw = mysql_fetch_array($sq)) {
                                        ?>
                                            <option value='<?php echo $raw['yosID']; ?>' <?php if($yos==$raw['yosID']){echo "selected=selected";}?>> <?php echo "Year ".$raw['yos']; ?></option>
                                        <?php
                                        }
                                  }

                                }
                            }    
                                
                                        
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Semester</label>
                    <select class="form-control" name="sem">
                        <option value="">- Select Semester -</option>
                            <?php 
                                if(empty($result2)){
                                    echo '<option class="bg-danger text-danger">No records found</option>';
                                }else
                                {
                                    while($row = mysql_fetch_array($result2)) {
                            ?>
                                <option value="<?php echo $row['semisterID'];?>" 
                                    <?php 
                                        if(isset($_GET['sem'])){
                                            $s=$_GET['sem'];
                                            if($s==$row['semisterID']){
                                                echo "selected=selected";
                                            }
                                        }else 
                                        if($sem==$row['semisterID']){
                                            echo "selected=selected";
                                        }?> 
                                >
                            <?php echo "Semester ".$row['sem'];?>
                        </option>
                            <?php }} ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Period</label>
                    <select class="form-control" name="period">
                        <optgroup label="Period">
                            <?php 
                                if(empty($result3)){
                                    echo '<option class="bg-danger text-danger">No records found</option>';
                                }else
                                {
                                    while($row = mysql_fetch_array($result3)) {
                            ?>
                                <option value="<?php echo $row['periodID'];?>" 
                                    <?php 
                                        if(isset($_GET['period'])){
                                            $p=$_GET['period'];
                                            if($p==$row['periodID']){
                                                echo "selected=selected";
                                            }
                                        }else 
                                        if($period==$row['periodID']){
                                            echo "selected=selected";
                                        }
                                    ?> 
                                >
                                    <?php echo date_format(date_create($row['start']),"M,Y").' - '.date_format(date_create($row['end']),"M,Y");?>
                                </option>
                            <?php }} ?>
                        </optgroup>
                    </select>
                </div>
            
                <div class="col-md-2">
                    <label style="width:100%;">&nbsp;</label>
                    <button type="submit" name="activate" style="padding:5px 20px;color:rgb(1,1,1);">
                        <i class="fa fa-toggle-on"></i> Activate
                    </button>
                       
                </div>
            </div>
                <?php 
                    if(isset($_GET['cid']) && isset($_GET['yos']) && isset($_GET['sem']) && isset($_GET['period'])){ 
                        $gender="Male";
                ?>
                <div class="col-md-12">
                    <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                        <table class="table table-striped">
                            <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                <tr>
                                    <th style="text-align:center;width:150px;">Time</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday </th>
                                    <th>Thursday </th>
                                    <th>Friday </th>
                                    <th style="text-align:center;width:50px;">Remove </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <button style="padding:5px 20px;color:rgb(1,1,1);" onClick="add()">Add Row</button> &nbsp; &nbsp; &nbsp; &nbsp; 
                        <button name="create" type="submit" style="padding:5px 20px;color:rgb(1,1,1);" onclick='return confirm("Sure you want to create this Time Table?");'>Create Table</button>
                    </div>
                </div>
                <?php } ?>
            
            <?php  
                                    $table ='<tr style="border-bottom:1px solid grey;">
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                            <select class="form-control" name="start[]">
                                                <option value="">- Start Time -</option>
                                                <optgroup label="AM">
                                                    <option value="07:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        } 
                                    $table .=        '>7:00 AM</option>
                                                    <option value="08:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }               
                                                    '>8:00 AM</option>
                                                    <option value="09:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>9:00 AM</option>
                                                    <option value="10:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>10:00 AM</option>
                                                    <option value="11:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>11:00 AM</option>
                                                    <option value="12:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>12:00 AM</option>
                                                </optgroup>
                                                <optgroup label="PM">
                                                    <option value="13:00"'; 
                                                       if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>1:00 PM</option>
                                                    <option value="14:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>2:00 PM</option>
                                                    <option value="15:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>3:00 PM</option>
                                                    <option value=16:00"'; 
                                                       if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>4:00 PM</option>
                                                    <option value="17:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=                 '>5:00 PM</option>
                                                </optgroup>
                                            </select>
                                   
                                            <br>
                                            <select class="form-control" name="end[]">
                                                <option value="">- End Time -</option>
                                                <optgroup label="AM">
                                                    <option value="07:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        } 
                                    $table .=        '>7:00 AM</option>
                                                    <option value="08:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }               
                                                    '>8:00 AM</option>
                                                    <option value="09:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>9:00 AM</option>
                                                    <option value="10:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>10:00 AM</option>
                                                    <option value="11:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>11:00 AM</option>
                                                    <option value="12:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>12:00 AM</option>
                                                </optgroup>
                                                <optgroup label="PM">
                                                    <option value="13:00"'; 
                                                       if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>1:00 PM</option>
                                                    <option value="14:00"';
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>2:00 PM</option>
                                                    <option value="15:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>3:00 PM</option>
                                                    <option value=16:00"'; 
                                                       if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=       '>4:00 PM</option>
                                                    <option value="17:00"'; 
                                                        if($gender=="Male"){ 
                                    $table .=                "selected='selected'";  
                                                        }
                                    $table .=                 '>5:00 PM</option>
                                                </optgroup>
                                            </select>
                                        </td>
                                        
                                        
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);">
                                            <select class="form-control" id="course" name="monday_unit[]">
                                                <option value="">- Select Unit -</option>';
                                                    $sql = "SELECT unitID,name
                                                            FROM `unit`
                                                            WHERE `courseID` = ".$_GET['cid']."
                                                            AND yosID = ".$_GET['yos']." 
                                                            AND semisterID = ".$_GET['sem']."
                                                            ORDER BY name ASC ";
                                                    $res = mysql_query($sql);
                                                    if(empty($res)){
                                    $table .=           '<option value="" class="bg-danger text-danger">No records found</option>';
                                                    }else
                                                    {
                                                        while($row = mysql_fetch_array($res)){
                                                
                                    $table .=       '<option value="';
                                    $table .=                   $row['unitID'];
                                    $table .=       '">';
                                     $table .=          $row['name']; 
                                    $table .=       '</option>';
                                                        }
                                                    }
                                                
                                    $table .=  '</select>
                                            <br>
                                            <select class="form-control" name="monday_class[]">
                                                <option value="">- Class -</option>
                                                <optgroup label="Class">';
                                                     if(empty($result5)){
                                    $table .=           '<option class="bg-danger text-danger">No records found</option>';
                                                        }else
                                                        {
                                                            while($row = mysql_fetch_array($result5)) {
                                    $table .=                  '<option value="';
                                    $table .=                           $row['classID'];
                                    $table .=                           '"'; 
                                                                    if($monday_class==$row['classID'])
                                                                    {
                                    $table .=                         "selected='selected'";
                                                                    }
                                    $table .=                            '>';
                                    $table .=                           $row['name'];
                                    $table .=                  '</option>';
                                                            }
                                                        }
                                    $table .=   '</optgroup>
                                            </select>
                                        </td>
                                    
                                        
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);">
                                            <select class="form-control" id="course" name="tuesday_unit[]">
                                                <option value="">- Select Unit -</option>';
                                                    $sql = "SELECT unitID,name
                                                            FROM `unit`
                                                            WHERE `courseID` = ".$_GET['cid']."
                                                            AND yosID = ".$_GET['yos']." 
                                                            AND semisterID = ".$_GET['sem']."
                                                            ORDER BY name ASC ";
                                                    $res = mysql_query($sql);
                                                    if(empty($res)){
                                    $table .=           '<option value="" class="bg-danger text-danger">No records found</option>';
                                                    }else
                                                    {
                                                        while($row = mysql_fetch_array($res)){
                                                
                                    $table .=       '<option value="';
                                    $table .=                   $row['unitID'];
                                    $table .=       '">';
                                     $table .=          $row['name']; 
                                    $table .=       '</option>';
                                                        }
                                                    }
                                                
                                    $table .=  '</select>
                                            <br>
                                            <select class="form-control" name="tuesday_class[]">
                                                <option value="">- Class -</option>
                                                <optgroup label="Class">';
                                                     if(empty($result5)){
                                    $table .=           '<option class="bg-danger text-danger">No records found</option>';
                                                        }else
                                                        {
                                                            while($row = mysql_fetch_array($result5)) {
                                    $table .=                  '<option value="';
                                    $table .=                           $row['classID'];
                                    $table .=                           '"'; 
                                                                    if($monday_class==$row['classID'])
                                                                    {
                                    $table .=                         "selected='selected'";
                                                                    }
                                    $table .=                            '>';
                                    $table .=                           $row['name'];
                                    $table .=                  '</option>';
                                                            }
                                                        }
                                    $table .=   '</optgroup>
                                            </select>
                                        </td>
                                    
                                        
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);">
                                            <select class="form-control" id="course" name="wednesday_unit[]">
                                                <option value="">- Select Unit -</option>';
                                                    $sql = "SELECT unitID,name
                                                            FROM `unit`
                                                            WHERE `courseID` = ".$_GET['cid']."
                                                            AND yosID = ".$_GET['yos']." 
                                                            AND semisterID = ".$_GET['sem']."
                                                            ORDER BY name ASC ";
                                                    $res = mysql_query($sql);
                                                    if(empty($res)){
                                    $table .=           '<option value="" class="bg-danger text-danger">No records found</option>';
                                                    }else
                                                    {
                                                        while($row = mysql_fetch_array($res)){
                                                
                                    $table .=       '<option value="';
                                    $table .=                   $row['unitID'];
                                    $table .=       '">';
                                     $table .=          $row['name']; 
                                    $table .=       '</option>';
                                                        }
                                                    }
                                                
                                    $table .=  '</select>
                                            <br>
                                            <select class="form-control" name="wednesday_class[]">
                                                <option value="">- Class -</option>
                                                <optgroup label="Class">';
                                                     if(empty($result5)){
                                    $table .=           '<option class="bg-danger text-danger">No records found</option>';
                                                        }else
                                                        {
                                                            while($row = mysql_fetch_array($result5)) {
                                    $table .=                  '<option value="';
                                    $table .=                           $row['classID'];
                                    $table .=                           '"'; 
                                                                    if($monday_class==$row['classID'])
                                                                    {
                                    $table .=                         "selected='selected'";
                                                                    }
                                    $table .=                            '>';
                                    $table .=                           $row['name'];
                                    $table .=                  '</option>';
                                                            }
                                                        }
                                    $table .=   '</optgroup>
                                            </select>
                                        </td>
                                    
                                        
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);">
                                            <select class="form-control" id="course" name="thursday_unit[]">
                                                <option value="">- Select Unit -</option>';
                                                    $sql = "SELECT unitID,name
                                                            FROM `unit`
                                                            WHERE `courseID` = ".$_GET['cid']."
                                                            AND yosID = ".$_GET['yos']." 
                                                            AND semisterID = ".$_GET['sem']."
                                                            ORDER BY name ASC ";
                                                    $res = mysql_query($sql);
                                                    if(empty($res)){
                                    $table .=           '<option value="" class="bg-danger text-danger">No records found</option>';
                                                    }else
                                                    {
                                                        while($row = mysql_fetch_array($res)){
                                                
                                    $table .=       '<option value="';
                                    $table .=                   $row['unitID'];
                                    $table .=       '">';
                                     $table .=          $row['name']; 
                                    $table .=       '</option>';
                                                        }
                                                    }
                                                
                                    $table .=  '</select>
                                            <br>
                                            <select class="form-control" name="thursday_class[]">
                                                <option value="">- Class -</option>
                                                <optgroup label="Class">';
                                                     if(empty($result5)){
                                    $table .=           '<option class="bg-danger text-danger">No records found</option>';
                                                        }else
                                                        {
                                                            while($row = mysql_fetch_array($result5)) {
                                    $table .=                  '<option value="';
                                    $table .=                           $row['classID'];
                                    $table .=                           '"'; 
                                                                    if($monday_class==$row['classID'])
                                                                    {
                                    $table .=                         "selected='selected'";
                                                                    }
                                    $table .=                            '>';
                                    $table .=                           $row['name'];
                                    $table .=                  '</option>';
                                                            }
                                                        }
                                    $table .=   '</optgroup>
                                            </select>
                                        </td>
                                    
                                        
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);">
                                            <select class="form-control" id="course" name="friday_unit[]">
                                                <option value="">- Select Unit -</option>';
                                                    $sql = "SELECT unitID,name
                                                            FROM `unit`
                                                            WHERE `courseID` = ".$_GET['cid']."
                                                            AND yosID = ".$_GET['yos']." 
                                                            AND semisterID = ".$_GET['sem']."
                                                            ORDER BY name ASC ";
                                                    $res = mysql_query($sql);
                                                    if(empty($res)){
                                    $table .=           '<option value="" class="bg-danger text-danger">No records found</option>';
                                                    }else
                                                    {
                                                        while($row = mysql_fetch_array($res)){
                                                
                                    $table .=       '<option value="';
                                    $table .=                   $row['unitID'];
                                    $table .=       '">';
                                     $table .=          $row['name']; 
                                    $table .=       '</option>';
                                                        }
                                                    }
                                                
                                    $table .=  '</select>
                                            <br>
                                            <select class="form-control" name="friday_class[]">
                                                <option value="">- Class -</option>
                                                <optgroup label="Class">';
                                                     if(empty($result5)){
                                    $table .=           '<option class="bg-danger text-danger">No records found</option>';
                                                        }else
                                                        {
                                                            while($row = mysql_fetch_array($result5)) {
                                    $table .=                  '<option value="';
                                    $table .=                           $row['classID'];
                                    $table .=                           '"'; 
                                                                    if($monday_class==$row['classID'])
                                                                    {
                                    $table .=                         "selected='selected'";
                                                                    }
                                    $table .=                            '>';
                                    $table .=                           $row['name'];
                                    $table .=                  '</option>';
                                                            }
                                                        }
                                    $table .=   '</optgroup>
                                            </select>
                                        </td>
                                        <td style="text-align:center;font-weight:normal;color:rgb(6,6,6);">
                                            <button style="background-color:transparent;border:none;">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>';
                                   
                                   ?>
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
    <script>
    //remove row from table
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    //add row to table
    function add() {
        $("table").append(<?php echo $table;?>);
    }
    </script>
</html>