<?php
    include('../../../db_connect.php');
    session_start();
    date_default_timezone_set("Africa/Nairobi");
    
    $from_time1 = date('Y-m-d H:i:s');
    $to_time1 = $_SESSION["end_time"];
    
    $timefirst = strtotime($from_time1);
    $timesecond = strtotime($to_time1);
    
    $differenceinseconds = $timesecond - $timefirst;
    
    if($differenceinseconds < 0){
        
        if(!$insert=mysql_query("UPDATE exam_login SET logoutTime=NOW() WHERE examNo='".$_SESSION['exam']."' AND studentID='".$_SESSION['student']."' "))
        {
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'.mysql_error().'</span>
                </div>';
        }else
        {
            unset($_SESSION['loginTime']);
            unset($_SESSION['timeLeft']);
            unset($_SESSION['exam']);
            unset($_SESSION['timeFailure']);
            unset($_SESSION["end_time"]);
            
            
            $_SESSION['timeout']="true";
            header('Location:exam.php');
            echo "<script type='text/javascript'> document.location = 'exam.php'; </script>";
            exit();
            
            print "00:00:00";
        }
    }else 
    {
        echo gmdate("H:i:s", $differenceinseconds);
    }

?>