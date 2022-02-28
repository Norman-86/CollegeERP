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
        
        $quiz=clean($_POST['no_of_quizes']);
        $id=clean($_GET['id']);
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify authorising officer!</span>
                </div>';
        }else
        if(!$quiz){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter total number of Quizes to add!</span>
            </div>';
        }else
        {
            // Get no. of current quizes
            $query5 = "SELECT COUNT(*) AS total_quizes FROM quiz WHERE examNo='$id' ";
            $result5 = mysql_query($query5);
        
            while($rw = mysql_fetch_array($result5)){
                $totalQuizes = $rw['total_quizes'];
            }
            
            //get no. of exams total quizes allowed
            $query1 = mysql_query("SELECT no_of_quizes FROM exam WHERE examNo='$id'");
            while($rws = mysql_fetch_array($query1)){
                $quizes = $rws['no_of_quizes'];
            }
             
            $remainingQuizes = $quizes - $totalQuizes;
            if($quiz > $remainingQuizes){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Quizes to add exceeds no. of quizes set for this exam!</span>
                    </div>';
            }else{
                echo '<script type="text/javascript"> document.location = "add-quiz.php?step=2&id='.$id.'&q='.$quiz.'"</script>';
                exit(); 
                $quiz="";
            }
        } 
    }else
    if(isset($_POST['exit'])){
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
        
?>                                                             