<?php
   
    require_once 'connection.php';
    session_start();
   
    
    if (isset($_POST['btn_approves'])) {
        
     
        
        $ids = $_SESSION['code'];
        
        $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE subject SET check5 = :check5 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check5'=>2,':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
            unset($_SESSION['code']);
            
            header("location:checkwithdraw.php");

                
        }
        elseif (isset($_POST['btn_approveb'])) {
        

          
          $ids = $_SESSION['code'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check5 = :check5 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check5'=>3,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:checkwithdraw.php");
          }
        

        elseif (isset($_POST['btn_approvep'])) {
        

          
          $ids = $_SESSION['code'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check5 = :check5 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check5'=>4,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:checkwithdraw.php");
          }


          elseif (isset($_POST['btn_approvet'])) {
        

          
            $ids = $_SESSION['code'];
            
         
              
         
                $sql = 'UPDATE subject SET check5 = :check5 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check5'=>5,':id'=>$ids];
                $stmt->execute($params);


            $select_stmt = $db->prepare("SELECT * from finance WHERE ids =$ids");
            $select_stmt->execute();
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
              if($row["monthwithdraw1"]==null){
                $Totalhourteaching = $_SESSION['Totalhourteachinglec'];
                $compensationlec = $_SESSION['compensationlec'];
                $amountwithdraw1 = $Totalhourteaching*$compensationlec;
                $month = date("d/m/y");
                $sql = 'UPDATE finance SET monthwithdraw1 = :monthwithdraw1, amountwithdraw1 = :amountwithdraw1 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':monthwithdraw1'=>$month,':amountwithdraw1'=>$amountwithdraw1, ':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:checkwithdraw.php");

              }else if($row["monthwithdraw1"]!=null and $row["monthwithdraw2"]==null){
                $Totalhourteaching = $_SESSION['Totalhourteachinglec'];
                $compensationlec = $_SESSION['compensationlec'];
                $amountwithdraw1 = $Totalhourteaching*$compensationlec;
                $month = date("d/m/y");
                $sql = 'UPDATE finance SET monthwithdraw2 = :monthwithdraw1, amountwithdraw2 = :amountwithdraw1 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':monthwithdraw1'=>$month,':amountwithdraw1'=>$amountwithdraw1, ':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "อนุมัติบันทึกข้อความขอเบิกค่าตอบแทนสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:checkwithdraw.php");

              }

        }

                

                    
                    
    
  
  
            }
  
         
                

               
              
       

?>