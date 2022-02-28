<?php  
    $unit=$acronym=$course=$yos=$sem="";
    if(isset($_POST['submit']))
    {
        $unit = mysql_real_escape_string($_POST['unit']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        $course = mysql_real_escape_string($_POST['course']);
        $yos = mysql_real_escape_string($_POST['yos']);
        $sem = mysql_real_escape_string($_POST['sem']);
       
        if(!$unit){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Unit Name</span>
                </div>';
        }else
        if(!$acronym){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Unit Acronym</span>
                </div>';
        }else
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Course</span>
                </div>';
        }else
        if(!$yos){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Year of Study</span>
                </div>';
        }else
        if(!$sem){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Semester</span>
                </div>';
        }else 
        {
            if(!$select = mysql_query("SELECT * FROM unit WHERE name = '$unit' OR abbreviation = '$acronym'")){
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
                                <span class="text-danger">Error: Either Unit Name or Acronym already exists!</span>
                            </div>';
                }else
                {
                
                    //generate course code
                    $code = sprintf('%03d',rand(0,999));
                    $acron = strtoupper($acronym);
                    if(!$insert = mysql_query("INSERT INTO unit (no,name,abbreviation,yosID,semisterID,courseID)
                                            VALUES('$code','$unit','$acron','$yos','$sem','$course') ")){
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
                        header('Location:add-unit.php');
                        echo "<script type='text/javascript'> document.location = 'add-unit.php'; </script>";
                        exit();
                    }
                }
            }
        }
       
    }  
?>