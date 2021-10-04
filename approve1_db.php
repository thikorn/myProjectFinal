<?php
   
    require_once 'connection.php';
    session_start();
   
    
    if (isset($_POST['btn_approves'])) {
        
     
        
        $ids = $_SESSION['code'];
        
        $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE subject SET check2 = :check2 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check2'=>2,':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเปิดรายวิชาสำเร็จ";
            unset($_SESSION['code']);
            
            header("location:checkpreviewopen.php");

                
        }

        

        elseif (isset($_POST['btn_approvep'])) {
        

          
          $ids = $_SESSION['code'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check2 = :check2 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check2'=>3,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเปิดรายวิชาสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:checkpreviewopen.php");
          }

          elseif (isset($_POST['btn_approvet'])) {
        

          
            $ids = $_SESSION['code'];
            
            $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
              $stmt->bindParam(":uids", $ids);
              $stmt->execute();
              $resultarray=$stmt->fetchAll();
              
         
                $sql = 'UPDATE subject SET check2 = :check2 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check2'=>4,':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "ยืนยันบันทึกข้อความขอเปิดรายวิชาสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:checkpreviewopen0.5.php");
            }

         
                

               
              
       

?>