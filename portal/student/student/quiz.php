<?php 
    include'include/session.php';
    
    
    $tableName="exam";
    $tableName1="unit";
    $tableName2="course";
    $tableName3="semisterperiod";
    $tableName4="staffunit";
    $tableName5="staff";
    $limit = 1;
    
    
    
    if(!isset($_SESSION['timeLeft'])){
        header('Location:exam.php');
        echo "<script type='text/javascript'> document.location = 'exam'; </script>";
        exit();
    }else
    if(!isset($_SESSION['exam'])){
        header('Location:exam.php');
        echo "<script type='text/javascript'> document.location = 'exam'; </script>";
        exit();
    }else{
        $qid = mysql_real_escape_string($_SESSION['exam']);
        // Get page data
        $query1 = "SELECT e.*,u.abbreviation AS unit,u.yosID,u.semisterID,c.abbreviation AS course,sp.start AS semStart,sp.end AS semEnd,CONCAT(s.fname,' ',s.lname,' ',s.sname) AS staff
                    FROM $tableName e
                    LEFT JOIN $tableName1 u
                    ON e.unitID = u.unitID
                    LEFT JOIN $tableName2 c
                    ON u.courseID = c.courseID
                    LEFT JOIN $tableName3 sp
                    ON e.periodID = sp.periodID
                    LEFT JOIN $tableName4 sf
                    ON sf.unitID = u.unitID
                    LEFT JOIN $tableName5 s
                    ON sf.staffID = s.staffID
                    WHERE e.examNo='$qid'
                    ORDER BY e.start DESC";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
        
        //get total no. of question in the exam
        $sql = "SELECT COUNT(quizID) as num FROM quiz WHERE examNo='$qid'"; 
        $total = mysql_fetch_array(mysql_query($sql));
        $total_page = $total['num'];

        
        
        //get number of questions answered
        $sq = "SELECT COUNT(m.quizID) AS num
                FROM marks m
                LEFT JOIN quiz q
                ON q.quizID = m.quizID
                WHERE q.examNo='$qid'
                AND m.studentID='$studentID'"; 
        $tot = mysql_fetch_array(mysql_query($sq));
        $toto = $tot['num'];
        
        //subtract questions answered from total questions, to get number of unanswered questions
        $total_pages = $total_page - $toto;
        
        
        $stages = 3;
        if($total_pages > 0){
            $page = $total_pages;
        }else{
            //student has finished all exam questions
            $page=0;
            
            $finished_exam=true;
            //get scores
            $x = "SELECT totalMarks,marks,percentage
                FROM scores
                WHERE examNo='$qid'
                AND studentID='$studentID'"; 
            $z = mysql_fetch_array(mysql_query($x));
            
            $totalMarks = $z['totalMarks'];
            $marks = $z['marks'];
            $percent = $z['percentage'];
        }
        
        
        if($page){
        $start = ($page - 1) * $limit;
        }else{
        $start = 0;
        }
        
        $query2="SELECT q.*,m.studentID
                FROM quiz q
                LEFT JOIN marks m
                ON q.quizID = m.quizID
                WHERE q.examNo='$qid'
                ORDER BY quizID ASC LIMIT $start,$limit";
        $results = mysql_query($query2);
    }
  
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions | Student | WAKA CMEC</title>
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">Student | Waka CMEC Training Institute</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(52,73,94);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> </a>
                        
                    </li>
                </ul>
                <ul class="nav navbar-nav visible-xs-block visible-sm-block" id="mobile-nav">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?></a>
                       
                    </li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!--
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
                            <a href="assignments.php">
                                <i class="fa fa-bookmark" style="margin-right:5px;"></i>
                                Assignments
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="unit.php">Units</a>
                        </li>
                        <li role="presentation">
                            <a href="coursework.php">Course Work</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    -->
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST" >
            <?php 
                
                if(empty($result)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">No records found</span>
                        </div>';
                }else{
                   include 'validate/signOutExam.php';
                    
            ?>
            <div class="col-md-12" style="width:100%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="float:left;margin-right:5%;margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">Exam</h2>
                <button name="signOut" type="submit" onclick="return confirm('You are about to sign out this exam\nAny unsubmitted answers will be lost!\nWant to continue?');" style="float:right;margin-top:3px;padding:5px 20px;color:white;background-color:#e74f4f;border-top:1px solid #c50606;border-left:1px solid #c50606;border-right:1px solid #c50606;border-bottom:3px solid #c50606;border-radius: 5px;">
                    <i class="fa fa-sign-out"></i>
                    Sign Out Exam 
                </button>
            </div>
            
            
            <?php 
                while($row = mysql_fetch_array($result)) { 
                    $examDate = date_format(date_create($row['deadline']),"Y-m-d");
            ?>
                
                <div class="col-md-12">
                    <div class="col-md-2">
                        <label>Exam Code</label>
                        <input type="text" class="form-control" value="<?php echo $row['examNo'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Unit</label>
                        <input type="text" class="form-control" value="<?php echo $row['unit'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Course</label>
                        <input type="text" class="form-control" value="<?php echo $row['course'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>YoS/Sem</label>
                        <input type="text" class="form-control" value="<?php echo "Yr.".$row['yosID'].",Sem.".$row['semisterID'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Start</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['start']),"D d-M, Y");?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Deadline</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['deadline']),"D d-M, Y");?>" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2">
                        <label>Time Left:</label>
                        <!--time count down-->
                        <div class="form-control" id="response" style="font-weight:bold;background-color:red;color:white;">
                            
                        </div>
                        <script type="text/javascript">
                            setInterval(function()
                            {
                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.open("GET","response.php",false);
                                xmlhttp.send(null);
                                document.getElementById("response").innerHTML = xmlhttp.responseText;
                            },50);
                        </script>
                    </div>
                    <div class="col-md-4">
                        <label>Sem. Period</label>
                        <input type="text" class="form-control" value="<?php echo date_format(date_create($row['semStart']),"M,Y")." - ".date_format(date_create($row['semEnd']),"M,Y");?>" disabled>
                    </div>
                    <div class="col-md-4">
                        <label>Lecturer</label>
                        <input type="text" class="form-control" value="<?php echo $row['staff'];?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <label>Status</label>
                        <input type="text" style="color:white; background-color:
                                                  <?php 
                                                        if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d")){
                                                            echo '#B8860B';
                                                        }else
                                                        if(date_format(date_create($row['start']),"Y-m-d") <= date('Y-m-d') && date_format(date_create($row['deadline']),"Y-m-d") >= date('Y-m-d')){
                                                            echo '#00BFFF';
                                                        }else
                                                        if (date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                            echo '#006400';
                                                        }

                                                    ?>;"
                               class="form-control" readonly 
                                value="<?php 
                                            if(date('Y-m-d') < date_format(date_create($row['start']),"Y-m-d") ){
                                                echo 'Pending';
                                            }else
                                            if(date('Y-m-d') >= date_format(date_create($row['start']),"Y-m-d") && date('Y-m-d') <= date_format(date_create($row['deadline']),"Y-m-d")){
                                                echo 'Ongoing';
                                            }else
                                            if (date('Y-m-d') > date_format(date_create($row['deadline']),"Y-m-d")){
                                                echo 'Done';
                                            }                                            
                                        ?>
                                    ">
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            <?php } ?>
            
            
            
            <div class="col-md-12">
                    <div class="container">
                        <div>
                                <div class="form-group" style="margin-top:30px;">
                                    <div id="formdiv">
                                        <div class="row" style="margin-right:0px;margin-left:0px;margin-top:-16px;">
                                            <div style="padding-top:2px;padding-bottom:2px;margin-bottom:10px;background-color:rgb(239,239,239);">
                                                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">Questions Remaining = <?php echo $total_pages." of ".$total_page;?></h2>
                                            </div>
                                            <?php 
                                                //if exam is finished, display success message and results
                                                if(isset($finished_exam) == true){
                                                     echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                            <span class="text-success">
                                                                <b>Congratulations</b> 
                                                                You have finished exam!
                                                                <br>
                                                                You scored <b>'.$marks.'</b> out of <b>'.$totalMarks.' Marks</b>
                                                               <br>Your percentage score is: <b>'.$percent.'%</b> 
                                                            </span>
                                                        </div>';   
                                                }
                                                    
                                                if($total_pages==0){
                                                    echo "";
                                                }else{
                                                $i=1;
                                                while($rw = mysql_fetch_array($results)) { 
                                                    if($rw['studentID'] == $studentID){
                                                        echo "";
                                                    }else
                                                    {
                                                    include 'validate/quiz.php';
                                            ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="">
                                                        <label><?php echo "Quiz";?></label>
                                                    </div>
                                                    <div class="col-md-8" style="font-weight:bold;">
                                                        <?php echo $rw['quiz'];?>
                                                        <input type="hidden" name="quiz" value="<?php echo $rw['quizID'];?>">
                                                    </div>
                                                    <div class="col-md-2 text-left" style="font-weight:bold;">
                                                        <?php echo "(".$rw['marks']." Marks)";?>
                                                        <input type="hidden" name="marks" value="<?php echo $rw['marks'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-2 text-right" style="">
                                                        <label>&nbsp;</label>
                                                    </div>
                                                    <div class="col-md-10" style="">
                                                        <div class="radio">
                                                            a)&nbsp;<label>
                                                                <input type="radio" name="answer" value="<?php echo $rw['option_a'];?>" />
                                                                <?php echo $rw['option_a'];?>
                                                            </label>
                                                        </div>

                                                        <div class="radio">
                                                            b)&nbsp;<label>
                                                                <input type="radio" name="answer" value="<?php echo $rw['option_b'];?>" />
                                                                <?php echo $rw['option_b'];?>
                                                            </label>
                                                        </div>

                                                        <div class="radio">
                                                            c)&nbsp;<label>
                                                                <input type="radio" name="answer" value="<?php echo $rw['option_c'];?>" />
                                                                <?php echo $rw['option_c'];?>
                                                            </label>
                                                        </div>

                                                        <div class="radio">
                                                            d)&nbsp;<label>
                                                                <input type="radio" name="answer" value="<?php echo $rw['option_d'];?>" />
                                                                <?php echo $rw['option_d'];?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    
                                                    <button name="submit" type="submit" style="padding:5px 20px;color:white;background-color:#2773b0;border-top:1px solid #07406f;border-left:1px solid #07406f;border-right:1px solid #07406f;border-bottom:3px solid #07406f;border-radius: 5px;">
                                                        <i class="fa fa-save"></i> Submit
                                                    </button>
                                                </div>
                                            <div class="col-md-12">
                                                <?php
                                                    /*if($total_pages < 1){
                                                        echo "";
                                                    }else
                                                    {

                                                        if(isset($_GET['page'])){
                                                            $page = mysql_real_escape_string($_GET['page']);
                                                        }else{$page=0;}

                                                        $total_records = ceil($total_pages / $limit);  
                                                        $pagLink = "<nav><ul class='pagination'>";  
                                                        for ($i=1; $i<=$total_records; $i++) {  

                                                            if($page==$i){
                                                                $r="background-color:#00aeef;color:white"; 
                                                                $href="";
                                                            }else{
                                                                $r="background-color:none;"; 
                                                                $href="href='quiz.php?id=$qid&page=".$i."'";
                                                            }

                                                            if($page==0){
                                                                if($i==1){
                                                                    $m="background-color:#00aeef;color:white"; 
                                                                    $href="";
                                                                    $pagLink .= "<li><a style='$m' $href;>".$i."</a></li>";
                                                                }else{
                                                                $pagLink .= "<li><a style='$r' $href;>".$i."</a></li>";
                                                            }}else{
                                                                $pagLink .= "<li><a style='$r' $href;>".$i."</a></li>";
                                                            }

                                                        };  
                                                        echo $pagLink . "</ul></nav>"; 
                                                    }*/
                                                ?>
                                    </div>
                                                <?php }}} ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
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
    <!--Check if time on response is 00:00:00
        if true, issue an exam timeout warining and close page-->
    <script>
        var check_session;
        function CheckForSession() {
            var str="chksession=true";
            jQuery.ajax({
		type: "POST",
		url: "response.php",
		data: str,
		cache: false,
		success: function(res){
                    if(res === "00:00:00") {
			alert('Warning: Exam Timeout');
                         window.location.href='exam.php';
                    }
		}
            });
        }
        check_session = setInterval(CheckForSession, 100);
    </script>
    <!--
    <script>
        window.onbeforeunload = function() { return "Your work might be lost."; };
    </script>-->
</html>