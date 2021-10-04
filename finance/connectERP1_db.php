<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['btn_ERP'])) {
       
       
        $ERPmonth = $_REQUEST['checkERP'];
        $txtERP = $_POST['s_ERP'];
        $ids = $_REQUEST['check_id'];

        $update_stmt = $db->prepare("UPDATE finance SET $ERPmonth = :utxtERP WHERE ids = :uids");
            $update_stmt->bindParam(':utxtERP', $txtERP);
            $update_stmt->bindParam(':uids', $ids);


            $_SESSION['success'] = "กรอกเลข ERP สำเร็จ";
            

            if ($update_stmt->execute()) {
              header("location:connectERP.php");
          }
       
        
       
                
          
    }

?>