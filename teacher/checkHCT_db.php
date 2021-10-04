<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_REQUEST['submit_checkHTC'])) {

      $email = $_SESSION['email'];
       
      //ดึงข้อมูลจากตาราง member
      $stmt = $db->prepare("SELECT * from member where email = :uemail ");
      $stmt->bindParam(":uemail", $email);
      $stmt->execute();
      $resultarray=$stmt->fetchAll();
      for($i=0;$i<count($resultarray);$i++) {
        $_SESSION['role']=$resultarray[$i]["role"];
        $_SESSION['nameteacher']=$resultarray[$i]["firstname"];
        $_SESSION['idT']=$resultarray[$i]["id"];
      }
       

        
        
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
      
    


          
          header("location:checkHCT.php");
      
    }

?>