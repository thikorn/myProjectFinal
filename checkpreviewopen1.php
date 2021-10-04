<?php
    session_start();
    require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกข้อความขอเปิดรายวิชา</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>



    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>บันทึกข้อความขอเปิดรายวิชา</h1>
          
          <hr>
   <p>เลข อว(ขอเปิดรายวิชา) : <?php     echo $_SESSION['Ov1'];?> </p>
   <p>รหัสวิชา : <?php     echo $_SESSION['code'];?> </p>
   <p>ชื่อวิชา : <?php     echo $_SESSION['subname'];?> </p>
   <p>ชื่ออาจารย์ผู้สอน : <?php     echo $_SESSION['nameTeacher'];?> </p>
   <p>ภาควิชาที่ติดต่อ : <?php     echo $_SESSION['Dapartmentreq'];?> </p>
   <p>ภาคการศึกษา : <?php     echo $_SESSION['semeter'];?> </p>
   <p>ปีการศึกษา : <?php     echo $_SESSION['year'];?> </p>
   <p>จำนวนนิสิต : <?php     echo $_SESSION['Totalnisit'];?> คน </p>
   <p>ชั่วโมง/สัปดาห์(บรรยาย) : <?php     echo $_SESSION['hourlec'];?> </p>
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
  
      
      <?php if($_SESSION['hourlab']!=0){ ?>
       <p>ชั่วโมง/สัปดาห์(ปฏิบัติ) : <?php     echo $_SESSION['hourlab'];?> </p>
      
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
           <p>วัน : <?php     echo $_SESSION['datelab3'];?> เวลา <?php     echo $_SESSION['timelab3'];?> - <?php     echo $_SESSION['timelab3'];?></p>
     <?php } ?>
     
  
  


      <form action="approve1_db.php" method="post">
      <button type="submit" name="<?php echo $_SESSION['btn_name'];?>" class="btn btn-primary"><?php echo $_SESSION['btn_submit1'];?></button>
      </form>
    <br>
    
      <form action="rejected_db.php" method="post">
      <button type="submit" name="submit_rejectedpreviewopen" class="btn btn-warning">ทบทวน</button>
      </form>
      <br>
      <a href="<?php 
      if($namerole == "อาจารย์"){
        echo "checkpreviewopen0.5.php";
      }else{echo "checkpreviewopen.php";}
      
      ?>" class="btn btn-danger">ย้อนกลับ</a>
      
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>