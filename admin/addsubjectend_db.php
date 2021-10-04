
<?php
   
require_once '../connection.php';
session_start();

if (isset($_GET['ids'])) {

    $ids = $_GET['ids'];

    $select_stmt = $db->prepare("SELECT * FROM subject WHERE ids = :uids ");
    $select_stmt->bindParam(":uids", $ids);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    $nameSubject = $row['nameSubject'];
    $idteacher = $row['idteacher'];
    $nameTeacher = $row['nameTeacher'];
    $credit = $row['credit'];
    $semester = $row['semester'];
    $yearSubject = $row['yearSubject'];
    $Numnisit1 = $row['Numnisit1'];
    $Numnisit2 = $row['Numnisit2'];
    $Numnisit3 = $row['Numnisit3'];
    $Numnisit4 = $row['Numnisit4'];
    $Numnisit5 = $row['Numnisit5'];
    $Totalnisit = $row['Totalnisit'];
    $savedtime = $row['savedtime'];
    $fiscaYear = $row['fiscaYear'];
    $classLec = $row['classLec'];
    $classLab = $row['classLab'];
    $classLab2 = $row['classLab2'];
    $classLab3 = $row['classLab3'];
    $hourLec = $row['hourLec'];
    $hourLab = $row['hourLab'];
    $Totalhourteachinglec = $row['Totalhourteachinglec'];
    $Totalhourteachinglab = $row['Totalhourteachinglab'];
    $compensationlec = $row['compensationlec'];
    $compensationlab = $row['compensationlab'];
    $amountlec = $row['amountlec'];
    $amountlab = $row['amountlab'];
    $Totalleclab = $row['Totalleclab'];
    $date1 = $row['date1'];
    $time1 = $row['time1'];
    $time11 = $row['time11'];
    $date2 = $row['date2'];
    $time2 = $row['time2'];
    $time22 = $row['time22'];
    $date3 = $row['date3'];
    $time3 = $row['time3'];
    $time33 = $row['time33'];
    $datelab1 = $row['datelab1'];
    $timelab1 = $row['timelab1'];
    $timelab11 = $row['timelab11'];
    $datelab2 = $row['datelab2'];
    $timelab2 = $row['timelab2'];
    $timelab22 = $row['timelab22'];
    $datelab3 = $row['datelab3'];
    $timelab3 = $row['timelab3'];
    $timelab33 = $row['timelab33'];
    $numberOv1 = $row['numberOv1'];
    $DateOv1 = $row['DateOv1'];
    $numberOv2 = $row['numberOv2'];
    $Dapartmentreq = $row['Dapartmentreq'];
    $DateOv2 = $row['DateOv2'];
    $numberOv3 = $row['numberOv3'];
    $DateOv3 = $row['DateOv3'];
    $numberOv4 = $row['numberOv4'];
    $DateOv4 = $row['DateOv4'];
    $check1 = $row['check1'];
    $rejectedcheck1 = $row['rejectedcheck1'];
    $check2 = $row['check2'];
    $check3 = $row['check3'];
    $check4 = $row['check4'];
    $check5 = $row['check5'];
    $select_stmt1 = $db->prepare("SELECT * FROM finance WHERE ids = :uids ");
    $select_stmt1->bindParam(":uids", $ids);
    $select_stmt1->execute();
    $row1 = $select_stmt1->fetch(PDO::FETCH_ASSOC);
    $amountlecreal = $row1['amountlecreal'];
    $amountlabreal = $row1['amountlabreal'];
    $Totalleclabreal = $row1['Totalleclabreal'];
    $numberOv5 = $row1['numberOv5'];
    $check51 = $row1['check51'];

    $datecheck51 = $row1['datecheck51'];
    $monthwithdrawlec1 = $row1['monthwithdrawlec1'];
    $amountwithdrawlec1 = $row1['amountwithdrawlec1'];
    $monthwithdrawlab1 = $row1['monthwithdrawlab1'];
    $amountwithdrawlab1 = $row1['amountwithdrawlab1'];
    $ERPmonth1 = $row1['ERPmonth1'];

    $check52 = $row1['check52'];
    $datecheck52 = $row1['datecheck52'];
    $monthwithdrawlec2 = $row1['monthwithdrawlec2'];
    $amountwithdrawlec2 = $row1['amountwithdrawlec2'];
    $monthwithdrawlab2 = $row1['monthwithdrawlab2'];
    $amountwithdrawlab2 = $row1['amountwithdrawlab2'];
    $ERPmonth2 = $row1['ERPmonth2'];

    $check53 = $row1['check53'];
    $datecheck53 = $row1['datecheck53'];
    $monthwithdrawlec3 = $row1['monthwithdrawlec3'];
    $amountwithdrawlec3 = $row1['amountwithdrawlec3'];
    $monthwithdrawlab3 = $row1['monthwithdrawlab3'];
    $amountwithdrawlab3 = $row1['amountwithdrawlab3'];
    $ERPmonth3 = $row1['ERPmonth3'];

    $check54 = $row1['check54'];
    $datecheck54 = $row1['datecheck54'];
    $monthwithdrawlec4 = $row1['monthwithdrawlec4'];
    $amountwithdrawlec4 = $row1['amountwithdrawlec4'];
    $monthwithdrawlab4 = $row1['monthwithdrawlab4'];
    $amountwithdrawlab4 = $row1['amountwithdrawlab4'];
    $ERPmonth4 = $row1['ERPmonth4'];

    $check55 = $row1['check55'];
    $datecheck55 = $row1['datecheck55'];
    $monthwithdrawlec5 = $row1['monthwithdrawlec5'];
    $amountwithdrawlec5 = $row1['amountwithdrawlec5'];
    $monthwithdrawlab5 = $row1['monthwithdrawlab5'];
    $amountwithdrawlab5 = $row1['amountwithdrawlab5'];
    $ERPmonth5 = $row1['ERPmonth5'];

    try{
      
            $insert_stmt = $db->prepare("INSERT INTO subjectall(ids,nameSubject,idteacher,nameTeacher,credit,semester,yearSubject,Numnisit1,Numnisit2,Numnisit3,Numnisit4,Numnisit5
            ,Totalnisit,savedtimeold,fiscaYear,classLec,classLab,classLab2,classLab3,hourLec,hourLab,Totalhourteachinglec,Totalhourteachinglab,compensationlec
            ,compensationlab,amountlec,amountlab,Totalleclab,date1,time1,time11,date2,time2,time22,date3,time3,time33,datelab1,timelab1,timelab11,datelab2,timelab2,timelab22
            ,datelab3,timelab3,timelab33,numberOv1,DateOv1,numberOv2,Dapartmentreq,DateOv2,numberOv3,DateOv3,numberOv4,DateOv4,check1
            ,rejectedcheck1,check2,check3,check4,check5,amountlecreal,amountlabreal,Totalleclabreal,numberOv5
            ,check51,datecheck51,monthwithdrawlec1,amountwithdrawlec1,monthwithdrawlab1,amountwithdrawlab1,ERPmonth1
            ,check52,datecheck52,monthwithdrawlec2,amountwithdrawlec2,monthwithdrawlab2,amountwithdrawlab2,ERPmonth2
            ,check53,datecheck53,monthwithdrawlec3,amountwithdrawlec3,monthwithdrawlab3,amountwithdrawlab3,ERPmonth3
            ,check54,datecheck54,monthwithdrawlec4,amountwithdrawlec4,monthwithdrawlab4,amountwithdrawlab4,ERPmonth4
            ,check55,datecheck55,monthwithdrawlec5,amountwithdrawlec5,monthwithdrawlab5,amountwithdrawlab5,ERPmonth5) 
            VALUES ( :ids,:nameSubject,:idteacher,:nameTeacher,:credit,:semester,:yearSubject,:Numnisit1,:Numnisit2,:Numnisit3,:Numnisit4,:Numnisit5
            ,:Totalnisit,:savedtime,:fiscaYear,:classLec,:classLab,:classLab2,:classLab3,:hourLec,:hourLab,:Totalhourteachinglec,:Totalhourteachinglab,:compensationlec
            ,:compensationlab,:amountlec,:amountlab,:Totalleclab,:date1,:time1,:time11,:date2,:time2,:time22,:date3,:time3,:time33,:datelab1,:timelab1,:timelab11
            ,:datelab2,:timelab2,:timelab22,:datelab3,:timelab3,:timelab33,:numberOv1,:DateOv1,:numberOv2,:Dapartmentreq,:DateOv2,:numberOv3,:DateOv3,:numberOv4,:DateOv4,:check1
            ,:rejectedcheck1,:check2,:check3,:check4,:check5,:amountlecreal,:amountlabreal,:Totalleclabreal,:numberOv5
            ,:check51,:datecheck51,:monthwithdrawlec1,:amountwithdrawlec1,:monthwithdrawlab1,:amountwithdrawlab1,:ERPmonth1
            ,:check52,:datecheck52,:monthwithdrawlec2,:amountwithdrawlec2,:monthwithdrawlab2,:amountwithdrawlab2,:ERPmonth2
            ,:check53,:datecheck53,:monthwithdrawlec3,:amountwithdrawlec3,:monthwithdrawlab3,:amountwithdrawlab3,:ERPmonth3
            ,:check54,:datecheck54,:monthwithdrawlec4,:amountwithdrawlec4,:monthwithdrawlab4,:amountwithdrawlab4,:ERPmonth4
            ,:check55,:datecheck55,:monthwithdrawlec5,:amountwithdrawlec5,:monthwithdrawlab5,:amountwithdrawlab5,:ERPmonth5)");

            $insert_stmt->bindParam(":ids", $ids);
            $insert_stmt->bindParam(":nameSubject", $nameSubject);
            $insert_stmt->bindParam(":idteacher", $idteacher);
            $insert_stmt->bindParam(":nameTeacher", $nameTeacher);
            $insert_stmt->bindParam(":credit", $credit);
            $insert_stmt->bindParam(":semester", $semester);
            $insert_stmt->bindParam(":yearSubject", $yearSubject);
            $insert_stmt->bindParam(":Numnisit1", $Numnisit1);
            $insert_stmt->bindParam(":Numnisit2", $Numnisit2);
            $insert_stmt->bindParam(":Numnisit3", $Numnisit3);
            $insert_stmt->bindParam(":Numnisit4", $Numnisit4);
            $insert_stmt->bindParam(":Numnisit5", $Numnisit5);
            $insert_stmt->bindParam(":Totalnisit", $Totalnisit);
            $insert_stmt->bindParam(":savedtime", $savedtime);
            $insert_stmt->bindParam(":fiscaYear", $fiscaYear);
            $insert_stmt->bindParam(":classLec", $classLec);
            $insert_stmt->bindParam(":classLab", $classLab);
            $insert_stmt->bindParam(":classLab2", $classLab2);
            $insert_stmt->bindParam(":classLab3", $classLab3);
            $insert_stmt->bindParam(":hourLec", $hourLec);
            $insert_stmt->bindParam(":hourLab", $hourLab);
            $insert_stmt->bindParam(":Totalhourteachinglec", $Totalhourteachinglec);
            $insert_stmt->bindParam(":Totalhourteachinglab", $Totalhourteachinglab);
            $insert_stmt->bindParam(":compensationlec", $compensationlec);
            $insert_stmt->bindParam(":compensationlab", $compensationlab);
            $insert_stmt->bindParam(":amountlec", $amountlec);
            $insert_stmt->bindParam(":amountlab", $amountlab);
            $insert_stmt->bindParam(":Totalleclab", $Totalleclab);
            $insert_stmt->bindParam(":date1", $date1);
            $insert_stmt->bindParam(":time1", $time1);
            $insert_stmt->bindParam(":time11", $time11);
            $insert_stmt->bindParam(":date2", $date2);
            $insert_stmt->bindParam(":time2", $time2);
            $insert_stmt->bindParam(":time22", $time22);
            $insert_stmt->bindParam(":date3", $date3);
            $insert_stmt->bindParam(":time3", $time3);
            $insert_stmt->bindParam(":time33", $time33);
            $insert_stmt->bindParam(":datelab1", $datelab1);
            $insert_stmt->bindParam(":timelab1", $timelab1);
            $insert_stmt->bindParam(":timelab11", $timelab11);
            $insert_stmt->bindParam(":datelab2", $datelab2);
            $insert_stmt->bindParam(":timelab2", $timelab2);
            $insert_stmt->bindParam(":timelab22", $timelab22);
            $insert_stmt->bindParam(":datelab3", $datelab3);
            $insert_stmt->bindParam(":timelab3", $timelab3);
            $insert_stmt->bindParam(":timelab33", $timelab33);
            $insert_stmt->bindParam(":numberOv1", $numberOv1);
            $insert_stmt->bindParam(":DateOv1", $DateOv1);//
            $insert_stmt->bindParam(":numberOv2", $numberOv2);
            $insert_stmt->bindParam(":Dapartmentreq", $Dapartmentreq);
            $insert_stmt->bindParam(":DateOv2", $DateOv2);
            $insert_stmt->bindParam(":numberOv3", $numberOv3);
            $insert_stmt->bindParam(":DateOv3", $DateOv3);
            $insert_stmt->bindParam(":numberOv4", $numberOv4);//
            $insert_stmt->bindParam(":DateOv4", $DateOv4);//
            $insert_stmt->bindParam(":check1", $check1);
            $insert_stmt->bindParam(":rejectedcheck1", $rejectedcheck1);
            $insert_stmt->bindParam(":check2", $check2);
            $insert_stmt->bindParam(":check3", $check3);
            $insert_stmt->bindParam(":check4", $check4);//
            $insert_stmt->bindParam(":check5", $check5);//
            $insert_stmt->bindParam(":amountlecreal", $amountlecreal);//
            $insert_stmt->bindParam(":amountlabreal", $amountlabreal);//
            $insert_stmt->bindParam(":Totalleclabreal", $Totalleclabreal);
            $insert_stmt->bindParam(":numberOv5", $numberOv5);

            $insert_stmt->bindParam(":check51", $check51);
            $insert_stmt->bindParam(":datecheck51", $datecheck51);
            $insert_stmt->bindParam(":monthwithdrawlec1", $monthwithdrawlec1);
            $insert_stmt->bindParam(":amountwithdrawlec1", $amountwithdrawlec1);
            $insert_stmt->bindParam(":monthwithdrawlab1", $monthwithdrawlab1);
            $insert_stmt->bindParam(":amountwithdrawlab1", $amountwithdrawlab1);
            $insert_stmt->bindParam(":ERPmonth1", $ERPmonth1);

            $insert_stmt->bindParam(":check52", $check52);
            $insert_stmt->bindParam(":datecheck52", $datecheck52);
            $insert_stmt->bindParam(":monthwithdrawlec2", $monthwithdrawlec2);
            $insert_stmt->bindParam(":amountwithdrawlec2", $amountwithdrawlec2);
            $insert_stmt->bindParam(":monthwithdrawlab2", $monthwithdrawlab2);
            $insert_stmt->bindParam(":amountwithdrawlab2", $amountwithdrawlab2);
            $insert_stmt->bindParam(":ERPmonth2", $ERPmonth2);

            $insert_stmt->bindParam(":check53", $check53);
            $insert_stmt->bindParam(":datecheck53", $datecheck53);
            $insert_stmt->bindParam(":monthwithdrawlec3", $monthwithdrawlec3);
            $insert_stmt->bindParam(":amountwithdrawlec3", $amountwithdrawlec3);
            $insert_stmt->bindParam(":monthwithdrawlab3", $monthwithdrawlab3);
            $insert_stmt->bindParam(":amountwithdrawlab3", $amountwithdrawlab3);
            $insert_stmt->bindParam(":ERPmonth3", $ERPmonth3);

            $insert_stmt->bindParam(":check54", $check54);
            $insert_stmt->bindParam(":datecheck54", $datecheck54);
            $insert_stmt->bindParam(":monthwithdrawlec4", $monthwithdrawlec4);
            $insert_stmt->bindParam(":amountwithdrawlec4", $amountwithdrawlec4);
            $insert_stmt->bindParam(":monthwithdrawlab4", $monthwithdrawlab4);
            $insert_stmt->bindParam(":amountwithdrawlab4", $amountwithdrawlab4);
            $insert_stmt->bindParam(":ERPmonth4", $ERPmonth4);

            $insert_stmt->bindParam(":check55", $check55);
            $insert_stmt->bindParam(":datecheck55", $datecheck55);
            $insert_stmt->bindParam(":monthwithdrawlec5", $monthwithdrawlec5);
            $insert_stmt->bindParam(":amountwithdrawlec5", $amountwithdrawlec5);
            $insert_stmt->bindParam(":monthwithdrawlab5", $monthwithdrawlab5);
            $insert_stmt->bindParam(":amountwithdrawlab5", $amountwithdrawlab5);
            $insert_stmt->bindParam(":ERPmonth5", $ERPmonth5);
            
            
            

            if ($insert_stmt->execute()) {
                $delete_stmt = $db->prepare('DELETE from subject where ids = :ids');
                $delete_stmt -> bindParam(':ids' , $ids);
                $delete_stmt -> execute();
                $delete_stmt1 = $db->prepare('DELETE from finance where ids = :ids');
                $delete_stmt1 -> bindParam(':ids' , $ids);
                $delete_stmt1 -> execute();
                $delete_stmt2 = $db->prepare('DELETE from teaching_information where ids = :ids');
                $delete_stmt2 -> bindParam(':ids' , $ids);
                $delete_stmt2 -> execute();
                $delete_stmt3 = $db->prepare('DELETE from teaching_informationlab where ids = :ids');
                $delete_stmt3 -> bindParam(':ids' , $ids);
                $delete_stmt3 -> execute();
                $_SESSION['success'] = "ลบ/บันทึกสำเร็จ";
                header("location:addsubjectend.php");
            }else{
                $_SESSION['error'] = "บันทึกไม่สำเร็จ";
                header("location:addsubjectend.php");
            }
       
              
    }catch(PDOException $e) {
        $e->getMessage();
    }
      
}

?>

