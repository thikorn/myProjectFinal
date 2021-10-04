<?php
    require_once '../connection.php';
    session_start();
    if (isset($_POST['submit_createwithdraw'])) {
        $ids = $_SESSION['code'];
        $dateOv = $_POST['s_date1'];
        $_SESSION['dateOv'] = $dateOv;
        $month = $_POST['s_month'];
        $_SESSION['selectmonth'] = $month;
        $stmt = $db->prepare("SELECT * from finance where ids = :uids ");
        $stmt->bindParam(":uids", $ids);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $monthwith1 = $resultarray[$i]["monthwithdrawlec1"];
          $monthwith2 = $resultarray[$i]["monthwithdrawlec2"];
          $monthwith3 = $resultarray[$i]["monthwithdrawlec3"];
          $monthwith4 = $resultarray[$i]["monthwithdrawlec4"];
          $monthwith5 = $resultarray[$i]["monthwithdrawlec5"];
          $amountlec = $resultarray[$i]["amountlec"];
          $amountlab = $resultarray[$i]["amountlab"];
        }        
        $select_stmt = $db->prepare("SELECT * from teaching_information WHERE ids = :ids AND MONTH(date) = $month ");
        $select_stmt->bindParam(':ids', $ids);
        $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $select_stmt = $db->prepare("SELECT * from teaching_informationlab  WHERE ids = :ids AND MONTH(datelab) = $month ");
        $select_stmt->bindParam(':ids', $ids);
        $select_stmt->execute();
        $row_count1 = $select_stmt->rowCount();
        if($month == $monthwith1 OR $month == $monthwith2 OR $month == $monthwith3 OR $month == $monthwith4 OR $month == $monthwith5){
            $_SESSION['error'] = "เดือนนั้นถูกเบิกไปแล้ว";
            header("location:createwithdraw1.php");
        }else if($row_count == 0 AND $row_count1 == 0){
            $_SESSION['error'] = "เดือนนั้นยังไม่ถูกบันทึกการสอน";
            header("location:createwithdraw1.php");
        }else{
            $select_stmt = $db->prepare("SELECT * from teaching_information WHERE ids = :ids AND MONTH(date) = $month ");
              $select_stmt->bindParam(':ids', $ids);
              $select_stmt->execute();
              $timetotal = 0;
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {          
              $current_date_time_sec=strtotime($row["time1"]);
              $future_date_time_sec=strtotime($row["time11"]);
              $difference=$future_date_time_sec-$current_date_time_sec;
              $hours=($difference / 3600);
              $minutes=($difference / 60 % 60); 
            }
            $timetotal = $timetotal + $hours ;   
            $compensationlec = $_SESSION['compensationlec']; 
            $amountlecwith = $timetotal * $compensationlec;
            $balancelec = $amountlec - $amountlecwith;
            $select_stmt = $db->prepare("SELECT * from teaching_informationlab  WHERE ids = :ids AND MONTH(datelab) = $month ");
              $select_stmt->bindParam(':ids', $ids);
              $select_stmt->execute();
              $timetotallab = 0;
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
              $current_date_time_sec=strtotime($row["timelab1"]);
              $future_date_time_sec=strtotime($row["timelab11"]);
              $differencelab=$future_date_time_sec-$current_date_time_sec;
              $hourslab=($differencelab / 3600);
              $minuteslab=($differencelab / 60 % 60);
              }
              $timetotallab = $timetotallab + $hourslab ;  
              $compensationlab = $_SESSION['compensationlab']; 
              $amountwithdrawlab = $timetotallab * $compensationlab;
              $balancelab = $amountlab - $amountwithdrawlab;
            if($balancelec <0){
                $_SESSION['error']=$amountlecwith;
                header("location:createwithdraw1.php");
            }else if($timetotallab != 0 AND $balancelab<0){
              $_SESSION['error']="เงินคงเหลือไม่พอ ไม่สามารถเบิกได้";
              header("location:createwithdraw1.php");
            }else{
                header("location:createwithdraw2.php");
            }
        }
        }
?>