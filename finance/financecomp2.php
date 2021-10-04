<?php
    session_start();
    require_once '../connection.php';
    if(!isset($_SESSION['finance_login'])) {
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบันทึกข้อความขอสอนชดเชย</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


<?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
<h1>บันทึกข้อความขอสอนชดเชย</h1>
              
                <hr>

                <?php
                
                $nameleclab = $_SESSION['nameleclab'];
                if($nameleclab == "lec"){?>
                    <form action="financecomp2_db.php" method="post"> 
                <?php } else if($nameleclab == "lab"){?>
                    <form action="financecomplab2_db.php" method="post"> 
                <?php }

                ?>

             


               

                <br>
                
            <p>รหัสวิชา : <?php     echo $_SESSION['code'];?> </p>
            <p>ชื่อวิชา : <?php     echo $_SESSION['subname'];?> </p>
            <p>เลข อว(ขออนุมัติสอนชดเชย) : <?php   echo $_SESSION['Ov4'];?> </p>
            <?php
        $dateov4 = $_SESSION['datecreate'];
       
        function DateThai($strDate)
        {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
        }
    
        $strDate =  $dateov4;
        
          ?>

            <p>วันที่สร้างบันทึกข้อความขอสอนชดเชย : <?php   echo  DateThai($strDate)?> </p>
            <p>ภาคการศึกษา : <?php     echo $_SESSION['semeter'];?> </p>
            <p>ปีการศึกษา : <?php     echo $_SESSION['year'];?> </p>
            <p>จำนวนนิสิตที่ลงทะเบียนเรียน : <?php     echo  $_SESSION['Totalnisit'];?> คน </p>  
            
            <p>หมู่บรรยาย : <?php     echo $_SESSION['classlec'];?> </p>
            <p>วัน : <?php     echo $_SESSION['date1'];?> เวลา <?php     echo $_SESSION['time1'];?> - <?php     echo $_SESSION['time11'];?></p>
            <?php if($_SESSION['date2'] == ""){
                
            } else { ?>
                <p>วัน : <?php     echo $_SESSION['date2'];?> เวลา <?php     echo $_SESSION['time2'];?> - <?php     echo $_SESSION['time22'];?></p>
                
               <?php } ?>

            <?php if($_SESSION['date3'] == ""){
                
            } else { ?>
               <p>วัน : <?php     echo $_SESSION['date3'];?> เวลา <?php     echo $_SESSION['time3'];?> - <?php     echo $_SESSION['time33'];?></p>
                
            <?php } ?>
            

            <?php if($_SESSION['classlab'] == 0){

}else {  ?>
    <p>หมู่ปฏิบัติ : <?php  echo $_SESSION['classlab'];?> </p> 
    
<?php } ?>
<?php if($_SESSION['datelab1'] == "" ){

}else {  ?>
     <p>วัน : <?php     echo $_SESSION['datelab1'];?> เวลา <?php     echo $_SESSION['timelab1'];?> - <?php     echo $_SESSION['timelab11'];?></p>
<?php } ?>

<?php if($_SESSION['classlab2'] == 0){

}else {  ?>
<p>หมู่ปฏิบัติ : <?php  echo $_SESSION['classlab2'];?> </p> 

<?php } ?>
<?php if($_SESSION['datelab2'] == "" ){

}else {  ?>
     <p>วัน : <?php     echo $_SESSION['datelab2'];?> เวลา <?php     echo $_SESSION['timelab2'];?> - <?php     echo $_SESSION['timelab22'];?></p>
<?php } ?>

<?php if($_SESSION['classlab3'] == 0){

}else {  ?>
<p>หมู่ปฏิบัติ : <?php  echo $_SESSION['classlab3'];?> </p> 

<?php } ?>
  <?php if($_SESSION['datelab3'] == "" ){

}else {  ?>
     <p>วัน : <?php     echo $_SESSION['datelab3'];?> เวลา <?php     echo $_SESSION['timelab3'];?> - <?php     echo $_SESSION['timelab33'];?></p>
<?php } ?>
           
           <p>หัวข้อ : <?php echo $_SESSION['topic'];?></p>  
           <p>ห้องเรียน : <?php echo $_SESSION['classroom'];?></p> 
           <p>หมายเหตุ : <?php echo $_SESSION['note'];?></p>   
           <p>วันที่สอน : <?php     echo $_SESSION['date'];?> เวลา <?php echo $_SESSION['time1teaching'];?> - <?php echo $_SESSION['time11teaching'];?></p>
           <p>วันที่สอนชดเชย : <?php     echo $_SESSION['daten'];?> เวลา <?php echo $_SESSION['timen1teaching'];?> - <?php echo $_SESSION['timen11teaching'];?></p>
         
         
                <div class="col-sm-2 mt-1">
                    <input type="submit" name="submit_financecomp" class="btn btn-primary" style="width:100%" value="ยืนยัน">
                </div>

                </form>

                <br>
                <div class="col-sm-2 mt-1">
                <a href="financecomp1.php" class="btn btn-danger">ย้อนกลับ</a>
                </div>
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>