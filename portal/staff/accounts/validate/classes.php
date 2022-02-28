<?php                                                                        
    $course=$yos=$sem="";
    
    //select course, year of study, semester & period, for time table
    if(isset($_POST['activate'])){
        $course=$_POST['course'];
        $yos=$_POST['yos'];
        $sem=$_POST['sem'];
        
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
            echo '<script type="text/javascript"> document.location = "class.php?cid='.$course.'&yos='.$yos.'&sem='.$sem.'"; </script>';
            $course=$yos=$sem="";
            exit();
        }
            
    }else
    if(isset($_POST['promote'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $course=$_POST['course'];
        $yos=$_POST['yos'];
        $sem=$_POST['sem'];
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">No Students selected!</span>
                </div>';
        }else
        {
        
            for($i=0;$i<count($_POST['checkbox']);$i++){
                $del_id=$_POST['checkbox'];
            }
            $student = implode(',', $del_id);
            
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
                <span class="text-danger">Select Course to activate Time-Table!</span>
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
        }else
        {
            $qur = "SELECT y.yosID,y.yos,s.semisterID,s.sem,c.years
                    FROM student st
                    LEFT JOIN course c
                    ON st.courseID = c.courseID
                    LEFT JOIN yos y
                    ON st.yosID = y.yosID
                    LEFT JOIN semister s
                    ON st.semisterID = s.semisterID
                    WHERE st.courseID =".$_GET['cid']."";
            $ress = mysql_query($qur);
            
            
            while($rws = mysql_fetch_assoc($ress)){
                $cyosID = $rws['yosID'];
                $csemID = $rws['semisterID'];
                $cyos = $rws['yos'];
                $csem = $rws['sem'];
                $cyear = $rws['years'];
            }
            
            if($sem == $csemID){
                //move students to semister 2
                if($csem == 1){
                    $newSem = $csem+1;
                    
                    if(!$insert = mysql_query("UPDATE student set semisterID ='$newSem' WHERE studentID IN($student)"))
                    {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                    }
                    else{
                        
                        $_SESSION['success'] = $newSem;
                        header('Location:class.php');
                        echo "<script type='text/javascript'> document.location = 'class.php'; </script>";
                        $course=$yos=$sem="";
                        exit();
                    }
                }else
                /*if students are in semister 2, 
                move to next year of study*/    
                if($csem == 2){
                   /*If year of study is less than maximum number 
                    * of years for that particular course, 
                    * then move students to next year of study
                    */
                   if($cyos < $cyear){
                        echo $newYoS = $cyos+1;
                       
                        $qur1 = "SELECT yosID FROM yos WHERE yos=".$newYoS."";
                        $res1 = mysql_query($qur1);
                        while($rws1 = mysql_fetch_assoc($res1)){
                            $yosID = $rws1['yosID'];
                        }
                        
                        if(!$insert = mysql_query("UPDATE student set yosID ='$yosID' ,semisterID ='1' WHERE studentID IN($student)"))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }
                        else{
                            
                            $_SESSION['success1']=$yosID;
                            header('Location:class.php');
                            echo "<script type='text/javascript'> document.location = 'class.php'; </script>";
                             $course=$yos=$sem="";
                            exit();
                        }
                   }else
                   /*If year of study is equal to maximum number 
                    * of years for that particular course, 
                    * then update students' status to 'Completed'
                    */
                   if($cyos == $cyear){
                       if(!$insert = mysql_query("UPDATE student set status = 'Completed', completed=NOW() WHERE studentID IN($student)"))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }
                        else{
                            
                            $_SESSION['success2']='true';
                            header('Location:class.php');
                            echo "<script type='text/javascript'> document.location = 'class.php'; </script>";
                            $course=$yos=$sem="";
                            exit();
                        }
                   }
                }    
            }
            }
        }  
    }
        
?>                                                             