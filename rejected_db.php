<?php
   
    require_once 'connection.php';
    session_start();
   
    if (isset($_POST['submit_rejectedsubdetail'])) {
       $check = $_SESSION['check'];
       $_SESSION['namegreject']= "submit_txtrejectsavesub";
       $_SESSION['breject']= "subdetail.php";
        if ($check==0){
            $_SESSION['namelevel']="เจ้าหน้าที่การเงินและบัญชี";
        }else if ($check==1){
            $_SESSION['namelevel']="เลขานุการคณะกรรมการ";
        }else if ($check==2){
            $_SESSION['namelevel']="กรรมการ";
        }else if ($check==3){
            $_SESSION['namelevel']="ประธานคณะกรรมการดำเนินงาน";
        }
       
     
          
          header("location:reject.php");
      
    }

    if (isset($_POST['submit_rejectedpreviewopen'])) {
        $check = $_SESSION['check'];
        $_SESSION['namegreject']= "submit_txtrejectpreviewopen";
        $_SESSION['breject']= "checkpreviewopen1.php";
        if ($check==1){
             $_SESSION['namelevel']="เลขานุการคณะกรรมการ";
         }else if ($check==2){
             $_SESSION['namelevel']="ประธานคณะกรรมการดำเนินงาน";
         }else if ($check==3){
             $_SESSION['namelevel']="อาจารย์";
         }

        
      
           
           header("location:reject.php");
       
     }
     if (isset($_POST['submit_rejectedcreatereveal'])) {
        $check = $_SESSION['check'];
        $_SESSION['namegreject']= "submit_txtrejectcreatereveal";
        $_SESSION['breject']= "checkcreatereveal1.php";
        if ($check==1){
             $_SESSION['namelevel']="เลขานุการคณะกรรมการ";
         }else if ($check==2){
             $_SESSION['namelevel']="ประธานคณะกรรมการดำเนินงาน";
         }else if ($check==3){
             $_SESSION['namelevel']="เจ้าหน้าที่การเงินฯ";
         }

        
      
           
           header("location:reject.php");
       
     }
     if (isset($_POST['submit_rejectedcheckcomp'])) {
        $check = $_SESSION['check4'];
        $_SESSION['namegreject']= "submit_txtrejectcheckcomp";
        $_SESSION['breject']= "checkcomp1.php";
        if ($check==2){
             $_SESSION['namelevel']="เลขานุการคณะกรรมการ";
         }else if ($check==3){
             $_SESSION['namelevel']="ประธานคณะกรรมการดำเนินงาน";
         }else if ($check==4){
             $_SESSION['namelevel']="อาจารย์";
         }

        
      
           
           header("location:reject.php");
       
     }

     if (isset($_POST['submit_rejectedcheckwithdraw'])) {
        $check = $_SESSION['check5'];
        $_SESSION['namegreject']= "submit_txtrejectcheckwithdraw";
        $_SESSION['breject']= "checkwithdraw1.php";
        if ($check==1){
             $_SESSION['namelevel']="เลขานุการคณะกรรมการ";
         }else if ($check==2){
             $_SESSION['namelevel']="กรรมการ";
         }else if ($check==3){
             $_SESSION['namelevel']="ประธานคณะกรรมการดำเนินงาน";
         }else if ($check==4){
            $_SESSION['namelevel']="อาจารย์";
        }

        
      
           
           header("location:reject.php");
       
     }

?>