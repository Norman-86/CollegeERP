<?php
    session_start();
    if(isset($_SESSION['exam']) && isset($_SESSION['timeLeft'])){
        date_default_timezone_set("Africa/Nairobi");
        
        $duration=$_SESSION['timeLeft'];
        $_SESSION['duration'] = $duration;
        
        $_SESSION['start_time'] = date("Y-m-d H:i:s");
        $end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
        
        $_SESSION["end_time"]=$end_time;
        
    
?>
    <script type="text/javascript">
        window.location="quiz.php";
    </script>
<?php 
    }else{
        $_SESSION['timeFailure']=true;
        header('Location:validate/signOutExam.php');
        echo "<script type='text/javascript'> document.location = 'validate/signOutExam.php'; </script>";
        exit();
        
    }
?>

