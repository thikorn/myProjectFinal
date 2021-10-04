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
    <title>รายงานค่าตอบแทนการสอนประจำเดือน
</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<head>
<?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">

<h1>รายงานค่าตอบแทนการสอนประจำเดือน 
                <?php 
                $namemonth =$_SESSION["selectmonth"]; 
                  if($namemonth == 1){
                    $namemonth = "มกราคม";
                  }else if($namemonth == 2){
                    $namemonth = "กุมภาพันธ์";
                  }else if($namemonth == 3){
                    $namemonth = "มีนาคม";
                  }else if($namemonth == 4){
                    $namemonth = "เมษายน";
                  }else if($namemonth == 5){
                    $namemonth = "พฤษภาคม";
                  }else if($namemonth == 6){
                    $namemonth = "มิถุนายน";
                  }else if($namemonth == 7){
                    $namemonth = "กรกฎาคม";
                  }else if($namemonth == 8){
                    $namemonth = "สิงหาคม";
                  }else if($namemonth == 9){
                    $namemonth = "กันยายน";
                  }else if($namemonth == 10){
                    $namemonth = "ตุลาคม";
                  }else if($namemonth == 11){
                    $namemonth = "พฤศจิกายน";
                  }else if($namemonth == 12){
                    $namemonth = "ธันวาคม";
                  }
                echo $namemonth;
                ?>
                
                </h1>
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
    <th>เดือนที่เบิก</th>
    <th>จำนวนเงินที่เบิก</th>
    <th>เลข ERP</th>
    <th>ปุ่ม</th>

  </tr>
  


  <?php 
