<?php  
    $class=$capacity="";
    if(isset($_POST['update']))
    {
        $class = mysql_real_escape_string($_POST['class']);
        $capacity = mysql_real_escape_string($_POST['capacity']);
        $id =  mysql_real_escape_string($_GET['id']);
        
        if(!$id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch class info.</span>
                </div>';
        }else
        if(!$class){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Class Name</span>
                </div>';
        }else 
        if(!$capacity){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Class Capacity</span>
                </div>';
        }else
        {
            if(!$insert = mysql_query("UPDATE class SET name='$class',capacity='$capacity' WHERE classID='$id'")){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else
            {
                $class=$capacity="";
                $_SESSION['success']="true";
                header('Location:class.php');
                echo "<script type='text/javascript'> document.location = 'class.php'; </script>";
                exit();
            }
        }
       
    }  
?>