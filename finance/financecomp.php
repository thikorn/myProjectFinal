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
    <title>สร้างบันทึกข้อความขอสอนชดเชย</title>

    
  

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
<h1>กรอกบันทึกข้อความขอสอนชดเชย</h1>
          
          <hr>
          <h5>รายชื่อวิชาที่สามารถสร้างได้</h5> 
     <br>
          
      
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
     
   <p>Lecture</p>

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
    <th>วันที่สอนชดเชย</th>
    <th>สถานะ</th>
    <th>ปุ่ม</th>
   
  </tr>
  </thead>
              
              <?php 
                 
                 $select_stmt = $db->prepare("SELECT * from teaching_information WHERE check4 >= 1  ORDER BY check4");
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
        <th> <?php echo $row["daten"]?> </th>
        <th> <?php 
        $check4 = $row["check4"];
        if($check4==1){
            $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> ยังไม่ถูกสร้าง </i> '; 
        }else {$alert = $alert='<i style="color:Darkgreen;font-family:calibri;"> ถูกสร้างแล้ว</i> ';}
        echo $alert;
        ?> </th>
        
        <th> 
        <?php if($row["check4"]>1){
            echo " - ";
        }else { ?>
            <a href="financecomp_db.php?check_id=<?php echo $row["ids"];?>&check_idteaching=<?php echo $row["id"];?>&nameleclab=lec" class ="btn btn-primary">สร้าง</a>
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
      <p>Lab</p>

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
    <th>วันที่สอนชดเชย</th>
    <th>สถานะ</th>
    <th>ปุ่ม</th>
   
  </tr>
  </thead>
      
      <?php 
                 
                 $select_stmt = $db->prepare("SELECT * from teaching_informationlab WHERE check4lab >= 1 ORDER BY check4lab");
                 $select_stmt->execute();
                 $row_count1 = $select_stmt->rowCount();
                 $p = 1;
                 while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                      
                      <tr>
        <th> <?php echo $p?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["datenlab"]?> </th>
        <th> <?php 
        $check4 = $row["check4lab"];
        if($check4==1){
            $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> ยังไม่ถูกสร้าง </i> '; 
        }else {$alert = $alert='<i style="color:Darkgreen;font-family:calibri;"> ถูกสร้างแล้ว</i> ';}
        echo $alert;
        ?> </th>

        <th> 
        <?php if($row["check4lab"]>1){

            echo " - ";
        }else { ?>
           <a href="financecomp_db.php?check_id=<?php echo $row["ids"];?>&check_idteachinglab=<?php echo $row["id"];?>&nameleclab=lab" class ="btn btn-primary">สร้าง</a>
        <?php } ?>
         </th>
          
      
                     
        </tr>

                  <?php $p++; } ?>

    </table>    
                  <?php 
          if($row_count1 == 0){ ?>
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่จะต้องสร้างบันทึกข้อความ</p>
        <?php
          }
          ?>     

          <br>
                  <form action="financecomp3.php" method="post">
      <button type="submit" name="submit_createreveal" class="btn btn-primary" >ฟอร์มขอสอนชดเชย</button>
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