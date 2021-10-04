<?php
    session_start();
    require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกข้อความขอเบิกค่าตอบแทน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>บันทึกข้อความขอเบิกค่าตอบแทน</h1>
          
          <hr>


          <p>จำนวนเงินที่เบิก    Lecture : <?php     echo $_SESSION['amountwithdrawlec'];?> </p>
          <p>จำนวนเงินคงเหลือ  Lecture : <?php     echo $_SESSION['amountlecreal'];?> </p>
         
         
          <p>จำนวนเงินที่เบิก Lab : <?php     echo $_SESSION['amountwithdrawlab'];?> </p>
          <p>จำนวนเงินคงเหลือ Lab : <?php     echo $_SESSION['amountlabreal'];?> </p>
        
          <p>รหัสวิชา : <?php     echo $_SESSION['code'];?> </p>
    <p>จำนวนนิสิต : <?php echo $_SESSION['Totalnisit']; ?></p>
    <p>ชื่อวิชา : <?php     echo $_SESSION['subname'];?> </p>
    <p>เลข อว(ขออนุมัติหลักการเบิกค่าตอบแทน) : <?php     echo $_SESSION['numberOv1'];?> </p>
    <p>ภาคการศึกษา : <?php     echo $_SESSION['semeter'];?> </p>
    <p>ปีการศึกษา : <?php     echo $_SESSION['year'];?> </p>
    <p>หน่วยกิต : <?php     echo $_SESSION['credit'];?> </p>
    <p>ชั่วโมง/สัปดาห์(บรรยาย) : <?php     echo $_SESSION['hourlec'];?> </p>
    <p>ชั่วโมง/สัปดาห์(ปฏิบัติ) : <?php     echo $_SESSION['hourlab'];?> </p>
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
      

      <?php if($_SESSION['classlab'] == ""){

      }else {  ?>
          <p>หมู่ปฏิบัติ : <?php  echo $_SESSION['classlab'];?> </p> 
          
     <?php } ?>
     
      <?php if($_SESSION['datelab1'] == "" ){
      
      }else {  ?>
           <p>วัน : <?php     echo $_SESSION['datelab1'];?> เวลา <?php     echo $_SESSION['timelab1'];?> - <?php     echo $_SESSION['timelab11'];?></p>
     <?php } ?>

     <?php if($_SESSION['datelab2'] == "" ){

      }else {  ?>
           <p>วัน : <?php     echo $_SESSION['datelab2'];?> เวลา <?php     echo $_SESSION['timelab2'];?> - <?php     echo $_SESSION['timelab22'];?></p>
     <?php } ?>
     
    
        <?php if($_SESSION['datelab3'] == "" ){

      }else {  ?>
           <p>วัน : <?php     echo $_SESSION['datelab3'];?> เวลา <?php     echo $_SESSION['timelab3'];?> - <?php     echo $_SESSION['timelab3'];?></p>
     <?php } ?>
     
   <p>อัตราค่าตอบแทน(บรรยาย) : <?php     echo $_SESSION['compensationlec'];?> </p>
   <p>อัตรค่าตอบแทน(ปฏิบัติ) : <?php     echo $_SESSION['compensationlab'];?> </p>
   

   <p>ปีงบประมาณ : <?php     echo $_SESSION['fiscayear'];?> </p>
  
      <form action="approve4_db.php" method="post">
      <button type="submit" name="<?php echo $_SESSION['btn_name'];?>" class="btn btn-primary"><?php echo $_SESSION['btn_submit'];?></button>
      </form>
    <br>
    
      <form action="rejected_db.php" method="post">
      <button type="submit" name="submit_rejectedcheckwithdraw" class="btn btn-warning">ทบทวน</button>
      </form>
      <br>
      <a href="<?php
      if($namerole=="อาจารย์"){

        echo "checkwithdraw0.5.php";
      }else { echo "checkwithdraw.php";}
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