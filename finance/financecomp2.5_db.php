<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_financecomp'])) {
        
     
        
        $ids = $_SESSION['code']; 
        $ov4 = $_SESSION['Ov4'];
        $dateov4 = $_SESSION['datecreate'];

            $sql = 'UPDATE subject SET check4 = :check4,numberOv4 = :ov4, dateOv4 = :dateov4 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check4'=>2,':id'=>$ids, ':ov4'=>$ov4, ':dateov4' =>$dateov4 ];
            $stmt->execute($params);
            
            $_SESSION['success'] = "กรอกข้อมูลขอสอนชดเชยสำเร็จ";
            unset($_SESSION['code']);
            
 

                
        }

        header("location:financecomp3.php");
         

           

?>