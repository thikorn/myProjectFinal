<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_POST['submit_revealdetail'])) {

        $email = $_SESSION['email'];

        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['role']=$resultarray[$i]["role"];
        }
        

    
      switch($_SESSION['role']){
        case 'teacher' :
         $_SESSION['returnpersonal']= "teacher/teacher_home.php";
        break;
        case 'president' :
          $_SESSION['returnpersonal']= "president/president_home.php";
         break;
         case 'finance' :
          $_SESSION['returnpersonal']= "finance/finance_home.php";
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
          header("location:createopen.php");
      
    }

?>