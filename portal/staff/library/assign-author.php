<?php 
    include'include/session.php';
    $tableName="viewBooks";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Author | Library | WAKA CMEC</title>
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
                        <li class="active" role="presentation"><a href="view-book.php"><i class="fa fa-book" style="margin-right:5px;"></i>Books </a></li>
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
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;padding-top:10px;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <div class="row" style="width:98%;margin-right:auto;margin-left:auto;margin-bottom:10px;padding-top:5px;padding-bottom:5px;background-color:rgb(239,239,239);">
            <h2 style="height:auto;margin:0px;font-size:16px;color:rgb(1,1,1);font-weight:bold;margin-left:1%;">Assign Author to Book</h2>
        </div>
        <form method="POST">
            <div style="width:98%;margin:0 auto;">
            <?php 
                if(!isset($_GET['id'])){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Error occured!</span>
                        </div>';
                }else{
                if(mysql_escape_string($_GET['id'])){
                    $array = unserialize(base64_decode($_GET['id']));
                    $arrays=implode(',',$array);
                    // Get page data
                    $query1 = "SELECT * FROM $tableName WHERE bookID IN ($arrays)";
                    $result = mysql_query($query1);
                    if(empty($result))
                    {
                        $rowcount=0;
                    }
                    else
                    {
                        $rowcount=  mysql_num_rows($result);
                    }
                }
                
                    
                    
                if($rowcount<=0){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
                    include 'validate/assignAuthor.php';
                                       
                    if(isset($_SESSION['new'])=='True')
                    {
                        echo'<div class="alert alert-success absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-success">Author has been assigned successfully</span>
                            </div>';
                            unset($_SESSION['new']); 
                    }
            ?>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                        <table class="table table-striped">
                            <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                <tr>
                                    <th style="width:30px;text-align:center;"># </th>
                                    <th style="text-align:center;">ISBN </th>
                                    <th>Title </th>
                                    <th>Category </th>
                                    <th>Publisher </th>
                                    <th style="text-align:center;">Authors </th>
                                    <th style="text-align:center;">Shelf </th>
                                    <th style="width:30px;text-align:center;">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    while($row = mysql_fetch_array($result)) { 
                                ?>
                                    <tr>
                                        <td style="text-align:center;font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $i++;?> </td>
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo $row['ISBN'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(4,4,4);"> <?php echo substr($row['title'],0,80);?> </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo $row['category'];?> </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo substr($row['publisher'],0,80);?> </td>
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                            <a style="display:block;" href="authoredBook.php?id=<?php echo $row['bookID']?>">
                                                <?php echo $row['Authors'];?> 
                                            </a>
                                        </td>
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);"> <?php echo $row['shelf'];?> </td>
                                        <td style="text-align:center;font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                            <button type="submit" name="remove" value="<?php echo $row['bookID'];?>" style="border:none;background-color:transparent; margin:0px;padding:0px;" onClick="return confirm('Are you sure you want to remove this book from list\nTitle:<?php echo $row['title'].'\nISBN:'.$row['ISBN']; ?>?');">
                                                <i class="fa fa-remove text-danger"></i>
                                            </button>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
                    <div class="col-md-12">
                        <div style="width:98%;margin:0 auto;margin-bottom:1%;">
                        <?php
                            $select = "SELECT authorID,name,gender FROM author ORDER BY name ASC";
                            $result = mysql_query($select);
                            $count=  mysql_num_rows($result);
                                    
                            if($count<1){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">Failed to retrieve author info.</span>
                                    </div>';
                            }else{
                                ?>
                                <select class="form-control" name="author">
                                    <option value="">- Select Author -</option>
                                    <optgroup label="Category">
                                        <?php while ($row = mysql_fetch_array($result)) { ?>
                                          <option value="<?php echo $row['authorID'];?>" <?php if($row['authorID']=="$author"){echo "selected=selected";}?> >
                                              <?php echo $row['name']. " | ".$row['gender'];?>
                                          </option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                        <?php } ?>
                        </div>
                        <div style="width:98%;margin:0 auto;margin-bottom:1%;">
                            <button type="submit" name="assign" style="padding:5px 20px;color:rgb(1,1,1);">Assign</button>
                        </div>
                    </div>    
                </div>
            <?php }} ?>
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