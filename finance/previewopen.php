<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบันทึกข้อความขอเปิดรายวิชา</title>

    
  

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

    <h1>สร้างบันทึกข้อความขอเปิดรายวิชา</h1>
              
              <hr>

              <form action="previewopen1_db.php" method="post"> 


              <div class="p">
                  วิชาที่ต้องการสร้าง คือ <?php echo $_SESSION['code']; echo $_SESSION['subname']?>
              </div>
              
              <label for="ov1" class="col-sm-3 control-label">เลข อว(ขอเปิดรายวิชา)*</label>
                  <div class="col-sm-2">
                      <input type="text" name="s_ov2" class="form-control" maxlength="4" required placeholder="Enter OV2">
                  </div>

                  <?php 
     $select_stmt = $db->prepare("SELECT * from department  ");
     $select_stmt->execute();
  
   ?>
           <label for="semeter" class="col-sm-3 control-label">ภาควิชาที่ติดต่อขอเปิด*</label>
            <div class="col-sm-3">
            <select name="s_dapartmentreq" class="form-control"required>
            <option value="" selected="selected" >เลือกภาควิชา</option>
            <?php while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $row["nameDepartment"] ?>"><?php echo $row["nameDepartment"] ?></option>
                <?php } ?>
            </select>
            </div>
        
   

        
              <label for="ov1" class="col-sm-3 control-label">วันที่สร้างบันทึกข้อความ*</label>
                  <div class="col-sm-3">
                      <input type="date" name="s_date2" class="form-control" required  value="<?php echo date('d-m-Y',strtotime($data["congestart"])) ?>" >
                      
                  </div>


              <br>
              <div class="col-sm-2 mt-1">
                  <input type="submit" name="submit_previewopen" class="btn btn-primary" style="width:100%" value="ยืนยัน">
              </div>

              </form>

              <br>
              <a href="previewopen0.php" class="btn btn-danger ml-3">ย้อนกลับ</a>
      
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>