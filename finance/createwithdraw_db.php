<?php
   
   require_once('../connection.php');
    session_start();
   
    if (isset($_REQUEST['check_id'])) {

      
      $_SESSION['checkidsteaching'] = $_REQUEST['check_id'];
    

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
            $_SESSION['compensationlec']=$resultarray[$i]["compensationlec"];
            $_SESSION['compensationlab']=$resultarray[$i]["compensationlab"];
            $_SESSION['amountlec']=$resultarray[$i]["amountlec"];
            $_SESSION['amountlab']=$resultarray[$i]["amountlab"];
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

            $_SESSION['datelab1']=$resultarray[$i]["datelab1"];
            $_SESSION['timelab1']=$resultarray[$i]["timelab1"];
            $_SESSION['timelab11']=$resultarray[$i]["timelab11"];
            $_SESSION['datelab2']=$resultarray[$i]["datelab2"];
            $_SESSION['timelab2']=$resultarray[$i]["timelab2"];
            $_SESSION['timelab22']=$resultarray[$i]["timelab22"];
            $_SESSION['datelab3']=$resultarray[$i]["datelab3"];
            $_SESSION['timelab3']=$resultarray[$i]["timelab3"];
            $_SESSION['timelab33']=$resultarray[$i]["timelab33"];
            $_SESSION['numberOv1']=$resultarray[$i]["numberOv1"];
            $_SESSION['Totalhourteachinglec']=$resultarray[$i]["Totalhourteachinglec"];
            $_SESSION['Totalhourteachinglab']=$resultarray[$i]["Totalhourteachinglab"];

            $_SESSION['Totalnisit']=$resultarray[$i]["Totalnisit"];

            $_SESSION['amountlecreal']=$resultarray[$i]["amountlecreal"];
            $_SESSION['amountlabreal']=$resultarray[$i]["amountlabreal"];
            $_SESSION['Totalleclabreal']=$resultarray[$i]["Totalleclabreal"];
            $teachinglec =  $_SESSION['Totalhourteachinglec'];
            $teachinglab =  $_SESSION['Totalhourteachinglab'];
         
          }

          $stmt = $db->prepare("SELECT * from finance where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          for($i=0;$i<count($resultarray);$i++) {
      
            $_SESSION['amountlecreal']=$resultarray[$i]["amountlecreal"];
            $_SESSION['amountlabreal']=$resultarray[$i]["amountlabreal"];
            $_SESSION['Totalleclabreal']=$resultarray[$i]["Totalleclabreal"];
        
          }

      

        }

       

       
        if($teachinglec == 0 AND $teachinglab == 0){
          header("location:createwithdraw.php");
          $_SESSION['error'] = "วิชานี้ยังไม่บันทึกการสอน";
        }else { header("location:createwithdraw1.php"); }
         
      
    

    

  

    

?>