<?php
    session_start();
    include('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบันทึกข้อความขอเบิกค่าตอบแทน</title>

    
  

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
<h1>สร้างบันทึกข้อความขอเบิกค่าตอบแทน </h1>
              
                <hr>

                <form action="createwithdraw1_db.php" method="post"> 

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

                <div class="p">
                    วิชาที่ต้องการสร้าง คือ <?php echo $_SESSION['code']; echo $_SESSION['subname']?>
                </div>
                
                <label for="ov3" class="col-sm-4 control-label">เลข อว(ขอเบิกค่าตอบแทน) คือ <?php echo  $_SESSION['numberOv1']; ?> </label>
                <br>
                <label for="" class="col-sm-3 control-label">วันที่สร้างบันทึกข้อความ*</label>

                    <div class="col-sm-3">
                        <input type="date" name="s_date1" class="form-control" required  value="<?php echo date('d-m-Y',strtotime($data["congestart"])) ?>" >
                        
                    </div>

                <label for="" class="col-sm-4 control-label">เลือกเดือนที่ต้องการเบิกของวิชานั้นๆ *</label>

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
                  
                    </div>


                <br>
                <div class="col-sm-2 mt-1">
                    <input type="submit" name="submit_createwithdraw" class="btn btn-primary" style="width:100%" value="ยืนยัน">
                </div>

                </form>

                <br>
                <a href="createwithdraw.php" class="btn btn-danger ml-3">ย้อนกลับ</a>

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>