<?php 
    include'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee | Accounts | WAKA CMEC</title>
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
    
    <script>
        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data) 
        {

            var mywindow = window.open('', 'printReport', 'height=500,width=1000');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css"  media="print">');
            
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/Data-Table.css" media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/Data-Table1.css" media="print">');
            
            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>
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
    <div style="width:98%;padding:0px;padding-right:0px;padding-left:auto;padding-bottom:3%;margin-bottom:2%;background-color:rgba(57,12,12,0);margin-right:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-left:auto;margin-top:10px;">
        <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-12">
                    <?php 
                        
                        if(isset($_SESSION['feeSuccess'])=='success' & isset($_SESSION['student']))
                        {
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <span class="text-success"><i class="fa fa-check"></i> &nbsp; Fee payment successful!</span>
                                </div>'; 
                            
                            $student = $_SESSION['student'];
                            
                            $select = "SELECT s.adm,s.yosID,s.semisterID,s.fname,s.lname,s.surname,s.gender,c.name AS course,f.name AS faculty
                                        from student s
                                        LEFT JOIN course c
                                        ON s.courseID = c.courseID
                                        LEFT JOIN faculty f
                                        ON c.facultyID = f.facultyID
                                        WHERE s.studentID=".$student;
                            $outcome = mysql_query($select);
                            $count = mysql_affected_rows();
                            
                            $query = "SELECT s.*,f.amount AS fee,CONCAT(st.fname,' ',st.lname) AS staff
                                        from studentfee s
                                        LEFT JOIN fee f
                                        ON s.feeID = f.feeID
                                        LEFT JOIN staff st
                                        ON s.staffID = st.staffID
                                        WHERE s.studentID=$student
                                        ORDER BY s.paymentID DESC LIMIT 1";
                            $result = mysql_query($query);
                            $counr_row = mysql_affected_rows();
                            
                            while($row = mysql_fetch_assoc($outcome)) {
                    ?>    
                            
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-right">
                                            <button type="submit" class="print" onclick="PrintElem('#printReport')" style="margin-right:4%;margin-top:10px;padding:3px 10px;color:rgb(1,1,1);"><a class="fa fa-print"></a> Print </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>     
                <div id="printReport">    
                    <div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center" style="text-align:center;">
                                    <img class="img-responsive" src="../../../assets/img/logo.png" alt="Logo: WAKA CMEC" style="width:100px;margin-top:0px;margin-right:auto;margin-left:auto;">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center" style="color:rgb(4,4,4);margin-bottom:5px;text-align:center;font-weight:bold;">WAKA CMEC TRAINING INSTITUTE AND HOSPITAL</p>
                                    <p class="text-center" style="color:rgb(4,4,4);font-size:13px;text-align:center;font-weight:bold;">Student Fee Receipt </p>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <table style="width:100%;border:none;">
                                        <thead style="background-color:#efefef;font-size:12px;">
                                            <tr style="background-color:#efefef;font-size:12px;">
                                                <th style="border:none;"><b>Name</b></th>
                                                <th style="border:none;"><b>Adm</b></th>
                                                <th style="border:none;"><b>Course</b></th>
                                                <th style="border:none;"><b>Year</b></th>
                                                <th style="border:none;"><b>Sem.</b></th>
                                                <th style="border:none;"><b>Date</b></th>
                                                <th style="border:none;text-align:right;"><b>RNo.</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="width:100%;border:none;">
                                            <td style="border:none;font-size:12px;">
                                                <?php echo $row['fname'].' '.$row['lname'].' '.$row['surname'];?>
                                            </td>
                                            <td style="border:none;font-size:12px;">
                                                <?php echo $row['adm'];?>
                                            </td>
                                            <td style="border:none;font-size:12px;">
                                                <?php echo $row['course'];?>
                                            </td>
                                            <td style="border:none;font-size:12px;">
                                                <?php echo $row['yosID'];?>
                                            </td>
                                            <td style="border:none;font-size:12px;">
                                                <?php echo $row['semisterID'];?>
                                            </td>
                                            <td style="border:none;font-size:12px;">
                                                <?php 
                                                    while($rows = mysql_fetch_assoc($result)) {
                                                        echo date_format(date_create($rows['dop']),"d-M-Y.").date(" g:i A", strtotime($rows['dop'])); 
                                                    } 
                                                ?>
                                            </td>
                                            <td style="border:none;text-align:right;font-size:12px;">
                                                <?php 
                                                    mysql_data_seek($result,0);
                                                    while($rows = mysql_fetch_assoc($result)) {
                                                        echo sprintf('%09d',$rows['paymentID']); 
                                                    } 
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <table class="table-striped" style="width:100%;color:black;">
                                        <thead style="background-color:#efefef;">
                                            <tr style="background-color:#efefef;">
                                                <th style="text-align:center;">Fee</th>
                                                <th style="text-align:center;">Amount Paid</th>
                                                <th style="text-align:center;">Method of Payment</th>
                                                <th style="text-align:center;">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                mysql_data_seek($result,0);
                                                while($rows = mysql_fetch_assoc($result)) {
                                            ?>
                                                <tr style="width:100%;">
                                                    <td style="text-align:center;">
                                                        <?php echo "Kshs.".number_format($rows['fee'],2); ?>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <?php echo "Kshs.".number_format($rows['amount'],2); ?>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <?php echo $rows['mop']; ?>
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <?php echo "Kshs.".number_format($rows['balance'],2); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"> <hr> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        &nbsp;<b>You were served by: </b>&nbsp;
                                                        <?php echo $rows['staff']; ?>
                                                    </td>
                                                </tr>
                                            <?php   } ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                            
                            
                            
                    <?php
                        }
                        unset($_SESSION['feeSuccess']);
                        unset($_SESSION['student']);
                        
                        }else{
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger"><i class="fa fa-times"></i> &nbsp; Error occured</span>
                                </div>';
                        }
                    ?>
                </div>
                
            </div>
        </div>
        <hr>
    </div>
        <script src="../../../assets/js/jquery.min.js"></script>
        <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../../../assets/js/ebs-simple-login-form.js"></script>
        <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
        <script src="../../../assets/js/Profile-Edit.js"></script>
        <script src="../../../assets/js/Sidebar-Menu.js"></script>
    </div>
</body>

</html>