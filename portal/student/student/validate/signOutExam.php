<?php
    
    //if student has clicked sign out exam button
    if(isset($_POST['signOut'])){
        
        $now = date('Y-m-d H:i:s');
        if(!$insert=mysql_query("UPDATE exam_login SET logoutTime=NOW() WHERE examNo='".$_SESSION['exam']."' AND studentID='$studentID'"))
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
        
            $_SESSION['signOut']=true;
            header('Location:exam.php');
            echo "<script type='text/javascript'> document.location = 'exam.php'; </script>";
            exit();                                
        }
        
        
    }else
    //if system failed to fetch time left for exam
    if(isset($_SESSION['timeFailure']) == true){
            unset($_SESSION['timeLeft']);
            unset($_SESSION['exam']);
            unset($_SESSION['loginTime']);
            
            $_SESSION['timeError']=true;
            header('Location:exam.php');
            echo "<script type='text/javascript'> document.location = 'exam.php'; </script>";
            exit();
            
            unset($_SESSION['timeFailure']);
    } else {
        /*session_start();
        if(isset($_SESSION['examTimeOut'])=="true"){
        unset($_SESSION['timeLeft']);
        unset($_SESSION['exam']);
        unset($_SESSION['loginTime']);
        
        $_SESSION['timeout']="true";
        header('Location:../exam.php');
        echo "<script type='text/javascript'> document.location = '../exam.php'; </script>";
        exit();
        unset($_SESSION['examTimeOut']);
    }*/
        
}
    
?>