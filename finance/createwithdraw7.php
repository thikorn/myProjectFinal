<?php
    session_start();
    require_once '../connection.php';

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
            
            <th>สถานะ</th>
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
        <th> การเบิกครั้งที่ 1 </th>
        <th> <a href="createwithdraw7_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw1=<?php echo $amountwithdraw1?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>





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
        <th> การเบิกครั้งที่ 2  </th>
            
     
          </th>                             
        <th> <a href="createwithdraw7_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw2=<?php echo $amountwithdraw2?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
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
        <th> การเบิกครั้งที่ 3  </th>     
        <th> <a href="createwithdraw7_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw3=<?php echo $amountwithdraw3?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>

  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check54>=2 OR check54=-1");
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
        <th> การเบิกครั้งที่ 4  </th>      
        <th> <a href="createwithdraw7_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw4=<?php echo $amountwithdraw4?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
          </tr>
        <?php  $i++; } ?>




  <?php 

        $select_stmt = $db->prepare("SELECT * from finance WHERE check55>=2 OR check55=-1");
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
        <th>การเบิกครั้งที่ 5  </th>                       
        <th> <a href="createwithdraw7_db.php?check_ids=<?php echo $row["ids"];?>&amountwithdraw5=<?php echo $amountwithdraw5?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
      
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