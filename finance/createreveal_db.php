<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_REQUEST['check_id'])) {

      
        
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        
         

          $ids = $_REQUEST['check_id'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['code']=$resultarray[$i]["ids"];
            $_SESSION['yearnisit']=$resultarray[$i]["yearNisit"];
            $_SESSION['subname']=$resultarray[$i]["nameSubject"];
            $_SESSION['semeter']=$resultarray[$i]["semester"];
            $_SESSION['year']=$resultarray[$i]["yearSubject"];
            $_SESSION['credit']=$resultarray[$i]["credit"];
            $_SESSION['hourlec']=$resultarray[$i]["hourLec"];
            $_SESSION['hourlab']=$resultarray[$i]["hourLab"];
            $_SESSION['classlec']=$resultarray[$i]["classLec"];
            $_SESSION['classlab']=$resultarray[$i]["classLab"];
            $_SESSION['fiscayear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['amount']=$resultarray[$i]["amount"];
            $_SESSION['numnisit']=$resultarray[$i]["numberOfStudents"];
            $_SESSION['date1']=$resultarray[$i]["date1"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
            $_SESSION['classlec']=$resultarray[$i]["classLec"];
            $_SESSION['classlab']=$resultarray[$i]["classLab"];
            $_SESSION['fiscaYear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['compensationlec']=$resultarray[$i]["compensationlec"];
            $_SESSION['compensationlab']=$resultarray[$i]["compensationlab"];
  
          }
        
        }

       

       

          header("location:createreveal1.php");
      
    

    

  

    

?>