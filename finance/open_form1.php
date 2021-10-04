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
    <title>ตรวจสอบบันทึกข้อความขอเปิดรายวิชา</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
 
<h1>บันทึกข้อความขอเปิดรายวิชา</h1>
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

<table style="width:100%" class="table  table-bordered">
<thead class="thead-light">

  <tr>
    <th>ลำดับที่</th>
    <th>รหัสวิชา</th>
    <th>อาจารย์ผู้สอน</th>
    <th>ชื่อวิชา</th>
    <th>จำนวนนิสิต</th>
    <th>สถานะ</th>
    <th>แก้ไข</th>
    <th>แบบฟอร์ม</th>
  </tr>
  </thead>
  <?php 
//ดึงข้อมูลจากตาราง subject
        $select_stmt = $db->prepare("SELECT * from subject WHERE check2>0  OR check2=-1");
        $select_stmt->execute();
        $i = 1;   
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
        
          <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["Totalnisit"]?> </th>
        <th> <?php if($row["check2"]==1){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> '; 
            }else if($row["check2"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานฯตรวจสอบ </i> ';
            }else if($row["check2"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รออาจารย์ยืนยัน </i> ';
            }else if($row["check2"]==4){
                echo $alert='<i style="color:Darkgreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check2"]==-1){
                ?>
                <a href="checkrejected.php?update_ids=<?php echo $row["ids"];?>&nameback=open_form1.php&check=check2&checksuccess=1" class="btn btn-warning">ทบทวน</a><?php
             }?>
             </th> 
             
             <th>
              <?php if($row['check2']==4){
                echo "ไม่สามารถแก้ไขได้";
            }else { ?>
                 <a href="edit.php?check_ids=<?php echo $row["ids"];?>&nameback=open_form1.php" class ="btn btn-warning" target ="_blank">แก้ไข</a>
           <?php }?>
           </th>   
           
       
        
                      
        <th> <a href="open_form1_db.php?check_ids=<?php echo $row["ids"];?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
        
         
             
        
      
      </th>
          </tr>
      
        
        <?php  $i++; } ?>
    
</table>

          
                </form>

                <br>
                <a href="previewopen0.php" class="btn btn-danger">ย้อนกลับ</a>

     
  
</div>
 </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>