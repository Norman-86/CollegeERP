<?php                                                                        
    $product=$quantity=$usage=$designation="";
    if(isset($_POST['save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
       
        if(!isset($_POST["itemID"]) && !is_array($_POST["itemID"]))
        {
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Failed to identify item to requisition!</span>
                </div>';
        }else
        if(!isset($_POST["qtyApproved"]) && !is_array($_POST["qtyApproved"]))
        {
            echo'<div class="alert alert-error absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-error">Fill all fields of Quantity approved!</span>
                </div>';
        }else
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Failed to identify approving officer!</span>
                </div>';
        }else
            {
            
            $item = $_POST['item'];
            $product = $_POST['itemID'];
            $quantity = $_POST['qtyApproved'];
            $requestNo = $_POST['requestNo'];
            $r = $_POST['id']; 
            
            for($i=0;$i<count($r);$i++){
                $select=mysql_query("SELECT COALESCE ((SELECT Bal2 FROM productsupplied WHERE PID ='".$product[$i]."' ORDER BY PSID DESC LIMIT 1),0) AS Balance,COALESCE ((SELECT PSID FROM productsupplied WHERE PID ='".$product[$i]."' ORDER BY PSID DESC LIMIT 1),0) AS PSID");
                   
                while ($row = mysql_fetch_array($select)) {
                    //$bal2[]= $row['Balance'];
                    
                    $bal2[]= $row['Balance'];
                    $id[]= $row['PSID'];
                    
                    }
                    
                $receiveNo =  mysql_query("SELECT COALESCE((SELECT `No` FROM productsupplied WHERE PID =$product[$i] GROUP BY `No` ORDER BY PSID DESC LIMIT 1),0) AS `No`");
                while ($record = mysql_fetch_array($receiveNo)) {
                    $No[] = $record['No'];
                }
            }
            //$Receive = array_reverse($No);
            
          
                
                $subtraction = array_map(function ($x, $y) { return $x-$y; } , $bal2,$quantity);
                $result = array_combine(array_keys($quantity), $subtraction);
                
            /*get array values that are less or equal to zero*/    
            $min = 0;
            $newNumbers = array_filter(
                $result,
                function ($values) use($min) {
                    return ($values < $min);
                }
            );
            /*end*/
            
            /*get items whose qty to issue is bigger than stock*/
            foreach ($newNumbers as $k => $v) {
                  $keys[]= $k;
                  $newItems[] = $item[$k];
            }
            /*end*/
            
            //if($quantity > $bal2){
            if($newNumbers != NULL){
                $_SESSION['items']=$newItems;
                $_SESSION['exceed']='False';
                
                if(isset($_GET['page'])){
                    //$_SESSION['compute_error']='True';
                    header("Location:requisitions.php?page=".$page);
                    echo "<script type='text/javascript'> document.location = 'requisitions.php?page=.$page.'; </script>";
                    exit();
                }else{
                  //$_SESSION['compute_error']='True';  
                  header("Location:requisitions.php");
                  echo "<script type='text/javascript'> document.location = 'requisitions.php'; </script>";
                  exit();  
                }
            }else
            {
                    $officer = array_fill(0,$i,$staffID);
                    $date = array_fill(0,$i,date("Y-m-d H:i:s"));

                    

                $p=$k=$n=$index=$in=$ind=$inde=$de=$dex=0;

                foreach ($r as $key) {
                  
                    if(!$update_rows =mysql_query("UPDATE productsupplied SET Bal2='".$result[$p++]."' WHERE PSID ='".$id[$k++]."'"))
                    {
                        echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warnning">'.mysql_error().'</span>
                            </div>';
                    }
                    if(!$update_rows =mysql_query("UPDATE request SET QtyI='".$quantity[$index++]."',Bal='".$result[$de++]."',pro='".$officer[$in++]."',Idate='".$date[$ind++]."',No='".$No[$dex++]."' WHERE RID ='".$r[$n++]."'"))
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
                        $_SESSION['approve']='True';
                        header("Location:requisitions.php");
                        echo "<script type='text/javascript'> document.location = 'requisitions.php'; </script>";
                        exit();     
                }
            }
            
        
            }  
    }            
    ?>