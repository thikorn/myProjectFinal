<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addsubject'])) {
        
        $idsubject = $_POST['s_code'];
        $select_stmt = $db->prepare("SELECT * from namesubject WHERE id=:idsubject");
        $select_stmt->bindParam(":idsubject", $idsubject);
        $select_stmt->execute();
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $ids = $row['ids'];
            $name = $row['nameSubject'];
        } 

      
            $yearcourse = $_POST['s_yearcourse'];
            
    

       
      
        $code = $ids ;
        $idteacher = $_POST['s_nameteacher'];
        $stmt = $db->prepare("SELECT * from member where id = :uidteacher ");
        $stmt->bindParam(":uidteacher", $idteacher);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['firstnameteacher']=$resultarray[$i]["firstname"];
            $_SESSION['lastnameteacher']=$resultarray[$i]["lastname"];
          }
        $firstnameteacher = $_SESSION['firstnameteacher']; 
        $lastnamenameteacher = $_SESSION['lastnameteacher']; 

        $nameteacher =  $_SESSION['firstnameteacher'] .' '.  $_SESSION['lastnameteacher'];

        
	    $ov1 = $_POST['s_ov1'];
        $semeter = $_POST['s_semeter'];
        $year = $_POST['s_year'];
        $credit = $_POST['s_credit'];
        $hweekhe = $_POST['s_hweekhe'];
        $hweekhp = $_POST['s_hweekhp'];
        $classe = $_POST['s_classe'];

        $classp = $_POST['s_classp'];
        $classp2 = $_POST['s_classp2'];
        $classp3 = $_POST['s_classp3'];

        $numnisit1 = $_POST['input'];
        $numnisit2 = $_POST['input1'];
        $numnisit3 = $_POST['input2'];
        $numnisit4 = $_POST['input3'];
        $numnisit5 = $_POST['input4'];
       
        $datelab1 = $_POST['s_datelab1'];
        $timelab1 = $_POST['s_timelab1'];
        $timelab11 = $_POST['s_timelab11'];

        $datelab2 = $_POST['s_datelab2'];
        $timelab2 = $_POST['s_timelab2'];
        $timelab22 = $_POST['s_timelab22'];

        $datelab3 = $_POST['s_datelab3'];
        $timelab3 = $_POST['s_timelab3'];
        $timelab33 = $_POST['s_timelab33'];

        $date1 = $_POST['s_date1'];
        $time1 = $_POST['s_time1'];
        $time11 = $_POST['s_time11'];
        $date2 = $_POST['s_date2'];
        $time2 = $_POST['s_time2'];
        $time22 = $_POST['s_time22'];
        $date3 = $_POST['s_date3'];
        $time3 = $_POST['s_time3'];
        $time33 = $_POST['s_time33'];
        $fiscaly = $_POST['s_fiscaly'];

        $compensationlec = $_POST['s_compensationlec'];
        $compensationlab = $_POST['s_compensationlab'];
        $amountlec = $compensationlec*$hweekhe*15;
        $amountlab = $compensationlab*$hweekhp*15;
        $Totalleclab = $amountlec+$amountlab;
        $totalnisit = $numnisit1+$numnisit2+$numnisit3+$numnisit4+$numnisit5;

      function timediff( $a ,  $b){
        $current_date_time_sec=strtotime($a);
        $future_date_time_sec=strtotime($b);

        $difference=$future_date_time_sec-$current_date_time_sec;
        $hours=($difference / 3600);

        $minutes=($difference / 60 % 60);

        return $hours;

      }

        $timeto1 = timediff($time1 , $time11);
        $timeto2 = timediff($time2 , $time22);
        $timeto3 = timediff($time3 , $time33);
        
        $timetolab1 = timediff($timelab1 , $timelab11);
        $timetolab2 = timediff($timelab2 , $timelab22);
        $timetolab3 = timediff($timelab3 , $timelab33);


        try{
            $select_stmt = $db->prepare("SELECT ids FROM subject WHERE ids = :ucode ");
            $select_stmt->bindParam(":ucode", $code);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row['ids'] == $code) {
                $_SESSION['error'] = "รหัสวิชาถูกบันทึกไว้อยู่แล้ว";
                header("location:addsubject.php");
            }else if(($_POST['s_classp'] != "" AND $_POST['s_classp'] == $_POST['s_classp2'])  OR ($_POST['s_classp'] !="" AND $_POST['s_classp'] == $_POST['s_classp3']) OR ($_POST['s_classp2'] != "" AND $_POST['s_classp2'] == $_POST['s_classp3'] )){
                $_SESSION['error'] = "มีบางหมู่ที่กรอกเหมือนกัน กรอกใหม่อีกครั้ง";
                header("location:addsubject.php");
            }else if($timeto1 > 0 and (( $timeto1 < 1 ) OR ($timeto2 != 0 AND $timeto2 < 1 )  OR ($timeto3 != 0 AND $timeto3 < 1))){
                $_SESSION['error'] = "เวลาของหมู่บรรยาย คำนวณแล้ว ต่ำกว่า 1 ชั่วโมง กรอกใหม่อีกครั้ง";
                header("location:addsubject.php");
            }else if($timeto1 > 0 and (($timetolab1 != 0 AND $timeto1 < 1 ) OR ($timetolab2 != 0 AND $timetolab2 < 1 )  OR ($timetolab3 != 0 AND $timetolab3 < 1))){
                $_SESSION['error'] = "เวลาของหมู่ปฏิบัติ คำนวณแล้ว ต่ำกว่า 1 ชั่วโมง กรอกใหม่อีกครั้ง";
                header("location:addsubject.php");
            }else if ($date1 !=null and( $date1 == $date2 and ($time2 > $time1 and $time2 < $time11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date1 !=null and($date1 == $date2 and ($time22 > $time1 and $time22 < $time11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date1 !=null and($date1 == $date2 and ($time1 == $time2 and $time11 == $time22))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date2 !=null and($date2 == $date3 and ($time2 > $time3 and $time2 < $time33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date2 !=null and($date2 == $date3 and ($time22 > $time3 and $time22 < $time33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date2 !=null and($date2 == $date3 and ($time3 == $time2 and $time33 == $time22))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date1 !=null and($date1 == $date3 and ($time1 > $time3 and $time1 < $time33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date1 !=null and($date1 == $date3 and ($time11 > $time3 and $time11 < $time33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($date1 !=null and($date1 == $date3 and ($time3 == $time1 and $time33 == $time11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and( $datelab1 == $datelab2 and ($timelab2 > $timelab1 and $timelab2 < $timelab11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and($datelab1 == $datelab2 and ($timelab22 > $timelab1 and $timelab22 < $timelab11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and($datelab1 == $datelab2 and ($timelab1 == $timelab2 and $timelab11 == $timelab22))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab2 !=null and($datelab2 == $datelab3 and ($timelab2 > $timelab3 and $timelab2 < $timelab33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab2 !=null and($datelab2 == $datelab3 and ($timelab22 > $timelab3 and $timelab22 < $timelab33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab2 !=null and($datelab2 == $datelab3 and ($timelab3 == $timelab2 and $timelab33 == $timelab22))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and($datelab1 == $datelab3 and ($timelab1 > $timelab3 and $timelab1 < $timelab33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and($datelab1 == $datelab3 and ($timelab11 > $timelab3 and $timelab11 < $timelab33))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if ($datelab1 !=null and($datelab1 == $datelab3 and ($timelab3 == $timelab1 and $timelab33 == $timelab11))) {
                    $_SESSION['error'] = "เวลาคาบเกี่ยวกัน";
                    header("location:addsubject.php");
            }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO subject(ids, nameSubject, nameTeacher, idteacher, credit, semester, yearSubject, Numnisit1, Numnisit2, Numnisit3, Numnisit4, Numnisit5, Totalnisit, fiscaYear, classLec, classLab, classLab2, classLab3, hourLec, hourLab, compensationlec, compensationlab, amountlec, amountlab, Totalleclab, date1, time1, time11, date2, time2, time22, date3, time3, time33, datelab1, timelab1, timelab11, datelab2, timelab2, timelab22, datelab3, timelab3, timelab33, numberOv1) VALUES (:ucode, :uname, :unameteacher, :uidteacher, :ucredit, :usemeter, :uyear, :uinput1, :uinput2, :uinput3, :uinput4, :uinput5, :utotalnisit, :ufiscaly, :uclasse, :uclassp, :uclassp2, :uclassp3, :uhweekhe, :uhweekhp, :ucompensationlec, :ucompensationlab, :uamountlec, :uamountlab, :uTotalleclab, :udate1, :utime1, :utime11, :udate2, :utime2, :utime22, :udate3, :utime3, :utime33, :udatelab1, :utimelab1, :utimelab11, :udatelab2, :utimelab2, :utimelab22, :udatelab3, :utimelab3, :utimelab33, :uov1)");
                $insert_stmt->bindParam(":ucode", $code);
                $insert_stmt->bindParam(":uname", $name);
                $insert_stmt->bindParam(":unameteacher", $nameteacher);
                $insert_stmt->bindParam(":uidteacher", $idteacher);
                $insert_stmt->bindParam(":ucredit", $credit);
                $insert_stmt->bindParam(":usemeter", $semeter);
                $insert_stmt->bindParam(":uyear", $year);
                $insert_stmt->bindParam(":uinput1", $numnisit1);
                $insert_stmt->bindParam(":uinput2", $numnisit2);
                $insert_stmt->bindParam(":uinput3", $numnisit3);
                $insert_stmt->bindParam(":uinput4", $numnisit4);
                $insert_stmt->bindParam(":uinput5", $numnisit5);
                $insert_stmt->bindParam(":utotalnisit", $totalnisit);
                $insert_stmt->bindParam(":ufiscaly", $fiscaly);
                $insert_stmt->bindParam(":uhweekhe",  $hweekhe);
                $insert_stmt->bindParam(":uhweekhp",  $hweekhp);
                $insert_stmt->bindParam(":uclasse",  $classe);
                $insert_stmt->bindParam(":uclassp",  $classp); 
                $insert_stmt->bindParam(":uclassp2",  $classp2); 
                $insert_stmt->bindParam(":uclassp3",  $classp3); 
                $insert_stmt->bindParam(":ucompensationlec", $compensationlec);
                $insert_stmt->bindParam(":ucompensationlab", $compensationlab);
                $insert_stmt->bindParam(":uamountlec", $amountlec);
                $insert_stmt->bindParam(":uamountlab", $amountlab);
                $insert_stmt->bindParam(":uTotalleclab", $Totalleclab);
                $insert_stmt->bindParam(":udate1",  $date1);
                $insert_stmt->bindParam(":utime1",  $time1);
                $insert_stmt->bindParam(":utime11",  $time11);
                $insert_stmt->bindParam(":udate2",  $date2);
                $insert_stmt->bindParam(":utime2",  $time2);
                $insert_stmt->bindParam(":utime22",  $time22);
                $insert_stmt->bindParam(":udate3",  $date3);
                $insert_stmt->bindParam(":utime3",  $time3);
                $insert_stmt->bindParam(":utime33",  $time33);

                $insert_stmt->bindParam(":udatelab1",  $datelab1);
                $insert_stmt->bindParam(":utimelab1",  $timelab1);
                $insert_stmt->bindParam(":utimelab11",  $timelab11);

                $insert_stmt->bindParam(":udatelab2",  $datelab2);
                $insert_stmt->bindParam(":utimelab2",  $timelab2);
                $insert_stmt->bindParam(":utimelab22",  $timelab22);

                $insert_stmt->bindParam(":udatelab3",  $datelab3);
                $insert_stmt->bindParam(":utimelab3",  $timelab3);
                $insert_stmt->bindParam(":utimelab33",  $timelab33);

                $insert_stmt->bindParam(":uov1",  $ov1);

              
              
               
                if ($insert_stmt->execute()) {
                    $success = "วิชา ".$name ." บันทึกเข้าสู่ระบบเรียนร้อยแล้ว";
                  
                    $_SESSION['success'] = $success;
                    header("location:addsubject1.php");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>