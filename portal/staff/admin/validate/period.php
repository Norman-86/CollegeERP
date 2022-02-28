<?php  
    $start=$end="";
    if(isset($_POST['submit']))
    {
        $start = mysql_real_escape_string($_POST['start']);
        $end = mysql_real_escape_string($_POST['end']);
        
        $startDate = date_format(date_create($start),"Y-m-d");
        $endDate = date_format(date_create($end),"Y-m-d");
        $currentDate = date("Y-m-d");
        
        if(!$startDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Start date</span>
                </div>';            
        }else
        if($startDate <= $currentDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Start Date must be greator than today&CloseCurlyQuote;s date </span>
                </div>';
        }else
        if(!$endDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter End date</span>
                </div>';
        }else
        if($endDate <= $startDate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">End date must be <b>greator</b> than Start date!</span>
                </div>';
        }else
        {
            
            if(!$select = mysql_query("Select start,end FROM semisterPeriod WHERE date(end) >= '$startDate'"))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else{
                $count = mysql_num_rows($select);
                if($count > 0){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">×</span>
                           </button>
                           <span class="text-danger">This period collides with another existing semester period</span>
                       </div>';   
                }else
                {
                    if(!$insert = mysql_query("INSERT INTO semisterPeriod (start,end) VALUES('$startDate','$endDate')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {
                        $start=$end="";
                        $_SESSION['success']="true";
                        header('Location:add-sem.php');
                        echo "<script type='text/javascript'> document.location = 'add-sem.php'; </script>";
                        exit();
                    }
                }
            }
        }
    }  
?>