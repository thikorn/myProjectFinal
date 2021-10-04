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
    <title>สร้างบันทึกข้อความขออนุมัติหลักการเบิกค่าสอน</title>

    
  

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

<h1>สร้างบันทึกข้อความขออนุมัติหลักการเบิกค่าสอน</h1>
              
              <hr>

              <form action="createreveal1_db.php" method="post"> 


              <div class="p">
                  วิชาที่ต้องการสร้าง คือ <?php echo $_SESSION['code']; ?>  <?php echo $_SESSION['subname']?>
              </div>
              
              <label for="ov3" class="col-sm-4 control-label">เลข อว(ขออนุมัติหลักการเบิกค่าสอน)*</label>
                  <div class="col-sm-2">
                      <input type="text" name="s_ov3" class="form-control" maxlength="4" required placeholder="Enter OV3">
                  </div>
              
              <label for="" class="col-sm-3 control-label">วันที่สร้างบันทึกข้อความ*</label>

                  <div class="col-sm-3">
                      <input type="date" name="s_date3" class="form-control" required  value="<?php echo date('d-m-Y',strtotime($data["congestart"])) ?>" >
                      
                  </div>


              <br>
              <div class="col-sm-2 mt-1">
                  <input type="submit" name="submit_createreveal" class="btn btn-primary" style="width:100%" value="ยืนยัน">
              </div>

              </form>

              <br>
              <a href="createreveal.php" class="btn btn-danger ml-3">ย้อนกลับ</a>
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>