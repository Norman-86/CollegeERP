<?php 
    $unit=$title=$startDate=$deadline=$remark=$marks="";
    if(isset($_POST['update'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}*/
    
        $assignment = $_POST['update'];
        $unit = $_POST['unit'];
        $title = $_POST["title"];
        $input_start=$_POST["start"];
        $input_deadline=$_POST['deadline'];
        $marks=$_POST['marks'];
        $remark=$_POST['remarks'];
        
        $startDate = date("Y-m-d", strtotime($input_start));
        $deadline = date("Y-m-d", strtotime($input_deadline));
        
        
        if(!$unit){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Unit!</span>
                </div>';
        }else
        if(!$title){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Assignment Title!</span>
                </div>';
        }else
        if(!$startDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Assignment Start Date!</span>
                </div>';
        }else
        if($startDate < date("Y-m-d")){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Start Date MUST be <b>equal</b> or <b>greator</b> than CURRENT date!</span>
                </div>';
        }else
        if(!$deadline){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Assignment Deadline!</span>
                </div>';
        }else
        if($startDate > $deadline){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger"><b>Deadline</b> MUST be either equal or greator than <b>Start Date</b>!</span>
                </div>';
        }else
        //insert document details to database
        if(!$insert = mysql_query("UPDATE assignment SET title='$title',details='$remark',startDate='$startDate',deadline='$deadline',marks='$marks',unitID='$unit' WHERE assignmentID='$assignment'"))
        {
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'.mysql_error().'</span>
                </div>';
        }else{
            $unit=$title=$startDate=$deadline=$remark=$marks="";
            $_SESSION['update']='true';
            header("Location:view-assignments.php");
            echo '<script type="text/javascript"> document.location = "view-assignments.php"; </script>';
            exit();
        }
    }
?>