<?php
    $username=$pass="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        /*end of function*/
        $username = clean($_POST['username']);
        $pass = clean($_POST['password']);
        
        if(!$username){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter username!</span>
                </div>';
        }else
        if(!$pass){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter password!</span>
                </div>';
        }else 
        {
            $password=md5($pass);
            $qry="SELECT studentID, lname,status FROM student WHERE (BINARY mail='$username' AND  password='".$password."' AND status='Admitted') OR (BINARY adm='$username' AND password='".$password."' AND status='Admitted')";
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
            
        
            //Check whether the query was successful or not
            if($result) {
    		if($num > 1) {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Duplicate user found!</span>
                        </div>';
                }
                else if($num < 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Invalid username / password!</span>
                        </div>';
                }
                else if($num ==1){
                    while ($row = mysql_fetch_array($result)) {
                        $username=$pass="";
                        $status = $row['status'];
                    
                        if($status=="Admitted"){
                            $_SESSION['studentID'] = $row['studentID'];
                            $_SESSION['status'] = $row['status'];
                            header('Location:/include/session.php');
                            header('Location:student/index.php');
                            echo "<script type='text/javascript'> document.location = 'student/index.php'; </script>";
                            exit();
                        }else{
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        <span class="text-danger">Error Occured!</span>
                                </div>';
                        }
                    }    
                        
                    
                }
            }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                            <span class="text-danger">'.mysql_error().'!</span>
                    </div>';
            }
        }
    }
?>