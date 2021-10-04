<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_POST['submit_selectmonth'])) {

      
          

        $_SESSION['selectmonth'] = $_POST['s_month'];
       

       

          header("location:schedule2.5_month.php");
      
    }

    

?>