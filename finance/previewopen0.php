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
    <title>สร้างบันทึกข้อความขอเปิดรายวิชา</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
   <div class="container">

   <h1>สร้างบันทึกข้อความขอเปิดรายวิชา</h1>
              
              <hr>
    <h5>รายชื่อวิชาที่สามารถสร้างได้</h5> 
      <br>
      <style>

td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>

<table style="width:100%" class=" table-bordered">
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
                     
                     
                      $select_stmt = $db->prepare("SELECT * from subject WHERE check1 = 4 AND numberOv2 IS NULL     ");
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
        <th> 
        <?php if($row["check2"]>1){

            echo " - ";
        }else { ?>
     
           <a href="previewopen_db.php?check_id=<?php echo $row["ids"]; ?>" class ="btn btn-primary">สร้าง</a>
        <?php } ?>
         </th>
      
                     
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
              <form action="open_form1.php" method="post">
          <button type="submit" name="submit_previewopen" class="btn btn-primary" >ฟอร์มขอเปิดรายวิชา</button>
          </form>
          
              </form>

              <br>
              <a href="finance_home.php" class="btn btn-danger">ย้อนกลับ</a>
     
  
</div>   
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>
