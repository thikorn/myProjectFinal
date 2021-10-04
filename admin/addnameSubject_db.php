<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addsubject'])) {
        
        $nameSubject = $_POST['s_nameSubject'];
        $code = $_POST['s_code'];
     

        try{
            $select_stmt = $db->prepare("SELECT * FROM namesubject WHERE ids = :code or nameSubject = :nameSubject ");
            $select_stmt->bindParam(":code", $code);
            $select_stmt->bindParam(":nameSubject", $nameSubject);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row['nameSubject'] == $nameSubject ) {
                $_SESSION['error'] = "ชื่อวิชานั้นถูกบันทึกไว้แล้ว";
                header("location:addnameSubject.php");
            }else  if ($row['ids'] == $code ) {
            $_SESSION['error'] = "รหัสวิชานั้นถูกบันทึกไว้แล้ว";
            header("location:addnameSubject.php");
            }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO namesubject(nameSubject,ids) VALUES ( :unameSubject,:ucode)");
                $insert_stmt->bindParam(":unameSubject", $nameSubject);
                $insert_stmt->bindParam(":ucode", $code);
               
                if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "บันทึกสำเร็จ";
                    header("location:addnameSubject.php");
                }else{
                    $_SESSION['error'] = "บันทึกไม่สำเร็จ";
                    header("location:addnameSubject.php");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>