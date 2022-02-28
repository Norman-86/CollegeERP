<?php                                                                        
    $name=$gender="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $name = clean($_POST['name']);
        $gender = $_POST['gender'];;
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter author name!</span>
            </div>';
        }else
        if(!$gender){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select gender of author!</span>
            </div>';
        }else
        {
            $select = mysql_query("SELECT name FROM author WHERE name='$name'");
            $counting=  mysql_num_rows($select);
            
            if($counting>0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Author "<b>'.$name.'</b>" already exists!</span>
                    </div>';
            }else{
            
                if(!$insert = mysql_query("INSERT INTO author (name,gender,added,librarian) VALUES ('$name','$gender',NOW(),'$staffID')"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $name=$capacity=$min="";
                    $_SESSION["new"]='True';
                    header('Location:author.php');
                    echo "<script type='text/javascript'> document.location = 'author.php'; </script>";
                    exit();
                }
            
            }
        }
    }
?>                                                             