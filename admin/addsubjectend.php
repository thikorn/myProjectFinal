<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลบ/บันทึกวิชาที่สอนเสร็จแล้ว</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>
<style>
table {
    width: 100%
}
table,th,td {
    border: 1px solid black;
    border-collapse:collapse;
}
th, td {
    padding: 13px;
}
</style>

<body>
<?php include('decorate_admin_home.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>ลบ/บันทึกวิชาที่สอนเสร็จแล้ว</h1>

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

 <form action="addyearcourse_db.php" method="post">
 <h2>วิชาที่อยู่ในเทอมนี้</h2>
 <table>
           
   <tr>
        <th>รหัสวิชา</th>
        <th>ชื่อวิชา</th>
        <th>จำนวนเงินคงเหลือ</th>
        <th>ปุ่ม</th>
    </tr>
    <tr>
    <?php 
     $select_stmt = $db->prepare("SELECT * from finance   ");
     $select_stmt->execute();
     while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <th><?php echo $row['ids'] ?></th>
        <th><?php echo $row['nameSubject'] ?></th>
<?php 
   $amountlecreal = $row["amountlecreal"];
   $amountlabreal = $row["amountlabreal"];
   $amountwithreal = $amountlecreal + $amountlabreal;
?>
    <th><?php echo $amountwithreal ?></th>
        <th><a href="addsubjectend_db.php?ids=<?php echo $row["ids"]; ?>" class="btn btn-primary">ลบ/บันทึก</a></th>
        </tr>
        <?php } ?>

   
</table>
<br>
<h2>วิชาที่สอนเสร็จและบันทึกในระบบแล้ว</h2>
<table>
           
   <tr>
        <th>รหัสวิชา</th>
        <th>ชื่อวิชา</th>
        <th>ภาคการศึกษา</th>
        <th>ปีการศึกษา</th>
      
    </tr>

    <?php 
     $select_stmt1 = $db->prepare("SELECT * from subjectall   ");
     $select_stmt1->execute();
     while($row1 = $select_stmt1->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <tr>
    <th><?php echo $row1['ids'] ?></th>
    <th><?php echo $row1['nameSubject'] ?></th>
    <th><?php echo $row1['semester'] ?></th>
    <th><?php echo $row1['yearSubject'] ?></th>
    </tr>
     
    <?php } ?>
    </table>
<div class="col-sm-3 mt-4">
           
            <a href="admin_home.php"style="width:80%" class="btn btn-danger">ย้อนกลับ</a>

</div>
</form>


    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>