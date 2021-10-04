<?php
   
    require_once '../connection.php';
    session_start();
    
    

      
          
        $_SESSION['ids'] = $_REQUEST['check_id'];
        $_SESSION['selectmonth'] = $_POST['s_month'];
       

       

          header("location:createwithdraw8.php");
      


    

?>