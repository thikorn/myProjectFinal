<?php
   
    require_once 'connection.php';
    session_start();
   
    $realcheck = $_SESSION['realcheck'];
    $ids = $_SESSION['code'];
        

    if (isset($_POST['btn_approves'])) {
        
        
            $check5=2;
     
            $update_stmt = $db->prepare("UPDATE finance SET $realcheck = :check5 WHERE ids = :ids");
            $update_stmt->bindParam(':check5', $check5);
            $update_stmt->bindParam(':ids', $ids);

            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
            unset($_SESSION['code']);

            if ($update_stmt->execute()) {
              header("location:checkwithdraw.php");
          }
            

           


                
        }
        elseif (isset($_POST['btn_approveb'])) {
        

          
          $check5=3;
     
            $update_stmt = $db->prepare("UPDATE finance SET $realcheck = :check5 WHERE ids = :ids");
            $update_stmt->bindParam(':check5', $check5);
            $update_stmt->bindParam(':ids', $ids);

            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
            unset($_SESSION['code']);

            if ($update_stmt->execute()) {
              header("location:checkwithdraw.php");
          }
            

          }
        

        elseif (isset($_POST['btn_approvep'])) {
        

          
          $check5=4;
     
          $update_stmt = $db->prepare("UPDATE finance SET $realcheck = :check5 WHERE ids = :ids");
          $update_stmt->bindParam(':check5', $check5);
          $update_stmt->bindParam(':ids', $ids);

          $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
          unset($_SESSION['code']);

          if ($update_stmt->execute()) {
            header("location:checkwithdraw.php");
        }
          
          }


          elseif (isset($_POST['btn_approvet'])) {
        

          
            $check5=5;
     
            $update_stmt = $db->prepare("UPDATE finance SET $realcheck = :check5 WHERE ids = :ids");
            $update_stmt->bindParam(':check5', $check5);
            $update_stmt->bindParam(':ids', $ids);

            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
            unset($_SESSION['code']);

            if ($update_stmt->execute()) {
              header("location:checkwithdraw.php");
          }
            

                    
                    
    
  
  
            }
  
         
                

               
              
       

?>