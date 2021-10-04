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
    <title>หน้าค้นหา</title>

    
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:400px;height:1000px;padding-top:2%">
   

   <div class="container ">

   <h1>หน้าค้นหา</h1>
   <hr>
  
   <form action="search_db.php" method="post">
 <h3>ต้องการค้นหาตาม</h3>
            <div class="col-sm-4">
            <select name="s_search" style = "margin-top:15px" class="form-control"required>
            <option value="" selected="selected" >เลือกสิ่งที่ต้องการค้นหา</option>
                <option value="ชื่อวิชา">ชื่อวิชา</option>
                <option value="เลข อว.">เลข อว.</option>
                <option value="ภาคการศึกษา">ภาคการศึกษา</option>
                <option value="ปีการศึกษา">ปีการศึกษา</option>
                <option value="รหัสวิชา">รหัสวิชา</option>
            </select>
            </div>
            <br>
            <input type="submit" name="btn_search" style="width:10%;margin-left:18px" class="btn btn-primary" value="ยืนยัน">
            <br>
            <br>

            <a href="savesub_home.php" style="width:10%;margin-left:18px"class="btn btn-danger" >ย้อนกลับ</a>
        </div>

    </form>
    </div>

  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>