<?php 
    include'include/session.php';
    
    $tableName="book";
    $tableName1="author";
    $tableName2="publisher";
    $tableName3="shelf";
    $tableName4="category";
    $tableName5="staffborrow";
    $tableName6="studentborrow";
    
    $sql = "SELECT COUNT(*) as num FROM $tableName"; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $totalBooks = $pages['num'];
    
    $sql1 = "SELECT COUNT(*) as num FROM $tableName1"; 
    $pages1 = mysql_fetch_array(mysql_query($sql1));
    $totalAuthors = $pages1['num'];
    
    $sql2 = "SELECT COUNT(*) as num FROM $tableName2"; 
    $pages2 = mysql_fetch_array(mysql_query($sql2));
    $totalPublishers = $pages2['num'];
    
    $sql3 = "SELECT COUNT(*) as num FROM $tableName3"; 
    $pages3 = mysql_fetch_array(mysql_query($sql3));
    $totalShelves = $pages3['num'];
    
    $sql4 = "SELECT COUNT(*) as num FROM $tableName4"; 
    $pages4 = mysql_fetch_array(mysql_query($sql4));
    $totalCategories = $pages4['num'];
    
    $sql5 = "SELECT COUNT(*) as num FROM $tableName5 WHERE actualReturnDate IS NULL"; 
    $pages5 = mysql_fetch_array(mysql_query($sql5));
    $total5 = $pages5['num'];
    
    $sql6 = "SELECT COUNT(*) as num FROM $tableName6 WHERE actualReturnDate IS NULL"; 
    $pages6 = mysql_fetch_array(mysql_query($sql6));
    $total6 = $pages6['num'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Library | WAKA CMEC</title>
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
                        <li class="active" role="presentation">
                            <a href="index.php">
                                <i class="fa fa-table" style="margin-right:5px;"></i>
                                Dashboard
                            </a>
                        </li>
                        <li role="presentation"><a href="view-book.php"><i class="fa fa-book" style="margin-right:5px;"></i>Books </a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                                <i class="fa fa-clock-o" style="margin-right:5px;"></i>
                                 Due 
                                 <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="student-due.php">Students </a></li>
                                <li role="presentation"><a href="staff-due.php">Staff </a></li>
                            </ul>
                        </li>
                        <!--<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                                <i class="fa fa-hourglass" style="margin-right:5px;"></i>
                                Over Due
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" style="background-color:rgb(249,249,249);"><a href="student-overdue.php">Students </a></li>
                                <li role="presentation" style="background-color:rgb(249,249,249);"><a href="staff-overdue.php">Staff </a></li>
                            </ul>
                        </li>-->
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-bookmark" style="margin-right:5px;"></i>Members<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation" style="background-color:#f9f9f9;"><a href="students.php">Students </a></li>
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
    <div style="width:98%;padding:0px;padding-right:0px;padding-left:auto;background-color:rgba(57,12,12,0);margin-right:auto;margin-left:auto;margin-top:10px;">
        <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Books </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($totalBooks > 999 && $totalBooks <= 999999) {
                                    echo number_format(($totalBooks / 1000),1). ' K';
                                }else
                                if($totalBooks > 999999 && $totalBooks <= 999999999) {
                                    echo number_format(($totalBooks / 1000000),1). ' M';
                                }else
                                if($totalBooks > 999999999 && $totalBooks <= 999999999999) {
                                    echo number_format(($totalBooks / 1000000000),1). ' B';
                                }else
                                if($totalBooks > 999999999999 && $totalBooks <= 999999999999999) {
                                    echo number_format(($totalBooks / 1000000000000),1). ' T';
                                }else {echo $totalBooks;}
                            ?> 
                        </p>
                        <hr>
                        <a href="book.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Book</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Authors </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalAuthors; ?> </p>
                        <hr>
                        <a href="author.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Author</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Publishers </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalPublishers; ?> </p>
                        <hr>
                        <a href="publisher.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Publisher</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Categories </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalCategories; ?> </p>
                        <hr>
                        <a href="category.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Category</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container" style="margin-top:1%;">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Shelves </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php echo $totalShelves; ?> </p>
                        <hr>
                        <a href="shelf.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Shelf</button>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Staff Due Books</p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($total5 > 999 && $total5 <= 999999) {
                                    echo number_format(($total5 / 1000),1). ' K';
                                }else
                                if($total5 > 999999 && $total5 <= 999999999) {
                                    echo number_format(($total5 / 1000000),1). ' M';
                                }else
                                if($total5 > 999999999 && $total5 <= 999999999999) {
                                    echo number_format(($total5 / 1000000000),1). ' B';
                                }else
                                if($total5 > 999999999999 && $total5 <= 999999999999999) {
                                    echo number_format(($total5 / 1000000000000),1). ' T';
                                }else {echo $total5;}
                            ?> 
                        </p>
                        <hr>
                        <a href="staff-due.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Students Due Books</p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($total6 > 999 && $total6 <= 999999) {
                                    echo number_format(($total6 / 1000),1). ' K';
                                }else
                                if($total6 > 999999 && $total6 <= 999999999) {
                                    echo number_format(($total6 / 1000000),1). ' M';
                                }else
                                if($total6 > 999999999 && $total6 <= 999999999999) {
                                    echo number_format(($total6 / 1000000000),1). ' B';
                                }else
                                if($total6 > 999999999999 && $total6 <= 999999999999999) {
                                    echo number_format(($total6 / 1000000000000),1). ' T';
                                }else {echo $total6;}
                            ?> 
                        </p>
                        <hr>
                        <a href="student-due.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">View</button>
                        </a>
                    </div>
                </div>
                <!--<div class="col-md-3 col-xs-3">
                    <div>
                        <p class="text-center" style="color:rgb(3,3,3);font-size:24px;font-weight:bold;">Categories </p>
                        <hr>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> <?php //echo $totalCategories; ?> </p>
                        <hr>
                        <a href="category.php">
                            <button style="width:98%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">Add Category</button>
                        </a>
                    </div>
                </div>
                -->
            </div>
        </div>
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