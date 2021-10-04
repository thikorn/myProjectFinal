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
<?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
<h1>รายงานค่าตอบแทนการสอนประจำเดือน</h1>
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

<form action="connectERP0_db.php" method="post">

  <label for="" class="col-sm-3 control-label">เลือกเดือนที่ต้องการทราบ *</label>

<div class="col-sm-3">
<select name="s_month" class="form-control">
    <option value="" selected="selected">เลือกเดือน</option>
        <option value="1">มกราคม</option>
        <option value="2">กุมภาพันธ์</option>
        <option value="3">มีนาคม</option>
        <option value="4">เมษายน</option>
        <option value="5">พฤษภาคม</option>
        <option value="6">มิถุนายน</option>
        <option value="7">กรกฎาคม</option>
        <option value="8">สิงหาคม</option>
        <option value="9">กันยายน</option>
        <option value="10">ตุลาคม</option>
        <option value="11">พฤศจิกายน</option>
        <option value="12">ธันวาคม</option>
       
</select>

<br>

                    <input type="submit" name="btn_selectmonth" style="width:100px" class="btn btn-primary" value="ยืนยัน">
                



          
                </form>

                <br>
                <br>
                <a href="finance_home.php" style="width:90px" class="btn btn-danger">ย้อนกลับ</a>

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>