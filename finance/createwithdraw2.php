<?php include('../connection.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบันทึกข้อความขอเบิกค่าตอบแทน</title>

    
  

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <?php include('../decorate_style.php') ?>
</head>



<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">

<h1>



บันทึกข้อความขอเบิกค่าตอบแทน</h1>
              
              <hr>

              <form action="createwithdraw2_db.php" method="post"> 
              <?php if(isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger">
                  <h3>
                      <?php
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                      ?>
                  </h3>
              </div>
          <?php endif ?>
          <?php if(isset($_SESSION['success'])) : ?>
              <div class="alert alert-success">
                  <h3>
                      <?php
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                      ?>
                  </h3>
              </div>
          <?php endif ?>


             

              <br>


          <p>เดือนที่ต้องการสร้าง : <?php     echo $_SESSION['selectmonth'];?> </p>
          <p>----lec---- </p>
          <?php 
          $selectmonth = $_SESSION['selectmonth'];
          $ids = $_SESSION['checkidsteaching'];


              $select_stmt = $db->prepare("SELECT * from teaching_information WHERE ids = :ids AND MONTH(date) = $selectmonth ");
              $select_stmt->bindParam(':ids', $ids);
              $select_stmt->execute();
              $row_count = $select_stmt->rowCount();
              $timetotal = 0;
              
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
           
              $current_date_time_sec=strtotime($row["time1"]);
              $future_date_time_sec=strtotime($row["time11"]);
              $difference=$future_date_time_sec-$current_date_time_sec;
              $hours=($difference / 3600);
              $minutes=($difference / 60 % 60);
      ?>

              <p>วันที่สอน <?php echo $row["date"]?> เวลาที่สอน <?php echo $row["time1"]?> ถึงเวลา <?php echo $row["time11"]?> รวมเป็น <?php echo sprintf("%02d",$hours).":".sprintf("%02d",$minutes);?> ชั่วโมง </p>
              
        
          <?php 
          
          $timetotal = $timetotal + $hours ;  
          } ?>
          <?php ?>
          
         

          <p>รวมเวลาที่สอนทั้งหมด(บรรยาย) : <?php echo $timetotal ?> </p>
          <p>อัตราค่าตอบแทน(บรรยาย): <?php     echo $_SESSION['compensationlec'];?> </p>
          <?php 
          $compensationlec = $_SESSION['compensationlec']; 
          $amountlecwith = $timetotal * $compensationlec;
          ?>

          <p>จำนวนเงินทั้งหมด(บรรยาย) : <?php  echo $_SESSION['amountlec'];?> </p>
          <p>จำนวนเงินคงเหลือ(บรรยาย) : <?php  echo $_SESSION['amountlecreal'];?> </p>
          <?php 
          $amountlec = $_SESSION['amountlecreal']; 
          $balancelec = $amountlec - $amountlecwith;
          $_SESSION['balancelec'] = $balancelec;
          ?>
          <p>จำนวนเงินที่เบิก(บรรยาย) : <?php     echo $amountlecwith;?> </p>
          <?php $_SESSION['amountwithdrawlec'] = $amountlecwith;?>
         
          <p>จำนวนเงินคงเหลือหลังจากที่เบิกแล้ว(บรรยาย) : <?php     echo $balancelec;?> </p>

          <p>----lab---- </p>

          <?php 

              $select_stmt = $db->prepare("SELECT * from teaching_informationlab  WHERE ids = :ids AND MONTH(datelab) = $selectmonth ");
              $select_stmt->bindParam(':ids', $ids);
              $select_stmt->execute();
              $row_count1 = $select_stmt->rowCount();
              $timetotallab = 0;
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
  
              $current_date_time_sec=strtotime($row["timelab1"]);
              $future_date_time_sec=strtotime($row["timelab11"]);
              $differencelab=$future_date_time_sec-$current_date_time_sec;
              $hourslab=($differencelab / 3600);
              $minuteslab=($differencelab / 60 % 60);

             
              
         
      ?>

              <p>วันที่สอน <?php echo $row["datelab"]?> เวลาที่สอน <?php echo $row["timelab1"]?> ถึงเวลา <?php echo $row["timelab11"]?> รวมเป็น <?php echo sprintf("%02d",$hourslab).":".sprintf("%02d",$minuteslab);?> ชั่วโมง </p>
              
             
          <?php 
         
        
          $timetotallab = $timetotallab + $hourslab ;  

          } ?>

    
          <p>รวมเวลาที่สอนทั้งหมด(ปฏิบัติ) : <?php echo $timetotallab ?> </p>
          <p>อัตราค่าตอบแทน(ปฏิบัติ): <?php     echo $_SESSION['compensationlab'];?> </p>
          <?php 
          $compensationlab = $_SESSION['compensationlab']; 
          $amountwithdrawlab = $timetotallab * $compensationlab;
          ?>

          <p>จำนวนเงินทั้งหมด(ปฏิบัติ) : <?php  echo $_SESSION['amountlab'];?> </p>
          <p>จำนวนเงินคงเหลือ(ปฏิบัติ) : <?php  echo $_SESSION['amountlabreal'];?> </p>
          <?php 
          $amountlab = $_SESSION['amountlabreal']; 
          $balancelab = $amountlab - $amountwithdrawlab;
          $_SESSION['balancelab'] = $balancelab;
          ?>
          <p>จำนวนเงินที่เบิก(ปฏิบัติ) : <?php     echo $amountwithdrawlab;?> </p>
          <?php $_SESSION['amountwithdrawlab'] = $amountwithdrawlab;?>
          <p>จำนวนเงินคงเหลือหลังจากที่เบิกแล้ว(ปฏิบัติ) : <?php     echo $balancelab;?> </p>

          <br>

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
    
              <div class="col-sm-2 mt-1">
                  <input type="submit" name="submit_createwithdraw" class="btn btn-primary" style="width:100%" value="ยืนยัน">
              </div>

              </form>

       
              <br>
              <a href="createwithdraw1.php" class="btn btn-danger ml-3">ย้อนกลับ</a>
        
   
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>