<?php  
    $course=$acronym=$level=$years=$faculty="";
    if(isset($_POST['update']))
    {
        $course = mysql_real_escape_string($_POST['course']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        $level = mysql_real_escape_string($_POST['level']);
        $years = mysql_real_escape_string($_POST['years']);
        $faculty = mysql_real_escape_string($_POST['faculty']);
        $id =  mysql_real_escape_string($_GET['id']);
        
        if(!$id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch course info.</span>
                </div>';
        }else
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Course</span>
                </div>';
        }else
        if(!$acronym){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Course Acronym</span>
                </div>';
        }else
        if(!$level){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select level of Study</span>
                </div>';
        }else
        if(!$years){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Years of Study</span>
                </div>';
        }else
        if(!$faculty){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Faculty</span>
                </div>';
        }else 
        {
            if(!$insert = mysql_query("UPDATE course SET name='$course',abbreviation='$acronym',levelID='$level',years='$years',facultyID='$faculty' WHERE courseID='$id'")){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else
            {
                $course=$acronym=$level=$years=$faculty="";
                $_SESSION['success']="true";
                header('Location:course.php');
                echo "<script type='text/javascript'> document.location = 'course.php'; </script>";
                exit();
            }
        }
       
    }  
?>