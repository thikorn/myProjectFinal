<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_previewopen'])) {
        
     
        
        $ids = $_SESSION['code']; 
        $ov2 = $_SESSION['Ov2'];
        $dapartmentreq =$_SESSION['dapartmentreq'];
        $date2 =$_SESSION['dateov2'];
            $sql = 'UPDATE subject SET check2 = :check2,numberOv2 = :ov2, Dapartmentreq = :dapartmentreq, DateOv2 = :date2 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check2'=>1,':id'=>$ids, ':ov2'=>$ov2,':dapartmentreq'=>$dapartmentreq, ':date2'=>$date2];
            $stmt->execute($params);
            
            $_SESSION['success'] = "สร้างบันทึกข้อความขอเปิดรายวิชาสำเร็จ";
            unset($_SESSION['code']);
            
 

                
        }

        header("location:open_form1.php");
         

           

?>