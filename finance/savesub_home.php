<?php
    session_start();
    if(!isset($_SESSION['finance_login'])) {
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกวิชาเข้าสู่ระบบ</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


<link rel="stylesheet" type="text/css" href="savesub_test.css">
    <div style="margin-left:28%;height:1000px;padding-top:2%">
   

   <div class="container">

   <h1>บันทึกวิชาเข้าสู่ระบบ</h1>
              
              <hr>
             
        

        
          <form action="addsubject_db.php" method="post">
          <button type="submit" name="add_subject" style="width:280px" class="btn btn-primary" >บันทึกข้อมูลรายวิชาเข้าสู่ระบบ</button>
          </form>
          <br>
          <form action="../savesub_db.php" method="post">
          <button type="submit" name="submit_savesubf"style="width:280px" class="btn btn-primary" >ตรวจสอบรายวิชาที่บันทึกเข้าสู่ระบบ</button>
          </form>
          <br>
          <form action="addsubject1.php" method="post">
          <button type="submit" name="submit_savesubf"style="width:280px" class="btn btn-primary" >รายวิชาที่เข้าสู่ระบบ</button>
          </form>
          <br>
          <form action="tablefee.php" method="post">
          <button type="submit" name="submit_modifysubject"style="width:280px" class="btn btn-primary" >ตารางประมาณการค่าสอน</button>
          </form>
          <br>
          <form action="search.php" method="post">
          <button type="submit" name="submit_search"style="width:280px" class="btn btn-primary" >ค้นหาวิชาที่เปิดอยู่</button>
          </form>
          <br>
          <form action="search2.php" method="post">
          <button type="submit" name="submit_search2"style="width:280px" class="btn btn-primary" >ค้นหาวิชาที่ถูกเปิดไปแล้ว</button>
          </form>
          <br>
        
          <a href="finance_home.php" style="width:20%"class="btn btn-danger" >ย้อนกลับ</a>
      
     
   </div>
</div>
</div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>



</body>
</html>