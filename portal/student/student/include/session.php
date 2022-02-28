<?php
    ob_start();
    session_start();
    
    date_default_timezone_set("Africa/Nairobi");
    
    //check if session exists
    if(!isset($_SESSION['studentID']))
    { 
        header("location:../../student/index.php");
    }else
    //if session category is lecturer, return to lecturer's portal
    if(!isset($_SESSION['status'])==="Admitted")
    { 
        header("location:../../staff/lecturer/index.php");
    }else{
        $studentID = $_SESSION['studentID'];
    }
    
    include('../../../db_connect.php');
    
    $studentname = "SELECT s.*,c.* FROM student s LEFT JOIN course c ON s.courseID = c.courseID WHERE s.studentID ='$studentID'";
    $student = mysql_query($studentname);
   
    if (!$student) { // add this check.
        die('Invalid query: ' . mysql_error());
    }else{
        while ($name = mysql_fetch_array($student)) {
            $pro = $name['lname'];
            $yos = $name['yosID'];
            $sem = $name['semisterID'];
            $course = $name['courseID']; 
        }
    }
?>