<?php
   
   include('../connection.php');
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
            $_SESSION['numnisit']=$resultarray[$i]["numberOfStudents"];
            $_SESSION['date1']=$resultarray[$i]["date1"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
            $_SESSION['date2']=$resultarray[$i]["date2"];
            $_SESSION['time2']=$resultarray[$i]["time2"];
            $_SESSION['time22']=$resultarray[$i]["time22"];
            $_SESSION['date3']=$resultarray[$i]["date3"];
            $_SESSION['time3']=$resultarray[$i]["time3"];
            $_SESSION['time33']=$resultarray[$i]["time33"];
            $_SESSION['nameTeacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['numberOv3']=$resultarray[$i]["numberOv3"];
            $_SESSION['dateOv3']=$resultarray[$i]["DateOv3"];
            $_SESSION['Dapartmentreq']=$resultarray[$i]['Dapartmentreq'];
            $_SESSION['check3']=$resultarray[$i]["check3"];
            $_SESSION['fiscaYear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['credit']=$resultarray[$i]["credit"];
            $_SESSION['hourLec']=$resultarray[$i]["hourLec"];
            $_SESSION['hourLab']=$resultarray[$i]["hourLab"];
            $_SESSION['compensationlec']=$resultarray[$i]['compensationlec'];
            $_SESSION['Totalhourteaching']=$resultarray[$i]['Totalhourteaching'];

          } 
        
        }

       

       

          header("location:createwithdraw4.php");