<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_POST['submit_savesubf'])) {

        $email = $_SESSION['email'];
        $_SESSION['btn_name']= "btn_approvef";
    
        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {

          $_SESSION['role']=$resultarray[$i]["role"];
        }

        $_SESSION['check'] = 0;
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
          
          header("location:savesub.php");
      
    }

    
    if (isset($_REQUEST['submit_savesubs'])) {

      $email = $_SESSION['email'];
      $_SESSION['btn_name']= "btn_approves";
    
      //ดึงข้อมูลจากตาราง member
      $stmt = $db->prepare("SELECT * from member where email = :uemail ");
      $stmt->bindParam(":uemail", $email);
      $stmt->execute();
      $resultarray=$stmt->fetchAll();
      for($i=0;$i<count($resultarray);$i++) {

        $_SESSION['role']=$resultarray[$i]["role"];
      }

        $_SESSION['check'] = 1;
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
        
        header("location:savesub.php");
    
  }

  if (isset($_REQUEST['submit_savesubb'])) {

    $email = $_SESSION['email'];
    $_SESSION['btn_name']= "btn_approveb";
 
    //ดึงข้อมูลจากตาราง member
    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
    $stmt->bindParam(":uemail", $email);
    $stmt->execute();
    $resultarray=$stmt->fetchAll();
    for($i=0;$i<count($resultarray);$i++) {

      $_SESSION['role']=$resultarray[$i]["role"];
    }

      $_SESSION['check'] = 2;
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
      
      header("location:savesub.php");
  
    }


    if (isset($_REQUEST['submit_savesubp'])) {

      $email = $_SESSION['email'];
      $_SESSION['btn_name']= "btn_approvep";
   
      //ดึงข้อมูลจากตาราง member
      $stmt = $db->prepare("SELECT * from member where email = :uemail ");
      $stmt->bindParam(":uemail", $email);
      $stmt->execute();
      $resultarray=$stmt->fetchAll();
      for($i=0;$i<count($resultarray);$i++) {
  
        $_SESSION['role']=$resultarray[$i]["role"];
      }
  
        $_SESSION['check'] = 3;
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
        
        header("location:savesub.php");
    
      }

?>