//ดึงข้อมูลจากตาราง subject
        $selectmonth = $_SESSION["selectmonth"];
        $select_stmt = $db->prepare("SELECT * from finance WHERE monthwithdrawlec1 = :uselectmonth OR monthwithdrawlec2 = :uselectmonth OR monthwithdrawlec3 = :uselectmonth OR monthwithdrawlec4 = :uselectmonth OR monthwithdrawlec5 = :uselectmonth");
        $select_stmt->bindParam(":uselectmonth", $selectmonth);
        $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
        
          <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <?php if($row["monthwithdrawlec1"] == $selectmonth){ ?>
                  <th> 
                  <?php 
                $namemonth1 =$row["monthwithdrawlec1"];
                  if($namemonth1 == 1){
                    $namemonth1 = "มกราคม";
                  }else if($namemonth1 == 2){
                    $namemonth1 = "กุมภาพันธ์";
                  }else if($namemonth1 == 3){
                    $namemonth1 = "มีนาคม";
                  }else if($namemonth1 == 4){
                    $namemonth1 = "เมษายน";
                  }else if($namemonth1 == 5){
                    $namemonth1 = "พฤษภาคม";
                  }else if($namemonth1 == 6){
                    $namemonth1 = "มิถุนายน";
                  }else if($namemonth1 == 7){
                    $namemonth1 = "กรกฎาคม";
                  }else if($namemonth1 == 8){
                    $namemonth1 = "สิงหาคม";
                  }else if($namemonth1 == 9){
                    $namemonth1 = "กันยายน";
                  }else if($namemonth1 == 10){
                    $namemonth1 = "ตุลาคม";
                  }else if($namemonth1 == 11){
                    $namemonth1 = "พฤศจิกายน";
                  }else if($namemonth1 == 12){
                    $namemonth1 = "ธันวาคม";
                  }
                echo $namemonth1;
                ?> </th>   

                  <th> <?php 
                  $amountwithdrawlec1 = $row["amountwithdrawlec1"];
                  $amountwithdrawlab1 = $row["amountwithdrawlab1"];
                  $totalamountwith1 =  $amountwithdrawlec1+ $amountwithdrawlab1;
                  echo $totalamountwith1?> </th>   
                <?php 
                $txtERP = $row["ERPmonth1"];
                if($txtERP == ""){ ?>
                  <form action="connectERP1_db.php?checkERP=ERPmonth1&check_id=<?php echo $row["ids"]?>" method="post">
                  <th><input type="text" name="s_ERP" class="form-control" style = "width:100px " required placeholder="Enter number"> </th>
                 <th><input type="submit" name="btn_ERP"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลERP"></th>
                </form>

             <?php }else{ ?>
              <th> <?php echo $row["ERPmonth1"]?> </th>
             
             <th> <a href="EditconnectERP.php?checkERP=ERPmonth1&check_id=<?php echo $row["ids"]?>&txtERP=<?php echo $row["ERPmonth1"]?>" class="btn btn-warning">แก้ไข</a></th>
            <?php } ?>
                
            
               
               
       <?php } else if($row["monthwithdrawlec2"] == $selectmonth){ ?>
                  <th>   <?php 
                $namemonth2 =$row["monthwithdrawlec2"];
                  if($namemonth2 == 1){
                    $namemonth2 = "มกราคม";
                  }else if($namemonth2 == 2){
                    $namemonth2 = "กุมภาพันธ์";
                  }else if($namemonth2 == 3){
                    $namemonth2 = "มีนาคม";
                  }else if($namemonth2 == 4){
                    $namemonth2 = "เมษายน";
                  }else if($namemonth2 == 5){
                    $namemonth2 = "พฤษภาคม";
                  }else if($namemonth2 == 6){
                    $namemonth2 = "มิถุนายน";
                  }else if($namemonth2 == 7){
                    $namemonth2 = "กรกฎาคม";
                  }else if($namemonth2 == 8){
                    $namemonth2 = "สิงหาคม";
                  }else if($namemonth2 == 9){
                    $namemonth2 = "กันยายน";
                  }else if($namemonth2 == 10){
                    $namemonth2 = "ตุลาคม";
                  }else if($namemonth2 == 11){
                    $namemonth2 = "พฤศจิกายน";
                  }else if($namemonth2 == 12){
                    $namemonth2 = "ธันวาคม";
                  }
                echo $namemonth2;
                ?></th>   
                  <th> <?php 
                  $amountwithdrawlec2 = $row["amountwithdrawlec2"];
                  $amountwithdrawlab2 = $row["amountwithdrawlab2"];
                  $totalamountwith2 =  $amountwithdrawlec2+ $amountwithdrawlab2;
                  echo $totalamountwith2?> </th>     

                   <?php 
                $txtERP = $row["ERPmonth2"];
                if($txtERP == ""){ ?>
                  <form action="connectERP1_db.php?checkERP=ERPmonth2&check_id=<?php echo $row["ids"]?>" method="post">
                  <th><input type="text" name="s_ERP" class="form-control" style = "width:100px " required placeholder="Enter number"> </th>
                 <th><input type="submit" name="btn_ERP"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลERP"></th>
                </form>

             <?php }else{ ?>
                <th> <?php echo $row["ERPmonth2"]?> </th>
             
                <th> <a href="EditconnectERP.php?checkERP=ERPmonth2&check_id=<?php echo $row["ids"]?>&txtERP=<?php echo $row["ERPmonth2"]?>" class="btn btn-warning">แก้ไข</a></th>
               
            <?php } ?>


       <?php } else if($row["monthwithdrawlec3"] == $selectmonth){ ?>
                  <th> <?php 
                $namemonth3 =$row["monthwithdrawlec3"];
                  if($namemonth3 == 1){
                    $namemonth3 = "มกราคม";
                  }else if($namemonth3 == 2){
                    $namemonth3 = "กุมภาพันธ์";
                  }else if($namemonth3 == 3){
                    $namemonth3 = "มีนาคม";
                  }else if($namemonth3 == 4){
                    $namemonth3 = "เมษายน";
                  }else if($namemonth3 == 5){
                    $namemonth3 = "พฤษภาคม";
                  }else if($namemonth3 == 6){
                    $namemonth3 = "มิถุนายน";
                  }else if($namemonth3 == 7){
                    $namemonth3 = "กรกฎาคม";
                  }else if($namemonth3 == 8){
                    $namemonth3 = "สิงหาคม";
                  }else if($namemonth3 == 9){
                    $namemonth3 = "กันยายน";
                  }else if($namemonth3 == 10){
                    $namemonth3 = "ตุลาคม";
                  }else if($namemonth3 == 11){
                    $namemonth3 = "พฤศจิกายน";
                  }else if($namemonth3 == 12){
                    $namemonth3 = "ธันวาคม";
                  }
                echo $namemonth3;
                ?> </th>   
                  <th> <?php 
                  $amountwithdrawlec3 = $row["amountwithdrawlec3"];
                  $amountwithdrawlab3 = $row["amountwithdrawlab3"];
                  $totalamountwith3 =  $amountwithdrawlec3+ $amountwithdrawlab3;
                  echo $totalamountwith3?> </th>    
                    <?php 
                $txtERP = $row["ERPmonth3"];
                if($txtERP == ""){ ?>
                  <form action="connectERP1_db.php?checkERP=ERPmonth3&check_id=<?php echo $row["ids"]?>" method="post">
                  <th><input type="text" name="s_ERP" class="form-control" style = "width:100px " required placeholder="Enter number"> </th>
                 <th><input type="submit" name="btn_ERP"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลERP"></th>
                </form>

             <?php }else{ ?>
              <th> <?php echo $row["ERPmonth3"]?> </th>
             
             <th> <a href="EditconnectERP.php?checkERP=ERPmonth3&check_id=<?php echo $row["ids"]?>&txtERP=<?php echo $row["ERPmonth3"]?>" class="btn btn-warning">แก้ไข</a></th>
            <?php } ?>


       <?php } else if($row["monthwithdrawlec4"] == $selectmonth){ ?>
                  <th>  <?php 
                $namemonth4 =$row["monthwithdrawlec4"];
                  if($namemonth4 == 1){
                    $namemonth4 = "มกราคม";
                  }else if($namemonth4 == 2){
                    $namemonth4 = "กุมภาพันธ์";
                  }else if($namemonth4 == 3){
                    $namemonth4 = "มีนาคม";
                  }else if($namemonth4 == 4){
                    $namemonth4 = "เมษายน";
                  }else if($namemonth4 == 5){
                    $namemonth4 = "พฤษภาคม";
                  }else if($namemonth4 == 6){
                    $namemonth4 = "มิถุนายน";
                  }else if($namemonth4 == 7){
                    $namemonth4 = "กรกฎาคม";
                  }else if($namemonth4 == 8){
                    $namemonth4 = "สิงหาคม";
                  }else if($namemonth4 == 9){
                    $namemonth4 = "กันยายน";
                  }else if($namemonth4 == 10){
                    $namemonth4 = "ตุลาคม";
                  }else if($namemonth4 == 11){
                    $namemonth4 = "พฤศจิกายน";
                  }else if($namemonth4 == 12){
                    $namemonth4 = "ธันวาคม";
                  }
                echo $namemonth4;
                ?> </th>   
                  <th> <?php 
                  $amountwithdrawlec4 = $row["amountwithdrawlec4"];
                  $amountwithdrawlab4 = $row["amountwithdrawlab4"];
                  $totalamountwith4 =  $amountwithdrawlec4+ $amountwithdrawlab4;
                  echo $totalamountwith4?> </th>   

                    <?php 
                $txtERP = $row["ERPmonth4"];
                if($txtERP == ""){ ?>
                  <form action="connectERP1_db.php?checkERP=ERPmonth4&check_id=<?php echo $row["ids"]?>" method="post">
                  <th><input type="text" name="s_ERP" class="form-control" style = "width:100px " required placeholder="Enter number"> </th>
                 <th><input type="submit" name="btn_ERP"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลERP"></th>
                </form>

             <?php }else{ ?>
              <th> <?php echo $row["ERPmonth4"]?> </th>
             
             <th> <a href="EditconnectERP.php?checkERP=ERPmonth4&check_id=<?php echo $row["ids"]?>&txtERP=<?php echo $row["ERPmonth4"]?>" class="btn btn-warning">แก้ไข</a></th>
            <?php } ?> 


       <?php } else if($row["monthwithdrawlec5"] == $selectmonth){ ?>
                  <th>  <?php 
                $namemonth5 =$row["monthwithdrawlec5"];
                  if($namemonth5 == 1){
                    $namemonth5 = "มกราคม";
                  }else if($namemonth5 == 2){
                    $namemonth5 = "กุมภาพันธ์";
                  }else if($namemonth5 == 3){
                    $namemonth5 = "มีนาคม";
                  }else if($namemonth5 == 4){
                    $namemonth5 = "เมษายน";
                  }else if($namemonth5 == 5){
                    $namemonth5 = "พฤษภาคม";
                  }else if($namemonth5 == 6){
                    $namemonth5 = "มิถุนายน";
                  }else if($namemonth5 == 7){
                    $namemonth5 = "กรกฎาคม";
                  }else if($namemonth5 == 8){
                    $namemonth5 = "สิงหาคม";
                  }else if($namemonth5 == 9){
                    $namemonth5 = "กันยายน";
                  }else if($namemonth5 == 10){
                    $namemonth5 = "ตุลาคม";
                  }else if($namemonth5 == 11){
                    $namemonth5 = "พฤศจิกายน";
                  }else if($namemonth5 == 12){
                    $namemonth5 = "ธันวาคม";
                  }
                echo $namemonth5;
                ?> </th>   
               
                  <th> <?php 
                  $amountwithdrawlec5 = $row["amountwithdrawlec5"];
                  $amountwithdrawlab5 = $row["amountwithdrawlab5"];
                  $totalamountwith5 =  $amountwithdrawlec5+ $amountwithdrawlab5;
                  echo $totalamountwith5?> </th>   

<?php 
                $txtERP = $row["ERPmonth5"];
                if($txtERP == ""){ ?>
                  <form action="connectERP1_db.php?checkERP=ERPmonth5&check_id=<?php echo $row["ids"]?>" method="post">
                  <th><input type="text" name="s_ERP" class="form-control" style = "width:100px " required placeholder="Enter number"> </th>
                 <th><input type="submit" name="btn_ERP"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลERP"></th>
                </form>

             <?php }else{ ?>
              <th> <?php echo $row["ERPmonth5"]?> </th>
             <th> <a href="EditconnectERP.php?checkERP=ERPmonth5&check_id=<?php echo $row["ids"]?>&txtERP=<?php echo $row["ERPmonth5"]?>" class="btn btn-warning">แก้ไข</a></th>
            <?php } ?> 
       <?php } ?>
      
  

         
             
        
      
          </tr>
      
        
        <?php  $i++; } ?>
</table>
<?php 
          if($row_count == 0){ ?>
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่แสดงรายงานการสอนประจำเดือน</p>
        <?php
          }
          ?>

          
                </form>

                <br>
                <a href="connectERP0.php"  class="btn btn-danger">ย้อนกลับ</a>
                <form action="connectERP2.php" method="post">
                <hr>
                 <a type="submit" name="submit_modifysubject" href="connectERP2.php" class="btn btn-primary" style="width:85px" target = '_blank'>Print</a>
                </form>
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>