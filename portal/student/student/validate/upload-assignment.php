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
    
        $input_deadline=$_POST['deadline'];
        $deadline = date("Y-m-d", strtotime($input_deadline));
        $now = date("Y-m-d");
        
        
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to fetch assignment info</span>
                </div>';
        }else
        if($now > $deadline){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">This Assignment is already closed for submissions!</span>
                </div>';
        }else
        if(empty($_FILES['file']['tmp_name'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select document to upload!</span>
                </div>';
        }else
        if(!isset($_FILES['file']['tmp_name'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select document to upload!</span>
                </div>';
        }else{
                $id = mysql_real_escape_string($_GET['id']);
            
                $allowed = array("pdf","doc","docx","ppt","pptx","xlsx","xls","rar","zip");

                $file_location = $_FILES['file']['tmp_name'];//get file location
                $info = pathinfo($_FILES['file']['name']);//get file info 
                $ext = $info['extension']; // get the extension of the file
                $file_name = date("Ymd").date("His").$id.$studentID.".".$ext;//rename file
                $folder="../../uploads/submit/";

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
                    if(!$insert = mysql_query("INSERT INTO submittedassignment (studentID,assignmentID,assignment,submitted)
                                                VALUES ('$studentID','$id','$dir',NOW())"))
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
                            header("Location:upload-assignment.php?id=".$id);
                            echo '<script type="text/javascript"> document.location = "upload-assignment.php?id='.$id.'"; </script>';
                            exit();
                        }
                }
            }
    }
?>