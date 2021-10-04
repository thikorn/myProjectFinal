<?php
    session_start();
    require_once('../connection.php');


if(isset($_REQUEST['delete_id'])){
    $id = $_REQUEST['delete_id'];
    $delete_stmt = $db->prepare('DELETE from department where id = :id');
    $delete_stmt -> bindParam(':id' , $id);
    $delete_stmt -> execute();

    header("Location: department.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่ม / แก้ไขภาควิชา</title>

    
  

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

    <h1>เพิ่ม/แก้ไข ภาควิชา</h1>

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

 <form action="department_db.php" method="post">
 
 <table>
           
   <tr>
        <th>ลำดับที่</th>
        <th>ชื่อภาควิชา</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    <tr>
    <?php 
     $select_stmt = $db->prepare("SELECT * from department  ");
     $select_stmt->execute();
     $i = 1;
     while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <th><?php echo $i ?></th>
        <th><?php echo $row['nameDepartment'] ?></th>

        <th><a href="editdepartment.php?department_id=<?php echo $row["id"]; ?>" class="btn btn-warning">แก้ไข</a></th>
        
        <th><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">ลบ</a></th>
        </tr>
        
        <?php $i++; } ?>

   
</table>
<label for="semeter" class="col-sm-3 control-label mt-2">ชื่อภาควิชา*</label>
            <div class="col-sm-3">
            <th><input type="text" name="s_nameDepartment" placeholder = "Enter department"   class="form-control" required ></th>
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