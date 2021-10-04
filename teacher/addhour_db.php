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
  
          }
        }
        
       if($_REQUEST['check_numdate']==1){
        header("location:addhour1.php");
       }else if($_REQUEST['check_numdate']==2){
        header("location:addhour2.php");
       }else if($_REQUEST['check_numdate']==3){
        header("location:addhour3.php");
       }
      
    }

    

?>