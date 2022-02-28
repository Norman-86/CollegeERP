<?php                                                                        
    $start=$deadline=$quiz=$time="";
    
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
        $start = clean( date_format(date_create($_POST['start']),"Y-m-d"));
        $deadline = clean( date_format(date_create($_POST['deadline']),"Y-m-d"));
        $time = clean($_POST['time']);
        $id = clean($_GET['id']);
        
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
        if($start <= $currentDate){
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
            if(!$result = mysql_query("UPDATE exam SET no_of_quizes='$quiz',start='$start',deadline='$deadline',time='$time' WHERE examID=$id")){
                echo'<div class="bg-danger text-danger" style="text-align:center;padding:3px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="fa fa-times-circle"></i> &nbsp;'.mysql_error().'</div>';
            }else{
                $start=$deadline=$quiz=$time="";
                $_SESSION['update_success']='true';
                header('Location:exams.php');
                echo '<script type="text/javascript"> document.location = "exams.php"</script>';
                exit();    
            }
        } 
    }else
    if(isset($_POST['exit'])){
        $start=$deadline=$quiz=$time="";
        header('Location:exams.php');
        echo "<script type='text/javascript'> document.location = 'exams.php'; </script>";
        exit();  
    }        
?>                                                             