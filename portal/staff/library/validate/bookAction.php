<?php
     // Check if delete button active, start this
    if(isset($_POST['assign'])){
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">You have not selected any books!</span>
                </div>';
        }else {
            $check=$_POST['checkbox'];
            $id=base64_encode(serialize($check));
            echo '<script type="text/javascript"> document.location = "assign-author.php?id='.$id.'"; </script>';
                  
        }
    }
?>