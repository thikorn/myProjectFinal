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
    <title>ตรวจสอบบันทึกข้อความขอสอนชดเชย</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">

<h1>บันทึกข้อความขอสอนชดเชย </h1>
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
<p> Lecture </p>
<br>

<table style="width:100%">

<tr>
<th>ลำดับที่</th>
<th>รหัสวิชา</th>
<th>อาจารย์ผู้สอน</th>
<th>ชื่อวิชา</th>
<th>วันที่ขอสอนชดเชย</th>
<th>สถานะ</th>
<th>แบบฟอร์ม</th>
</tr>
  <?php 
//ดึงข้อมูลจากตาราง subject
        $select_stmt = $db->prepare("SELECT * from teaching_information WHERE check4>1 OR check4=-1");
        $select_stmt->execute();
        $row_count = $select_stmt->rowCount();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
        
      

        <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["date"]?> </th>
        <th> <?php if($row["check4"]==2){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check4"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check4"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอยืนยันจากอาจารย์ </i> ';
            }else if($row["check4"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check4"]==-1){
                ?>
                <a href="checkrejectedcomplec.php?update_ids=<?php echo $row["ids"];?>&nameback=financecomp3.php&check=check4&checksuccess=2&idteaching=<?php echo $row["id"]?>" class="btn btn-warning">ทบทวน</a><?php
             }?>
             </th>                           
        <th> 
        <a href="financecomp3_db.php?check_ids=<?php echo $row["ids"];?>&numberhour=<?php echo $row["numberhour"] ?>"  class ="btn btn-primary" target ="_blank">PDF</a> </th>
       </th>
          </tr>
      
        
        <?php  $i++; } ?>
</table>
<?php 
                if($row_count == 0){ ?>
                  
                    <p  class="alert alert-secondary width" role="alert">ยังไม่มีบันทึกข้อความ</p>
              <?php
                }
                ?>     
<br>
<p>Lab</p>
<br>
<table style="width:100%">
        <tr>
            <th>ลำดับที่</th>
            <th>รหัสวิชา</th>
            <th>อาจารย์ผู้สอน</th>
            <th>ชื่อวิชา</th>
            <th>วันที่ขอสอนชดเชย</th>
            <th>สถานะ</th>
            <th>แบบฟอร์ม</th>
        </tr>
  
  <?php 
//ดึงข้อมูลจากตาราง subject
        $select_stmt = $db->prepare("SELECT * from teaching_informationlab WHERE check4lab>1 OR check4lab=-1");
        $select_stmt->execute();
        $row_count1 = $select_stmt->rowCount();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
     
          <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["datelab"]?> </th>
        <th> <?php if($row["check4lab"]==2){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check4lab"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check4lab"]==4){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอยืนยันจากอาจารย์ </i> ';
            }else if($row["check4lab"]==5){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check4lab"]==-1){
                ?>
                <a href="checkrejectedcomplab.php?update_ids=<?php echo $row["ids"];?>&nameback=financecomp3.php&check=check4lab&checksuccess=2&idteaching=<?php echo $row["id"]?>" class="btn btn-warning">ทบทวน</a><?php
             }?>
             </th>                           
        <th> 
        <a href="financecomplab3_db.php?check_ids=<?php echo $row["ids"];?>&numberhourlab=<?php echo $row["numberhourlab"];?>"  class ="btn btn-primary" target ="_blank">PDF</a> </th>
       </th>
          </tr>
      
        
        <?php  $i++; } ?>
</table>

                <?php 
                if($row_count1 == 0){ ?>
                  
                    <p  class="alert alert-secondary width" role="alert">ยังไม่มีบันทึกข้อความ</p>
              <?php
                }
                ?>     
                </form>

                <br>
                <a href="financecomp.php" class="btn btn-danger">ย้อนกลับ</a>

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>