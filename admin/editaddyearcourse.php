<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['yearcourse_id'])) {
       
            $id = $_REQUEST['yearcourse_id'];
            $select_stmt = $db->prepare("SELECT * from yearcourse WHERE id = :uid");
            $select_stmt->bindParam(":uid", $id);
            $select_stmt->execute();
        
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
          
            $yearCourse = $row["yearCourse"];
            
           
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
 
       
        $yearCourse_up = $_REQUEST["txt_yearCourse"];


        $select_stmt = $db->prepare("SELECT * FROM yearcourse WHERE yearCourse = :uyear ");
        $select_stmt->bindParam(":uyear", $yearCourse_up);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        if ( $row['yearCourse'] ==  $yearCourse_up) {
            $_SESSION['error'] = "ปีหลักสูตร ถูกบันทึกแล้ว ";
            header("location:addyearcourse.php");
       }else{
                    $update_stmt = $db->prepare("UPDATE yearcourse SET yearCourse = :yearCourse_up WHERE id = :uid");
                   
                    $update_stmt->bindParam(':yearCourse_up', $yearCourse_up);
      
                    $update_stmt->bindParam(':uid', $id);
                  

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:addyearcourse.php");
                   
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
                    <label for="date" class="col-sm-3 control-label">ปีหลักสูตร</label>
                    <div class="col-sm-3">
                    <input type="text" name="txt_yearCourse" maxlength="2"  class="form-control" required placeholder="ใส่แค่2หลักสุดท้าย Ex 60" >
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