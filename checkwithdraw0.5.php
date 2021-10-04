
    <?php
    session_start();
    require_once 'connection.php';
    $idT=$_SESSION['idT'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกข้อความขอเบิกค่าตอบแทน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>ตรวจสอบบันทึกข้อความขอเบิกค่าตอบแทน</h1>
          
          <hr>
          
          <style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

<table style="width:100%">

  <tr>
    <th>รหัสวิชา</th>
    <th>ชื่อวิชา</th>
    <th>อาจารย์ผู้สอน</th>
    <th>สถานะ</th>
    <th>ปุ่ม</th>
    
    
  </tr>       
      
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
     
   
    
              <?php 
                  $check5 = $_SESSION['check5'];
                  $select_stmt = $db->prepare("SELECT * from finance WHERE check51 = $check5 AND idteacher = $idT  ");
                  $select_stmt->execute();
                  $row_count = $select_stmt->rowCount();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      <?php 
                              $realcheck = "check51";   
                      ?>
                      <tr>
                <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <th> <?php echo $row["nameTeacher"]?> </th>
                <th>การเบิกครัั้งที่ 1</th>
                <th> <a href="checkwithdraw1_db.php?check_id=<?php echo $row["ids"];?>&realcheck=<?php echo $realcheck;?>" class ="btn btn-primary">ตรวจสอบ</a></th>
                </tr>   
                    
                  <?php } ?>


                 
                  <?php 
                  $check5 = $_SESSION['check5'];
                  $select_stmt = $db->prepare("SELECT * from finance WHERE check52 = $check5 AND idteacher = $idT   ");
                  $select_stmt->execute();
                  $row_count2 = $select_stmt->rowCount();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      <?php 
                              $realcheck = "check52";
                      ?>
                      <tr>
                         <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <th> <?php echo $row["nameTeacher"]?> </th>
                <th>การเบิกครัั้งที่ 2</th>
                <th> <a href="checkwithdraw1_db.php?check_id=<?php echo $row["ids"];?>&realcheck=<?php echo $realcheck;?>" class ="btn btn-primary">ตรวจสอบ</a></th>
                </tr>   
                    
                  <?php } ?>
   

                  <?php 
                  $check5 = $_SESSION['check5'];
                  $select_stmt = $db->prepare("SELECT * from finance WHERE check53 = $check5 AND idteacher = $idT  ");
                  $select_stmt->execute();
                  $row_count3 = $select_stmt->rowCount();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      <?php 
                              $realcheck = "check53";   
                      ?>
                      <tr>
                  <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <th> <?php echo $row["nameTeacher"]?> </th>
                <th>การเบิกครัั้งที่ 3</th>
                <th> <a href="checkwithdraw1_db.php?check_id=<?php echo $row["ids"];?>&realcheck=<?php echo $realcheck;?>" class ="btn btn-primary">ตรวจสอบ</a></th>
                </tr>   
              <?php } ?>


               
                  <?php 
                  $check5 = $_SESSION['check5'];
                  $select_stmt = $db->prepare("SELECT * from finance WHERE check54 = $check5 AND idteacher = $idT   ");
                  $select_stmt->execute();
                  $row_count4 = $select_stmt->rowCount();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      <?php 

                              $realcheck = "check54";     
                      ?>
                      <tr>
                     <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <th> <?php echo $row["nameTeacher"]?> </th>
                <th>การเบิกครัั้งที่ 4</th>
                <th> <a href="checkwithdraw1_db.php?check_id=<?php echo $row["ids"];?>&realcheck=<?php echo $realcheck;?>" class ="btn btn-primary">ตรวจสอบ</a></th>
                </tr>   
        <?php }?>


                 
                  <?php 
                  $check5 = $_SESSION['check5'];
                  $select_stmt = $db->prepare("SELECT * from finance WHERE check55 = $check5 AND idteacher = $idT  ");
                  $select_stmt->execute();
                  $row_count5 = $select_stmt->rowCount();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      <?php 
                              $realcheck = "check55"; 
                      ?>
                      <br>
                      <tr>
                      <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <th> <?php echo $row["nameTeacher"]?> </th>
                <th>การเบิกครัั้งที่ 5</th>
                <th> <a href="checkwithdraw1_db.php?check_id=<?php echo $row["ids"];?>&realcheck=<?php echo $realcheck;?>" class ="btn btn-primary">ตรวจสอบ</a></th>
                </tr>   
        <?php } ?>
             
             </table>         
                     
                      <?php if($row_count == 0 AND $row_count2 == 0 AND $row_count3 == 0 AND $row_count4 == 0 AND $row_count5 == 0){ ?> 
        <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่จะต้องตรวจ</p>
    <?php  } ?>


                      <a href="<?php echo $_SESSION['returnpersonal'];?>"style="width:20%" class="btn btn-danger">ย้อนกลับ</a>
                        
              </form>
     
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>