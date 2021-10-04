<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['submit_previewopen'])) {
        
     
        
        $ids = $_SESSION['code'];
        $ov2 = $_POST['s_ov2'];
        $dapartmentreq = $_POST['s_dapartmentreq'];
        $date2 = $_POST['s_date2'];
        $_SESSION['Ov2'] = $ov2;
        $_SESSION['dapartmentreq'] = $dapartmentreq;
        $_SESSION['dateov2'] = $date2;


                    
            
            header("location:previewopen2.php");

                
        }

        

       

?>