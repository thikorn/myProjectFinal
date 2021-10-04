<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_REQUEST['check_idteaching'])) {

      
          $_SESSION['idteaching'] = $_REQUEST['check_idteaching'];
          $idteaching = $_REQUEST['check_idteaching'];

          $ids = $_REQUEST['check_id'];

          $_SESSION['nameleclab'] = $_REQUEST['nameleclab'];
        
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
            $_SESSION['classlab2']=$resultarray[$i]["classLab2"];
            $_SESSION['classlab3']=$resultarray[$i]["classLab3"];
            $_SESSION['fiscayear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['compensation']=$resultarray[$i]["compensation"];
            $_SESSION['amount']=$resultarray[$i]["amount"];
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
            $_SESSION['Totalnisit']=$resultarray[$i]["Totalnisit"];

            $_SESSION['datelab1']=$resultarray[$i]["datelab1"];
            $_SESSION['timelab1']=$resultarray[$i]["timelab1"];
            $_SESSION['timelab11']=$resultarray[$i]["timelab11"];
            $_SESSION['datelab2']=$resultarray[$i]["datelab2"];
            $_SESSION['timelab2']=$resultarray[$i]["timelab2"];
            $_SESSION['timelab22']=$resultarray[$i]["timelab22"];
            $_SESSION['datelab3']=$resultarray[$i]["datelab3"];
            $_SESSION['timelab3']=$resultarray[$i]["timelab3"];
            $_SESSION['timelab33']=$resultarray[$i]["timelab33"];
  
          }

          $stmt = $db->prepare("SELECT * from teaching_information where ids = :ids AND id = :idteaching");
          $stmt->bindParam(":ids", $ids);
          $stmt->bindParam(":idteaching", $idteaching);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['topic']=$resultarray[$i]["topic"];
            $_SESSION['classroom']=$resultarray[$i]["classroom"];
            $_SESSION['note']=$resultarray[$i]["note"];
            $_SESSION['date']=$resultarray[$i]["date"];
            $_SESSION['time1teaching']=$resultarray[$i]["time1"];
            $_SESSION['time11teaching']=$resultarray[$i]["time11"];
            $_SESSION['daten']=$resultarray[$i]["daten"];
            $_SESSION['timen1teaching']=$resultarray[$i]["timen1"];
            $_SESSION['timen11teaching']=$resultarray[$i]["timen11"];
            $_SESSION['dateOv4']=$resultarray[$i]["dateOv4"];
            $_SESSION['numberov4']=$resultarray[$i]["numberov4"];
          } 

    

       
          header("location:checkcomp1.php");
       
        }else if (isset($_REQUEST['check_idteachinglab'])) {

      
          $_SESSION['idteachinglab'] = $_REQUEST['check_idteachinglab'];
          $idteaching = $_REQUEST['check_idteachinglab'];

          $ids = $_REQUEST['check_id'];

          $_SESSION['nameleclab'] = $_REQUEST['nameleclab'];
        
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
            $_SESSION['classlab2']=$resultarray[$i]["classLab2"];
            $_SESSION['classlab3']=$resultarray[$i]["classLab3"];
            $_SESSION['fiscayear']=$resultarray[$i]["fiscaYear"];
            $_SESSION['compensation']=$resultarray[$i]["compensation"];
            $_SESSION['amount']=$resultarray[$i]["amount"];
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
            $_SESSION['Totalnisit']=$resultarray[$i]["Totalnisit"];

            $_SESSION['datelab1']=$resultarray[$i]["datelab1"];
            $_SESSION['timelab1']=$resultarray[$i]["timelab1"];
            $_SESSION['timelab11']=$resultarray[$i]["timelab11"];
            $_SESSION['datelab2']=$resultarray[$i]["datelab2"];
            $_SESSION['timelab2']=$resultarray[$i]["timelab2"];
            $_SESSION['timelab22']=$resultarray[$i]["timelab22"];
            $_SESSION['datelab3']=$resultarray[$i]["datelab3"];
            $_SESSION['timelab3']=$resultarray[$i]["timelab3"];
            $_SESSION['timelab33']=$resultarray[$i]["timelab33"];
  
          }

          $stmt = $db->prepare("SELECT * from teaching_informationlab where ids = :ids AND id = :idteaching");
          $stmt->bindParam(":ids", $ids);
          $stmt->bindParam(":idteaching", $idteaching);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['topic']=$resultarray[$i]["topiclab"];
            $_SESSION['classroom']=$resultarray[$i]["classroomlab"];
            $_SESSION['note']=$resultarray[$i]["notelab"];
            $_SESSION['date']=$resultarray[$i]["datelab"];
            $_SESSION['time1teaching']=$resultarray[$i]["timelab1"];
            $_SESSION['time11teaching']=$resultarray[$i]["timelab11"];
            $_SESSION['daten']=$resultarray[$i]["datenlab"];
            $_SESSION['timen1teaching']=$resultarray[$i]["timenlab1"];
            $_SESSION['timen11teaching']=$resultarray[$i]["timenlab11"];
            $_SESSION['dateOv4']=$resultarray[$i]["DateOv4lab"];
            $_SESSION['numberov4']=$resultarray[$i]["numberov4lab"];
   
          } 

    

       
          header("location:checkcomp1.php");
       
        }
      
    
        
    

  

    

?>