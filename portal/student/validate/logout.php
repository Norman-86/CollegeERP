<?php
    session_start();
    
    include('../../../db_connect.php');
    
    if(isset($_SESSION['exam']) && isset($_SESSION['student'])){
        //$now = date('Y-m-d H:i:s');
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
            unset($_SESSION['timeFailure']);
            unset($_SESSION["end_time"]);
            unset($_SESSION['studentID']);
            unset($_SESSION['category']);
            unset($_SESSION['exam']);
            unset($_SESSION['timeLeft']);
            unset($_SESSION['loginTime']);
            echo "<script type='text/javascript'> document.location = '../index'; </script>";
            exit();                   
        }
        
    }else{
        unset($_SESSION['loginTime']);
        unset($_SESSION['timeLeft']);
        unset($_SESSION['timeFailure']);
        unset($_SESSION["end_time"]);
        unset($_SESSION['studentID']);
        unset($_SESSION['category']);
        unset($_SESSION['exam']);
        unset($_SESSION['timeLeft']);
        unset($_SESSION['loginTime']);
        echo "<script type='text/javascript'> document.location = '../index'; </script>";
        exit();
    }
?>