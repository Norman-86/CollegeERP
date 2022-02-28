<?php  
    $faculty=$acronym="";
    if(isset($_POST['submit']))
    {
        $faculty = mysql_real_escape_string($_POST['faculty']);
        $acronym = mysql_real_escape_string($_POST['acronym']);
        
        if(!$faculty){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Faculty Name</span>
                </div>';
        }else 
        if(!$acronym){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Faculty Acronym</span>
                </div>';
        }else
        {
            if(!$select = mysql_query("SELECT * FROM course WHERE name = '$faculty' OR abbreviation = '$acronym'")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
            }else{
                $countrow=  mysql_num_rows($select);
                if($countrow > 0){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">Error: Either Faculty Name or Acronym already exists!</span>
                            </div>';
                }else
                {
                    //generate course code
                    $code = strtoupper($acronym).'-'.sprintf('%03d',rand(0,999));;
                    $acron = strtoupper($acronym);
                    if(!$insert = mysql_query("INSERT INTO faculty (no,name,abbreviation)VALUES('$code','$faculty','$acron')")){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {
                        $acronym=$faculty="";
                        $_SESSION['success']="true";
                        header('Location:add-faculty.php');
                        echo "<script type='text/javascript'> document.location = 'add-faculty.php'; </script>";
                        exit();
                    }
                }    
            }
        }
       
    }  
?>