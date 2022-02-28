<?php
    
    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        
        $sq = "SELECT document FROM assignment WHERE staffID ='$staffID' AND assignmentID='$id'";
        $que = mysql_query($sq);
        
        while($document = mysql_fetch_assoc($que)){
            $doc = $document['document'];
        }
        
        //delete photo in folder
        if(!unlink("../../uploads/assignment/$doc")){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error occured while trying to delete document</span>
                </div>';
        }else{
        //delete row(s) of record(s)
        $sql = "DELETE FROM assignment WHERE assignmentID='$id' AND document='$doc'";
        $deleted = mysql_query($sql);
        //get no. of rows deleted
        $records=  mysql_affected_rows();
        if($records < 1){  
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error occured while trying to delete assignment</span>
                </div>';
        }else{
        
            $_SESSION['delete']='true';
            header("Location:view-assignments.php");
            echo '<script type="text/javascript"> document.location = "view-assignments.php"; </script>';
            exit();
        }
        }
        
    }
?>