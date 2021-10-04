<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addsubject'])) {
   
        $year = $_POST['s_yearcourse'];

        try{
            $select_stmt = $db->prepare("SELECT * FROM yearcourse WHERE yearCourse = :uyear ");
            $select_stmt->bindParam(":uyear", $year);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ( $row['yearCourse'] ==  $year) {
                $_SESSION['error'] = "ปีหลักสูตรนั้น ถูกบันทึกแล้ว";
                header("location:addyearcourse.php");
           }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO yearcourse(yearCourse) VALUES (:uyear)");

                $insert_stmt->bindParam(":uyear", $year);
               
                if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "บันทึกสำเร็จ";
                    header("location:addyearcourse.php");
                }else{
                    $_SESSION['error'] = "บันทึกไม่สำเร็จ";
                    header("location:addyearcourse.php");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>