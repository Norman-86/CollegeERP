<?php 
    
    if(isset($_POST['assignment'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
    
        $assignment = clean($_GET["id"]);
        $submitted = $_POST['submitted'];
        $marks=$_POST['marks'];
        
        if(!$assignment){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch assignment details!</span>
                </div>';
        }else
        if(!$submitted){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch submitted assignment details!</span>
                </div>';
        }else
        {
            $check_error = 0;
            for($i=0;$i<count($submitted);$i++){
                //insert marks to database
                if(!$insert = mysql_query("UPDATE submittedassignment SET marks='$marks[$i]',marked=NOW() WHERE submittedID ='$submitted[$i]' AND assignmentID='$assignment' "))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else
                { 
                   $check_error ++;
                }   
            }
            //check if errors occured
            if($check_error==0){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Failed to mark assignment</span>
                    </div>';     
            }else{
                $_SESSION['success']='true';
                header("Location:view-assignments.php");
                echo '<script type="text/javascript"> document.location = "view-assignments.php"; </script>';
                exit();
            }      
        }
    }else
        
        
    if(isset($_POST['updateAssignment'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
    
        $assignment = clean($_GET["id"]);
        $submitted = $_POST['submitted'];
        $marks=$_POST['marks'];
        
        if(!$assignment){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch assignment details!</span>
                </div>';
        }else
        if(!$submitted){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch submitted assignment details!</span>
                </div>';
        }else
        {
           
                //insert marks to database
                if(!$insert = mysql_query("UPDATE submittedassignment SET marks='$marks' WHERE submittedID ='$submitted' AND assignmentID='$assignment' "))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else
                { 
                    $_SESSION['mark']='true';
                    header("Location:submitted-assignment.php?id=$assignment");
                    echo '<script type="text/javascript"> document.location = "submitted-assignment.phpp?id='.$assignment.'"; </script>';
                    exit();
            }      
        }
    }
?>