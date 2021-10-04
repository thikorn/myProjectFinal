<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_selectmonth'])) {

      
        
      
        $_SESSION["selectmonth"] = $_REQUEST['s_month'];
          
      

       

       

        
      
    

    
    }
  

    header("location:connectERP.php");

?>