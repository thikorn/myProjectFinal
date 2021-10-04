<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {

      
          

        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['idT']=$resultarray[$i]["id"];
        }

         

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
            $_SESSION['numnisit']=$resultarray[$i]["Totalnisit"];
            $_SESSION['classLec']=$resultarray[$i]["classLec"];
            $_SESSION['classLab']=$resultarray[$i]["classLab"];
            $_SESSION['date1']=$resultarray[$i]["date1"];
            $_SESSION['nameTeacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['numberOv2']=$resultarray[$i]["numberOv2"];
            $_SESSION['dateOv2']=$resultarray[$i]["DateOv2"];
            $_SESSION['Dapartmentreq']=$resultarray[$i]['Dapartmentreq'];
            $_SESSION['check2']=$resultarray[$i]["check2"];

          } 
          $ids = $_SESSION['code'];
          $stmt = $db->prepare("SELECT * from teaching_information where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['date']=$resultarray[$i]["date"];
            $_SESSION['numberhour']=$resultarray[$i]["numberhour"];
            $_SESSION['topic']=$resultarray[$i]["topic"];
            $_SESSION['classroom']=$resultarray[$i]["classroom"];
            $_SESSION['note']=$resultarray[$i]["note"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
           
          } 
        
        }

       

       

          header("location:report_form1.5.php");
      
    

    

  

    

?>