<?php                                                                        
    $quiz="";
    
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $quiz=clean($_POST['quiz']);
        $id=clean($_SESSION['exam']);
        $marks = clean($_POST['marks']);
        
        
        if(!$studentID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify student!</span>
                </div>';
        }else
        if($studentID < 1){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">System error occured while trying to identify student<br>please try again!</span>
                </div>';
        }else
        if(!isset($_SESSION['exam'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify exam!</span>
                </div>';
        }else
        if(!isset($_POST['answer'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select answer!</span>
            </div>';
        }else
        if(!$marks){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to fetch question marks!</span>
            </div>';
        }else
        {
            $answer=$_POST['answer'];
            
            //check if question has already been answered
            $queryy = "SELECT COUNT(*) AS num FROM marks WHERE quizID='$quiz' AND studentID='$studentID' ";
            $resulty = mysql_query($queryy);
            
            while($rowy = mysql_fetch_array($resulty)){
                $i = $rowy['num'];
            }
            
            if($i > 0){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">You have already answered this question!</span>
                    </div>';    
            }else
            {
            
                // Get correct answer option
                $queryx = "SELECT answer FROM quiz WHERE quizID='$quiz' ";
                $resultx = mysql_query($queryx);

                while($rowx = mysql_fetch_array($resultx)){
                    $ans = $rowx['answer'];
                }

                //check if answer matches answer option 
                $query1x = mysql_query("SELECT COUNT(*) AS validation FROM quiz WHERE ".$ans." = '$answer' AND quizID = '$quiz'");
                while($rws = mysql_fetch_array($query1x)){
                    $validation = $rws['validation'];
                }

            //check one more time if student is exists
            if($studentID < 1){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">System error occured while trying to identify student, before submission of answer<br>please try again!</span>
                    </div>';
            }else
            {    
                if($validation == 1){
                    //insert document details to database
                        if(!$insert = mysql_query("INSERT INTO marks (quizID,answer,marks,studentID)
                                                    VALUES ($quiz,'$answer','$marks','$studentID')"))
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                        }else
                            {
                                header("Location:quiz.php?id=".$id);
                                echo '<script type="text/javascript"> document.location = "quiz.php?id='.$id.'"; </script>';
                                exit();
                            }
                }else
                if($validation == 0){
                    //insert document details to database
                        if(!$insert = mysql_query("INSERT INTO marks (quizID,answer,marks,studentID)
                                                    VALUES ('$quiz','$answer',0,'$studentID')"))
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                        }else
                            {
                                header("Location:quiz.php?id=".$id);
                                echo '<script type="text/javascript"> document.location = "quiz.php?id='.$id.'"; </script>';
                                exit();
                            }
                    }
                }
            }
        } 
    }/*else
    
        
    /*if(isset($_POST['exit'])){
        $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
        header('Location:exams.php');
        echo "<script type='text/javascript'> document.location = 'exams.php'; </script>";
        exit();  
    }else
    
    if(isset($_POST['final'])){
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        //quiz 
        $qz = $_POST['quiz'];
        $oa = $_POST['a'];
        $ob = $_POST['b'];
        $oc = $_POST['c'];
        $od = $_POST['d'];
        $answer = $_POST['answer'];
        $mk = $_POST['marks'];
        
        $examNo = $_GET['id'];
        
        for($i=0;$i<count($qz);$i++){
             $qno[]= $i;
        }
        
        $exam = array_fill(0,$i,$examNo);
        
        $c = array_map(function ($exam,$qz,$oa,$ob,$oc,$od,$answer,$mk){return "'$exam','$qz','$oa','$ob','$oc','$od','$answer','$mk'";} , $exam,$qz,$oa,$ob,$oc,$od,$answer,$mk);
        
        if(!$result = mysql_query("SELECT staffID FROM staffunit where unitID='".mysql_real_escape_string($_GET['u'])."'")){
            echo'<div class="bg-danger text-danger" style="text-align:center;padding:3px;">
                    <i class="fa fa-times-circle"></i> &nbsp;'.mysql_error().'</div>';
        }else{
                if(!$insert = mysql_query("INSERT INTO quiz (examNo,quiz,option_a,option_b,option_c,option_d,answer,marks) VALUES(".implode('),(', $c).")")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
                    $_SESSION['add_quiz_success']='true';
                    header('Location:exams.php');
                    echo "<script type='text/javascript'> document.location = 'exams.php'; </script>";
                    exit();
                }
        }
    }
      */  
?>                                                             