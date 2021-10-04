<?php
    session_start();
    include('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกข้อความขอเบิกค่าตอบแทน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
<h1>บันทึกข้อความขอเบิกค่าตอบแทน </h1>
                <hr>

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

<style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>
<table style="width:100%">
        <tr>
            <th>ลำดับที่</th>
            <th>รหัสวิชา</th>
            <th>อาจารย์ผู้สอน</th>
            <th>ชื่อวิชา</th>
            <th>จำนวนเงินคงเหลือ(บรรยาย)</th>
            <th>จำนวนเงินที่เบิก(บรรยาย)</th>
            <th>จำนวนเงินที่เหลือหลังจากเบิก(บรรยาย)</th>
            <th>จำนวนเงินคงเหลือ(ปฏิบัติ)</th>
            <th>จำนวนเงินที่เบิก(ปฏิบัติ)</th>
            <th>จำนวนเงินที่เหลือหลังจากเบิก(ปฏิบัติ)</th>
            <th>สถานะ</th>
            <th>สถานะการเบิก</th>
            <th>แบบฟอร์ม</th>
        </tr>
  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check51>=1 OR check51=-1");
        $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          $amountlec = $row["amountlec"];
          $amountwithdrawlec1 = $row["amountwithdrawlec1"];
          $amountlecunreal1 = $amountlec - $amountwithdrawlec1;

          $amountlab = $row["amountlab"];
          $amountwithdrawlab1 = $row["amountwithdrawlab1"];
          $amountlabunreal1 = $amountlab - $amountwithdrawlab1;
      
          $amountwithdraw1 = $amountwithdrawlec1 + $amountwithdrawlab1;
          ?> 
        
         <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo number_format($row["amountlec"])?> </th>
        <th> <?php echo number_format($row["amountwithdrawlec1"])?> </th>
        <th> <?php echo number_format($amountlecunreal1) ?> </th>
        <th> <?php echo number_format($row["amountlab"])?> </th>
        <th> <?php echo number_format($row["amountwithdrawlab1"])?> </th>
        <th> <?php echo number_format($amountlabunreal1) ?> </th>

        <th> <?php if($row["check51"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check51"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการตรวจสอบ </i> ';
            }else if($row["check51"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check51"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check51"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check51"]==-1){
                ?>
              <a href="checkrejectedwithdraw.php?update_ids=<?php echo $row["ids"];?>&nameback=createwithdraw3.php&check=check51&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
           }?>
           </th>  

           <th> การเบิกครั้งที่ 1 </th>                           
        <th> <a href="createwithdraw3_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw1=<?php echo $amountwithdraw1?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>



<br>




  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check52>=1 OR check52=-1");
        $select_stmt->execute();
        $row_count2 = $select_stmt->rowCount();
        
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          $amountlec = $row["amountlec"];
          $amountwithdrawlec1 = $row["amountwithdrawlec1"];
          $amountwithdrawlec2 = $row["amountwithdrawlec2"];
          $amountlecunreal2 = $amountlec - $amountwithdrawlec1 ;
          $amountlecunreal22 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 ;

          $amountlab = $row["amountlab"];
          $amountwithdrawlab1 = $row["amountwithdrawlab1"];
          $amountwithdrawlab2 = $row["amountwithdrawlab2"];
          $amountlabunreal2 = $amountlab - $amountwithdrawlab1 ;
          $amountlabunreal22 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 ;

          $amountwithdraw2 = $amountwithdrawlec2 + $amountwithdrawlab2;
          ?> 
       
         <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo number_format($amountlecunreal2)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlec2"])?> </th>
        <th> <?php echo number_format($amountlecunreal22) ?> </th>
        <th> <?php echo number_format($amountlabunreal2)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlab2"])?> </th>
        <th> <?php echo number_format($amountlabunreal22) ?> </th>
        <th> <?php if($row["check52"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check52"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการตรวจสอบ </i> ';
            }else if($row["check52"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check52"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check52"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check52"]==-1){
                ?>
              <a href="checkrejectedwithdraw.php?update_ids=<?php echo $row["ids"];?>&nameback=createwithdraw3.php&check=check52&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
           }?>
           </th>   
           <th> การเบิกครั้งที่ 2 </th>                           
        <th> <a href="createwithdraw3_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw2=<?php echo $amountwithdraw2?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>

  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check53>=1 OR check53=-1");
        $select_stmt->execute();
      
        $row_count3 = $select_stmt->rowCount();
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          $amountlec = $row["amountlec"];
          $amountwithdrawlec1 = $row["amountwithdrawlec1"];
          $amountwithdrawlec2 = $row["amountwithdrawlec2"];
          $amountwithdrawlec3 = $row["amountwithdrawlec3"];

          $amountlecunreal3 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 ;
          $amountlecunreal33 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 - $amountwithdrawlec3 ;

          $amountlab = $row["amountlab"];
          $amountwithdrawlab1 = $row["amountwithdrawlab1"];
          $amountwithdrawlab2 = $row["amountwithdrawlab2"];
          $amountwithdrawlab3 = $row["amountwithdrawlab3"];

          $amountlabunreal3 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2;
          $amountlabunreal33 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 - $amountwithdrawlab3;

          $amountwithdraw3 = $amountwithdrawlec3 + $amountwithdrawlab3;
          ?> 
     
         <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo number_format($amountlecunreal3)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlec3"])?> </th>
        <th> <?php echo number_format($amountlecunreal33) ?> </th>
        <th> <?php echo number_format($amountlabunreal3)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlab3"])?> </th>
        <th> <?php echo number_format($amountlabunreal33) ?> </th>
        <th> <?php if($row["check53"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check53"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการตรวจสอบ </i> ';
            }else if($row["check53"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check53"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check53"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check53"]==-1){
                ?>
              <a href="checkrejectedwithdraw.php?update_ids=<?php echo $row["ids"];?>&nameback=createwithdraw3.php&check=check53&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
           }?>
           </th>
           <th> การเบิกครั้งที่ 3 </th>                              
        <th> <a href="createwithdraw3_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw3=<?php echo $amountwithdraw3?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>


  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check54>=1 OR check54=-1");
        $select_stmt->execute();
        $row_count4 = $select_stmt->rowCount();
      
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) { $amountlec = $row["amountlec"];
          $amountwithdrawlec1 = $row["amountwithdrawlec1"];
          $amountwithdrawlec2 = $row["amountwithdrawlec2"];
          $amountwithdrawlec3 = $row["amountwithdrawlec3"];
          $amountwithdrawlec4 = $row["amountwithdrawlec4"];

          $amountlecunreal4 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 - $amountwithdrawlec3 ;
          $amountlecunreal44 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 - $amountwithdrawlec3 - $amountwithdrawlec4;

          $amountlab = $row["amountlab"];
          $amountwithdrawlab1 = $row["amountwithdrawlab1"];
          $amountwithdrawlab2 = $row["amountwithdrawlab2"];
          $amountwithdrawlab3 = $row["amountwithdrawlab3"];
          $amountwithdrawlab4 = $row["amountwithdrawlab4"];

          $amountlabunreal4 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 - $amountwithdrawlab3;
          $amountlabunreal44 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 - $amountwithdrawlab3 - $amountwithdrawlab4;

          $amountwithdraw4 = $amountwithdrawlec4 + $amountwithdrawlab4;
          ?> 
      
         <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo number_format($amountlecunreal4)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlec4"])?> </th>
        <th> <?php echo number_format($amountlecunreal44) ?> </th>
        <th> <?php echo number_format($amountlabunreal4)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlab4"])?> </th>
        <th> <?php echo number_format($amountlabunreal44) ?> </th>
        <th> <?php if($row["check54"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check54"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการตรวจสอบ </i> ';
            }else if($row["check54"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check54"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check54"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check54"]==-1){
                ?>
              <a href="checkrejectedwithdraw.php?update_ids=<?php echo $row["ids"];?>&nameback=createwithdraw3.php&check=check54&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
           }?>
           </th>                 
           <th> การเบิกครั้งที่ 4 </th>             
        <th> <a href="createwithdraw3_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw4=<?php echo $amountwithdraw4?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
        
        <?php  $i++; } ?>
        </tr>



  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check55>=1 OR check55=-1");
        $select_stmt->execute();
        
        $row_count5 = $select_stmt->rowCount();
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {  $amountlec = $row["amountlec"];
          $amountwithdrawlec1 = $row["amountwithdrawlec1"];
          $amountwithdrawlec2 = $row["amountwithdrawlec2"];
          $amountwithdrawlec3 = $row["amountwithdrawlec3"];
          $amountwithdrawlec4 = $row["amountwithdrawlec4"];
          $amountwithdrawlec5 = $row["amountwithdrawlec5"];

          $amountlecunreal5 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 - $amountwithdrawlec3 - $amountwithdrawlec4;
          $amountlecunreal55 = $amountlec - $amountwithdrawlec1 - $amountwithdrawlec2 - $amountwithdrawlec3 - $amountwithdrawlec4 -  $amountwithdrawlec5 ;

          $amountlab = $row["amountlab"];
          $amountwithdrawlab1 = $row["amountwithdrawlab1"];
          $amountwithdrawlab2 = $row["amountwithdrawlab2"];
          $amountwithdrawlab3 = $row["amountwithdrawlab3"];
          $amountwithdrawlab4 = $row["amountwithdrawlab4"];
          $amountwithdrawlab5 = $row["amountwithdrawlab5"];

          $amountlabunreal5 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 - $amountwithdrawlab3 - $amountwithdrawlab4;
          $amountlabunreal55 = $amountlab - $amountwithdrawlab1 - $amountwithdrawlab2 - $amountwithdrawlab3 - $amountwithdrawlab4 - $amountwithdrawlab5;

          $amountwithdraw5 = $amountwithdrawlec5 + $amountwithdrawlab5;
          ?> 
      
         <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo number_format($amountlecunreal5)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlec5"])?> </th>
        <th> <?php echo number_format($amountlecunreal55) ?> </th>
        <th> <?php echo number_format($amountlabunreal5)?> </th>
        <th> <?php echo number_format($row["amountwithdrawlab5"])?> </th>
        <th> <?php echo number_format($amountlabunreal55) ?> </th>
        <th> <?php if($row["check55"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check55"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการตรวจสอบ </i> ';
            }else if($row["check55"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check55"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check55"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check55"]==-1){
                ?>
              <a href="checkrejectedwithdraw.php?update_ids=<?php echo $row["ids"];?>&nameback=createwithdraw3.php&check=check55&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
           }?>
        </th>    
        <th> การเบิกครั้งที่ 5 </th>                          
        <th> <a href="createwithdraw3_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw5=<?php echo $amountwithdraw5?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>
</table>

          
                </form>

                <br>
                <a href="createwithdraw.php" class="btn btn-danger">ย้อนกลับ</a>

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>