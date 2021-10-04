<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {

      
        
 
 

          $ids = $_REQUEST['check_ids'];
          $numberhour = $_REQUEST['numberhour'];
        
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['code']=$resultarray[$i]["ids"];
            $_SESSION['subname']=$resultarray[$i]["nameSubject"];
            $_SESSION['semeter']=$resultarray[$i]["semester"];
            $_SESSION['year']=$resultarray[$i]["yearSubject"];
            $_SESSION['nameTeacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['classLec']=$resultarray[$i]["classLec"];
            $_SESSION['classLab']=$resultarray[$i]["classLab"];
            $_SESSION['Dapartmentreq']=$resultarray[$i]['Dapartmentreq'];
            $_SESSION['IdT']=$resultarray[$i]["idteacher"];
            
          } 

     
          $stmt = $db->prepare("SELECT * from teaching_information where ids = :ids AND numberhour = :numberhour");
          $stmt->bindParam(":ids", $ids);
          $stmt->bindParam(":numberhour", $numberhour);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['dateOv4']=$resultarray[$i]["dateOv4"];
            $_SESSION['date']=$resultarray[$i]["date"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
            $_SESSION['daten']=$resultarray[$i]["daten"];
            $_SESSION['timen1']=$resultarray[$i]["timen1"];
            $_SESSION['timen11']=$resultarray[$i]["timen11"];
            $_SESSION['note']=$resultarray[$i]["note"];
            $_SESSION['topic1']=$resultarray[$i]["topic"];
            $_SESSION['numberov4']=$resultarray[$i]["numberov4"];
   
          } 

          
          $idT = $_SESSION['IdT'];
          $stmt = $db->prepare("SELECT * from member where id = :idT ");
          $stmt->bindParam(":idT", $idT);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['position']=$resultarray[$i]["position"];
          $_SESSION['affiliation']=$resultarray[$i]["affiliation"];
          }


        }
        
       

       

          header("location:financecomp4.php");
      
    

    

  

    

?>