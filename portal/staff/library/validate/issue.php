<?php                                                                        
    $product=$quantity=$usage=$designation="";
    
    //if student selected
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
       $student = clean($_POST['submit']);
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        if(!$student){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">No student Selected!</span>
                </div>';
        }else{
            
            header("Location:view-book.php?sid=$student");
            echo "<script type='text/javascript'> document.location = 'view-book.php?sid=$student'; </script>";
            exit(); 
            
        }
        
        
            
    }else       
    
    //if staff selected    
    if(isset($_POST['sub'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
       $stafff = clean($_POST['sub']);
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        if(!$stafff){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">No staff Selected!</span>
                </div>';
        }else{
            
            header("Location:view-book.php?sfid=$stafff");
            echo "<script type='text/javascript'> document.location = 'view-book.php?sfid=$stafff'; </script>";
            exit(); 
            
        }
    }else
        
        
    //if student isssued        
    if(isset($_POST['issue']) && isset($_GET['sid'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
       $sid = clean($_GET['sid']);
       
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        if(!$sid){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to get staff/student to issue book!</span>
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
            $Date = date("Y-m-d");
            $return = date('Y-m-d', strtotime($Date. ' + 4 days'));
            $b = implode(',', $check);
            
            
            for($i=0;$i<count($check);$i++){}
            if($i > 3){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No of books to issue exceeds limit. <br>Maximum is <b>2</b>. Your selection was <b>'.$i.'</b> books!</span>
                    </div>';
            }else
            {
            
            //check if book is issued to student
            $qry="SELECT b.title,b.isbn FROM book b
                LEFT JOIN studentborrow s
                ON s.bookID = b.bookID
                WHERE s.bookID IN ($b) AND s.actualReturnDate IS NULL";
            
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
            
            if(empty($result)) {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'. mysql_error($result).'</span>
                </div>';
            }else
            if($num > 0) {
                while ($row = mysql_fetch_array($result)) {
                        $title[] = $row['title'];
                        $isbn[] = $row['isbn'];
                }
                    $_SESSION['title']=$title;
                    //$_SESSION['isbn']=$isbn;
                    header('Location:view-book.php?sid='.$sid);
                    echo "<script type='text/javascript'> document.location = 'view-book.php?sid=$sid'; </script>";
                    exit();
            }else{
                
                
                $qry1="SELECT b.title,b.isbn FROM book b
                LEFT JOIN staffborrow s
                ON s.bookID = b.bookID
                WHERE s.bookID IN ($b) AND s.actualReturnDate IS NULL";
            
            $result1=mysql_query($qry1); 
            $num1=mysql_num_rows($result1);
            
            if(empty($result1)) {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'. mysql_error($result1).'</span>
                </div>';
            }else
            if($num1 > 0) {
                while ($row = mysql_fetch_array($result1)) {
                        $title[] = $row['title'];
                        $isbn[] = $row['isbn'];
                }
                    $_SESSION['title']=$title;
                    //$_SESSION['isbn']=$isbn;
                    header('Location:view-book.php?sid='.$sid);
                    echo "<script type='text/javascript'> document.location = 'view-book.php?sid=$sid'; </script>";
                    exit();
                    exit();
            }else{
                //for($i=0;$i<count($check);$i++){}
                $member = array_fill(0,$i,$sid);
                $dateOfIssue = array_fill(0,$i,date("Y-m-d H:i:s"));
                $dueDate = array_fill(0,$i,$return);
                $librarian = array_fill(0,$i,$staffID);
                $issueno = array_fill(0,$i,rand(1,999999));

                $c = array_map(function ($issueno,$check,$member,$dateOfIssue,$dueDate,$librarian){return "'$issueno','$check','$member','$dateOfIssue','$dueDate','$librarian'";} , $issueno,$check,$member,$dateOfIssue,$dueDate,$librarian);    
                
                if(!$insert = mysql_query("INSERT INTO studentborrow (borrowNo,bookID,studentID,dateBorrowed,returnDate,issuingLibrarian) VALUES(".implode('),(', $c).")")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
                    $_SESSION['issue']='true';
                    header('Location:view-book.php');
                    echo "<script type='text/javascript'> document.location = 'view-book.php; </script>";
                    exit();
                }
            }
            }
        }  
            }
            
            
            
            
            
                 
    }else
    
    //if book issued to staff
    if(isset($_POST['issue']) && isset($_GET['sfid'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
       $sid = clean($_GET['sfid']);
       
        
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify approving officer!</span>
                </div>';
        }else
        if(!$sid){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to get staff/student to issue book!</span>
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
            $Date = date("Y-m-d");
            $return = date('Y-m-d', strtotime($Date. ' + 7 days'));
            $b = implode(',', $check);
            
            
            for($i=0;$i<count($check);$i++){}
            if($i > 5){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No of books to issue exceeds limit. <br>Maximum is <b>2</b>. Your selection was <b>'.$i.'</b> books!</span>
                    </div>';
            }else
            {
            
            $qry="SELECT b.title,b.isbn FROM book b
                LEFT JOIN studentborrow s
                ON s.bookID = b.bookID
                WHERE s.bookID IN ($b) AND s.actualReturnDate IS NULL";
            
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
            
            if(empty($result)) {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'. mysql_error($result).'</span>
                </div>';
            }else
            if($num > 0) {
                while ($row = mysql_fetch_array($result)) {
                        $title[] = $row['title'];
                        $isbn[] = $row['isbn'];
                }
                    $_SESSION['title']=$title;
                    //$_SESSION['isbn']=$isbn;
                    header('Location:view-book.php?sfid='.$sid);
                    echo "<script type='text/javascript'> document.location = 'view-book.php?sfid=$sid'; </script>";
                    exit();
            }else{
                
                
                $qry1="SELECT b.title,b.isbn FROM book b
                LEFT JOIN staffborrow s
                ON s.bookID = b.bookID
                WHERE s.bookID IN ($b) AND s.actualReturnDate IS NULL";
            
            $result1=mysql_query($qry1); 
            $num1=mysql_num_rows($result1);
            
            if(empty($result1)) {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">'. mysql_error($result1).'</span>
                </div>';
            }else
            if($num1 > 0) {
                while ($row = mysql_fetch_array($result1)) {
                        $title[] = $row['title'];
                        $isbn[] = $row['isbn'];
                }
                    $_SESSION['title']=$title;
                    //$_SESSION['isbn']=$isbn;
                    header('Location:view-book.php?sfid='.$sid);
                    echo "<script type='text/javascript'> document.location = 'view-book.php?sfid=$sid'; </script>";
                    exit();
            }else{
                //for($i=0;$i<count($check);$i++){}
                $member = array_fill(0,$i,$sid);
                $dateOfIssue = array_fill(0,$i,date("Y-m-d H:i:s"));
                $dueDate = array_fill(0,$i,$return);
                $librarian = array_fill(0,$i,$staffID);
                $issueno = array_fill(0,$i,rand(1,999999));

                $c = array_map(function ($issueno,$check,$member,$dateOfIssue,$dueDate,$librarian){return "'$issueno','$check','$member','$dateOfIssue','$dueDate','$librarian'";} , $issueno,$check,$member,$dateOfIssue,$dueDate,$librarian);    
                
                if(!$insert = mysql_query("INSERT INTO staffborrow (borrowNo,bookID,staffID,dateBorrowed,returnDate,issuingLibrarian) VALUES(".implode('),(', $c).")")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $course=$yos=$sem=$period=$start=$deadline=$unit=$quiz=$time="";
                    $_SESSION['issue']='true';
                    header('Location:view-book.php');
                    echo "<script type='text/javascript'> document.location = 'view-book.php'; </script>";
                    exit();
                }
            }}
        }}
    }
    ?>