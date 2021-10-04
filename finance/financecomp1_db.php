<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_createreveal'])) {
        
     
        
        $ids = $_SESSION['code'];
        $ov4 = $_POST['s_ov4'];
        $datecreate = $_POST['s_datecreate'];
      
        $_SESSION['Ov4'] = $ov4;
        $_SESSION['datecreate'] = $datecreate;

     
          
     
           
            
            
            
            header("location:financecomp2.php");

                
        }

        

       

?>