<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างบันทึกข้อความขอสอนชดเชยบรรยาย</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>สร้างบันทึกข้อความขอสอนชดเชย (บรรยาย) </h1>
              
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

    
    
    
              <h3>วิชาที่ต้องการสร้างคือ วิชา<?php echo $_SESSION['subname'];?> </h3>
             
            
            <form action="createcomp2_db.php?check_id=<?php echo $_SESSION['txt_ids'];?>" method="post">
            
                 
                        <?php 
                           $nameback = $_REQUEST['nameback'];
                           $_SESSION['nameback'] = $_REQUEST['nameback'];
                           $_SESSION['numberhour'] = $_REQUEST['check_hour'];
                           $numberhour = $_REQUEST['check_hour'];
                           $subname=$_SESSION['subname'];
                           $stmt = $db->prepare("SELECT * from teaching_information where nameSubject = :usubname AND numberhour = :unumberhour");
                           $stmt->bindParam(":usubname", $subname);
                           $stmt->bindParam(":unumberhour", $numberhour);
                           $stmt->execute();
                           $resultarray=$stmt->fetchAll();
                           for($i=0;$i<count($resultarray);$i++) {
                            $_SESSION['dateo']=$resultarray[$i]["date"];
                            $_SESSION['timeo1']=$resultarray[$i]["time1"];
                            $_SESSION['timeo11']=$resultarray[$i]["time11"];
                  
                          }
                        ?>
    
    
                    
                       
                               
                            <div class="form-group">
                                <label for="type" class="col-sm-4 control-label mt-2">เลือกวันที่ต้องการสอนชด คือ วันที่ <?php echo $_SESSION['dateo'];?></label>          
                            </div>
            
           
                <div class="row">
                    <label for="s_time3" class="col-ss-3 ml-5 ">ตั้งแต่ <?php echo $_SESSION['timeo1'];?></label>
                        
                    <label for="s_time33" class="col-ss-3 ml-5">ถึง <?php echo $_SESSION['timeo11'];?></label>       
                </div>
                
                <?php 
                  $timeo1 = $_SESSION['timeo1'];
                  $timeo11 = $_SESSION['timeo11'];
                  $current_date_time_sec=strtotime($timeo1);
                  $future_date_time_sec=strtotime($timeo11);
         
                  $difference=$future_date_time_sec-$current_date_time_sec;
                  $hours=($difference / 3600);
                  $minutes=($difference / 60 % 60);
                 
                  $formattimeo = sprintf("%02d",$hours).":".sprintf("%02d",$minutes);
                  $_SESSION['formattimeo'] = $formattimeo;
                ?>

                 <label for="s_time3" class="col-ss-3 ml-3 ">รวมเวลาที่สอน <?php echo $formattimeo?></label>


            <div class="form-group">
            <label for="ov1" class="col-sm-3 control-label">วันที่สอนชด</label>
                        <div class="col-sm-3">
                            <input type="date" name="s_daten" class="form-control" required  value="<?php echo date('d-m-Y',strtotime($data["congestart"])) ?>" >
                            
                        </div>
            </div>
                <div class="row">
                    <label for="s_time3" class="col-ss-3 ml-5 ">ตั้งแต่*</label>
                        <div class="col-sm-2">
                            <input type="time" name="s_timen1" class="form-control" placeholder="Enter time">
                        </div>
                    <label for="s_time33" class="col-ss-3 ml-5">ถึง*</label>
                          <div class="col-sm-2">
                            <input type="time" name="s_timen11" class="form-control" placeholder="Enter time">
                        </div>
                </div>
               
               
    
    
    
    
                  <input type="submit" name="submit_createcomp2"class="btn btn-primary" value="สร้าง">
                </form> 
             
                
                <br>
                <a href="<?php echo $nameback ?>" class="btn btn-danger">ย้อนกลับ</a>
           
        </div>
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>