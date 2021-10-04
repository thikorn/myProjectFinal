<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_createcomp2'])) {
        
        $ids = $_REQUEST['check_id'];
        $_SESSION['ids'] = $_REQUEST['check_id'];
        $nameback = $_SESSION['nameback'];
        $numberhour = $_SESSION['numberhour'];
        $date1 = $_SESSION['dateo'];
      
        $daten = $_POST['s_daten'];
        $timen1 = $_POST['s_timen1'];
        $timen11 = $_POST['s_timen11'];
        
            $sql = 'UPDATE teaching_informationlab SET  datenlab = :daten, timenlab1 = :timen1, timenlab11 = :timen11, check4lab = :check4 WHERE datelab = :date1 AND numberhourlab = :numberhour';
            $stmt = $db->prepare($sql);
            $params =[':date1'=>$date1,':numberhour'=>$numberhour, ':daten'=>$daten,':timen1'=>$timen1, ':timen11'=>$timen11, ':check4'=>1];
            $stmt->execute($params);
            
            
            $_SESSION['success'] = "สร้างบันทึกข้อความขอชดเชยสำเร็จ";
 

                
        }

        header("location:$nameback");
         

           

?>