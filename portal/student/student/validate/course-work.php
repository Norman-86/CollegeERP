<?php 
    $unit=$course=$yos=$sem="";
    
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
            echo '<script type="text/javascript"> document.location = "course-work.php?step=1&cid='.$course.'&yos='.$yos.'&sem='.$sem.'"; </script>';
            $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
            exit();
        }
            
    }else
        
    if(isset($_POST['exit'])){
        $unit=$course=$yos=$sem=$file="";
        header('Location:course-work.php');
        echo "<script type='text/javascript'> document.location = 'course-work.php'; </script>";
        exit();  
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
    
        $unit = clean($_POST['unit']);
        $course = clean($_GET['cid']);
        $yos = clean($_GET['yos']);
        $sem = clean($_GET['sem']);
        
        if(!$unit){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Unit!</span>
                </div>';
        }else
        if(!$_FILES['file']['tmp_name']){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select file to upload!</span>
                </div>';
        }else
        {
            $select = mysql_query("SELECT name FROM unit WHERE unitID=$unit");
            if(empty($select)){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Error occured while trying to fetch unit name, for renaming upload file!</span>
                    </div>';
            }else
            {
                while($row = mysql_fetch_array($select))
                {
                    $name = $row['name'];
                }
                
                
                $allowed = array("pdf","doc","docx","ppt","pptx","xlsx","xls","zip","rar");

                $file_location = $_FILES['file']['tmp_name'];//get file location
                $info = pathinfo($_FILES['file']['name']);//get file info 
                $ext = $info['extension']; // get the extension of the file
                $file_name = $name."-".$unit."-".date("Ymd").date("His").".".$ext;//rename file
                $folder="../../uploads/course-work/";

                $target_file=$folder . basename($file_name);
                //check if uploaded file extension is in allowed list
                if (!in_array($ext, $allowed)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Invalid file format. <br>Only files of extension: .pdf, .doc, .docx, .ppt, .pptx, .xlsx, .xls, .zip, .rar are allowed</span>
                        </div>';
                }else
                if(file_exists($target_file)) {
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">File exists. Try renaming your document.</span>
                        </div>';
                }else
                if(!move_uploaded_file($file_location,$folder.$file_name)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Unable to upload file<br> check file name or contact system administrator!></span>
                        </div>';
                }else{
                    $dir=$file_name;
                    
                    //insert document details to database
                    if(!$insert = mysql_query("INSERT INTO coursework (doc,unitID) VALUES ('$dir','$unit')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                        {
                            $unit="";
                            $_SESSION['success']='true';
                            header("Location:course-work.php?step=1&cid=$course&yos=$yos&sem=$sem");
                            echo '<script type="text/javascript"> document.location = "course-work.php?step=1&cid='.$course.'&yos='.$yos.'&sem='.$sem.'"; </script>';
                            exit();
                        }
                }
            }
        }  
    }else 
    if(isset($_POST['delete'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
    
        $cc = clean($_POST['delete']);
        $id = clean($_GET['id']);
        if(!$cc) {
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error occured while trying to fetch Course Work info.</span>
                </div>';
        }else{
            //delete photo in folder
            if(!unlink("../../uploads/course-work/$cc")){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Error occured while trying to delete attachment</span>
                    </div>';
            }else{
                //delete row(s) of record(s)
                $sql = "DELETE FROM coursework WHERE doc='$cc'";
                $deleted = mysql_query($sql);
                //get no. of rows deleted
                $records=  mysql_affected_rows();

                // if successful redirect to refresh page
                if($records>0){            
                    $_SESSION["del"]='True';
                    header('Location:coursework.php?id='.$id.'');
                    echo "<script type='text/javascript'> document.location = 'coursework.php?id=$id'; </script>";
                    exit();
                }else{
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">No Course Work deleted!</span>
                        </div>';
                }
            }
        }
    }

    
?>