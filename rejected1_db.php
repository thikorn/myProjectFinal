<?php
   
    require_once 'connection.php';
    session_start();
    
    if (isset($_POST['submit_txtrejectsavesub'])) {
        
        $ids = $_SESSION['code'];
        $txtreject = $_POST['txt_reject'];
        $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
          $stmt->bindParam(":uids", $ids);
          $stmt->execute();
          $resultarray=$stmt->fetchAll();
          
     
            $sql = 'UPDATE subject SET check1 = :check1, rejectedcheck1 = :rejectedcheck1 WHERE ids = :id';
            $stmt = $db->prepare($sql);
            $params =[':check1'=>-1,':rejectedcheck1'=>$txtreject, ':id'=>$ids];
            $stmt->execute($params);
            
            $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
          
            
            header("location:savesub.php");

                
        }
        if (isset($_POST['submit_txtrejectpreviewopen'])) {
        
          $ids = $_SESSION['code'];
          $txtreject = $_POST['txt_reject'];
          $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
            $stmt->bindParam(":uids", $ids);
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
            
       
              $sql = 'UPDATE subject SET check2 = :check2, rejectedcheck1 = :rejectedcheck1 WHERE ids = :id';
              $stmt = $db->prepare($sql);
              $params =[':check2'=>-1,':rejectedcheck1'=>$txtreject, ':id'=>$ids];
              $stmt->execute($params);
              
              $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
            
              
              header("location:checkpreviewopen.php");
  
                  
          }
          if (isset($_POST['submit_txtrejectcreatereveal'])) {
        
            $ids = $_SESSION['code'];
            $txtreject = $_POST['txt_reject'];
            $stmt = $db->prepare("SELECT * from subject where ids = :uids ");
              $stmt->bindParam(":uids", $ids);
              $stmt->execute();
              $resultarray=$stmt->fetchAll();
              
         
                $sql = 'UPDATE subject SET check3 = :check3, rejectedcheck1 = :rejectedcheck1 WHERE ids = :id';
                $stmt = $db->prepare($sql);
                $params =[':check3'=>-1,':rejectedcheck1'=>$txtreject, ':id'=>$ids];
                $stmt->execute($params);
                
                $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
              
                
                header("location:checkcreatereveal.php");
    
                    
            }

            if (isset($_POST['submit_txtrejectcheckcomp'])) {
              $nameleclab = $_SESSION['nameleclab']; 

              if($nameleclab == "lec"){
                $ids = $_SESSION['code'];
                $txtreject = $_POST['txt_reject'];
                $idteaching = $_SESSION['idteaching'];
             
                    $sql = 'UPDATE teaching_information SET check4 = :check4, rejectedchecklec1 = :rejectedcheck1 WHERE ids = :id AND id = :idteaching';
                    $stmt = $db->prepare($sql);
                    $params =[':check4'=>-1,':rejectedcheck1'=>$txtreject, ':id'=>$ids,':idteaching'=>$idteaching];
                    $stmt->execute($params);
                    
                    $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
                  
                    
                    header("location:checkcomp.php");
        
                        
                }else  if($nameleclab == "lab"){
                  $ids = $_SESSION['code'];
                  $txtreject = $_POST['txt_reject'];
                  $idteaching = $_SESSION['idteaching'];
               
                      $sql = 'UPDATE teaching_informationlab SET check4lab = :check4, rejectedchecklab1 = :rejectedcheck1 WHERE ids = :id AND id = :idteaching';
                      $stmt = $db->prepare($sql);
                      $params =[':check4'=>-1,':rejectedcheck1'=>$txtreject, ':id'=>$ids,':idteaching'=>$idteaching];
                      $stmt->execute($params);
                      
                      $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
                    
                      
                      header("location:checkcomp.php");
          
                          
                  }

              }
           

              if (isset($_POST['submit_txtrejectcheckwithdraw'])) {
        
                $ids = $_SESSION['code'];
                $txtreject = $_POST['txt_reject'];
                $realcheck = $_SESSION['realcheck'];
             
        
                    $check5=-1;
     
                    $update_stmt = $db->prepare("UPDATE finance SET $realcheck = :check5, rejectedcheck1 = :rejectedcheck1  WHERE ids = :ids");
                    $update_stmt->bindParam(':check5', $check5);
                    $update_stmt->bindParam(':rejectedcheck1', $txtreject);
                    $update_stmt->bindParam(':ids', $ids);
    
                    $_SESSION['success'] = "สั่งให้กลับไปทบทวนสำเร็จ";
                    unset($_SESSION['code']);
        
                    if ($update_stmt->execute()) {
                      header("location:checkwithdraw.php");
                  }
                    
                        
                }
  

?>