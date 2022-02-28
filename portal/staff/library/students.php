<?php 
    include'include/session.php';
    
    $tableName="admitted";
    //$limit = 1500;
    
    $sql = "SELECT COUNT(*) as num FROM $tableName"; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $total_records = $pages['num'];
    
    // Get page data
    $query1 = "SELECT * FROM $tableName ORDER BY fname ASC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students | Library | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">Library | Waka CMEC Training Institute</a>
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
                        <li role="presentation"><a href="index.php"><i class="fa fa-table" style="margin-right:5px;"></i>Dashboard</a></li>
                        <li role="presentation"><a href="view-book.php"><i class="fa fa-book" style="margin-right:5px;"></i>Books </a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-clock-o" style="margin-right:5px;"></i>Due <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="student-due.php">Students </a></li>
                                <li role="presentation"><a href="staff-due.php">Staff </a></li>
                            </ul>
                        </li>
                        <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="glyphicon glyphicon-hourglass" style="margin-right:5px;"></i>Over Due<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" style="background-color:rgb(249,249,249);"><a href="student-overview.php">Students </a></li>
                                <li role="presentation" style="background-color:rgb(249,249,249);"><a href="staff-overview.php">Staff </a></li>
                            </ul>
                        </li>-->
                        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-bookmark" style="margin-right:5px;"></i>Members<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active" role="presentation" style="background-color:#f9f9f9;"><a href="students.php">Students </a></li>
                                <li role="presentation" style="background-color:rgb(249,249,249);"><a href="staff.php">Staff </a></li>
                            </ul>
                        </li>
                        <li role="presentation"><a href="view-author.php">Authors </a></li>
                        <li role="presentation"><a href="view-publisher.php">Publishers </a></li>
                        <li role="presentation"><a href="view-shelf.php">Shelves </a></li>
                        <li role="presentation"><a href="view-category.php">Categories </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:100%;margin-right:auto;margin-left:auto;padding-top:10px;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;max-width:1000px;">
        <form method="POST">
            <?php 
                if($total_records<=0){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
                    include("validate/issue.php");
                        
            ?>
            <div class="col-md-12">
                <h2 style="font-weight:normal;">Students</h2>
            </div>
            <div class="col-md-12" style="width:100%;">
                    <table class="table table-striped" id="myTable">
                        <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                            <tr>
                                <th>Student </th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Admission No.</th>
                                <th>Faculty.</th>
                                <th>Course.</th>
                                <th>YoS</th>
                                <th>Sem.</th>
                                <th style="width:10%;"><i class="fa fa-cog ml-3x"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                while($row = mysql_fetch_array($result)) { 
                            ?>
                            <tr>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['fname'].' '.$row['lname'].' '.$row['surname'];?> </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                    <?php echo $row['gender'];?>
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                    <?php echo $row['age']." yrs.";?> 
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['phone1'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['adm'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['facultyAbbreviation'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo $row['courseAbbreviation'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo "Year ".$row['yos'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                        <?php echo "Sem. ".$row['sem'];?>
                                </td>
                                <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                    <button name="submit" type="submit" title="click to issue student with book" value="<?php echo $row['studentID']?>" style="display:block;">
                                        <i class="fa fa-check text-success" style="font-size:14px;"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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