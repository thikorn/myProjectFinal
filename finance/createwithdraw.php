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
          <h5>รายชื่อวิชาที่สามารถสร้างได้</h5> 
     <br>
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

<style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

<table style="width:100%" class="  table-bordered">
<thead class="thead-light">

  <tr>
    <th>ลำดับที่</th>
    <th>รหัสวิชา</th>
    <th>ชื่อวิชา</th>
    <th>ชื่ออาจารย์</th>
    <th>ปุ่ม</th>
   
  </tr>
  </thead>  

              <?php 
                 
                 $select_stmt = $db->prepare("SELECT * from finance WHERE check3=4 AND (check51 = 0 OR check52 = 0 OR check53 = 0 OR check54 = 0 OR check55 = 0)");
                 $select_stmt->execute();
                 $row_count = $select_stmt->rowCount();
                 $i = 1;  
                 while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  
                     
                     
                      <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <a href="createwithdraw_db.php?check_id=<?php echo $row["ids"]; ?>" class ="btn btn-primary">สร้าง</a></th>
      
                     
                     </tr>

                  <?php $i++; } ?>

                  </table>
        
                
                
                  
                  <?php 
          if($row_count == 0){ ?>
           
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่จะต้องสร้างบันทึกข้อความ</p>
        <?php
          }
          ?>    

          
            <br>
            <form action="createwithdraw3.php" method="post">
            <button style="width:250px" type="submit"  name="submit_createreveal" class="btn btn-primary" >แบบฟอร์มขอเบิกค่าตอบแทน</button>
            </form>
            <br>
                     
            <form action="createwithdraw5.php" method="post">
            <button style="width:250px" type="submit" name="submit_createreveal" class="btn btn-primary" >แบบฟอร์มใบเบิกเงินค่าสอน</button>
            </form>
            <br>
                     
            <form action="createwithdraw7.php" method="post">
            <button  style="width:250px" type="submit" name="submit_createreveal" class="btn btn-primary" >หลักฐานการเบิกจ่ายเงินค่าสอน</button>
            </form>
            <br>
              
            <form action="report.php" method="post">
            <button  style="width:250px" type="submit" name="submit_report" class="btn btn-primary" >ตารางบันทึกการสอน</button>
            </form>
            <br>

            <form action="schedule1.php" method="post">
            <button  style="width:250px" type="submit" name="submit_report" class="btn btn-primary" >ตารางสอนแต่ละรายวิชา</button>
            </form>
            <br>
                    
            <a href="finance_home.php"style="width:20%" class="btn btn-danger">ย้อนกลับ</a>
                 

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>