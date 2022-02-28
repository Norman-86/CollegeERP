<?php  
    $unit=$acronym=$course=$yos=$sem="";
    if(isset($_POST['submit']))
    {
        $unit = mysql_real_escape_string($_POST['unit']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        $course = mysql_real_escape_string($_POST['course']);
        $yos = mysql_real_escape_string($_POST['yos']);
        $sem = mysql_real_escape_string($_POST['sem']);
        $id = mysql_real_escape_string($_GET['id']);
       
        if(!id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch Unit info.</span>
                </div>';
        }else
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
            /*if(!$select = mysql_query("SELECT * FROM unit WHERE name = '$unit' OR abbreviation = '$acronym'")){
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
                {*/
                
                    //generate course code
                    $acron = strtoupper($acronym);
                    if(!$insert = mysql_query("UPDATE unit SET name='$unit',abbreviation='$acron',yosID='$yos',semisterID='$sem',courseID='$course' WHERE unitID='$id' ")){
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
                        header('Location:unit.php');
                        echo "<script type='text/javascript'> document.location = 'unit.php'; </script>";
                        exit();
                    }
                //}
            //}
        }
       
    }  
?>