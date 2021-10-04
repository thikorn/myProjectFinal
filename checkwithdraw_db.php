<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_REQUEST['submit_checkwithdraws'])) {

        $email = $_SESSION['email'];
        $_SESSION['btn_name']= "btn_approves";
        $_SESSION['btn_submit']= "อนุมัติ";
        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
  
          $_SESSION['role']=$resultarray[$i]["role"];
        }
  
          $_SESSION['check5'] = 1;
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
          
          header("location:checkwithdraw.php");
          

      
    }

    if (isset($_REQUEST['submit_checkwithdrawb'])) {

        $email = $_SESSION['email'];
        $_SESSION['btn_name']= "btn_approveb";
        $_SESSION['btn_submit']= "อนุมัติ";
        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
    
          $_SESSION['role']=$resultarray[$i]["role"];
        }
    
          $_SESSION['check5'] = 2;
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
          
        header("location:checkwithdraw.php");
    
  }

  if (isset($_REQUEST['submit_checkwithdrawp'])) {

    $email = $_SESSION['email'];
    $_SESSION['btn_name']= "btn_approvep";
    $_SESSION['btn_submit']= "อนุมัติ";
    //ดึงข้อมูลจากตาราง member
    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
    $stmt->bindParam(":uemail", $email);
    $stmt->execute();
    $resultarray=$stmt->fetchAll();
    for($i=0;$i<count($resultarray);$i++) {

      $_SESSION['role']=$resultarray[$i]["role"];
    }

      $_SESSION['check5'] = 3;
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
      
    header("location:checkwithdraw.php");

}

  if (isset($_REQUEST['submit_checkwithdrawt'])) {

    $email = $_SESSION['email'];
    $_SESSION['btn_name']= "btn_approvet";
    $_SESSION['btn_submit']= "ยืนยัน";

    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
    $stmt->bindParam(":uemail", $email);
    $stmt->execute();
    $resultarray=$stmt->fetchAll();
    for($i=0;$i<count($resultarray);$i++) {
      $_SESSION['idT']=$resultarray[$i]["id"];
    }
    //ดึงข้อมูลจากตาราง member
    $stmt = $db->prepare("SELECT * from member where email = :uemail ");
    $stmt->bindParam(":uemail", $email);
    $stmt->execute();
    $resultarray=$stmt->fetchAll();
    for($i=0;$i<count($resultarray);$i++) {

      $_SESSION['role']=$resultarray[$i]["role"];
     
    }

      $_SESSION['check5'] = 4;
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
      
    header("location:checkwithdraw0.5.php");

}


?>