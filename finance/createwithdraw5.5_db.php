<?php
   
    require_once '../connection.php';
    session_start();
    
    

      
          
        $_SESSION['ids'] = $_REQUEST['check_id'];
        $_SESSION['selectmonth'] = $_POST['s_month'];
        $_SESSION['selectteacher'] = $_POST['s_teacher'];
       

       
        if($_SESSION['hourLec'] !=0 and $_SESSION['hourLab'] != 0){
          header("location:testcaltime2.php");
        }else if ($_SESSION['hourLec'] != 0 and $_SESSION['hourLab'] == 0) {
          header("location:createwithdraw6.php");
        }else if ($_SESSION['hourLec'] == 0 and $_SESSION['hourLab'] != 0) {
          header("location:createwithdraw6_lab.php");
        }
         
      


    

?>