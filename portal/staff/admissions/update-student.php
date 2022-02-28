<?php 
    include'include/session.php';
    
    // Get page data
    $query1 = "SELECT * FROM faculty ORDER BY name ASC ";
    $result = mysql_query($query1);
    
    if(isset($_GET['id'])){
        $q = "SELECT * FROM student WHERE studentID=".$_GET['id'];
        $r = mysql_query($q);
    }
    
    if(isset($_POST['f_id'])) {
      $sql = "select years from `course` where `courseID`=".mysql_real_escape_string($_POST['f_id']);
      $res = mysql_query($sql);
      if(mysql_num_rows($res) > 0) {
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
    <title>Update Student | Admission | WAKA CMEC</title>
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
    <link href="../../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                            <a href="pre-admit.php">
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
                        <li role="presentation">
                            <a href="class.php">Class</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top:10px;">
        <?php 
            if(empty($r)){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <span class="text-danger">Error occured!</span>
                    </div>';
            }else{
                while($row = mysql_fetch_array($r)) { 
        ?>
        <div>
            <form method="POST">
                <div class="form-group">
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:5px;padding-bottom:5px;background-color:rgb(239,239,239);">
                            <div class="col-md-12" style="width:100%;height:auto;">
                                <h2 style="height:auto;margin:0px;font-size:16px;color:rgb(1,1,1);font-weight:bold;margin-left:1%;">Update Student Admission No. <?php echo $row['adm'];?></h2>
                            </div>
                        </div>
                        <?php 
                            include('validate/updateStudent.php'); 

                        ?>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Surname (Optional)</p>
                                <input class="form-control" type="text" name="surname" value="<?php echo $row['surname'];?>" placeholder="Enter Surname (Optional)" style="margin-left:0px;font-family:Roboto, sans-serif;">
                            </div>
                            <div class="col-md-4">
                                <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">First Name <a class="text-danger">*<a/></p>
                                <input class="form-control" type="text" name="fname" value="<?php echo $row['fname'];?>" placeholder="Enter First Name" style="margin-left:0px;font-family:Roboto, sans-serif;">
                            </div>
                            <div class="col-md-4">
                                <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Other Names <a class="text-danger">*<a/></p>
                                <input class="form-control" type="text" name="lname" value="<?php echo $row['lname'];?>" placeholder="Enter Other Names" style="margin-left:0px;font-family:Roboto, sans-serif;">
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Gender <a class="text-danger">*<a/></p>
                                <select class="form-control" name="gender">
                                    <option value="">- Select Gender -</option>
                                    <optgroup label="Gender">
                                        <option value="Male" <?php if($row['gender']=="Male"){echo "selected=selected";}?> >Male</option>
                                        <option value="Female" <?php if($row['gender']=="Female"){echo "selected=selected";}?> >Female</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p for="dtp_input2" style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Date of Birth. <a class="text-danger">*<a/></p>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="date" name="dob" value="<?php echo date_format(date_create($row['dob']),"Y-m-d");?>" placeholder="Date of Birth (yyyy-mm-dd)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar">
                                    </span>
                                </div>
                                <input type="hidden" id="dtp_input2" value="" />
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">National ID No. (Optional) <a class="text-danger">*<a/></p>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="id" value="<?php echo $id;?>" placeholder="National ID (Optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Phone No. <a class="text-danger">*<a/></p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone1" value="<?php echo $row['phone1'];?>" placeholder="Enter phone number" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Alternative Phone No. (Optional)</p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone2" value="<?php echo $row['phone2'];?>" placeholder="Alternative phone number (optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">E-Mail (Optional).</p>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="mail" value="<?php echo $row['mail'];?>" placeholder="Enter mail (optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Country <a class="text-danger">*<a/></p>
                                <select class="form-control" name="country">
                                    <option value="Kenya">Kenya</option>
                                    <optgroup label="Select Country">
                                        <option value="Afganistan" <?php if($row['country'] == "Afganistan"){echo 'selected="selected"';}?> >Afghanistan</option>
                                        <option value="Albania" <?php if($row['country'] == "Albania"){echo 'selected="selected"';}?> >Albania</option>
                                        <option value="Algeria" <?php if($row['country'] == "Algeria"){echo 'selected="selected"';}?> >Algeria</option>
                                        <option value="American Samoa" <?php if($row['country'] == "American Samoa"){echo 'selected="selected"';}?> >American Samoa</option>
                                        <option value="Andorra" <?php if($row['country'] == "Andorra"){echo 'selected="selected"';}?> >Andorra</option>
                                        <option value="Angola" <?php if($row['country'] == "Angola"){echo 'selected="selected"';}?> >Angola</option>
                                        <option value="Anguilla" <?php if($row['country'] == "Anguilla"){echo 'selected="selected"';}?> >Anguilla</option>
                                        <option value="Antigua &amp; Barbuda" <?php if($row['country'] == "Antigua &amp; Barbuda"){echo 'selected="selected"';}?> >Antigua &amp; Barbuda</option>
                                        <option value="Argentina" <?php if($row['country'] == "Argentina"){echo 'selected="selected"';}?> >Argentina</option>
                                        <option value="Armenia" <?php if($row['country'] == "Armenia"){echo 'selected="selected"';}?> >Armenia</option>
                                        <option value="Aruba" <?php if($row['country'] == "Aruba"){echo 'selected="selected"';}?> >Aruba</option>
                                        <option value="Australia" <?php if($row['country'] == "Australia"){echo 'selected="selected"';}?> >Australia</option>
                                        <option value="Austria" <?php if($row['country'] == "Austria"){echo 'selected="selected"';}?> >Austria</option>
                                        <option value="Azerbaijan" <?php if($row['country'] == "Azerbaijan"){echo 'selected="selected"';}?> >Azerbaijan</option>
                                        <option value="Bahamas" <?php if($row['country'] == "Bahamas"){echo 'selected="selected"';}?> >Bahamas</option>
                                        <option value="Bahrain" <?php if($row['country'] == "Bahrain"){echo 'selected="selected"';}?> >Bahrain</option>
                                        <option value="Bangladesh" <?php if($row['country'] == "Bangladesh"){echo 'selected="selected"';}?> >Bangladesh</option>
                                        <option value="Barbados" <?php if($row['country'] == "Barbados"){echo 'selected="selected"';}?> >Barbados</option>
                                        <option value="Belarus" <?php if($row['country'] == "Belarus"){echo 'selected="selected"';}?> >Belarus</option>
                                        <option value="Belgium" <?php if($row['country'] == "Belgium"){echo 'selected="selected"';}?> >Belgium</option>
                                        <option value="Belize" <?php if($row['country'] == "Belize"){echo 'selected="selected"';}?> >Belize</option>
                                        <option value="Benin" <?php if($row['country'] == "Benin"){echo 'selected="selected"';}?> >Benin</option>
                                        <option value="Bermuda" <?php if($row['country'] == "Bermuda"){echo 'selected="selected"';}?> >Bermuda</option>
                                        <option value="Bhutan" <?php if($row['country'] == "Bhutan"){echo 'selected="selected"';}?> >Bhutan</option>
                                        <option value="Bolivia" <?php if($row['country'] == "Bolivia"){echo 'selected="selected"';}?> >Bolivia</option>
                                        <option value="Bonaire" <?php if($row['country'] == "Bonaire"){echo 'selected="selected"';}?> >Bonaire</option>
                                        <option value="Bosnia &amp; Herzegovina" <?php if($row['country'] == "Bosnia &amp; Herzegovina"){echo 'selected="selected"';}?> >Bosnia &amp; Herzegovina</option>
                                        <option value="Botswana" <?php if($row['country'] == "Botswana"){echo 'selected="selected"';}?> >Botswana</option>
                                        <option value="Brazil" <?php if($row['country'] == "Brazil"){echo 'selected="selected"';}?> >Brazil</option>
                                        <option value="British Indian Ocean Ter" <?php if($row['country'] == "British Indian Ocean Ter"){echo 'selected="selected"';}?> >British Indian Ocean Ter</option>
                                        <option value="Brunei" <?php if($row['country'] == "Brunei"){echo 'selected="selected"';}?> >Brunei</option>
                                        <option value="Bulgaria" <?php if($row['country'] == "Bulgaria"){echo 'selected="selected"';}?> >Bulgaria</option>
                                        <option value="Burkina Faso" <?php if($row['country'] == "Burkina Faso"){echo 'selected="selected"';}?> >Burkina Faso</option>
                                        <option value="Burundi" <?php if($row['country'] == "Burundi"){echo 'selected="selected"';}?> >Burundi</option>
                                        <option value="Cambodia" <?php if($row['country'] == "Cambodia"){echo 'selected="selected"';}?> >Cambodia</option>
                                        <option value="Cameroon" <?php if($row['country'] == "Cameroon"){echo 'selected="selected"';}?> >Cameroon</option>
                                        <option value="Canada" <?php if($row['country'] == "Canada"){echo 'selected="selected"';}?> >Canada</option>
                                        <option value="Canary Islands" <?php if($row['country'] == "Canary Islands"){echo 'selected="selected"';}?> >Canary Islands</option>
                                        <option value="Cape Verde" <?php if($row['country'] == "Cape Verde"){echo 'selected="selected"';}?> >Cape Verde</option>
                                        <option value="Cayman Islands" <?php if($row['country'] == "Cayman Islands"){echo 'selected="selected"';}?> >Cayman Islands</option>
                                        <option value="Central African Republic" <?php if($row['country'] == "Central African Republic"){echo 'selected="selected"';}?> >Central African Republic</option>
                                        <option value="Chad" <?php if($row['country'] == "Chad"){echo 'selected="selected"';}?> >Chad</option>
                                        <option value="Channel Islands" <?php if($row['country'] == "Channel Islands"){echo 'selected="selected"';}?> >Channel Islands</option>
                                        <option value="Chile" <?php if($row['country'] == "Chile"){echo 'selected="selected"';}?> >Chile</option>
                                        <option value="China" <?php if($row['country'] == "China"){echo 'selected="selected"';}?> >China</option>
                                        <option value="Christmas Island" <?php if($row['country'] == "Christmas Island"){echo 'selected="selected"';}?> >Christmas Island</option>
                                        <option value="Cocos Island" <?php if($row['country'] == "Cocos Island"){echo 'selected="selected"';}?> >Cocos Island</option>
                                        <option value="Colombia" <?php if($row['country'] == "Colombia"){echo 'selected="selected"';}?> >Colombia</option>
                                        <option value="Comoros" <?php if($row['country'] == "Comoros"){echo 'selected="selected"';}?> >Comoros</option>
                                        <option value="Congo" <?php if($row['country'] == "Congo"){echo 'selected="selected"';}?> >Congo</option>
                                        <option value="Cook Islands" <?php if($row['country'] == "Cook Islands"){echo 'selected="selected"';}?> >Cook Islands</option>
                                        <option value="Costa Rica" <?php if($row['country'] == "Costa Rica"){echo 'selected="selected"';}?> >Costa Rica</option>
                                        <option value="Cote DIvoire" <?php if($row['country'] == "Cote DIvoire"){echo 'selected="selected"';}?> >Cote D'Ivoire</option>
                                        <option value="Croatia" <?php if($row['country'] == "Croatia"){echo 'selected="selected"';}?> >Croatia</option>
                                        <option value="Cuba" <?php if($row['country'] == "Cuba"){echo 'selected="selected"';}?> >Cuba</option>
                                        <option value="Curaco" <?php if($row['country'] == "Curaco"){echo 'selected="selected"';}?> >Curacao</option>
                                        <option value="Cyprus" <?php if($row['country'] == "Cyprus"){echo 'selected="selected"';}?> >Cyprus</option>
                                        <option value="Czech Republic" <?php if($row['country'] == "Czech Republic"){echo 'selected="selected"';}?> >Czech Republic</option>
                                        <option value="Denmark" <?php if($row['country'] == "Denmark"){echo 'selected="selected"';}?> >Denmark</option>
                                        <option value="Djibouti" <?php if($row['country'] == "Djibouti"){echo 'selected="selected"';}?> >Djibouti</option>
                                        <option value="Dominica" <?php if($row['country'] == "Dominica"){echo 'selected="selected"';}?> >Dominica</option>
                                        <option value="Dominican Republic" <?php if($row['country'] == "Dominican Republic"){echo 'selected="selected"';}?> >Dominican Republic</option>
                                        <option value="East Timor" <?php if($row['country'] == "East Timor"){echo 'selected="selected"';}?> >East Timor</option>
                                        <option value="Ecuador" <?php if($row['country'] == "Ecuador"){echo 'selected="selected"';}?> >Ecuador</option>
                                        <option value="Egypt" <?php if($row['country'] == "Egypt"){echo 'selected="selected"';}?> >Egypt</option>
                                        <option value="El Salvador" <?php if($row['country'] == "El Salvador"){echo 'selected="selected"';}?> >El Salvador</option>
                                        <option value="Equatorial Guinea" <?php if($row['country'] == "Equatorial Guinea"){echo 'selected="selected"';}?> >Equatorial Guinea</option>
                                        <option value="Eritrea" <?php if($row['country'] == "Eritrea"){echo 'selected="selected"';}?> >Eritrea</option>
                                        <option value="Estonia" <?php if($row['country'] == "Estonia"){echo 'selected="selected"';}?> >Estonia</option>
                                        <option value="Ethiopia" <?php if($row['country'] == "Ethiopia"){echo 'selected="selected"';}?> >Ethiopia</option>
                                        <option value="Falkland Islands" <?php if($row['country'] == "Falkland Islands"){echo 'selected="selected"';}?> >Falkland Islands</option>
                                        <option value="Faroe Islands" <?php if($row['country'] == "Faroe Islands"){echo 'selected="selected"';}?> >Faroe Islands</option>
                                        <option value="Fiji" <?php if($row['country'] == "Fiji"){echo 'selected="selected"';}?> >Fiji</option>
                                        <option value="Finland" <?php if($row['country'] == "Finland"){echo 'selected="selected"';}?> >Finland</option>
                                        <option value="France" <?php if($row['country'] == "France"){echo 'selected="selected"';}?> >France</option>
                                        <option value="French Guiana" <?php if($row['country'] == "French Guiana"){echo 'selected="selected"';}?> >French Guiana</option>
                                        <option value="French Polynesia" <?php if($row['country'] == "French Polynesia"){echo 'selected="selected"';}?> >French Polynesia</option>
                                        <option value="French Southern Ter" <?php if($row['country'] == "French Southern Ter"){echo 'selected="selected"';}?> >French Southern Ter</option>
                                        <option value="Gabon" <?php if($row['country'] == "Gabon"){echo 'selected="selected"';}?> >Gabon</option>
                                        <option value="Gambia" <?php if($row['country'] == "Gambia"){echo 'selected="selected"';}?> >Gambia</option>
                                        <option value="Georgia" <?php if($row['country'] == "Georgia"){echo 'selected="selected"';}?> >Georgia</option>
                                        <option value="Germany" <?php if($row['country'] == "Germany"){echo 'selected="selected"';}?> >Germany</option>
                                        <option value="Ghana" <?php if($row['country'] == "Ghana"){echo 'selected="selected"';}?> >Ghana</option>
                                        <option value="Gibraltar" <?php if($row['country'] == "Gibraltar"){echo 'selected="selected"';}?> >Gibraltar</option>
                                        <option value="Great Britain" <?php if($row['country'] == "Great Britain"){echo 'selected="selected"';}?> >Great Britain</option>
                                        <option value="Greece" <?php if($row['country'] == "Greece"){echo 'selected="selected"';}?> >Greece</option>
                                        <option value="Greenland" <?php if($row['country'] == "Greenland"){echo 'selected="selected"';}?> >Greenland</option>
                                        <option value="Grenada" <?php if($row['country'] == "Grenada"){echo 'selected="selected"';}?> >Grenada</option>
                                        <option value="Guadeloupe" <?php if($row['country'] == "Guadeloupe"){echo 'selected="selected"';}?> >Guadeloupe</option>
                                        <option value="Guam" <?php if($row['country'] == "Guam"){echo 'selected="selected"';}?> >Guam</option>
                                        <option value="Guatemala" <?php if($row['country'] == "Guatemala"){echo 'selected="selected"';}?> >Guatemala</option>
                                        <option value="Guinea" <?php if($row['country'] == "Guinea"){echo 'selected="selected"';}?> >Guinea</option>
                                        <option value="Guyana" <?php if($row['country'] == "Guyana"){echo 'selected="selected"';}?> >Guyana</option>
                                        <option value="Haiti" <?php if($row['country'] == "Haiti"){echo 'selected="selected"';}?> >Haiti</option>
                                        <option value="Hawaii" <?php if($row['country'] == "Hawaii"){echo 'selected="selected"';}?> >Hawaii</option>
                                        <option value="Honduras" <?php if($row['country'] == "Honduras"){echo 'selected="selected"';}?> >Honduras</option>
                                        <option value="Hong Kong" <?php if($row['country'] == "Hong Kong"){echo 'selected="selected"';}?> >Hong Kong</option>
                                        <option value="Hungary" <?php if($row['country'] == "Hungary"){echo 'selected="selected"';}?> >Hungary</option>
                                        <option value="Iceland" <?php if($row['country'] == "Iceland"){echo 'selected="selected"';}?> >Iceland</option>
                                        <option value="India" <?php if($row['country'] == "India"){echo 'selected="selected"';}?> >India</option>
                                        <option value="Indonesia" <?php if($row['country'] == "Indonesia"){echo 'selected="selected"';}?> >Indonesia</option>
                                        <option value="Iran" <?php if($row['country'] == "Iran"){echo 'selected="selected"';}?> >Iran</option>
                                        <option value="Iraq" <?php if($row['country'] == "Iraq"){echo 'selected="selected"';}?> >Iraq</option>
                                        <option value="Ireland" <?php if($row['country'] == "Ireland"){echo 'selected="selected"';}?> >Ireland</option>
                                        <option value="Isle of Man" <?php if($row['country'] == "Isle of Man"){echo 'selected="selected"';}?> >Isle of Man</option>
                                        <option value="Israel" <?php if($row['country'] == "Israel"){echo 'selected="selected"';}?> >Israel</option>
                                        <option value="Italy" <?php if($row['country'] == "Italy"){echo 'selected="selected"';}?> >Italy</option>
                                        <option value="Jamaica" <?php if($row['country'] == "Jamaica"){echo 'selected="selected"';}?> >Jamaica</option>
                                        <option value="Japan" <?php if($row['country'] == "Japan"){echo 'selected="selected"';}?> >Japan</option>
                                        <option value="Jordan" <?php if($row['country'] == "Jordan"){echo 'selected="selected"';}?> >Jordan</option>
                                        <option value="Kazakhstan" <?php if($row['country'] == "Kazakhstan"){echo 'selected="selected"';}?> >Kazakhstan</option>
                                        <option value="Kenya" <?php if($row['country'] == "Kenya"){echo 'selected="selected"';}?> >Kenya</option>
                                        <option value="Kiribati" <?php if($row['country'] == "Kiribati"){echo 'selected="selected"';}?> >Kiribati</option>
                                        <option value="Korea North" <?php if($row['country'] == "Korea North"){echo 'selected="selected"';}?> >Korea North</option>
                                        <option value="Korea South" <?php if($row['country'] == "Korea South"){echo 'selected="selected"';}?> >Korea South</option>
                                        <option value="Kuwait" <?php if($row['country'] == "Kuwait"){echo 'selected="selected"';}?> >Kuwait</option>
                                        <option value="Kyrgyzstan" <?php if($row['country'] == "Kyrgyzstan"){echo 'selected="selected"';}?> >Kyrgyzstan</option>
                                        <option value="Laos" <?php if($row['country'] == "Laos"){echo 'selected="selected"';}?> >Laos</option>
                                        <option value="Latvia" <?php if($row['country'] == "Latvia"){echo 'selected="selected"';}?> >Latvia</option>
                                        <option value="Lebanon" <?php if($row['country'] == "Lebanon"){echo 'selected="selected"';}?> >Lebanon</option>
                                        <option value="Lesotho" <?php if($row['country'] == "Lesotho"){echo 'selected="selected"';}?> >Lesotho</option>
                                        <option value="Liberia" <?php if($row['country'] == "Liberia"){echo 'selected="selected"';}?> >Liberia</option>
                                        <option value="Libya" <?php if($row['country'] == "Libya"){echo 'selected="selected"';}?> >Libya</option>
                                        <option value="Liechtenstein" <?php if($row['country'] == "Liechtenstein"){echo 'selected="selected"';}?> >Liechtenstein</option>
                                        <option value="Lithuania" <?php if($row['country'] == "Lithuania"){echo 'selected="selected"';}?> >Lithuania</option>
                                        <option value="Luxembourg" <?php if($row['country'] == "Luxembourg"){echo 'selected="selected"';}?> >Luxembourg</option>
                                        <option value="Macau" <?php if($row['country'] == "Macau"){echo 'selected="selected"';}?> >Macau</option>
                                        <option value="Macedonia" <?php if($row['country'] == "Macedonia"){echo 'selected="selected"';}?> >Macedonia</option>
                                        <option value="Madagascar" <?php if($row['country'] == "Madagascar"){echo 'selected="selected"';}?> >Madagascar</option>
                                        <option value="Malaysia" <?php if($row['country'] == "Malaysia"){echo 'selected="selected"';}?> >Malaysia</option>
                                        <option value="Malawi" <?php if($row['country'] == "Malawi"){echo 'selected="selected"';}?> >Malawi</option>
                                        <option value="Maldives" <?php if($row['country'] == "Maldives"){echo 'selected="selected"';}?> >Maldives</option>
                                        <option value="Mali" <?php if($row['country'] == "Mali"){echo 'selected="selected"';}?> >Mali</option>
                                        <option value="Malta" <?php if($row['country'] == "Malta"){echo 'selected="selected"';}?> >Malta</option>
                                        <option value="Marshall Islands" <?php if($row['country'] == "Marshall Islands"){echo 'selected="selected"';}?> >Marshall Islands</option>
                                        <option value="Martinique" <?php if($row['country'] == "Martinique"){echo 'selected="selected"';}?> >Martinique</option>
                                        <option value="Mauritania" <?php if($row['country'] == "Mauritania"){echo 'selected="selected"';}?> >Mauritania</option>
                                        <option value="Mauritius" <?php if($row['country'] == "Mauritius"){echo 'selected="selected"';}?> >Mauritius</option>
                                        <option value="Mayotte" <?php if($row['country'] == "Mayotte"){echo 'selected="selected"';}?> >Mayotte</option>
                                        <option value="Mexico" <?php if($row['country'] == "Mexico"){echo 'selected="selected"';}?> >Mexico</option>
                                        <option value="Midway Islands" <?php if($row['country'] == "Midway Islands"){echo 'selected="selected"';}?> >Midway Islands</option>
                                        <option value="Moldova" <?php if($row['country'] == "Moldova"){echo 'selected="selected"';}?> >Moldova</option>
                                        <option value="Monaco" <?php if($row['country'] == "Monaco"){echo 'selected="selected"';}?> >Monaco</option>
                                        <option value="Mongolia" <?php if($row['country'] == "Mongolia"){echo 'selected="selected"';}?> >Mongolia</option>
                                        <option value="Montserrat" <?php if($row['country'] == "Montserrat"){echo 'selected="selected"';}?> >Montserrat</option>
                                        <option value="Morocco" <?php if($row['country'] == "Morocco"){echo 'selected="selected"';}?> >Morocco</option>
                                        <option value="Mozambique" <?php if($row['country'] == "Mozambique"){echo 'selected="selected"';}?> >Mozambique</option>
                                        <option value="Myanmar" <?php if($row['country'] == "Myanmar"){echo 'selected="selected"';}?> >Myanmar</option>
                                        <option value="Nambia" <?php if($row['country'] == "Nambia"){echo 'selected="selected"';}?> >Nambia</option>
                                        <option value="Nauru" <?php if($row['country'] == "Nauru"){echo 'selected="selected"';}?> >Nauru</option>
                                        <option value="Nepal" <?php if($row['country'] == "Nepal"){echo 'selected="selected"';}?> >Nepal</option>
                                        <option value="Netherland Antilles" <?php if($row['country'] == "Netherland Antilles"){echo 'selected="selected"';}?> >Netherland Antilles</option>
                                        <option value="Netherlands" <?php if($row['country'] == "Netherlands"){echo 'selected="selected"';}?> >Netherlands (Holland, Europe)</option>
                                        <option value="Nevis" <?php if($row['country'] == "Nevis"){echo 'selected="selected"';}?> >Nevis</option>
                                        <option value="New Caledonia" <?php if($row['country'] == "New Caledonia"){echo 'selected="selected"';}?> >New Caledonia</option>
                                        <option value="New Zealand" <?php if($row['country'] == "New Zealand"){echo 'selected="selected"';}?> >New Zealand</option>
                                        <option value="Nicaragua" <?php if($row['country'] == "Nicaragua"){echo 'selected="selected"';}?> >Nicaragua</option>
                                        <option value="Niger" <?php if($row['country'] == "Niger"){echo 'selected="selected"';}?> >Niger</option>
                                        <option value="Nigeria" <?php if($row['country'] == "Nigeria"){echo 'selected="selected"';}?> >Nigeria</option>
                                        <option value="Niue" <?php if($row['country'] == "Niue"){echo 'selected="selected"';}?> >Niue</option>
                                        <option value="Norfolk Island" <?php if($row['country'] == "Norfolk Island"){echo 'selected="selected"';}?> >Norfolk Island</option>
                                        <option value="Norway" <?php if($row['country'] == "Norway"){echo 'selected="selected"';}?> >Norway</option>
                                        <option value="Oman" <?php if($row['country'] == "Oman"){echo 'selected="selected"';}?> >Oman</option>
                                        <option value="Pakistan" <?php if($row['country'] == "Pakistan"){echo 'selected="selected"';}?> >Pakistan</option>
                                        <option value="Palau Island" <?php if($row['country'] == "Palau Island"){echo 'selected="selected"';}?> >Palau Island</option>
                                        <option value="Palestine" <?php if($row['country'] == "Palestine"){echo 'selected="selected"';}?> >Palestine</option>
                                        <option value="Panama" <?php if($row['country'] == "Panama"){echo 'selected="selected"';}?> >Panama</option>
                                        <option value="Papua New Guinea" <?php if($row['country'] == "Papua New Guinea"){echo 'selected="selected"';}?> >Papua New Guinea</option>
                                        <option value="Paraguay" <?php if($row['country'] == "Paraguay"){echo 'selected="selected"';}?> >Paraguay</option>
                                        <option value="Peru" <?php if($row['country'] == "Peru"){echo 'selected="selected"';}?> >Peru</option>
                                        <option value="Phillipines" <?php if($row['country'] == "Phillipines"){echo 'selected="selected"';}?> >Philippines</option>
                                        <option value="Pitcairn Island" <?php if($row['country'] == "Pitcairn Island"){echo 'selected="selected"';}?> >Pitcairn Island</option>
                                        <option value="Poland" <?php if($row['country'] == "Poland"){echo 'selected="selected"';}?> >Poland</option>
                                        <option value="Portugal" <?php if($row['country'] == "Portugal"){echo 'selected="selected"';}?> >Portugal</option>
                                        <option value="Puerto Rico" <?php if($row['country'] == "Puerto Rico"){echo 'selected="selected"';}?> >Puerto Rico</option>
                                        <option value="Qatar" <?php if($row['country'] == "Qatar"){echo 'selected="selected"';}?> >Qatar</option>
                                        <option value="Republic of Montenegro" <?php if($row['country'] == "Republic of Montenegro"){echo 'selected="selected"';}?> >Republic of Montenegro</option>
                                        <option value="Republic of Serbia" <?php if($row['country'] == "Republic of Serbia"){echo 'selected="selected"';}?> >Republic of Serbia</option>
                                        <option value="Reunion" <?php if($row['country'] == "Reunion"){echo 'selected="selected"';}?> >Reunion</option>
                                        <option value="Romania" <?php if($row['country'] == "Romania"){echo 'selected="selected"';}?> >Romania</option>
                                        <option value="Russia" <?php if($row['country'] == "Russia"){echo 'selected="selected"';}?> >Russia</option>
                                        <option value="Rwanda" <?php if($row['country'] == "Rwanda"){echo 'selected="selected"';}?> >Rwanda</option>
                                        <option value="St Barthelemy" <?php if($row['country'] == "St Barthelemy"){echo 'selected="selected"';}?> >St Barthelemy</option>
                                        <option value="St Eustatius" <?php if($row['country'] == "St Eustatius"){echo 'selected="selected"';}?> >St Eustatius</option>
                                        <option value="St Helena" <?php if($row['country'] == "St Helena"){echo 'selected="selected"';}?> >St Helena</option>
                                        <option value="St Kitts-Nevis" <?php if($row['country'] == "St Kitts-Nevis"){echo 'selected="selected"';}?> >St Kitts-Nevis</option>
                                        <option value="St Lucia" <?php if($row['country'] == "St Lucia"){echo 'selected="selected"';}?> >St Lucia</option>
                                        <option value="St Maarten" <?php if($row['country'] == "St Maarten"){echo 'selected="selected"';}?> >St Maarten</option>
                                        <option value="St Pierre &amp; Miquelon" <?php if($row['country'] == "St Pierre &amp; Miquelon"){echo 'selected="selected"';}?> >St Pierre &amp; Miquelon</option>
                                        <option value="St Vincent &amp; Grenadines" <?php if($row['country'] == "St Vincent &amp; Grenadines"){echo 'selected="selected"';}?> >St Vincent &amp; Grenadines</option>
                                        <option value="Saipan" <?php if($row['country'] == "Saipan"){echo 'selected="selected"';}?> >Saipan</option>
                                        <option value="Samoa" <?php if($row['country'] == "Samoa"){echo 'selected="selected"';}?> >Samoa</option>
                                        <option value="Samoa American" <?php if($row['country'] == "Samoa American"){echo 'selected="selected"';}?> >Samoa American</option>
                                        <option value="San Marino" <?php if($row['country'] == "San Marino"){echo 'selected="selected"';}?> >San Marino</option>
                                        <option value="Sao Tome &amp; Principe" <?php if($row['country'] == "Sao Tome &amp; Principe"){echo 'selected="selected"';}?> >Sao Tome &amp; Principe</option>
                                        <option value="Saudi Arabia" <?php if($row['country'] == "Saudi Arabia"){echo 'selected="selected"';}?> >Saudi Arabia</option>
                                        <option value="Senegal" <?php if($row['country'] == "Senegal"){echo 'selected="selected"';}?> >Senegal</option>
                                        <option value="Serbia" <?php if($row['country'] == "Serbia"){echo 'selected="selected"';}?> >Serbia</option>
                                        <option value="Seychelles" <?php if($row['country'] == "Seychelles"){echo 'selected="selected"';}?> >Seychelles</option>
                                        <option value="Sierra Leone" <?php if($row['country'] == "Sierra Leone"){echo 'selected="selected"';}?> >Sierra Leone</option>
                                        <option value="Singapore" <?php if($row['country'] == "Singapore"){echo 'selected="selected"';}?> >Singapore</option>
                                        <option value="Slovakia" <?php if($row['country'] == "Slovakia"){echo 'selected="selected"';}?> >Slovakia</option>
                                        <option value="Slovenia" <?php if($row['country'] == "Slovenia"){echo 'selected="selected"';}?> >Slovenia</option>
                                        <option value="Solomon Islands" <?php if($row['country'] == "Solomon Islands"){echo 'selected="selected"';}?> >Solomon Islands</option>
                                        <option value="Somalia" <?php if($row['country'] == "Somalia"){echo 'selected="selected"';}?> >Somalia</option>
                                        <option value="South Africa" <?php if($row['country'] == "South Africa"){echo 'selected="selected"';}?> >South Africa</option>
                                        <option value="Spain" <?php if($row['country'] == "Spain"){echo 'selected="selected"';}?> >Spain</option>
                                        <option value="Sri Lanka" <?php if($row['country'] == "Sri Lanka"){echo 'selected="selected"';}?> >Sri Lanka</option>
                                        <option value="Sudan" <?php if($row['country'] == "Sudan"){echo 'selected="selected"';}?> >Sudan</option>
                                        <option value="Suriname" <?php if($row['country'] == "Suriname"){echo 'selected="selected"';}?> >Suriname</option>
                                        <option value="Swaziland" <?php if($row['country'] == "Swaziland"){echo 'selected="selected"';}?> >Swaziland</option>
                                        <option value="Sweden" <?php if($row['country'] == "Sweden"){echo 'selected="selected"';}?> >Sweden</option>
                                        <option value="Switzerland" <?php if($row['country'] == "Switzerland"){echo 'selected="selected"';}?> >Switzerland</option>
                                        <option value="Syria" <?php if($row['country'] == "Syria"){echo 'selected="selected"';}?> >Syria</option>
                                        <option value="Tahiti" <?php if($row['country'] == "Tahiti"){echo 'selected="selected"';}?> >Tahiti</option>
                                        <option value="Taiwan" <?php if($row['country'] == "Taiwan"){echo 'selected="selected"';}?> >Taiwan</option>
                                        <option value="Tajikistan" <?php if($row['country'] == "Tajikistan"){echo 'selected="selected"';}?> >Tajikistan</option>
                                        <option value="Tanzania" <?php if($row['country'] == "Tanzania"){echo 'selected="selected"';}?> >Tanzania</option>
                                        <option value="Thailand" <?php if($row['country'] == "Thailand"){echo 'selected="selected"';}?> >Thailand</option>
                                        <option value="Togo" <?php if($row['country'] == "Togo"){echo 'selected="selected"';}?> >Togo</option>
                                        <option value="Tokelau" <?php if($row['country'] == "Tokelau"){echo 'selected="selected"';}?> >Tokelau</option>
                                        <option value="Tonga" <?php if($row['country'] == "Tonga"){echo 'selected="selected"';}?> >Tonga</option>
                                        <option value="Trinidad &amp; Tobago" <?php if($row['country'] == "Trinidad &amp; Tobago"){echo 'selected="selected"';}?> >Trinidad &amp; Tobago</option>
                                        <option value="Tunisia" <?php if($row['country'] == "Tunisia"){echo 'selected="selected"';}?> >Tunisia</option>
                                        <option value="Turkey" <?php if($row['country'] == "Turkey"){echo 'selected="selected"';}?> >Turkey</option>
                                        <option value="Turkmenistan" <?php if($row['country'] == "Turkmenistan"){echo 'selected="selected"';}?> >Turkmenistan</option>
                                        <option value="Turks &amp; Caicos Is" <?php if($row['country'] == "Turks &amp; Caicos Is"){echo 'selected="selected"';}?> >Turks &amp; Caicos Is</option>
                                        <option value="Tuvalu" <?php if($row['country'] == "Tuvalu"){echo 'selected="selected"';}?> >Tuvalu</option>
                                        <option value="Uganda" <?php if($row['country'] == "Uganda"){echo 'selected="selected"';}?> >Uganda</option>
                                        <option value="Ukraine" <?php if($row['country'] == "Ukraine"){echo 'selected="selected"';}?> >Ukraine</option>
                                        <option value="United Arab Erimates" <?php if($row['country'] == "United Arab Erimates"){echo 'selected="selected"';}?> >United Arab Emirates</option>
                                        <option value="United Kingdom" <?php if($row['country'] == "United Kingdom"){echo 'selected="selected"';}?> >United Kingdom</option>
                                        <option value="United States of America" <?php if($row['country'] == "United States of America"){echo 'selected="selected"';}?> >United States of America</option>
                                        <option value="Uraguay" <?php if($row['country'] == "Uraguay"){echo 'selected="selected"';}?> >Uruguay</option>
                                        <option value="Uzbekistan" <?php if($row['country'] == "Uzbekistan"){echo 'selected="selected"';}?> >Uzbekistan</option>
                                        <option value="Vanuatu" <?php if($row['country'] == "Vanuatu"){echo 'selected="selected"';}?> >Vanuatu</option>
                                        <option value="Vatican City State" <?php if($row['country'] == "Vatican City State"){echo 'selected="selected"';}?> >Vatican City State</option>
                                        <option value="Venezuela" <?php if($row['country'] == "Venezuela"){echo 'selected="selected"';}?> >Venezuela</option>
                                        <option value="Vietnam" <?php if($row['country'] == "Vietnam"){echo 'selected="selected"';}?> >Vietnam</option>
                                        <option value="Virgin Islands (Brit)" <?php if($row['country'] == "Virgin Islands (Brit)"){echo 'selected="selected"';}?> >Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)" <?php if($row['country'] == "Virgin Islands (USA)"){echo 'selected="selected"';}?> >Virgin Islands (USA)</option>
                                        <option value="Wake Island" <?php if($row['country'] == "Wake Island"){echo 'selected="selected"';}?> >Wake Island</option>
                                        <option value="Wallis &amp; Futana Is" <?php if($row['country'] == "Wallis &amp; Futana Is"){echo 'selected="selected"';}?> >Wallis &amp; Futana Is</option>
                                        <option value="Yemen" <?php if($row['country'] == "Yemen"){echo 'selected="selected"';}?> >Yemen</option>
                                        <option value="Zaire" <?php if($row['country'] == "Zaire"){echo 'selected="selected"';}?> >Zaire</option>
                                        <option value="Zambia" <?php if($row['country'] == "Zambia"){echo 'selected="selected"';}?> >Zambia</option>
                                        <option value="Zimbabwe" <?php if($row['country'] == "Zimbabwe"){echo 'selected="selected"';}?> >Zimbabwe</option>
                                    </optgroup>
                                </select>
                            </div>
                        
                            <div class="col-md-8">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Home Town (Optional).</p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="town" value="<?php echo $row['town'];?>" placeholder="Enter Home Town (Optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;font-family:Roboto, sans-serif;font-size:12px;">
                            <div class="col-md-8">
                                <p style="margin-left:2%;font-weight:bold;">Course <a class="text-danger">*<a/></p>
                                <select class="form-control" id="course" name="course">
                                    <option value="">- Select Course -</option>
                                    <?php 
                                        if(empty($result)){
                                            echo '<option class="bg-danger text-danger" value="">No faculty found</option>';
                                        }else
                                        {
                                            while($rows = mysql_fetch_array($result)) {
                                    ?>
                                    <optgroup label="<?php echo $rows['name'];?>">
                                        <?php 
                                            $sql = "select * from `course` where `facultyID`=".mysql_real_escape_string($rows['facultyID']);
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
                                                if($row['courseID']==$rw['courseID']){
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
                            <div class="col-md-2">
                                <p style="margin-left:2%;font-weight:bold;">Year of Study<a class="text-danger">*<a/></p>
                                <select class="form-control" id="yos" name="yos">
                                    <?php
                                        if($row['courseID']){
                                            $sql = "select years from `course` where `courseID`=".$row['courseID'];
                                            $res = mysql_query($sql);
                                            if(mysql_num_rows($res) > 0) {
                                                while($rw = mysql_fetch_array($res)){
                                                  $sq = mysql_query("select * from yos where yos <=".$rw['years']);
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
                            
                            <div class="col-md-2">
                                <p style="margin-left:2%;font-weight:bold;">Semester<a class="text-danger">*<a/></p>
                                <select class="form-control" name="sem">
                                    <?php 
                                        $select2 = "SELECT * FROM semister ORDER BY sem ASC";
                                        $result2 = mysql_query($select2);

                                        if(empty($result2)){
                                            echo '<option class="bg-danger text-danger">No records found</option>';
                                        }else
                                        {
                                        while($rws = mysql_fetch_array($result2)) {
                                    ?>
                                    <option value="<?php echo $row['semisterID'];?>" 
                                        <?php 
                                            if($row['semisterID']==$rws['semisterID']){
                                                echo "selected=selected";
                                            }
                                        ?> 
                                    >
                                        <?php echo "Semester ".$rws['sem'];?>
                                 </option>
                                    <?php }} ?>
                                </select>
                            </div>  
                        </div>
                        
                        <div class="row" style="margin-right:0px;margin-left:0px; text-align:center; padding-top:24px;">
                            <div class="col-md-12">
                                <button type="submit" name="submit" style="padding:5px 20px;color:rgb(1,1,1);"> 
                                    Update Student 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            <?php }} ?>
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
    <script type="text/javascript" src="../../../assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   
    <script type="text/javascript" src="../../../assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</body>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</html>