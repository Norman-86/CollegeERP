<?php                                                                        
    $author=$remove="";
    //remove book from list
    if(isset($_POST['remove'])){
        $remove=$_POST['remove'];
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else{
            //remove the selected book from array(list)of books
            if (($key = array_search($remove, $array)) !== false) {
                unset($array[$key]);
            }
            /*serialize array and send it back to page
                to display the new set of books after removing book
             */
            $id=base64_encode(serialize($array));
            echo '<script type="text/javascript"> document.location = "assign-author.php?id='.$id.'"; </script>';
        }
    }else
        
    //assign author to books    
    if(isset($_POST['assign'])){
        $author = $_POST['author'];
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!isset($array) && !is_array($array))
        {
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning"Failed to identify books!</span>
            </div>';
        }else
        if(!$author){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select author!</span>
            </div>';
        }else
        {
            //get selected author name
            $select = mysql_query("SELECT name FROM author WHERE authorID='$author' ");            
            while($row1 = mysql_fetch_assoc($select)){
                $authorName = $row1['name'];
            }
            
            /*check if any of the selected books is already assigned the selected author
             if true, display an error
            */
            $select1 = mysql_query("SELECT title,ISBN 
                                    FROM book b
                                    LEFT JOIN authoredBook ab
                                        ON ab.bookID = b.bookID
                                    WHERE b.bookID IN($arrays) AND ab.authorID='$author' ");
            $counting1=  mysql_num_rows($select1);
            
            
            if($counting1 > 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">
                            <b>Warning!</b><br> Author "<b>'.$authorName.'</b>" is already assigned to the following books:<br>';
                            $i=1;
                            while($rows = mysql_fetch_array($select1)){
                                echo $i++.'.<b> Book:</b> '.$rows['title'].' <b>ISBN:</b>'.$rows['ISBN'].'<br>';
                            }      
                echo    '</span>
                    </div>';
            }else{
                
                for($i=0;$i<count($array);$i++){}
                
                $authorID = array_fill(0,$i,$author);
                $staff = array_fill(0,$i,$staffID);
                $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                
                $c = array_map(function ($array,$authorID,$date,$staff){return "'$array','$authorID','$date','$staff'";} , $array,$authorID,$date,$staff);
                
                    if(!$insert = mysql_query("INSERT INTO authoredbook (bookID,authorID,added,librarian) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }
                    else{
                        $id=base64_encode(serialize($array));
                        $name=$capacity=$min="";
                        $_SESSION["new"]='True';
                        header('Location:assign-author.php?id='.$id.'');
                        echo '<script type="text/javascript"> document.location = "assign-author.php?id='.$id.'"; </script>';
                        exit();
                    }
            
            }
        }
    }
?>                                                             