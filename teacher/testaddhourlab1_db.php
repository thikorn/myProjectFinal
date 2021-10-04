<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addhour']) AND (isset($_REQUEST['check_id'])) ) {
       
        $code = $_SESSION['code'];
        $subname = $_SESSION['subname'];
        $nameteacher = $_SESSION['nameteacher'];
        $number = $_REQUEST['check_id'];
        $topic = $_POST['s_topic'];
        $classroom = $_POST['s_classroom'];
        $note = $_POST['s_note'];
        
        
            $date = $_REQUEST['check_date'];
            $time1 =  $_REQUEST['check_time1'];
            $time11 = $_REQUEST['check_time11'];
     
            $nameback = $_REQUEST['nameback'];
       
        $idteacher = $_SESSION['idT'];

        $timeto1 = $time11-$time1;
       
        
        try{
         
            if($timeto1 < 1){
                $_SESSION['error'] = "เวลาเรียนไม่ถึง  1 ชั่วโมง กรอกใหม่อีกครั้ง";
                header("location:testhour2.php");
            }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO teaching_informationlab(ids, nameSubject, idteacher, nameteacher, numberhourlab, topiclab, classroomlab, notelab, datelab, timelab1, timelab11) 
                VALUES (:ucode, :usubname, :uidteacher, :unameteacher,:unumber, :utopic, :uclassroom, :unote, :udate, :utime1, :utime11)");
                $insert_stmt->bindParam(":ucode", $code);
                $insert_stmt->bindParam(":usubname", $subname);
                $insert_stmt->bindParam(":unameteacher", $nameteacher);
                $insert_stmt->bindParam(":uidteacher", $idteacher);
                $insert_stmt->bindParam(":unumber", $number);
                $insert_stmt->bindParam(":utopic", $topic);
                $insert_stmt->bindParam(":uclassroom", $classroom);
                $insert_stmt->bindParam(":unote", $note);
                $insert_stmt->bindParam(":udate", $date);
                $insert_stmt->bindParam(":utime1", $time1);
                $insert_stmt->bindParam(":utime11", $time11);

              
              
               
                if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "บันทึกสำเร็จ";
                    header("location:$nameback");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>