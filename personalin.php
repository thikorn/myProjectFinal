<?php
    session_start();
    require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Page</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
   

   <div class="container">

       
           <h1>ข้อมูลส่วนตัว</h1>
           <?php $id = $_SESSION['id']; ?>
           <a href="edit_personalin.php?member_id=<?php echo $id; ?>" class="btn btn-light">แก้ไขข้อมูลส่วนตัว</a>
         
           <hr>
       <h3>
         
           <?php  $email = $_SESSION['email'];


$stmt = $db->prepare("SELECT * from member where id = :uid ");
$stmt->bindParam(":uid", $id);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
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
                         ชื่อบัญชี <?php     echo $row['username'];?><br>
                          ชื่อ : <?php   echo $row['firstname'];?><br>
                          นามสกุล : <?php    echo $row['lastname'];?><br>
                          วุฒิ : <?php   echo $row['qualification'];?><br>
                          สังกัด : <?php   echo $row['affiliation'];?><br>
                          ตำแหน่ง : <?php    echo $row['position'];?><br>
                          หน้าที่: <?php  
                          $role =  $row['role'];
                          if($role == "finance"){
                              $role = "เจ้าหน้าที่การเงินและบัญชี";
                          }else if($role == "teacher"){
                            $role = "อาจารย์";
                        }else if($role == "secretary"){
                            $role = "เลขานุการคณะกรรมการดำเนินงาน";
                        }else if($role == "president"){
                            $role = "ประธานคณะกรรมการดำเนินงาน";
                        }else if($role == "board"){
                            $role = "กรรมการตรวจสอบ";
                        }
                        echo $role;
                          ?>
                     
                          <br>   
                          <?php } ?>                            
       </h3>

     
       <a href="<?php echo $_SESSION['returnpersonal'] ?>" class="btn btn-danger">ย้อนกลับ</a>
      
     
   </div>
</div>
</div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>