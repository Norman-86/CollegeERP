<?php 
    $unit=$title=$startDate=$deadline=$remark=$marks="";
    if(isset($_POST['upload'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}*/
    
        $unit = $_POST['unit'];
        $title = $_POST["title"];
        $input_start=$_POST["start"];
        $input_deadline=$_POST['deadline'];
        $marks=$_POST['marks'];
        $remark=$_POST['remarks'];
        
        $startDate = date("Y-m-d", strtotime($input_start));
        $deadline = date("Y-m-d", strtotime($input_deadline));
        
        //GENERATE RANDOM integer character string 
        $code =substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 9)), 0, 6);
        
        
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
        if(!$_FILES['file']['tmp_name']){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select document to upload!</span>
                </div>';
        }else{
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
                
                $allowed = array("pdf","doc","docx","ppt","pptx","xlsx","xls","rar","zip");

                $file_location = $_FILES['file']['tmp_name'];//get file location
                $info = pathinfo($_FILES['file']['name']);//get file info 
                $ext = $info['extension']; // get the extension of the file
                $file_name = $name."-".$unit."-".date("Ymd").date("His").".".$ext;//rename file
                $folder="../../uploads/assignment/";

                $target_file=$folder . basename($file_name);
                //check if uploaded file extension is in allowed list
                if (!in_array($ext, $allowed)){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Invalid file format. <br>Only files of extension: .pdf, .doc, .docx, .ppt, .pptx, .xlsx, .xls, .rar, .zip are allowed</span>
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
                    if(!$insert = mysql_query("INSERT INTO assignment (code,title,document,details,uploaded,startDate,deadline,marks,unitID,staffID)
                                                VALUES ('$code','$title','$dir','$remark',NOW(),'$startDate','$deadline','$marks','$unit','$staffID')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                        {
                            $unit=$title=$startDate=$deadline=$remark=$marks="";
                            $_SESSION['success']='true';
                            header("Location:upload-assignment.php");
                            echo '<script type="text/javascript"> document.location = "upload-assignment.php"; </script>';
                            exit();
                        }
                }
            }
        }
    }
?>