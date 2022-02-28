<?php 
    include'include/session.php';
    
    if(isset($_GET['id'])){
        $id=mysql_real_escape_string($_GET['id']);
        // Get page data
        $query = mysql_query("SELECT * FROM quiz WHERE quizID=$id");
        
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exam Quiz | Time Tabler | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);z">Time Tabler | Waka CMEC Training Institute</a>
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
                            <a href="class.php">
                                Class
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Time Table 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <!--<li role="presentation"><a href="view-time-tables.php">Lectures </a></li>-->
                                <li role="presentation"><a href="exams.php">Exams </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%; padding-bottom:3%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <div style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
            <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">Update Exam Quiz</h2>
        </div>
        <form method="POST">
            <?php 
                include 'validate/update-quiz.php';
                
            ?>
        <div class="col-md-12" style="margin-bottom:1%;">
            <?php
                if(!isset($_GET['id'])){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Error occured while trying to retrieve Course info.!</span>
                        </div>';
                }else
                {
                    include 'validate/update-quiz.php';
                    
                    while($row = mysql_fetch_array($query)){
                ?>
                
                <div class="col-md-12">
                    <hr>
                    <div class="container">
                        <div>
                                <div class="form-group" style="margin-top:30px;">
                                    <div id="formdiv">
                                        <div class="row" style="margin-right:0px;margin-left:0px;margin-top:-16px;">
                                            <div style="padding-top:2px;padding-bottom:2px;margin-bottom:10px;background-color:rgb(239,239,239);">
                                                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">Update Question Details</h2>
                                            </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Quiz <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <textarea class="form-control" name="quiz" required="" placeholder="Write Quiz here"><?php echo $row['quiz']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Option A <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <input type="text" class="form-control" name="a" required="" value="<?php echo $row['option_a']; ?>" required="" placeholder="Enter option a">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Option B <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <input type="text" class="form-control" name="b" value="<?php echo $row['option_b']; ?>" required="" placeholder="Enter option b">
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Option C <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <input type="text" class="form-control" name="c" value="<?php echo $row['option_c']; ?>" required="" placeholder="Enter option c">
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Option D <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <input type="text" class="form-control" name="d" value="<?php echo $row['option_d']; ?>" required="" placeholder="Enter option d">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Answer <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <select class="form-control" name="answer" autofocus="" required="" style="font-family:Roboto, sans-serif;font-weight:normal;">
                                                            <option value="">- Select Correct Answer -</option>
                                                            <optgroup label="Answer">
                                                                <option value="option_a" <?php if($row['answer']=="option_a"){echo 'selected="selected"';} ?>> Option A</option>
                                                                <option value="option_b" <?php if($row['answer']=="option_b"){echo 'selected="selected"';} ?>> Option B</option>
                                                                <option value="option_c" <?php if($row['answer']=="option_c"){echo 'selected="selected"';} ?>> Option C</option>
                                                                <option value="option_d" <?php if($row['answer']=="option_d"){echo 'selected="selected"';} ?>> Option D</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="margin-bottom:20px;">
                                                        <label>Marks <a style="color:red;">*</a></label>
                                                    </div>
                                                    <div class="col-md-10" style="margin-bottom:20px;">
                                                        <input type="number" class="form-control" name="marks" min="1" value="<?php echo $row['marks']; ?>" required="" placeholder="Enter Marks for Quiz">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                            <div class="col-md-12 text-center">
                                                <button name="exit" type="submit" class="btn-danger" style="padding:5px 20px;" onclick="return confirm('All data shall go unsaved. Want to Exit?');">
                                                    <i class="fa fa-power-off"></i> Exit
                                                </button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button name="update" type="submit" style="padding:5px 20px;color:rgb(1,1,1);">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php }}?>
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