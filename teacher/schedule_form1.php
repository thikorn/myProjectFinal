<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Page</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>ตรวจสอบตารางสอน</h1>
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

<style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

<table style="width:100%">

  <tr>
    <th>ลำดับที่</th>
    <th>รหัสวิชา</th>
    <th>ชื่อวิชา</th>
    <th>รายเทอม</th>
    <th>รายเดือน</th>

  </tr>
  
  <?php 


        $idT=$_SESSION['idT'];
        $select_stmt = $db->prepare("SELECT * from subject WHERE (check2>0  OR check2=-1) AND idteacher = :uidT ");
        $select_stmt->bindParam(":uidT", $idT);
        $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
        
          <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <a href="schedule_form1_db.php?check_ids=<?php echo $row["ids"];?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
        <th> <a href="schedule_form1_month_db.php?check_ids=<?php echo $row["ids"];?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
             
        
      
      </th>
          </tr>
      
        
        <?php  $i++; } ?>
</table>

<?php 
          if($row_count == 0){ ?>
         
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่สามารถตรวจสอบตารางสอนได้</p>
        <?php
          }
          ?>
                </form>

                <br>
                <a href="teacher_home.php" class="btn btn-danger">ย้อนกลับ</a>
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>