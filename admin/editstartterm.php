<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['startdate_id'])) {
       
            $id = $_REQUEST['startdate_id'];
            $select_stmt = $db->prepare("SELECT * from startdateterm WHERE id = :uid");
            $select_stmt->bindParam(":uid", $id);
            $select_stmt->execute();
        
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $semester = $row['semester'];
            $yearSubject = $row["yearSubject"];
            $startdateterm = $row["startdateterm"];
           
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
 
        $semester_up = $_REQUEST['txt_semester'];
        $yearSubject_up = $_REQUEST["txt_yearSubject"];
        $startdateterm_up = $_REQUEST["txt_startdateterm"];

        $select_stmt = $db->prepare("SELECT * FROM startdateterm WHERE yearSubject = :uyear ");
        $select_stmt->bindParam(":uyear", $yearSubject_up);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['semester'] == $semester_up and $row['yearSubject'] ==  $yearSubject_up) {
            $_SESSION['error'] = "ภาคการศึกษา และ ปีการศึกษานั้น ถูกบันทึกแล้ว ";
            header("location:addstartterm.php");
       }else{
                    $update_stmt = $db->prepare("UPDATE startdateterm SET semester = :semester_up, yearSubject = :yearSubject_up, startdateterm = :startdateterm_up WHERE id = :uid");
                    $update_stmt->bindParam(':semester_up', $semester_up);
                    $update_stmt->bindParam(':yearSubject_up', $yearSubject_up);
                    $update_stmt->bindParam(':startdateterm_up', $startdateterm_up);
                    $update_stmt->bindParam(':uid', $id);
                  

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:addstartterm.php");
                   
                    }
                }
            }

        
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขวันที่เริ่มสอน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_admin_home.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <div class="display-3 text-center">หน้าแก้ไข</div>
 
    
    <form method="post" class="form-horizontal mt-5">
            
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="date" class="col-sm-3 control-label">วันที่ </label>
                    <div class="col-sm-3">
                        <input type="date" name="txt_startdateterm" class="form-control" value="<?php  echo $startdateterm ?>">
                    </div>
                </div>
            </div>


            <div class="form-group text-center">
                <div class="row">
            <label for="semeter" class="col-sm-3 control-label mt-2">ภาคการศึกษา*</label>
            <div class="col-sm-3">
            <select name="txt_semester" class="form-control">
            <option value="<?php echo $semester ?>" selected="selected" ><?php echo $semester ?></option>
                <option value="ต้น">ต้น</option>
                <option value="ปลาย">ปลาย</option>
                <option value="ฤดูร้อน">ฤดูร้อน</option>
            </select>
            </div>
                </div>
            </div>


            <div class="form-group text-center">
                <div class="row">
            <label for="s_year" class="col-sm-3 control-label mt-2">ปีการศึกษา*</label>
            <div class="col-sm-3">
            <select name="txt_yearSubject" class="form-control" required>
            <option value="<?php echo $yearSubject ?>" selected="selected" ><?php echo $yearSubject ?></option>
            <option value="<?php echo date("Y")+543;?>"> <?php echo date("Y")+543;?></option>
                <option value="<?php echo date("Y")-1+543;?>"> <?php echo date("Y")-1+543;?></option>
                <option value="<?php echo date("Y")-2+543;?>"> <?php echo date("Y")-2+543;?></option>
                <option value="<?php echo date("Y")-3+543;?>"> <?php echo date("Y")-3+543;?></option>
                <option value="<?php echo date("Y")-4+543;?>"> <?php echo date("Y")-4+543;?></option>
                <option value="<?php echo date("Y")-5+543;?>"> <?php echo date("Y")-5+543;?></option>
            </select>
            </div>
                </div>
            </div>



            
           
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยันการแก้ไข">
                    <a href="addstartterm.php" class="btn btn-danger">ย้อนกลับ</a>
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