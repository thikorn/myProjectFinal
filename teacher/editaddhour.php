<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['update_number'])) {
        $nameback = $_REQUEST['nameback'];
            $number = $_REQUEST['update_number'];
            $ids = $_SESSION['code'];
            $select_stmt = $db->prepare("SELECT * from teaching_information   WHERE numberhour = :unumber AND ids = :uids ");
            $select_stmt->bindParam(":unumber", $number);
            $select_stmt->bindParam(":uids", $ids);
            $select_stmt->execute();
        
            
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $topic = $row['topic'];
            $classroom = $row["classroom"];
            $note = $row["note"];
            $date = $row["date"];
            $time1 = $row["time1"];
            $time11 = $row["time11"];
          
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
       
        $topic_up = $_REQUEST['txt_topic'];
        $classroom_up = $_REQUEST["txt_classroom"];
        $note_up = $_REQUEST["txt_note"];
        $date_up = $_REQUEST["txt_date"];
        $time1_up = $_REQUEST["txt_time1"];
        $time11_up = $_REQUEST["txt_time11"];

                    $update_stmt = $db->prepare("UPDATE teaching_information SET topic = :topic_up, classroom = :classroom_up, note = :note_up, date = :date_up, time1 = :time1_up, time11 = :time11_up WHERE numberhour = :unumber");
                    $update_stmt->bindParam(':topic_up', $topic_up);
                    $update_stmt->bindParam(':classroom_up', $classroom_up);
                    $update_stmt->bindParam(':note_up', $note_up);
                    $update_stmt->bindParam(':date_up', $date_up);
                    $update_stmt->bindParam(':time1_up', $time1_up);
                    $update_stmt->bindParam(':time11_up', $time11_up);
                    $update_stmt->bindParam(':unumber', $number);

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:$nameback");
                   
                    }
                }
           
        
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขบันทึกการสอนบรรยาย</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_inteacher.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <div class="display-3 text-center">หน้าแก้ไข</div>
 

 <h2>ลำดับที่ต้องการแก้ไข คือ ลำดับที่ <?php  echo $number ?></h2>
   

    
    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="topic" class="col-sm-3 control-label">หัวข้อ </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_topic" class="form-control" value="<?php  echo $topic ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="classroom" class="col-sm-3 control-label">ห้องเรียน </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_classroom" class="form-control" value="<?php  echo $classroom ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="note" class="col-sm-3 control-label">หมายเหตุ </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_note" class="form-control" value="<?php  echo $note ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="date" class="col-sm-3 control-label">วันที่ </label>
                    <div class="col-sm-9">
                        <input type="date" name="txt_date" class="form-control" value="<?php  echo $date ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="time" class="col-sm-3 control-label">เวลา </label>
                    <div class="col-sm-9">
                        <input type="time" name="txt_time1" class="form-control" value="<?php  echo $time1 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="time11" class="col-sm-3 control-label">ถึงเวลา </label>
                    <div class="col-sm-9">
                        <input type="time" name="txt_time11" class="form-control" value="<?php  echo $time11 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยันการแก้ไข">
                    <a href="<?php echo $nameback ?>" class="btn btn-danger">ย้อนกลับ</a>
                </div>
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