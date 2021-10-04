<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['submit_printteacher'])) {

      
        $email = $_SESSION['email'];

          //ดึงข้อมูลจากตาราง member
          $stmt = $db->prepare("SELECT * from member where email = :uemail ");
          $stmt->bindParam(":uemail", $email);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['username']=$resultarray[$i]["username"];
            $_SESSION['id']=$resultarray[$i]["id"];
            $_SESSION['firstname']=$resultarray[$i]["firstname"];
            $_SESSION['lastname']=$resultarray[$i]["lastname"];
            $_SESSION['qualification']=$resultarray[$i]["qualification"];
            $_SESSION['affiliation']=$resultarray[$i]["affiliation"];
            $_SESSION['position']=$resultarray[$i]["position"];
            $_SESSION['board']=$resultarray[$i]["board"];
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
          
          header("location:printteacher.php");
      
    }

?>