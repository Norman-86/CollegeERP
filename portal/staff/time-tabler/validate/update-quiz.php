<?php                                                                        
    $qz=$oa=$ob=$oc=$od=$answer=$mk="";
    
    if(isset($_POST['update'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        //quiz 
        $qz = clean($_POST['quiz']);
        $oa = clean($_POST['a']);
        $ob = clean($_POST['b']);
        $oc = clean($_POST['c']);
        $od = clean($_POST['d']);
        $answer = clean($_POST['answer']);
        $mk = clean($_POST['marks']);
        $id = clean($_GET['id']);
        $e = clean($_GET['e']);
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify authorising officer!</span>
                </div>';
        }else
        if(!$qz){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Write Quiz!</span>
            </div>';
        }else
        if(!$oa){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Option A!</span>
            </div>';
        }else
        if(!$ob){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Option B</span>
                </div>';
        }else
        if(!$oc){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Option C</span>
            </div>';
        }else
        if(!$od){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Option D</span>
                </div>';
        }else
        if(!$answer){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Answer</span>
            </div>';
        }else
        if(!$mk){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter marks</span>
            </div>';
        }else
        {
            if(!$result = mysql_query("UPDATE quiz SET quiz='$qz',option_a='$oa',option_b='$ob',option_c='$oc',option_d='$od',answer='$answer',marks='$mk' WHERE quizID=$id")){
                echo'<div class="bg-danger text-danger" style="text-align:center;padding:3px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="fa fa-times-circle"></i> &nbsp;'.mysql_error().'</div>';
            }else{
                $qz=$oa=$ob=$oc=$od=$answer=$mk="";
                $_SESSION['success']='true';
                header('Location:quiz.php?id='.$e.'');
                echo '<script type="text/javascript"> document.location = "quiz.php?id='.$e.'"</script>';
                exit();    
            }
        } 
    }else
    if(isset($_POST['exit'])){
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $e = clean($_GET['e']);
        
        $qz=$oa=$ob=$oc=$od=$answer=$mk="";
        header('Location:quiz.php?id='.$e.'');
        echo '<script type="text/javascript"> document.location = "quiz.php?id='.$e.'"</script>';
        exit();  
    }        
?>                                                             