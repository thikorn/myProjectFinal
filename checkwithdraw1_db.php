<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_REQUEST['check_id'])) {

        $email = $_SESSION['email'];
        $_SESSION['realcheck'] = $_REQUEST['realcheck'];
        //ดึงข้อมูลจากตาราง member
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['role']=$resultarray[$i]["role"];

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

            if($resultarray[$i]["monthwithdrawlec1"] != null AND $resultarray[$i]["monthwithdrawlec2"] == null AND $resultarray[$i]["monthwithdrawlec3"] == null
            AND $resultarray[$i]["monthwithdrawlec4"] == null AND $resultarray[$i]["monthwithdrawlec5"] == null
            ){
              $_SESSION['monthwithdrawlec'] = $resultarray[$i]["monthwithdrawlec1"];
              $_SESSION['amountwithdrawlec'] = $resultarray[$i]["amountwithdrawlec1"];
              $_SESSION['monthwithdrawlab'] = $resultarray[$i]["monthwithdrawlab1"];
              $_SESSION['amountwithdrawlab'] = $resultarray[$i]["amountwithdrawlab1"];
            }else if($resultarray[$i]["monthwithdrawlec1"] != null AND $resultarray[$i]["monthwithdrawlec2"] != null AND $resultarray[$i]["monthwithdrawlec3"] == null
            AND $resultarray[$i]["monthwithdrawlec4"] == null AND $resultarray[$i]["monthwithdrawlec5"] == null){
              $_SESSION['monthwithdrawlec'] = $resultarray[$i]["monthwithdrawlec2"];
              $_SESSION['amountwithdrawlec'] = $resultarray[$i]["amountwithdrawlec2"];
              $_SESSION['monthwithdrawlab'] = $resultarray[$i]["monthwithdrawlab2"];
              $_SESSION['amountwithdrawlab'] = $resultarray[$i]["amountwithdrawlab2"];
            }else if($resultarray[$i]["monthwithdrawlec1"] != null AND $resultarray[$i]["monthwithdrawlec2"] != null AND $resultarray[$i]["monthwithdrawlec3"] != null
            AND $resultarray[$i]["monthwithdrawlec4"] == null AND $resultarray[$i]["monthwithdrawlec5"] == null){
              $_SESSION['monthwithdrawlec'] = $resultarray[$i]["monthwithdrawlec3"];
              $_SESSION['amountwithdrawlec'] = $resultarray[$i]["amountwithdrawlec3"];
              $_SESSION['monthwithdrawlab'] = $resultarray[$i]["monthwithdrawlab3"];
              $_SESSION['amountwithdrawlab'] = $resultarray[$i]["amountwithdrawlab3"];
            }else if($resultarray[$i]["monthwithdrawlec1"] != null AND $resultarray[$i]["monthwithdrawlec2"] != null AND $resultarray[$i]["monthwithdrawlec3"] != null
            AND $resultarray[$i]["monthwithdrawlec4"] != null AND $resultarray[$i]["monthwithdrawlec5"] == null){
              $_SESSION['monthwithdrawlec'] = $resultarray[$i]["monthwithdrawlec4"];
              $_SESSION['amountwithdrawlec'] = $resultarray[$i]["amountwithdrawlec4"];
              $_SESSION['monthwithdrawlab'] = $resultarray[$i]["monthwithdrawlab4"];
              $_SESSION['amountwithdrawlab'] = $resultarray[$i]["amountwithdrawlab4"];
            }else if($resultarray[$i]["monthwithdrawlec1"] != null AND $resultarray[$i]["monthwithdrawlec2"] != null AND $resultarray[$i]["monthwithdrawlec3"] != null
            AND $resultarray[$i]["monthwithdrawlec4"] != null AND $resultarray[$i]["monthwithdrawlec5"] != null){
              $_SESSION['monthwithdrawlec'] = $resultarray[$i]["monthwithdrawlec5"];
              $_SESSION['amountwithdrawlec'] = $resultarray[$i]["amountwithdrawlec5"];
              $_SESSION['monthwithdrawlab'] = $resultarray[$i]["monthwithdrawlab5"];
              $_SESSION['amountwithdrawlab'] = $resultarray[$i]["amountwithdrawlab5"];
            }
        
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
          $_SESSION['returnpersonal']= "finance/savesub_home.php";
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
          header("location:checkwithdraw1.php");
      
    }

    

?>