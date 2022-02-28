<?php                                                                        
    $course=$yos=$sem=$period=$start[]=$end[]=$monday_unit[]=$monday_class[]=$tuesday_unit[]=$tuesday_class[]=
    $wednesday_unit[]=$wednesday_class[]=$thursday_unit[]=$thursday_class[]=$friday_unit[]=$friday_class[]="";
    
    //select course, year of study, semester & period, for time table
    if(isset($_POST['activate'])){
        $course=$_POST['course'];
        $yos=$_POST['yos'];
        $sem=$_POST['sem'];
        $period=$_POST['period'];
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
        }else{
            //header("Location:time-table.php");
            echo '<script type="text/javascript"> document.location = "time-table.php?cid='.$course.'&yos='.$yos.'&sem='.$sem.'&period='.$period.'"; </script>';
            $course=$yos=$sem=$period=$start[]=$end[]=$monday_unit[]=$monday_class[]=$tuesday_unit[]=$tuesday_class[]=
            $wednesday_unit[]=$wednesday_class[]=$thursday_unit[]=$thursday_class[]=$friday_unit[]=$friday_class[]="";
            exit();
        }
            
    }else
    if(isset($_POST['create'])){
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
        $period=$_POST['period'];
        
        $start = $_POST['start'];
        $end = clean($_POST['end']);
        
        $monday_unit = $_POST['monday_unit'];
        $tuesday_unit = $_POST['tuesday_unit'];
        $wednesday_unit = $_POST['wednesday_unit'];
        $thursday_unit = $_POST['thursday_unit'];
        $friday_unit = $_POST['friday_unit'];
        
        $monday_class = $_POST['monday_class'];
        $tuesday_class = $_POST['tuesday_class'];
        $wednesday_class = $_POST['wednesday_class'];
        $thursday_class = $_POST['thursday_class'];
        $friday_class = $_POST['friday_class'];
        
        $ttNo = rand(1,999999999);
        
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
                $queryx = "SELECT * FROM time_table WHERE courseID=".$course." AND yosID=".$yos." AND semisterID=".$sem." AND periodID=".$period."";
                $resultx = mysql_query($queryx);
                if(empty($resultx)){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">This Time Table for selected: Course,Year of Study,Semister & Semister Period, already exists!</span>
                    </div>';
                }else{
                
                    $start = $_POST['start'];
                    $end = $_POST['end'];

                    $monday_unit = $_POST['monday_unit'];
                    $tuesday_unit = $_POST['tuesday_unit'];
                    $wednesday_unit = $_POST['wednesday_unit'];
                    $thursday_unit = $_POST['thursday_unit'];
                    $friday_unit = $_POST['friday_unit'];

                    $monday_class = $_POST['monday_class'];
                    $tuesday_class = $_POST['tuesday_class'];
                    $wednesday_class = $_POST['wednesday_class'];
                    $thursday_class = $_POST['thursday_class'];
                    $friday_class = $_POST['friday_class'];

                    $size_of_array = sizeof($start);

                    for($i=0;$i<count($size_of_array);$i++){}

                    $newCourse = array_fill(0,$i,$course);
                    $newYoS = array_fill(0,$i,$yos);
                    $newSem = array_fill(0,$i,$sem);
                    $newPeriod = array_fill(0,$i,$period);
                    $tNo = array_fill(0,$i,$ttNo);
                    $staff = array_fill(0,$i,$staffID);
                    $date = array_fill(0,$i,date("Y-m-d H:i:s"));


                    $c = array_map(function ($tNo,$monday_unit,$monday_class,$tuesday_unit,$tuesday_class,$wednesday_unit,$wednesday_class,$thursday_unit,$thursday_class,$friday_unit,$friday_class,$start,$end,$newCourse,$newYoS,$newSem,$newPeriod,$date,$staff){return "'$tNo','$monday_unit','$monday_class','$tuesday_unit','$tuesday_class','$wednesday_unit','$wednesday_class','$thursday_unit','$thursday_class','$friday_unit','$friday_class','$start','$end','$newCourse','$newYoS','$newSem','$newPeriod','$date','$staff'";} ,$tNo,$monday_unit,$monday_class,$tuesday_unit,$tuesday_class,$wednesday_unit,$wednesday_class,$thursday_unit,$thursday_class,$friday_unit,$friday_class,$start,$end,$newCourse,$newYoS,$newSem,$newPeriod,$date,$staff);

                    if(!$insert = mysql_query("INSERT INTO time_table (no,mondayUnit,mondayClass,tuesdayUnit,tuesdayClass,wednesdayUnit,wednesdayClass,thursdayUnit,thursdayClass,fridayUnit,fridayClass,startTime,endTime,courseID,yosID,semisterID,periodID,created,staffID) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                <span class="text-warning">'.mysql_error().'</span>
                            </div>';
                    }
                    else{
                        $course=$yos=$sem=$period=$start[]=$end[]=$monday_unit[]=$monday_class[]=$tuesday_unit[]=$tuesday_class[]=
                        $wednesday_unit[]=$wednesday_class[]=$thursday_unit[]=$thursday_class[]=$friday_unit[]=$friday_class[]="";

                        $_SESSION['success']='true';
                        header('Location:time-table.php');
                        echo "<script type='text/javascript'> document.location = 'time-table.php'; </script>";
                        exit();
                    }
                }
            }  
        }
        
?>                                                             