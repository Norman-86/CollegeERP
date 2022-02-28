<?php                                                                        
    $product=$quantity=$usage=$designation="";
   
    
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No book was selected!</span>
                </div>';
        }else{
            $check = $_POST['checkbox'];
            $Date = date("Y-m-d H:i:s");
            
            
                for($i=0;$i<count($check);$i++){}
                 $actualDate = array_fill(0,$i,$Date);
                $librarian = array_fill(0,$i,$staffID);
                
                $p=$k=$n=$index=$in=$ind=$inde=$de=$dex=0;
                
                
                foreach ($check as $key) {
                     if(!$update_rows =mysql_query("UPDATE studentborrow SET actualReturnDate='".$actualDate[$p++]."', receivingLibrarian='".$librarian[$n++]."' WHERE studentborrowID ='".$check[$k++]."'"))
                    {
                        echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warnning">'.mysql_error().'</span>
                            </div>';
                    }
                    else{$true=1;}
                }
                if($true==1){
                        $_SESSION['success']='true';
                        header("Location:student-due.php");
                        echo "<script type='text/javascript'> document.location = 'student-due.php'; </script>";
                        exit();     
                }
            }                 
    }else
    
    
    if(isset($_POST['staff_submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No book was selected!</span>
                </div>';
        }else{
            $check = $_POST['checkbox'];
            $Date = date("Y-m-d H:i:s");
            
            
                for($i=0;$i<count($check);$i++){}
                 $actualDate = array_fill(0,$i,$Date);
                $librarian = array_fill(0,$i,$staffID);
                
                $p=$k=$n=$index=$in=$ind=$inde=$de=$dex=0;
                
                
                foreach ($check as $key) {
                     if(!$update_rows =mysql_query("UPDATE staffborrow SET actualReturnDate='".$actualDate[$p++]."', receivingLibrarian='".$librarian[$n++]."' WHERE staffborrowID ='".$check[$k++]."'"))
                    {
                        echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warnning">'.mysql_error().'</span>
                            </div>';
                    }
                    else{$true=1;}
                }
                if($true==1){
                        $_SESSION['success']='true';
                        header("Location:staff-due.php");
                        echo "<script type='text/javascript'> document.location = 'staff-due.php'; </script>";
                        exit();     
                }
            }                 
    }
    ?>