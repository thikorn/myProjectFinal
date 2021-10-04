<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_addsubject'])) {
        
        $nameDepartment = $_POST['s_nameDepartment'];
	  

        try{
            $select_stmt = $db->prepare("SELECT * FROM department WHERE nameDepartment = :unameDepartment ");
            $select_stmt->bindParam(":unameDepartment", $nameDepartment);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row['nameDepartment'] == $nameDepartment ) {
                $_SESSION['error'] = "ภาควิชานั้นถูกบันทึกไว้แล้ว";
                header("location:department.php");
           }else if (!isset($errorMsg)) {
                $insert_stmt = $db->prepare("INSERT INTO department(nameDepartment) VALUES ( :unameDepartment)");
                $insert_stmt->bindParam(":unameDepartment", $nameDepartment);
               
                if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "บันทึกสำเร็จ";
                    header("location:department.php");
                }else{
                    $_SESSION['error'] = "บันทึกไม่สำเร็จ";
                    header("location:department.php");
                }
            }
                  
        }catch(PDOException $e) {
            $e->getMessage();
        }
          
    }

?>