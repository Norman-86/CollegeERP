<?php 
    include'include/session.php';
    
    // Get page data
    $query3 = "SELECT * FROM semisterPeriod GROUP BY start,end ORDER BY start DESC LIMIT 1";
    $result3 = mysql_query($query3);
    
    
    if(isset($_GET['id'])){
        $id = mysql_escape_string($_GET['id']);
        $query = "SELECT * FROM admitted WHERE studentID =".$id;
        $result = mysql_query($query);
        
        $qry = "SELECT * FROM studentfee WHERE studentID =".$id." ORDER BY dop DESC LIMIT 1";
        $results = mysql_query($qry);
        $count=  mysql_num_rows($results);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Accounts | WAKA CMEC</title>
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
    <nav class="navbar navbar-default" style="background-color:rgb(21,164,113);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(21,164,113);">
                    Accounts | Waka CMEC Training Institute
                </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(21,164,113);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
                                    Students 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="view-admitted.php">Admitted </a></li>
                                <li role="presentation"><a href="view-completed.php">Alumni </a></li>
                            </ul>
                        </li>
                        <li role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                        
                        <li role="presentation">
                            <a href="view-fee.php">
                                <i class="fa fa-book" style="margin-right:5px;"></i>
                                Fee 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>   
    <?php
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <span class="text-danger">Error occured while trying to display info</span>
                </div>';
        }else
        if(empty($result)){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <span class="text-danger">Failed to identify student</span>
                </div>';
        }else
        {
    ?>
    <div class="row" style="width:100%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;max-width:1000px;">
        
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-money"></i> &nbsp;Payment</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    
                    <?php 
                        include 'validate/payment.php';
                        
                        if(isset($_SESSION['success'])=="true"){
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-success">Fee payment successful</span>
                                </div>';
                            unset($_SESSION['success']); 
                        }
                        
                        while($name1 = mysql_fetch_array($result)) {
                    ?>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Student:</label>
                                <p>
                                    <?php echo $name1['surname']." ".$name1['fname']." ".$name1['lname'];?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Gender:</label>
                                <p><?php echo $name1['gender'];?></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Admission No:</label>
                                <p><?php echo $name1['adm'];?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Course:</label>
                                <p><?php echo $name1['course'];?></p>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">YoS/Sem:</label>
                                <p><?php echo "Yr.".$name1['yos'].",Sem.".$name1['sem'];?></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Balance:</label>
                                <?php 
                                    if(empty($results)){
                                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                <span class="text-danger">Error occured!</span>
                                            </div>';                               
                                    }else
                                    if($count < 1){
                                        echo '<input type="text" readonly name="balance" value="Kshs.0" style="width:100%;background-color:transparent;border:none;">';                               
                                    }else
                                    {
                                    while($name2 = mysql_fetch_array($results)) { 
                                        
                                ?>
                                    <input type="hidden" readonly name="balance" value="<?php echo $name2['balance'];?>" style="width:100%;background-color:transparent;border:none;">
                                    <input type="hidden" readonly name="fed" value="<?php echo $name2['feeID'];?>" style="width:100%;background-color:transparent;border:none;">
                                    <input type="text" readonly value="<?php echo "Kshs. ".number_format($name2['balance'],2);?>" style="width:100%;background-color:transparent;border:none;">
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Semester Period:</label>
                                <select class="form-control" name="period" readonly>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Mode of Payment:</label>
                                <select class="form-control" name="mop">
                                    <option value="">- Select Mode of Payment -</option>
                                    <optgroup label="Mode of Payment">
                                        <option value="Bank" <?php if($mop == 'Bank'){echo "selected=selected";}?>>
                                            Bank
                                        </option>
                                        <option value="Cash" <?php if($mop == 'Cash'){echo "selected=selected";}?>>
                                            Cash
                                        </option>
                                        <option value="M-Pesa" <?php if($mop == 'M-Pesa'){echo "selected=selected";}?>>
                                            M-Pesa
                                        </option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Amount Paid (Kshs):</label>
                                <input class="form-control" type="number" min="1" step="any" name="fee" value="<?php echo $fee;?>" required="" placeholder="Amount paid (Kshs)" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-0 col-md-12 text-center">
                            <button name="update" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
           
        </form>
    </div>
     <?php } ?>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>