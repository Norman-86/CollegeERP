<?php  
    $course=$acronym=$level=$years=$faculty="";
    if(isset($_POST['submit']))
    {
        $course = mysql_real_escape_string($_POST['course']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        $level = mysql_real_escape_string($_POST['level']);
        $years = mysql_real_escape_string($_POST['years']);
        $faculty = mysql_real_escape_string($_POST['faculty']);
       
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
                    <span class="text-danger">Select Level of Study</span>
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
            if(!$select = mysql_query("SELECT * FROM course WHERE name = '$course' OR abbreviation = '$acronym'")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
            }else{
                $countrow=  mysql_num_rows($select);
                if($countrow > 0){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">Error: Either Course Name or Acronym already exists!</span>
                            </div>';
                }else
                {
                
                    //generate course code
                    $code = sprintf('%03d',rand(0,999));
                    $acron = strtoupper($acronym);
                    if(!$insert = mysql_query("INSERT INTO course (no,name,abbreviation,years,levelID,facultyID,registered)
                                            VALUES('$code','$course','$acron','$years','$level','$faculty',NOW()) ")){
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
                        header('Location:add-course.php');
                        echo "<script type='text/javascript'> document.location = 'add-course.php'; </script>";
                        exit();
                    }
                }
            }
        }
       
    }  
?>