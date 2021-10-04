<?php
   
    require_once '../connection.php';
    session_start();
   
    

        $nameback = $_SESSION['nameback'];
     
        
        $ids = $_SESSION['ids'];
        $dateOv4 =$_SESSION['dateOv4'];
        
            $sql = 'UPDATE subject SET check4 = :check4, DateOv4 = :dateOv4 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check4'=>1,':id'=>$ids, ':dateOv4'=>$dateOv4];
            $stmt->execute($params);
            
            $_SESSION['success'] = "สร้างบันทึกข้อความขอชดเชยสำเร็จ";
            
            
 

                
      

        header("location:$nameback");
         

           

?>