<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addsubject'])) {
   
        $startdateterm = $_POST['s_startdateterm'];
	    $semester = $_POST['s_semeter'];
        $year = $_POST['s_year'];

        try{
            $select_stmt = $db->prepare("SELECT * FROM startdateterm WHERE yearSubject = :uyear ");
            $select_stmt->bindParam(":uyear", $year);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row['semester'] == $semester and $row['yearSubject'] ==  $year) {
                $_SESSION['error'] = "ภาคการศึกษา และ ปีการศึกษานั้น ถูกบันทึกแล้ว";
                header("location:addstartterm.php");
           }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO startdateterm(startdateterm, semester, yearSubject) VALUES ( :ustartdateterm, :usemester, :uyear)");
                $insert_stmt->bindParam(":ustartdateterm", $startdateterm);
                $insert_stmt->bindParam(":usemester", $semester);
                $insert_stmt->bindParam(":uyear", $year);
               
                if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "บันทึกสำเร็จ";
                    header("location:addstartterm.php");
                }else{
                    $_SESSION['error'] = "บันทึกไม่สำเร็จ";
                    header("location:addstartterm.php");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>