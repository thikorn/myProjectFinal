<?php
    session_start();
    require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกการสอนปฏิบัติ</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1 class="mt-3">บันทึกการสอน</h1>
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
table,th,td {
    border: 1px solid black;
    border-collapse:collapse;
}
th, td {
    padding: 13px;
}
</style>
</head>

<body>
<table>
            <h3>สวัสดีอาจารย์ <?php echo $_SESSION['nameteacher'];?></h3>
            <h3>วิชาที่ต้องการบันทึกคือ <?php echo $_SESSION['code'];?> <?php echo $_SESSION['subname'];?>  </h3>
   <tr>
        <th>ลำดับ</th>
        <th>วัน/เดือน/ปี</th>
        <th>เวลา</th>
        <th>ถึงเวลา</th>
        <th>หัวข้อ</th>
        <th>ห้องเรียน</th>
        <th>หมายเหตุ</th>
       
        <th>รวมเวลาที่สอน</th>
        <th>วันที่(สอนชด)</th>
        <th>เวลา(สอนชด)</th>
        <th>ถึงเวลา(สอนชด)</th>
        <th>ยืนยัน</th>
        <th>แก้ไข</th>
        <th>มีการสอนชดเชย</th>
       
       
     
    </tr>
    <tr>
   
   
   
        

        <?php 
                 $ids = $_SESSION['code'];
               
                   $select_stmt = $db->prepare("SELECT * from teaching_informationlab WHERE ids = :uids ");
                   $select_stmt->bindParam(":uids", $ids);
                   $select_stmt->execute();
                
                   $timetotal = 0;
                   $time1 = 0;
                   $time2 = 0;
                   $time3 = 0;
                 

                   while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                   ?>
         </tr>
         <?php 
            $sth = $db->prepare("SELECT timenlab1 from teaching_informationlab WHERE ids = :uids");
            $sth->bindParam(":uids", $ids);

    
            if(!$sth->execute()) {
                $current_date_time_sec=strtotime($row["timenlab1"]);
                $future_date_time_sec=strtotime($row["timenlab11"]);

                $difference=$future_date_time_sec-$current_date_time_sec;
                $hours=($difference / 3600);

                $minutes=($difference / 60 % 60);
            }else{
                $current_date_time_sec=strtotime($row["timelab1"]);
                $future_date_time_sec=strtotime($row["timelab11"]);
       
                $difference=$future_date_time_sec-$current_date_time_sec;
                $hours=($difference / 3600);
       
                $minutes=($difference / 60 % 60);
         }
  

            
         
         ?>
      
        <th><?php echo $row['numberhourlab'] ?> </th>
        <th><?php echo $row["datelab"]?></th>
        <th><?php echo $row["timelab1"]?></th>
        <th><?php echo $row["timelab11"]?></th>
        <th><?php echo $row["topiclab"] ?></th>
        <th><?php echo $row["classroomlab"]?> </th>
        <th><?php echo $row["notelab"]?></th>
       
       
       
        <th><?php echo sprintf("%02d",$hours).":".sprintf("%02d",$minutes);?> ชั่วโมง</th>
        <th><?php echo $row["datenlab"]?></th>
        <th><?php echo $row["timenlab1"]?></th>
        <th><?php echo $row["timenlab11"]?></th>
        <th>  </th>
       
        <th> <?php if($row["datenlab"]==null){ 
               ?><a href="editaddhourlab.php?update_number=<?php echo $row["numberhourlab"]; ?>" class="btn btn-warning">แก้ไข</a><?php
            }else if($row["datenlab"]!=null){
                echo $alert="ชดเชยไปแล้วไม่สามารถแก้ไขได้";
            }
            ?></th>
        <th> <?php if($row["datenlab"]==null){ 
               ?><a href="createcomplab1.php?check_hour=<?php echo $row["numberhourlab"];?>" class="btn btn-warning">สอนชดเชย</a><?php
            }else if($row["datenlab"]!=null){
                echo $alert="ชดเชยไปแล้ว";
            }

            ?></th>
           
      
        </tr>
        
        <?php
        $timetotal = $timetotal + $hours ; 
        ?>
      
       
        <?php 
       
    $numbern =$row['numberhourlab']; 
     
       
                   }
     
                   if(empty($numbern)){
                    $numbern =0;
                   }
        ?> 
        
   
        <?php
        $stmt = $db->prepare("SELECT * from teaching_informationlab WHERE ids = $ids");
        $stmt->execute();
        $resultarray=$stmt->fetchAll(); 
       

        ?>
        

         <?php for($i=$numbern;$i<15;$i++) { ?>
        </tr>
        <form action="addhourlab1_db.php?check_id=<?php echo $i+1 ?>" method="post">
        <th> <?php echo $i+1 ?> </th>
        <th><input type="date" name="s_date" class="form-control" required placeholder="Enter number"></th>
        <th><input type="time" name="s_time1" class="form-control" required placeholder="Enter number"></th>
        <th><input type="time" name="s_time11" class="form-control" required placeholder="Enter semeter"></th>
        <th><input type="text" name="s_topic" class="form-control" required placeholder="Enter Code" > </th>
        <th><input type="text" name="s_classroom" class="form-control" required placeholder="Enter year students can sign"></th>
        <th><input type="txt" name="s_note" class="form-control"  placeholder="Enter name"></th>
        
       
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th><input type="submit" name="btn_addhour"class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลการสอน"></th>
        </form>
        <th></th>
        <th></th>
       
      
        
        <?php } ?>
        </tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>รวม</th>
        <th><?php echo $timetotal;
        
        $sql = 'UPDATE subject SET Totalhourteachinglab = :Totalhourteachinglab WHERE ids = :id';
        $stmt = $db->prepare($sql);
        $params =[':Totalhourteachinglab'=>$timetotal,':id'=>$ids];
        $stmt->execute($params);
            
            
        ?>ชั่วโมง
        
        
        </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
       
    
        
   
    
    </table>

    

       
    


        <div class="form-group">
            <div class="col-sm-12 mt-4">
           
            </div>
 
        <div class="form-group text-center mt-4">
        <a href="addhour0.php"style="width:20%" class="btn btn-danger">ย้อนกลับ</a>
           
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