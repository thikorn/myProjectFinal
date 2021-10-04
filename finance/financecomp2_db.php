<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_financecomp'])) {
        
        $idteaching = $_SESSION['idteaching'];
        
      
        $ov4 = $_SESSION['Ov4'];
        $dateov4 = $_SESSION['datecreate'];

            $sql = 'UPDATE teaching_information SET check4 = :check4,numberOv4 = :ov4, dateOv4 = :dateov4 WHERE id = :id';
            $stmt = $db->prepare($sql);
            $params =[':check4'=>2,':id'=>$idteaching, ':ov4'=>$ov4, ':dateov4' =>$dateov4 ];
            $stmt->execute($params);
            
            $_SESSION['success'] = "กรอกข้อมูลขอสอนชดเชยสำเร็จ";
            unset($_SESSION['code']);
            
 

                
        }

        header("location:financecomp2.5_db.php");
         

           

?>