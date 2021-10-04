<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {

      
        
 
 

          $ids = $_REQUEST['check_ids'];
          $numberhourlab = $_REQUEST['numberhourlab'];
        
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

     
          $stmt = $db->prepare("SELECT * from teaching_informationlab where ids = :ids AND numberhourlab = :numberhourlab");
          $stmt->bindParam(":ids", $ids);
          $stmt->bindParam(":numberhourlab", $numberhourlab);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['dateOv4lab']=$resultarray[$i]["DateOv4lab"];
            $_SESSION['datelab']=$resultarray[$i]["datelab"];
            $_SESSION['time1lab']=$resultarray[$i]["timelab1"];
            $_SESSION['time11lab']=$resultarray[$i]["timelab11"];
            $_SESSION['datenlab']=$resultarray[$i]["datenlab"];
            $_SESSION['timenlab1']=$resultarray[$i]["timenlab1"];
            $_SESSION['timenlab11']=$resultarray[$i]["timenlab11"];
            $_SESSION['notelab']=$resultarray[$i]["notelab"];
            $_SESSION['topiclab']=$resultarray[$i]["topiclab"];
            $_SESSION['numberov4lab']=$resultarray[$i]["numberov4lab"];
   
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
        
       

       

          header("location:financecomplab4.php");
      
    

    

  

    

?>