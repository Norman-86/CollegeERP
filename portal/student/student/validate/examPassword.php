<?php  
    $pass="";
    if(isset($_POST['login']))
    {
        $pass = mysql_real_escape_string($_POST['currentpass']);
        
        if(!$pass){
            echo '<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Enter password</span>
                    </div>';
        }else{
            $cp=md5($pass);
            
            $qry="SELECT * FROM studentExam WHERE password='".$password."')";
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
        }     
    }  
?>