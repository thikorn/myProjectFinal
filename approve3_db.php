<?php
   
    require_once 'connection.php';
    session_start();
   
    
    if (isset($_POST['btn_approves'])) {
        
     
        
        $ids = $_SESSION['idteaching'];
        
          $stmt = $db->prepare("SELECT * from teaching_information where id = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE teaching_information SET check4 = :check4 WHERE id = :id';
            $stmt = $db->prepare($sql);
            $params =[':check4'=>3,':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอสอนชดเชยสำเร็จ";
            unset($_SESSION['code']);
            
            header("location:checkcomp.php");

                
        }

        

        elseif (isset($_POST['btn_approvep'])) {
        

          
          $ids = $_SESSION['idteaching'];
          
          $stmt = $db->prepare("SELECT * from teaching_information where id = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE teaching_information SET check4 = :check4 WHERE id = :id';
              $stmt = $db->prepare($sql);
              $params =[':check4'=>4,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกข้อความขอสอนชดเชยสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:checkcomp.php");
          }
          elseif (isset($_POST['btn_approvet'])) {
        

          
            $ids = $_SESSION['idteaching'];
            
            $stmt = $db->prepare("SELECT * from teaching_information where id = :uids ");
              $stmt->bindParam(":uids", $ids);
              $stmt->execute();
              $resultarray=$stmt->fetchAll();
              
         
                $sql = 'UPDATE teaching_information SET check4 = :check4 WHERE id = :id';
                $stmt = $db->prepare($sql);
                $params =[':check4'=>5,':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "อนุมัติบันทึกข้อความขอสอนชดเชยสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:checkcomp0.5.php");
            }
  
         
                

               
              
       

?>