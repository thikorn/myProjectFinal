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
    <title>รายวิชาที่บันทึกเข้าสู่ระบบ</title>

    
  

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

   <h1>รายวิชาที่บันทึกเข้าสู่ระบบ</h1>
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
    <th>อาจารย์ผู้สอน</th>
    <th>ชื่อวิชา</th>
    <th>จำนวนนิสิต</th>
    <th>สถานะ</th>
    <th>แก้ไช</th>
    
  </tr>
  
  <?php 
//ดึงข้อมูลจากตาราง subject
        $select_stmt = $db->prepare("SELECT * from subject WHERE check1<=4 ORDER BY savedtime DESC ");
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
        <th> <?php echo $row["Totalnisit"]?> </th>
        <th> <?php if($row["check1"]==0){ 
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเจ้าหน้าที่บัญชีฯตรวจสอบ </i> '; 
            }else if($row["check1"]==1){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอเลขาฯตรวจสอบ </i> ';
            }else if($row["check1"]==2){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอกรรมการฯตรวจสอบ </i> ';
            }else if($row["check1"]==3){
                echo $alert='<i style="color:DarkGoldenRod;font-family:calibri;"> รอประธานตรวจสอบ </i> ';
            }else if($row["check1"]==4){
                echo $alert='<i style="color:DarkGreen;font-family:calibri;"> อนุมัติ </i> ';
            }else if($row["check1"]==-1){
                 ?>
               <a href="checkrejected.php?update_ids=<?php echo $row["ids"];?>&nameback=addsubject1.php&check=check1&checksuccess=0" class="btn btn-warning">ทบทวน</a><?php
            }?>
            </th> 

            <th> <?php if($row['check1']==4){
                echo "ไม่สามารถแก้ไขได้";
            }else { ?>
                <a href="edit.php?check_ids=<?php echo $row["ids"];?>&nameback=addsubject1.php" class ="btn btn-warning" target ="_blank">แก้ไข</a> 
           <?php }?>
           </th>
           
            
                                        
    
          </tr>
      
        
        <?php  $i++; } ?>
</table>

<?php 
          if($row_count == 0){ ?>
             
              <p  class="alert alert-secondary width" role="alert">ไม่มีวิชาที่ต้องตรวจสอบ</p>
        <?php
          }
          ?>
          
                </form>

                <br>
                <a href="savesub_home.php" class="btn btn-danger">ย้อนกลับ</a>
          
      
     
  
</div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>