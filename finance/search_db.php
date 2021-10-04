<?php
   
    require_once '../connection.php';
    session_start();
   
    
    if (isset($_POST['btn_search'])) {
        
        if($_POST["s_search"]=="ชื่อวิชา"){
            header("location:searchnamesubject.php");      
        }else if($_POST["s_search"]=="เลข อว."){
            header("location:searchov.php");      
        }else if($_POST["s_search"]=="ภาคการศึกษา"){
        header("location:searchsemester.php");      
        }else if($_POST["s_search"]=="ปีการศึกษา"){
        header("location:searchyearsubject.php");      
        }else if($_POST["s_search"]=="รหัสวิชา"){
            header("location:searchids.php");      
            }

       

           
    }
?>