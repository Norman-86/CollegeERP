<?php                                                                        
    $surname=$fname=$lname=$gender=$dob=$id=$phone1=$phone2=$mail=$country=$town=$course=$yos=$sem="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $surname = $_POST['surname'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender']; 
        $dob = clean($_POST['dob']);
        $id = clean($_POST['id']);
        $phone1 = clean($_POST['phone1']);
        $phone2 = clean($_POST['phone2']);
        $mail = clean($_POST['mail']);
        $country = $_POST['country'];
        $town = clean($_POST['town']);
        $course = clean($_POST['course']);
        //$yos = clean($_POST['yos']);
        $sem = clean($_POST['sem']);
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$fname){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter First Name!</span>
            </div>';
        }else
        if(!$lname){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Other Names!</span>
            </div>';
        }else
        if(!$gender){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Gender!</span>
            </div>';
        }else
        if(!$dob){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Date of Birth!</span>
            </div>';
        }else
        if(!$phone1){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Phone Number!</span>
            </div>';
        }else
        if(!$country){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Country!</span>
            </div>';
        }else
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Course!</span>
            </div>';
        }else
        if(!isset($_POST['yos'])){
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
            $yos = clean($_POST['yos']);
            
            if($id){
                $select = mysql_query("SELECT * FROM student WHERE id='$id' ");
                $counting=  mysql_num_rows($select);
            }
            if($phone1){
                $select1 = mysql_query("SELECT * FROM student WHERE phone1='$phone1'");
                $counting1=  mysql_num_rows($select1);
            }
            if($mail){
                $select2 = mysql_query("SELECT * FROM student WHERE mail='$mail' ");
                $counting2 =  mysql_num_rows($select2);
            }
            
            if(isset($counting) > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning
                            </b>
                            <br>
                            Either The National ID No.<b>'.$id.'</b> is already taken, or Student <b>'.$surname.' '.$fname.' '.$lname.'</b> already exists!</span>
                    </div>';
            }else
            if(isset($counting1) > 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning 
                            </b>
                            <br>
                            Either The Phone No.<b>'.$phone1.'</b> is already taken, or Student <b>'.$surname.' '.$fname.' '.$lname.'</b>" already exists!</span>
                    </div>';
            }else
            if(isset($counting2) > 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning
                            </b>
                            <br>
                            Either The Mail address <b>'.$mail.'</b> is already taken, or Student <b>'.$surname.' '.$fname.' '.$lname.'</b>" already exists!</span>
                    </div>';
            }else
            {
                //change date format for date of birth
                $dob1 = date_format(date_create($dob),"Y-m-d.");
                
                //get faculty abbreviation,course number for Auto generating Admission Number
                $slt = mysql_query("SELECT DISTINCT(f.abbreviation),c.no
                                    FROM faculty f
                                    LEFT JOIN course c
                                        ON c.facultyID = f.facultyID
                                    WHERE c.courseID = '$course'");
                
                //calculate total number of students in the assigned class
                $slt1 = mysql_query("SELECT COUNT(*) AS total_class_students
                                    FROM student s
                                    WHERE courseID ='$course' AND yosID='$yos' AND year(preadmitted)=".date('Y'));
                
                while ($fabbrev = mysql_fetch_assoc($slt)){
                    $fa = $fabbrev['abbreviation'];
                    $cno = $fabbrev['no'];
                }
                
                while ($total_row = mysql_fetch_assoc($slt1)){
                    $total_class_students = $total_row['total_class_students'];
                }
                
                //auto generate student admission number
                $adm = $fa."-".$cno."-".sprintf('%03d',(++$total_class_students))."/".date("Y");
                
                if(!$insert = mysql_query("INSERT INTO student (surname,fname,lname,gender,DOB,id,phone1,phone2,mail,country,town,status,preAdmitted,courseID,yosID,semisterID,adm,staffID)
                                            VALUES ('$surname','$fname','$lname','$gender','$dob1','$id','$phone1','$phone2','$mail','$country','$town','Pre-Admitted',NOW(),'$course','$yos','$sem','$adm','$staffID')"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $surname=$fname=$lname=$gender=$dob=$id=$phone1=$phone2=$mail=$country=$town="";
                    $_SESSION["new"]='True';
                    header('Location:pre-admission.php');
                    echo "<script type='text/javascript'> document.location = 'pre-admission.php'; </script>";
                    exit();
                }
            }
        }
    }       
?>                                                             