<?php
   
    require_once '../connection.php';
    session_start();
   

        $email = $_SESSION['email'];
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['idT']=$resultarray[$i]["id"];
        }

          header("location:schedule_form1.php");
      


?>