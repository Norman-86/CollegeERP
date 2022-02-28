<?php  
    $class=$capacity="";
    if(isset($_POST['submit']))
    {
        $class = mysql_real_escape_string($_POST['class']);
        $capacity = mysql_real_escape_string($_POST['capacity']);
        
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
            if(!$select = mysql_query("SELECT * FROM class WHERE name = '$class'")){
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
                                <span class="text-danger">Error: Class <b>'.$class.'</b> already exists!</span>
                            </div>';
                }else
                {
                    if(!$insert = mysql_query("INSERT INTO class (name,capacity) VALUES ('$class','$capacity')")){
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
                        header('Location:add-class.php');
                        echo "<script type='text/javascript'> document.location = 'add-class.php'; </script>";
                        exit();
                    }
                }
            }
        }
       
    }  
?>