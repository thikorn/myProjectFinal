<?php
   
    require_once 'connection.php';
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
            $_SESSION['yearnisit']=$resultarray[$i]["yearNisit"];
            $_SESSION['subname']=$resultarray[$i]["nameSubject"];
            $_SESSION['numberOv3']=$resultarray[$i]["numberOv3"];
            $_SESSION['DateOv3']=$resultarray[$i]["DateOv3"];
            $_SESSION['semeter']=$resultarray[$i]["semester"];
            $_SESSION['year']=$resultarray[$i]["yearSubject"];
            $_SESSION['credit']=$resultarray[$i]["credit"];
            $_SESSION['hourlec']=$resultarray[$i]["hourLec"];
            $_SESSION['hourlab']=$resultarray[$i]["hourLab"];
            $_SESSION['classlec']=$resultarray[$i]["classLec"];
            $_SESSION['classlab']=$resultarray[$i]["classLab"];
            $_SESSION['fiscayear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['amount']=$resultarray[$i]["amount"];
            $_SESSION['date1']=$resultarray[$i]["date1"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
            $_SESSION['classlec']=$resultarray[$i]["classLec"];
            $_SESSION['classlab']=$resultarray[$i]["classLab"];
            $_SESSION['fiscayear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['compensationlec']=$resultarray[$i]["compensationlec"];
            $_SESSION['compensationlab']=$resultarray[$i]["compensationlab"];
  
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
          $_SESSION['returnpersonal']= "finance/createreveal.php";
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
          header("location:checkcreatereveal1.php");
      
    }

    

?>