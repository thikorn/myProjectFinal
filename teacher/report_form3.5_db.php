<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_POST['submit_selectmonth'])) {

      
          

        $_SESSION['selectmonth'] = $_POST['s_month'];
       

       

          header("location:report_form4.php");
      
    }

    

?>