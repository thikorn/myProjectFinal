<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_REQUEST['check_id'])) {

        $email = $_SESSION['email'];
       
        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['role']=$resultarray[$i]["role"];
   

          $ids = $_REQUEST['check_id'];
          $_SESSION['txt_ids']=$_REQUEST['check_id'];
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['code']=$resultarray[$i]["ids"];
            $_SESSION['subname']=$resultarray[$i]["nameSubject"];
            $_SESSION['nameteacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['classLec']=$resultarray[$i]["classLec"];
            $_SESSION['classLab']=$resultarray[$i]["classLab"];

  
          
          
          $fname = $_SESSION['nameteacher'];
          $_SESSION['nameteacherinsub']=$_SESSION['nameteacher'];
          $stmt = $db->prepare("SELECT * from teaching_information where nameTeacher = :ufname ");
          $stmt->bindParam(":ufname", $fname);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['code']=$resultarray[$i]["ids"];
            $_SESSION['date']=$resultarray[$i]["date"];
            $_SESSION['ids']=$resultarray[$i]["id"];
          }
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
          header("location:createcomp1.php");
         
    }

    

?>