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
            $qry="SELECT staffID,category,sname FROM staff WHERE (BINARY mail='$username' AND  pass='".$password."') OR (BINARY staffNo='$username' AND pass='".$password."')";
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
                        $category = $row['category'];
                    
                        if($category=="Principal"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:principal/include/session.php');
                            header('Location:principal/index.php');
                            echo "<script type='text/javascript'> document.location = 'principal/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Lecturer"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:lecturer/include/session.php');
                            header('Location:lecturer/index.php');
                            echo "<script type='text/javascript'> document.location = 'lecturer/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Procurement"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:procurement/include/session.php');
                            header('Location:procurement/index.php');
                            echo "<script type='text/javascript'> document.location = 'procurement/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Librarian"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:library/include/session.php');
                            header('Location:library/index.php');
                            echo "<script type='text/javascript'> document.location = 'library/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Admissions"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:admissions/include/session.php');
                            header('Location:admissions/index.php');
                            echo "<script type='text/javascript'> document.location = 'admissions/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Secretary"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:secretary/include/session.php');
                            header('Location:secretary/index.php');
                            echo "<script type='text/javascript'> document.location = 'secretary/index.php'; </script>";
                            exit();
                        }else
                        if($category=="TimeTabler"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:time-tabler/include/session.php');
                            header('Location:time-tabler/index.php');
                            echo "<script type='text/javascript'> document.location = 'time-tabler/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Accounts"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:accounts/include/session.php');
                            header('Location:accounts/index.php');
                            echo "<script type='text/javascript'> document.location = 'accounts/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Admin"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:admin/include/session.php');
                            header('Location:admin/index.php');
                            echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
                            exit();
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