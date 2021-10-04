<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_createcomp2'])) {
        
        $ids = $_REQUEST['check_id'];
        $_SESSION['ids'] = $_REQUEST['check_id'];

        $numberhour = $_SESSION['numberhour'];
        $date1 = $_SESSION['dateo'];
        $_SESSION['dateOv4']=$_POST['s_datecreate'];

        $datecreate = $_POST['s_datecreate'];
        $daten = $_POST['s_daten'];
        $timen1 = $_POST['s_timen1'];
        $timen11 = $_POST['s_timen11'];


      
            $sql = 'UPDATE teaching_information SET datecreaten = :datecreate, daten = :daten, timen1 = :timen1, timen11 = :timen11, check4 = :check4 WHERE date = :date1 AND numberhour = :numberhour';
            $stmt = $db->prepare($sql);
            $params =[':datecreate'=>$datecreate,':date1'=>$date1,':numberhour'=>$numberhour, ':daten'=>$daten,':timen1'=>$timen1, ':timen11'=>$timen11, ':check4'=>1];
            $stmt->execute($params);

            header("location:createcomp3_db.php");
        

        
            
            
 

                
        }

       
         

           

?>