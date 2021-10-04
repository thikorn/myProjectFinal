<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกการสอน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
    <style>
td, th, tr { 
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

</style>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>รายวิชาที่บันทึกเข้าสู่ระบบสำเร็จ </h1>
          
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
     

<table style="width:100%">
  <tr>
    <th>รหัสวิชา</th>
    <th>ชื่อวิชา</th>
    <th>จำนวนครั้งที่สอนต่อสัปดาห์</th>
    <th>หมู่</th>
    <th>ปุ่ม</th>
  </tr>
      
              <?php 
      
             $idT=$_SESSION['idT'];
       
              $stmt = $db->prepare("SELECT * FROM subject  WHERE  check3=4 AND idteacher = $idT ");
             
              $stmt->execute();
              $row_count = $stmt->rowCount();
           
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                  if($row["datelab1"]==null and $row["date1"]!=null){
                      $nameleclab = "มีแค่lec";
                  }else if ($row["date1"]==null and $row["datelab1"]!=null){
                      $nameleclab = "มีแค่lab";
                  }else {
                    $nameleclab = "มีทั้งleclab";
                  }
              ?>
          
        <?php if($nameleclab == "มีแค่lec"){ ?>
        <tr>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <?php 
        if($row["date1"]!="" ){
            $numdatelec = 1;
        }if($row["date2"]!=""){
            $numdatelec = 2;
        } if($row["date3"]!=""){
            $numdatelec = 3;
        }
        ?>
        <th> <?php echo $numdatelec?> </th>
        <th> Lecture </th>
        <th><a href="addhour_db.php?check_id=<?php echo $row["ids"];?>&check_numdate=<?php echo $numdatelec ?>" class ="btn btn-primary">บันทึก</a>  </th>
        </tr>   
        <?php  } ?>
       
        <?php if ($nameleclab == "มีแค่lab"){  ?> 
                
                <tr>
                <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <?php 
        if($row["datelab1"]!="" ){
            $numdatelab = 1;
        }if($row["datelab2"]!=""){
            $numdatelab = 2;
        } if($row["datelab3"]!=""){
            $numdatelab = 3;
        }
        ?>
        <th> <?php echo $numdatelab?> </th>
                <th> Lab </th>
                <th><a href="addhourlab_db.php?check_id=<?php echo $row["ids"]; ?>&check_numdate=<?php echo $numdatelab ?>" class ="btn btn-primary">บันทึก</a> </th>
                </tr>   
                       
        <?php  } ?>      

        <?php if($nameleclab == "มีทั้งleclab"){ ?>
        <tr>
        <th> <?php echo $row["ids"]?> </th>
        <th> <?php echo $row["nameSubject"]?> </th>
        <?php 
        if($row["date1"]!="" ){
            $numdatelec = 1;
        }if($row["date2"]!=""){
            $numdatelec = 2;
        } if($row["date3"]!=""){
            $numdatelec = 3;
        }
        ?>
        <th> <?php echo $numdatelec?> </th>
        <th> Lecture </th>
        <th><a href="addhour_db.php?check_id=<?php echo $row["ids"];?>&check_numdate=<?php echo $numdatelec ?>" class ="btn btn-primary">บันทึก</a>  </th>
        </tr>

        <tr>
                <th> <?php echo $row["ids"]?> </th>
                <th> <?php echo $row["nameSubject"]?> </th>
                <?php 
        if($row["datelab1"]!="" ){
            $numdatelab = 1;
        }if($row["datelab2"]!=""){
            $numdatelab = 2;
        } if($row["datelab3"]!=""){
            $numdatelab = 3;
        }
        ?>
        <th> <?php echo $numdatelab?> </th>
                <th> Lab </th>
                <th><a href="addhourlab_db.php?check_id=<?php echo $row["ids"]; ?>&check_numdate=<?php echo $numdatelab ?>" class ="btn btn-primary">บันทึก</a> </th>
                </tr>   
        <?php  } ?>              
             
      <br>
     
      <?php } ?>
      </table>
      <?php 
          if($row_count == 0){ ?>
         
              <p  class="alert alert-secondary width" role="alert">ยังไม่มีวิชาที่จะต้องบันทึกการสอน</p>
        <?php
          }
          ?>
      <br>

      <form action="report_form1.php" method="post">
            <button type="submit" name="submit_createopent" class="btn btn-primary" >ฟอร์มรายงานการสอนประจำเดือน/บรรยาย</button>
            </form> 
            
            <br>
            <form action="report_form3.php" method="post">
            <button type="submit" name="submit_createopent" class="btn btn-primary" >ฟอร์มรายงานการสอนประจำเดือน/ปฏิบัติ</button>
            </form> 

                
                    <br>
                      <a href="teacher_home.php"style="width:20%" class="btn btn-danger">ย้อนกลับ</a>
                  </div>
                 
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