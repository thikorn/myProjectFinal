<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {
      
      

          $_SESSION['ids'] = $_REQUEST['check_ids'];
          

        
        }

       

       

          header("location:schedule_form2.5.php");
      
    

    

  

    

?>