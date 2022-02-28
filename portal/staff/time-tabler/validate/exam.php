<?php                                                                        
    $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
    
    //select course, year of study, semester & period, for time table
    if(isset($_POST['activate'])){
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $course=clean($_POST['course']);
        $yos=clean($_POST['yos']);
        $sem=clean($_POST['sem']);
        $period=clean($_POST['period']);
        
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Course!</span>
            </div>';
        }else
        if(!$yos){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Year of Study!</span>
            </div>';
        }else
        if(!$sem){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Semester!</span>
            </div>';
        }else{
            //header("Location:time-table.php");
            echo '<script type="text/javascript"> document.location = "add-exam.php?step=1&cid='.$course.'&yos='.$yos.'&sem='.$sem.'&period='.$period.'"; </script>';
            $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
            exit();
        }
            
    }else
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $course = clean($_GET['cid']);
        $yos = clean($_GET['yos']);
        $sem = clean($_GET['sem']);
        $period = clean($_GET['period']);
        $unit=clean($_POST['unit']);
        $quiz=clean($_POST['no_of_quizes']);
        $start = clean( date_format(date_create($_POST['start']),"Y-m-d"));
        $deadline = clean( date_format(date_create($_POST['deadline']),"Y-m-d"));
        $time = clean($_POST['time']);
        $currentDate = date("Y-m-d");
        
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify authorising officer!</span>
                </div>';
        }else
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to identify course!</span>
            </div>';
        }else
        if(!$yos){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to identify Year of Study!</span>
            </div>';
        }else
        if(!$sem){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to identify Semester!</span>
            </div>';
        }else
        if(!$period){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to identify Semester Period!</span>
            </div>';
        }else
        if(!$unit){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Unit!</span>
            </div>';
        }else
        if(!$quiz){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter total number of Quizes!</span>
            </div>';
        }else
        if(!$start){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Start Date!</span>
            </div>';
        }else
        if($start < $currentDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Start Date must be greator than today&CloseCurlyQuote;s date </span>
                </div>';
        }else
        if(!$deadline){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Deadline Date!</span>
            </div>';
        }else
        if($deadline < $start){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Deadline date must be <b>equal</b> or <b>greator</b> than Start date!</span>
                </div>';
        }else
        if(!$time){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Exam Time limit (in minutes)!</span>
            </div>';
        }else
        {
            
            //$steps="step=2&cid='$course'&yos='$yos'&sem='$sem'&period='$period'&u='$unit'&q='$quiz'&s='$start'&d='$deadline'&t='$time'";
            //$url = base64_encode(serialize($steps));
            //header('Location:add-exam.php');
            echo '<script type="text/javascript"> document.location = "add-exam.php?step=2&cid='.$course.'&yos='.$yos.'&sem='.$sem.'&period='.$period.'&u='.$unit.'&q='.$quiz.'&s='.$start.'&d='.$deadline.'&t='.$time.'"</script>';
            exit();    
            $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
        } 
    }else
    if(isset($_POST['exit'])){
        $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
        header('Location:add-exam.php');
        echo "<script type='text/javascript'> document.location = 'add-exam.php'; </script>";
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
        
        $p = clean($_GET['period']);
        $u=clean($_GET['u']);
        $q=clean($_GET['q']);
        $s = clean( date_format(date_create($_GET['s']),"Y-m-d"));
        $d = clean( date_format(date_create($_GET['d']),"Y-m-d"));
        $t = clean($_GET['t']);
        
        //$examNo = rand(1,999999999);
        $examNo =substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 9)), 0, 6);
        
        //quiz 
        $qz = $_POST['quiz'];
        $oa = $_POST['a'];
        $ob = $_POST['b'];
        $oc = $_POST['c'];
        $od = $_POST['d'];
        $answer = $_POST['answer'];
        $mk = $_POST['marks'];
        
        for($i=0;$i<count($qz);$i++){
             $qno[]= $i;
        }
        $exam = array_fill(0,$i,$examNo);
        
        //$c = array_map(function ($exam,$qno,$qz,$oa,$ob,$oc,$od,$answer,$mk){return "'$exam','$qno','$qz','$oa','$ob','$oc','$od','$answer','$mk'";} , $exam,$qno,$qz,$oa,$ob,$oc,$od,$answer,$mk);
        $c = array_map(function ($exam,$qz,$oa,$ob,$oc,$od,$answer,$mk){return "'$exam','$qz','$oa','$ob','$oc','$od','$answer','$mk'";} , $exam,$qz,$oa,$ob,$oc,$od,$answer,$mk);
        
        if(!$result = mysql_query("SELECT staffID FROM staffunit where unitID='".mysql_real_escape_string($_GET['u'])."'")){
            echo'<div class="bg-danger text-danger" style="text-align:center;padding:3px;">
                    <i class="fa fa-times-circle"></i> &nbsp;'.mysql_error().'</div>';
        }else{
            while ($rw = mysql_fetch_array($result)) {
                $lec=$rw['staffID'];
            }
                if(!$insert = mysql_query("INSERT INTO exam (examNo,unitID,start,deadline,time,no_of_quizes,periodID,registered,staffID) VALUES('$examNo','$u','$s','$d','$t','$q','$p',NOW(),'$lec')")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else
                    
                if(!$insert = mysql_query("INSERT INTO quiz (examNo,quiz,option_a,option_b,option_c,option_d,answer,marks) VALUES(".implode('),(', $c).")")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
                    $_SESSION['success']='true';
                    header('Location:add-exam.php');
                    echo "<script type='text/javascript'> document.location = 'add-exam.php'; </script>";
                    exit();
                }
        }
    }
        
?>                                                             