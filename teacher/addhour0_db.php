<?php
   
    require_once '../connection.php';
    session_start();
   
    if (isset($_REQUEST['submit_addhour'])) {
        $email = $_SESSION['email'];
        $stmt = $db->prepare("SELECT * from member where email = :uemail ");
        $stmt->bindParam(":uemail", $email);
        $stmt->execute();
        $resultarray=$stmt->fetchAll();
        for($i=0;$i<count($resultarray);$i++) {
          $_SESSION['idT']=$resultarray[$i]["id"];
        }

          header("location:addhour0.php");
      
    }

?>