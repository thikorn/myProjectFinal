<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {
        $_SESSION['amountwithdraw1'] =  $_REQUEST['amountwithdraw1'];
        $_SESSION['amountwithdraw2'] =  $_REQUEST['amountwithdraw2'];
        $_SESSION['amountwithdraw3'] =  $_REQUEST['amountwithdraw3'];
        $_SESSION['amountwithdraw4'] =  $_REQUEST['amountwithdraw4'];
        $_SESSION['amountwithdraw5'] =  $_REQUEST['amountwithdraw5'];
      
        
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        
         

          $ids = $_REQUEST['check_ids'];
          $_SESSION['ids'] = $_REQUEST['check_ids'];
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
            $_SESSION['nameTeacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['numberOv3']=$resultarray[$i]["numberOv3"];
            $_SESSION['dateOv3']=$resultarray[$i]["DateOv3"];
            $_SESSION['Dapartmentreq']=$resultarray[$i]['Dapartmentreq'];
            $_SESSION['check3']=$resultarray[$i]["check3"];
            $_SESSION['fiscaYear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['credit']=$resultarray[$i]["credit"];
            $_SESSION['hourLec']=$resultarray[$i]["hourLec"];
            $_SESSION['hourLab']=$resultarray[$i]["hourLab"];
            $_SESSION['compensationlab']=$resultarray[$i]['compensationlab'];
            $_SESSION['Totalhourteaching']=$resultarray[$i]['Totalhourteaching'];

          } 
        
        }

       

       

          header("location:createwithdraw5.5_lab.php");