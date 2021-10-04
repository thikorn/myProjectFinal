<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_POST['add_subject'])) {

      
        $email = $_SESSION['email'];
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
            $_SESSION['idfisavesub']=$resultarray[$i]["id"];
        
          }
        
        
          
          header("location:addsubject.php");
      
    }

?>