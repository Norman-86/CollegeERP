<?php
    if(isset($_POST['submit']))
    {
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning"><i class="fa fa-warning"></i> &nbsp; No unit was selected!</span>
                </div>';
        }else
        {
            if(!isset($_GET['lec'])){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch lecturer detals!<br>
                                                <b>Tip: </b>Go to Staff page & check on lecturer you want to assign unit(s).</span>
                </div>';
            }else
            {
                $lec = mysql_real_escape_string($_GET['lec']);
                $unit = $_POST['checkbox'];
        
                if(!$lec){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Failed to identify lecturer to assign unit</span>
                        </div>';
                }else
                if(!$unit){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Failed to read selected units</span>
                        </div>';
                }else
                {
                    $unitID = implode(',', $unit);
                    //check if lecturer is assigned to the unit: return error if true
                    if(!$selector = mysql_query("SELECT unit FROM assignedunits WHERE unitID IN ($unitID) AND staffID=".$lec)){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else{
                        $rowcount=  mysql_num_rows($selector);
                        if($rowcount > 0){
                            while ($rows = mysql_fetch_array($selector)) {
                               $alreadyAssigned[] = $rows['unit'];
                            }
                            $_SESSION['assigned']=$alreadyAssigned;
                            header('Location:unit.php');
                            echo "<script type='text/javascript'> document.location = 'unit.php'; </script>";
                            exit();
                        }else
                        {
                            for($i=0;$i<count($unit);$i++){}

                            $new_lec = array_fill(0,$i,$lec);

                            $c = array_map(function ($unit,$new_lec){return "'$unit','$new_lec'";} , $unit,$new_lec);
                            if(!$select = mysql_query("INSERT INTO staffunit (unitID,staffID) VALUES (".implode('),(', $c).")")){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">'.mysql_error().'</span>
                                    </div>';
                            }else{
                                $_SESSION['assign']="true";
                                header('Location:unit.php');
                                echo "<script type='text/javascript'> document.location = 'unit.php'; </script>";
                                exit();
                            }
                        }                            
                    }
                }
            }
        }
    }  
?>