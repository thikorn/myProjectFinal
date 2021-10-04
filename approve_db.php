<?php
   
    require_once 'connection.php';
    session_start();
   
    
    if (isset($_POST['btn_approvef'])) {
        
     
        
        $ids = $_SESSION['code'];
        
        $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE subject SET check1 = :check1 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check1'=>1,':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "อนุมัติบันทึกวิชาสำเร็จ";
            unset($_SESSION['code']);
            
            header("location:savesub.php");

                
        }

        elseif (isset($_POST['btn_approves'])) {
        

          
          $ids = $_SESSION['code'];
          
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check1 = :check1 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check1'=>2,':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "อนุมัติบันทึกวิชาสำเร็จ";
              unset($_SESSION['code']);
              
                  header("location:savesub.php");
          }

          elseif (isset($_POST['btn_approveb'])) {
        

          
            $ids = $_SESSION['code'];
            
            $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
              $stmt->bindParam(":uids", $ids);
              $stmt->execute();
              $resultarray=$stmt->fetchAll();
              
         
                $sql = 'UPDATE subject SET check1 = :check1 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check1'=>3,':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "อนุมัติบันทึกวิชาสำเร็จ";
                unset($_SESSION['code']);
                
                    header("location:savesub.php");
            }

            elseif (isset($_POST['btn_approvep'])) {
        

          
              $ids = $_SESSION['code'];
              
              $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
                $stmt->bindParam(":uids", $ids);
                $stmt->execute();
                $resultarray=$stmt->fetchAll();
                
           
                  $sql = 'UPDATE subject SET check1 = :check1 WHERE ids = :id';
                  $stmt = $db->prepare($sql);
                  $params =[':check1'=>4,':id'=>$ids];
                  $stmt->execute($params);
                 
                 
                 
                  $ids = $_SESSION['code'];
                  $namesub = $_SESSION['subname'];
                  $compensationlec =  $_SESSION['compensationlec'];
                  $compensationlab = $_SESSION['compensationlab'];
                  $amountlec = $_SESSION['amountlec'];
                  $amountlab = $_SESSION['amountlab'];
                  $nameTeacher = $_SESSION['nameTeacher'];
                  $idTeacher = $_SESSION['idTeacher'];

                  $Totalleclab = $amountlec+$amountlab;
  


                  $insert_stmt = $db->prepare("INSERT INTO finance(ids, nameSubject, nameTeacher ,idteacher , compensationlec, compensationlab, amountlec, amountlecreal, amountlab, amountlabreal, Totalleclab, Totalleclabreal) VALUES (:uids, :uname, :unameTeacher, :uidTeacher, :ucompensationlec, :ucompensationlab, :uamountlec, :uamountlecreal, :uamountlab, :uamountlabreal, :uTotalleclab, :uTotalleclabreal)");
                  $insert_stmt->bindParam(":uids", $ids);
                  $insert_stmt->bindParam(":uname", $namesub);
                  $insert_stmt->bindParam(":unameTeacher", $nameTeacher);
                  $insert_stmt->bindParam(":uidTeacher", $idTeacher);
                  $insert_stmt->bindParam(":ucompensationlec", $compensationlec);
                  $insert_stmt->bindParam(":ucompensationlab", $compensationlab);
                  $insert_stmt->bindParam(":uamountlec", $amountlec);
                  $insert_stmt->bindParam(":uamountlab", $amountlab);
                  $insert_stmt->bindParam(":uamountlecreal", $amountlec);
                  $insert_stmt->bindParam(":uamountlabreal", $amountlab);
                  $insert_stmt->bindParam(":uTotalleclab", $Totalleclab);
                  $insert_stmt->bindParam(":uTotalleclabreal", $Totalleclab);

                  if ($insert_stmt->execute()) {
                    $_SESSION['success'] = "อนุมัติบันทึกวิชาสำเร็จ";
                    header("location:savesub.php");
                }
                                
                         
              
              }

?>