<?php
   
    require_once '../connection.php';
    session_start();
    
    if (isset($_REQUEST['check_ids'])) {

      

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
            $_SESSION['numnisit']=$resultarray[$i]["Totalnisit"];
            $_SESSION['date1']=$resultarray[$i]["date1"];
            $_SESSION['time1']=$resultarray[$i]["time1"];
            $_SESSION['time11']=$resultarray[$i]["time11"];
            $_SESSION['datelab1']=$resultarray[$i]["datelab1"];
            $_SESSION['timelab1']=$resultarray[$i]["timelab1"];
            $_SESSION['timelab11']=$resultarray[$i]["timelab11"];
            $_SESSION['datelab2']=$resultarray[$i]["datelab2"];
            $_SESSION['timelab2']=$resultarray[$i]["timelab2"];
            $_SESSION['timelab22']=$resultarray[$i]["timelab22"];
            $_SESSION['datelab3']=$resultarray[$i]["datelab3"];
            $_SESSION['timelab3']=$resultarray[$i]["timelab3"];
            $_SESSION['timelab33']=$resultarray[$i]["timelab33"];
            $_SESSION['date3']=$resultarray[$i]["date3"];
            $_SESSION['time3']=$resultarray[$i]["time3"];
            $_SESSION['time33']=$resultarray[$i]["time33"];
            $_SESSION['nameTeacher']=$resultarray[$i]["nameTeacher"];
            $_SESSION['numberOv2']=$resultarray[$i]["numberOv2"];
            $_SESSION['dateOv2']=$resultarray[$i]["DateOv2"];
            $_SESSION['Dapartmentreq']=$resultarray[$i]['Dapartmentreq'];
            $_SESSION['check2']=$resultarray[$i]["check2"];

          } 
        
        }

       

       

          header("location:open_form2.php");
      
    

    

  

    

?>