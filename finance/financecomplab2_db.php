<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_financecomp'])) {
        
        $idteaching = $_SESSION['idteachinglab'];
        
      
        $ov4 = $_SESSION['Ov4'];
        $dateov4 = $_SESSION['datecreate'];

            $sql = 'UPDATE teaching_informationlab SET check4lab = :check4,numberov4lab = :ov4, DateOv4lab = :dateov4 WHERE id = :id';
            $stmt = $db->prepare($sql);
            $params =[':check4'=>2,':id'=>$idteaching, ':ov4'=>$ov4, ':dateov4' =>$dateov4 ];
            $stmt->execute($params);
            
            $_SESSION['success'] = "กรอกข้อมูลขอสอนชดเชยสำเร็จ";
            unset($_SESSION['code']);
            
 

                
        }

        header("location:financecomp3.php");
         

           

?>