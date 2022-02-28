<?php
    $no="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        /*end of function*/
        $no = clean($_POST['no']);
        if(isset($_GET['id'])){
            $id = clean($_GET['id']);
        }
        
        
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Error occured while trying to retrieve exam info!</span>
                </div>';
        }else
        if(!$no){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter Exam Secret Code!</span>
                </div>';
        }else 
        {
            
            $now= date("Y-m-d");
            //$key=md5($no);
            $qry="SELECT examNo,date(start) AS start,date(deadline) AS deadline,time FROM exam WHERE examNo='$no' AND examID='$id' AND '$now' >= date(start) AND '$now' <= date(deadline)";
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
            
        
            //Check whether the query was successful or not
            if($result) {
                
    		if($num > 1) {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Duplicate exams found!</span>
                        </div>';
                }
                else 
                if($num < 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Invalid exam code!</span>
                        </div>';
                }
                else 
                if($num ==1){
                    while ($row = mysql_fetch_array($result)) {
                        $start = $row['start'];
                        $deadline = $row['deadline'];
                        $time = $row['time'];
                        $examNo = $row['examNo'];
                    }
                    
                    //check if user session is stil valid
                    //select using date only, since date-time is confusing the database sql
                    $qry1="SELECT * 
                           FROM exam_login 
                           WHERE examNo='$examNo' 
                           AND studentID='$studentID' 
                           AND  date(loginTime) >= '$start' 
                           AND date(logoutTime) <= '$deadline' 
                           ORDER BY loginID DESC LIMIT 1";
                    $results=mysql_query($qry1); 
                    $num1=mysql_num_rows($results);
                    
                    if($results) {
                        
                        if($num1 > 1) {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        <span class="text-danger">Duplicate exam user records found!</span>
                                </div>';
                        }else 
                        //if no records found, then allow student to do exam
                        if($num1 < 1){
                            if(!$insert = mysql_query("INSERT INTO exam_login (examID,examNo,studentID,loginTime)
                                                VALUES ($id,'$examNo',$studentID,NOW())"))
                            {
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">'.mysql_error().'</span>
                                    </div>';
                            }else
                            {
                                $_SESSION['student'] = $studentID;
                                $_SESSION['loginTime'] = date("Y-m-d H:i:s");
                                $_SESSION['exam'] = $examNo;
                                $_SESSION['timeLeft'] = $time;
                                
                                header('Location:../validate/logout.php');
                                header('Location:quiz.php');
                                header('Location:first.php');
                                
                                echo "<script type='text/javascript'> document.location = 'first.php'; </script>";
                                exit();
                            }
                        }else 
                        if($num ==1){
                            while ($rows = mysql_fetch_array($results)) {
                                //get time difference between loginTime and logoutTime, in seconds
                                //divide by 60 to convert to minutes & roundup to neearest whole number: i.e remove decimal points 
                                $timeTaken = round((strtotime($rows['logoutTime']) - strtotime($rows['loginTime'])) /60) ;
                                $logoutTime = $rows['loginTime'];
                            }
                            //if exam is over
                            if($timeTaken >= $time){
                                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        <span class="text-warning">
                                        <i class="fa fa-warning"></i>
                                        &nbsp;
                                        Warning! Exam Timeout!</span>
                                </div>';
                            }else
                            //if exam is still on
                            if($timeTaken < $time){
                                $timeBalance = ($time - $timeTaken)*60;
                                $exam_deadline = date_format(date_create($deadline),"Y-m-d");
                                $time_difference_to_deadline_midnight_in_seconds = strtotime($exam_deadline." 23:59:59") - strtotime(date("Y-m-d H:i:s"));
                                
                                if($timeBalance < $time_difference_to_deadline_midnight_in_seconds)
                                {
                                    $_SESSION['loginTime'] = date("Y-m-d H:i:s");
                                    $_SESSION['exam'] = $examNo;
                                    $_SESSION['timeLeft'] = $timeBalance/60;
                                    $_SESSION['student'] = $studentID;
                                    
                                    header('Location:../validate/logout.php');
                                    header('Location:quiz.php');
                                    header('Location:first.php');
                                    echo "<script type='text/javascript'> document.location = 'first.php'; </script>";
                                    exit();
                                }else
                                if($timeBalance > $time_difference_to_deadline_midnight_in_seconds)
                                {    
                                    $timeLeft = round(($timeBalance - $time_difference_to_deadline_midnight_in_seconds)/60);
                                    
                                    $_SESSION['loginTime'] = date("Y-m-d H:i:s");
                                    $_SESSION['exam'] = $examNo;
                                    $_SESSION['timeLeft'] = $timeLeft;
                                    $_SESSION['student'] = $studentID;
                                    
                                    header('Location:../validate/logout.php');
                                    header('Location:quiz.php');
                                    header('Location:first.php');
                                    echo "<script type='text/javascript'> document.location = 'first.php'; </script>";
                                    exit();
                                }else
                                {
                                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                    <span class="text-warning">
                                                    <i class="fa fa-warning"></i>
                                                    &nbsp;
                                                    Warning! Exam Timeout!</span>
                                            </div>';
                                
                                }
                            }
                        }
                        
                    }    
                        
                    
                }
            }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                            <span class="text-danger">'.mysql_error().'!</span>
                    </div>';
            }
        }
    }
?>