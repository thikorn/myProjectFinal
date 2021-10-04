<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['checkrejectedaddsubject'])) {

    
          $ids = $_REQUEST['check_reject'];
          $_SESSION['txt_ids']=$_REQUEST['check_reject'];
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {

            $_SESSION['rejectedcheck1']=$resultarray[$i]["rejectedcheck1"];
  
          }
        }

        if (isset($_POST['submit_checkrejected'])) {

       
          $ids = $_REQUEST['check_reject'];
          $_SESSION['txt_ids']=$_REQUEST['check_reject'];
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {

            $_SESSION['rejectedcheck1']=$resultarray[$i]["rejectedcheck1"];
  
          }
        }
        
        
       
        

    
      switch($_SESSION['role']){
        case 'teacher' :
         $_SESSION['returnpersonal']= "teacher/teacher_home.php";
        break;
        case 'president' :
          $_SESSION['returnpersonal']= "president/president_home.php";
         break;
         case 'finance' :
          $_SESSION['returnpersonal']= "finance/savesub_home.php";
         break;
         case 'secretary' :
          $_SESSION['returnpersonal']= "secretary/secretary_home.php";
         break;
         case 'admin' :
          $_SESSION['returnpersonal']= "admin/admin_home.php";
         break;
         case 'board' :
          $_SESSION['returnpersonal']= "board/board_home.php";
         break;
       
      }
          header("location:checkrejected.php");
      
    

    

?>