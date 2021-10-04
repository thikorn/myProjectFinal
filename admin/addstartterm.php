<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกวันแรกของเทอม</title>

    
  

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

    <h1>บันทึกวันแรกของเทอม</h1>

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

 <form action="addstartterm_db.php" method="post">
 
 <table>
           
   <tr>
        <th>ปีการศึกษา</th>
        <th>ภาคการศึกษา</th>
        <th>วันที่เริ่มสอน</th>
        <th>ปุ่ม</th>
    </tr>
    <tr>
    <?php 
     $select_stmt = $db->prepare("SELECT * from startdateterm ORDER BY yearSubject desc ");
     $select_stmt->bindParam(":uids", $ids);
     $select_stmt->execute();
     while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <th><?php echo $row['yearSubject'] ?></th>
        <th><?php echo $row['semester'] ?></th>
        <th><?php echo $row['startdateterm'] ?></th>
        <th><a href="editstartterm.php?startdate_id=<?php echo $row["id"]; ?>" class="btn btn-warning">แก้ไข</a></th>
        
        </tr>
        <?php } ?>

   
</table>
<label for="semeter" class="col-sm-3 control-label mt-2">วันที่เริ่มสอน*</label>
            <div class="col-sm-3">
            <th><input type="date" name="s_startdateterm"   class="form-control" required ></th>
            </div>

            <label for="semeter" class="col-sm-3 control-label mt-2">ภาคการศึกษา*</label>
            <div class="col-sm-2">
            <select name="s_semeter" class="form-control"required>
            <option value="" selected="selected" >เลือกภาค</option>
                <option value="ต้น">ต้น</option>
                <option value="ปลาย">ปลาย</option>
                <option value="ฤดูร้อน">ฤดูร้อน</option>
            </select>
            </div>
     
            <label for="s_year" class="col-sm-3 control-label mt-2">ปีการศึกษา*</label>
            <div class="col-sm-2">
            <select name="s_year" class="form-control" required>
            <option value="" selected="selected" >เลือกปี</option>
            <option value="<?php echo date("Y")+543;?>"> <?php echo date("Y")+543;?></option>
                <option value="<?php echo date("Y")-1+543;?>"> <?php echo date("Y")-1+543;?></option>
                <option value="<?php echo date("Y")-2+543;?>"> <?php echo date("Y")-2+543;?></option>
                <option value="<?php echo date("Y")-3+543;?>"> <?php echo date("Y")-3+543;?></option>
                <option value="<?php echo date("Y")-4+543;?>"> <?php echo date("Y")-4+543;?></option>
                <option value="<?php echo date("Y")-5+543;?>"> <?php echo date("Y")-5+543;?></option>
            </select>
            </div>

<div class="col-sm-3 mt-4">
            <input type="submit" name="btn_addsubject" class="btn btn-primary" style="width:100%" value="บันทึก">
            <br>
            <br>
            <a href="admin_home.php"style="width:80%" class="btn btn-danger">ย้อนกลับ</a>

</div>
</form>


    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>