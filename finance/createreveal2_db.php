<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_previewopen'])) {
        
     
        
        $ids = $_SESSION['code']; 
        $ov3 = $_SESSION['Ov3'];
        $date3 =$_SESSION['date3'];

            $sql = 'UPDATE subject SET check3 = :check3,numberOv3 = :ov3, DateOv3 = :date3 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check3'=>1,':id'=>$ids, ':ov3'=>$ov3, ':date3'=>$date3];
            $stmt->execute($params);
            $_SESSION['success'] = "สร้างบันทึกข้อความขออนุมัติหลักการเบิกค่าสอนสำเร็จ";
            unset($_SESSION['code']);
            
 

                
        }

        header("location:createreveal3.php");
         

           

?>