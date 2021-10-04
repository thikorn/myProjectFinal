<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบชั่วโมงและค่าตอบแทน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1 class="mt-3">ตรวจสอบชั่วโมงและค่าตอบแทน</h1>
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

        <style>
table {
    width: 100%
}
td, th, tr {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
</style>
</head>

<body>
<table>
            <h3>สวัสดีอาจารย์ <?php echo $_SESSION['firstname'];?></h3>
           
   <tr>
        <th>รหัสวิชา</th>
        <th>ชื่อวิชา</th>
        <th>หมู่บรรยาย</th>
        <th>หมู่ปฏิบัติ</th>
        <th>ชั่วโมงที่่สอนบรรยาย</th>
        <th>ชั่วโมงที่สอนปฏิบัติ</th>
        <th>ค่าตอบแทนบรรยาย</th>
        <th>ค่าตอบแทนปฏิบัติ</th>
       
    </tr>
    <tr>
   
   
   
        

        <?php 
                   
                    $idT =  $_SESSION['idT'];
                    $stmt = $db->prepare("SELECT * from subject where check3 = 4 AND idteacher = $idT ");
                    $stmt->execute();
                    $row_count = $stmt->rowCount();
                    $resultarray=$stmt->fetchAll();
                   
                    
                    for($i=0;$i<count($resultarray);$i++){
                     
                   
                  
        ?>
        <th><?=$resultarray[$i]["ids"]?></th>
        <th><?=$resultarray[$i]["nameSubject"]?></th>
        <th><?=$resultarray[$i]["classLec"]?></th>
        <th><?=$resultarray[$i]["classLab"]?></th>
        <th><?=$resultarray[$i]["hourLec"]?></th>
        <th><?=$resultarray[$i]["hourLab"]?></th>
        <th><?=$resultarray[$i]["hourLec"]*$resultarray[$i]["compensationlec"]?></th>
        <th><?=$resultarray[$i]["hourLab"]*$resultarray[$i]["compensationlab"]?></th>
        
        
      
        </tr>
        <?php } ?>
    
        
   
    
    </table>

    
    <?php 
          if($row_count == 0){ ?>
         
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่สามารถตรวจสอบตารางสอนได้</p>
        <?php
          }
          ?>
       
    


        <div class="form-group">
            <div class="col-sm-12 mt-4">
           
            </div>
 
        <div class="form-group text-center mt-4">
        <a href="teacher_home.php"style="width:20%" class="btn btn-danger">ย้อนกลับ</a>
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>