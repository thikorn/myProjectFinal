<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกการสอนบรรยาย</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <form action="report_form1.5_db.php" method="post"> 

    <label for="" class="col-sm-4 control-label">เลือกเดือนที่ต้องการทราบ *</label>

<div class="col-sm-3">
<select name="s_month" class="form-control">
    <option value="" selected="selected">เลือกเดือน</option>
    <?php 
    $ids = $_SESSION['ids'];
    $select_stmt = $db->prepare("SELECT DISTINCT MONTH(date) from teaching_information WHERE ids = :uids ORDER BY MONTH(date)");
    $select_stmt->bindParam(":uids", $ids);
    $select_stmt->execute();
    while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        if($row['MONTH(date)'] == 1){
            $namemonth = "มกราคม";
        }else if($row['MONTH(date)'] == 2){
            $namemonth = "กุมภาพันธ์";
        }else if($row['MONTH(date)'] == 3){
            $namemonth = "มีนาคม";
        }else if($row['MONTH(date)'] == 4){
            $namemonth = "เมษายน";
        }else if($row['MONTH(date)'] == 5){
            $namemonth = "พฤษภาคม";
        }else if($row['MONTH(date)'] == 6){
            $namemonth = "มิถุนายน";
        }else if($row['MONTH(date)'] == 7){
            $namemonth = "กรกฎาคม";
        }else if($row['MONTH(date)'] == 8){
            $namemonth = "สิงหาคม";
        }else if($row['MONTH(date)'] == 9){
            $namemonth = "กันยายน";
        }else if($row['MONTH(date)'] == 10){ 
            $namemonth = "ตุลาคม";
        }else if($row['MONTH(date)'] == 11){
            $namemonth = "พฤศจิกายน";
        }else if($row['MONTH(date)'] == 12){
            $namemonth = "ธันวาคม";
        }
    ?>  
        <option value="<?php echo $row['MONTH(date)'];?>"><?php echo $namemonth;?></option>
       
    <?php }?>    
</select>

</div>

<br>
                <div class="col-sm-2 mt-1">
                    <input type="submit" name="submit_selectmonth" class="btn btn-primary" style="width:100%" value="ยืนยัน">
                </div>


</form>
                <br>
                <a href="report_form1.php" class="btn btn-danger ml-3">ย้อนกลับ</a>
     
</div>
    </div>
        </div>

            


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>