<?php 
    include'include/session.php';
    
    $tableName="faculty";
    $tableName1="course";
    $tableName2="semister";
    $tableName3="admitted";
    
    //$limit = 1500;
    
    // Get page data
    $query11 = "SELECT * FROM $tableName ORDER BY name ASC ";
    $result11 = mysql_query($query11);
    
    // Get page data
    $query2 = "SELECT * FROM $tableName2 ORDER BY sem ASC ";
    $result2 = mysql_query($query2);
    
    $sql = "SELECT COUNT(*) as num FROM $tableName3"; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $total_records = $pages['num'];
    /*$total_pages = ceil($total_records / $limit);
    
    $stages = 3;
    if(isset($_GET['page'])){
        $page = mysql_escape_string($_GET['page']);
    }else {$page=0;}
    
    if($page){
    $start = ($page - 1) * $limit;
    }else{
    $start = 0;
    }*/
    // Get page data
    $query1 = "SELECT * FROM $tableName3 ORDER BY fname ASC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
    
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
    <title>Class | Admissions | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">Admissions | Waka CMEC Training Institute</a>
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
                            <a href="pre-admission.php">
                                <i class="fa fa-book" style="margin-right:5px;"></i>
                                Pre Admit 
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
                        <li class="active" role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;padding-top:10px;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
            <?php 
                if(empty($result11)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Error occured while trying to retrieve search options!</span>
                        </div>';
                }else{
                    include 'validate/classes.php';
                                       
                    if(isset($_SESSION['success']))
                    {
                        echo'<div class="alert alert-success absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-success">Students have been promoted to <b>Semester</b> 2</span>
                            </div>';
                            unset($_SESSION['success']); 
                    }

                    if(isset($_SESSION['success1']))
                    {
                        $yr = $_SESSION['success1']; 
                        echo'<div class="alert alert-success absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-success">Students have been promoted to <b>Year</b> '.$yr.', <b>Semester</b> 1.</span>
                            </div>';
                            unset($_SESSION['success1']); 
                    } 
                    
                    if(isset($_SESSION['success2']))
                    { 
                        echo'<div class="alert alert-success absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-success">Students have been <b>completed</b> the course.</span>
                            </div>';
                            unset($_SESSION['success2']); 
                    } 
            ?>
            <div class="row">
            <div class="col-md-12" style="margin-bottom:1%;">
                <div class="col-md-4">
                    <label>Course</label>
                    <select class="form-control" id="course" name="course">
                        <option value="">- Select Course -</option>
                        <?php 
                            if(empty($result11)){
                                echo '<option class="bg-danger text-danger" value="">No faculty found</option>';
                            }else
                            {
                                while($row = mysql_fetch_array($result11)) {
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
                                        $cid = $_GET['cid'];
                                        
                                        if($cid==$rw['courseID']){
                                            echo "selected=selected";   
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
                                        if($sem==$row['semisterID']){
                                            echo "selected=selected";
                                        }else
                                        if(isset($_GET['sem'])){
                                            $s = $_GET['sem'];
                                            if($s == $row['semisterID']){
                                                echo "selected=selected";
                                            }
                                        }
                                    ?> 
                                >
                            <?php echo "Semester ".$row['sem'];?>
                        </option>
                            <?php }} ?>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label style="width:100%;">&nbsp;</label>
                    <button type="submit" name="activate" style="padding:5px 20px;color:rgb(1,1,1);">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
                <?php 
                if(isset($_GET['cid']) && isset($_GET['yos']) && isset($_GET['sem'])){ 
                    $quer = "SELECT * FROM $tableName3 WHERE courseID=".$_GET['cid']." AND yosID=".$_GET['yos']." AND semisterID=".$_GET['sem']." ORDER BY fname ASC";
                    $results = mysql_query($quer);
                    $count=  mysql_num_rows($results);
                    if($count > 0){
                ?>
                    <div class="col-md-2">
                        <label style="width:100%;">&nbsp;</label>
                        <button type="submit" name="promote"  onclick="return confirm('Sure you want to promote selected students to the next class?');" style="padding:5px 20px;color:rgb(1,1,1);">
                            <i class="fa fa-forward"></i> Promote
                        </button>
                    </div>
                <?php }} ?>
            </div>
            </div>
            <?php 
                if(isset($_GET['cid']) && isset($_GET['yos']) && isset($_GET['sem'])){ 
                    $quer = "SELECT * FROM $tableName3 WHERE courseID=".$_GET['cid']." AND yosID=".$_GET['yos']." AND semisterID=".$_GET['sem']." ORDER BY fname ASC";
                    $results = mysql_query($quer);
                    $count=  mysql_num_rows($results);
                    if($count < 1){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <span class="text-danger">No records found!</span>
                            </div>';
                    }else{
            ?>
            
            <div class="col-md-12" style="width:100%;">
                <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                    <table class="table table-striped" id="myTable">
                        <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                            <tr>
                                <th style="width:10px;text-align:center;">
                                    <input type="checkbox"  onClick="toggle(this)">
                                </th>
                                <th>Student </th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Admission No.</th>
                                <th>Faculty.</th>
                                <th>Course.</th>
                                <th>YoS</th>
                                <th>Sem.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row = mysql_fetch_array($results)) { 
                            ?>
                            <tr>
                                <td style="text-align:center">
                                    <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['studentID']; ?>">
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['fname'].' '.$row['lname'].' '.$row['surname'];?> </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                    <?php echo $row['gender'];?>
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                    <?php 
                                        //explode the date to get month, day and year
                                        $dob = date_format(date_create($row['dob']),"m-d-Y.");
                                        $birthDate = explode("-", $dob);
                                        //get age from date or birthdate
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                          ? ((date("Y") - $birthDate[2]) - 1)
                                          : (date("Y") - $birthDate[2]));
                                        echo $age." yrs.";
                                    ?> 
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['phone1'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['adm'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['faculty'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['course'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo "Year ".$row['yos'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo "Sem. ".$row['sem'];?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php }}} ?>
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
    <script src="ajax_1.js"></script>
</body>
    <script language="JavaScript">
        function toggle(source) {
          checkboxes = document.getElementsByName('checkbox[]');
          for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
          }
        }
    </script>
    
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>