<?php                                                                        
    $title=$isbn=$category=$publisher=$shelf="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $title = clean($_POST['title']);
        $isbn = clean($_POST['isbn']);
        $category = $_POST['category'];
        $publisher = $_POST['publisher'];
        $shelf = $_POST['shelf'];
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$title){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter book title!</span>
            </div>';
        }else
        if(!$isbn){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter book ISBN number!</span>
            </div>';
        }else
        if(!$category){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select book category!</span>
            </div>';
        }else
        if(!$publisher){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select book publisher!</span>
            </div>';
        }else
        if(!$shelf){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select shelf where book shall be stored!</span>
            </div>';
        }else
        {
            $select = mysql_query("SELECT isbn FROM book WHERE isbn='$isbn'");
            $counting=  mysql_num_rows($select);
            
            if($counting>0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Book ISBN number "<b>'.$isbn.'</b>" already exists!</span>
                    </div>';
            }else{
            
                if(!$insert = mysql_query("INSERT INTO book (title,isbn,categoryID,publisherID,shelfID,added,librarian) VALUES ('$title','$isbn','$category','$publisher','$shelf',NOW(),'$staffID')"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $title=$isbn=$category=$publisher=$shelf="";
                    $_SESSION["new"]='True';
                    header('Location:book.php');
                    echo "<script type='text/javascript'> document.location = 'book.php'; </script>";
                    exit();
                }
            
            }
        }
    }
?>                                                             