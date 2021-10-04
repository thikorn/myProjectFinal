<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_createreveal'])) {
        
     
        
        $ids = $_SESSION['code'];
        $ov3 = $_POST['s_ov3'];
        
        $date3 = $_POST['s_date3'];
        $_SESSION['Ov3'] = $ov3;
        $_SESSION['date3'] = $date3;

     
          
     
           
            
            
            
            header("location:createreveal2.php");

                
        }

        

       

?>