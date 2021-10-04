<?php include('../connection.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Form1</title>

    
  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
    <div class=" mt-5">
        <div class="container">
        
            
                <h1>บันทึกข้อความขอเปิดรายวิชา</h1>
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
    <th>ลำดับที่</th>
    <th>เลข อว</th>
    <th>อาจารย์ผู้สอน</th>
    <th>ชื่อวิชา</th>
    <th>จำนวนนิสิต</th>
    <th>สถานะ</th>
    <th>แบบฟอร์ม</th>
    <th>แก้ไข</th>
  </tr>
  
  <?php 
//ดึงข้อมูลจากตาราง subject
        $select_stmt = $db->prepare("SELECT * from subject");
        $select_stmt->execute();
        $i = 1;   
         
        while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          ?> 
        
          <tr>
        <th> <?php echo $i?> </th>
        <th> <?php echo $row["numberOv2"]?> </th>
        <th> <?php echo $row["nameTeacher"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <th> <?php echo $row["numberOfStudents"]?> </th>
        <th></th>                             
        <th> <a href="open_form1_db.php?check_ids=<?php echo $row["ids"];?>" class ="btn btn-primary" target ="_blank">PDF</a> </th>
        <th><a href="edit.php?update_ids=<?php echo $row["ids"]; ?>" class="btn btn-warning">Edit</a></th>
          </tr>
      
        
        <?php  $i++; } ?>
</table>

                <div class="col-sm-2 mt-1">
                    <input type="submit" name="submit_previewopen" class="btn btn-primary" style="width:100%" value="ยืนยัน">
                </div>

                </form>

                <br>
                <a href="previewopen0.php" class="btn btn-danger">ย้อนกลับ</a>
          
        </div>
    </div>

</body>
</html>