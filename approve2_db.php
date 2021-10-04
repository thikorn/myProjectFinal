<?php
   
    require_once 'connection.php';
    session_start();
   
    
    if (isset($_POST['btn_approves'])) {
        
     
        
        $ids = $_SESSION['code'];
        
        $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE subject SET check3 = :check3 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check3'=>2,':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "อนุมัติบันทึกข้อความขออนุมัติหลักการเบิกค่าสอนสำเร็จ";
            unset($_SESSION['code']);
            
            header("location:checkcreatereveal.php");

                
        }

        

        elseif (isset($_POST['btn_approvep'])) {
        

          
          $ids = $_SESSION['code'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check3 = :check3 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check3'=>3,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกข้อความขออนุมัติหลักการเบิกค่าสอนสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:checkcreatereveal.php");
          }

          elseif (isset($_POST['btn_approvef'])) {
        

          
            $ids = $_SESSION['code'];
            
            $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
              $stmt->bindParam(":uids", $ids);
              $stmt->execute();
              $resultarray=$stmt->fetchAll();
              
         
                $sql = 'UPDATE subject SET check3 = :check3 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check3'=>4,':id'=>$ids];
                $stmt->execute($params);

                $sql = 'UPDATE finance SET check3 = :check3 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check3'=>4,':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "ตรวจสอบบันทึกข้อความขออนุมัติหลักการเบิกค่าสอนสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:checkcreatereveal.php");
            }
        
  
         
                

               
              
       

?>