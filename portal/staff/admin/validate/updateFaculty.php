<?php  
    $faculty=$acronym="";
    if(isset($_POST['update']))
    {
        $faculty = mysql_real_escape_string($_POST['faculty']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        $id =  mysql_real_escape_string($_GET['id']);
        
        if(!$id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch faculty info.</span>
                </div>';
        }else
        if(!$faculty){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Faculty</span>
                </div>';
        }else 
        if(!$acronym){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Faculty Acronym</span>
                </div>';
        }else
        {
            if(!$insert = mysql_query("UPDATE faculty SET name='$faculty',abbreviation='$acronym' WHERE facultyID='$id'")){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else
            {
                $acronym=$faculty="";
                $_SESSION['success']="true";
                header('Location:faculty.php');
                echo "<script type='text/javascript'> document.location = 'faculty.php'; </script>";
                exit();
            }
        }
       
    }  
?>