<?php    
    // Check if quiz delete button active, start this
    if(isset($_POST['deleteQuiz'])){
        
        $del_id=$_POST['deleteQuiz'];
        
        $id=mysql_real_escape_string($_GET['id']);
        
        //delete row(s) of record(s)
        $sql = "DELETE FROM quiz WHERE quizID='$del_id'";
        $deleted = mysql_query($sql);
        //get no. of rows deleted
        $records=  mysql_affected_rows();
        
        // if successful redirect to refresh page
        if($records>0){            
            $_SESSION["del"]='True';
            header("Location:quiz.php?id=$id");
            echo "<script type='text/javascript'> document.location = 'quiz.php?id=$id'; </script>";
            exit();
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Quiz deleted!</span>
                </div>';
        }
    }else
    // Check if exam delete button active, start this
    if(isset($_POST['deleteExam'])){
        
        echo $del_id=$_POST['deleteExam'];

        //delete row(s) of record(s)
        $sql = "DELETE FROM exam WHERE examID='$del_id'";
        $deleted = mysql_query($sql);
        //get no. of rows deleted
        $records=  mysql_affected_rows();
        
        //delete exam questions
        $delete = mysql_query("DELETE FROM quiz WHERE examID='$del_id'");
        
        // if successful redirect to refresh page
        if($records>0){      
            $_SESSION["del"]='True';
            header('Location:exams.php');
            echo "<script type='text/javascript'> document.location = 'exams.php'; </script>";
            exit();
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Exam deleted!</span>
                </div>';
        }
    }
?>                                                             