<?php  
    $name=$sno=$category="";
    if(isset($_POST['update']))
    {
        $name = mysql_real_escape_string($_POST['name']);;
        $sno = mysql_real_escape_string($_POST['staffNo']);
        $id =  mysql_real_escape_string($_GET['id']);
        
        if(!$id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch Student info.</span>
                </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify Student name</span>
                </div>';
        }else
        if(!$sno){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify Student Admission No.</span>
                </div>';
        }else
        {
            $pass = md5($sno);
            if(!$insert = mysql_query("UPDATE student SET password='$pass' WHERE studentID='$id' AND adm='$sno' ")){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else
            {
                $name=$sno=$category="";
                $_SESSION['pass']="true";
                header('Location:view-admitted.php');
                echo "<script type='text/javascript'> document.location = 'view-admitted.php'; </script>";
                exit();
            }
        }
       
    }  
?>