<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขตำแหน่งบุคลากร</title>

    
  

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

    <h1>แก้ไขตำแหน่งบุคลากร</h1>
              
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
        <th>ชื่อ - นามสกุล</th>
        <th>ตำแหน่ง</th>
        <th>ปุ่ม</th>
    </tr>
    <tr>
    <?php 
     $select_stmt = $db->prepare("SELECT * from member where role != 'admin'  ");
     $select_stmt->bindParam(":uids", $ids);
     $select_stmt->execute();
     while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <th><?php echo $row['firstname'] ?>  <?php echo $row['lastname'] ?> </th>
        <?php 
          $role_arr=array(
            "finance"=>"เจ้าหน้าที่การเงินและบัญชี",
            "secretary"=>"เลขานุการคณะกรรมการ",
            "board"=>"กรรมการตรวจสอบ",
            "president"=>"ประธานคณะกรรมการ",
            "teacher"=>"อาจารย์",
           );
        $role = $row['role'];
        ?>
        <th><?php echo $role_arr[$role] ?></th>
        <th><a href="editrole2.php?member_id=<?php echo $row["id"]; ?>" class="btn btn-warning">แก้ไข</a></th>
        
        </tr>
        <?php } ?>

   
</table>


<div class="col-sm-3 mt-4">
            
            <a href="admin_home.php"style="width:80%;" class="btn btn-danger">ย้อนกลับ</a>

</div>

    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>