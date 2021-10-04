<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['checkERP'])) {
       
            $checkERP = $_REQUEST['checkERP'];
            $ids = $_REQUEST['check_id'];
            $txtERPo = $_REQUEST['txtERP'];

         
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
       
        $txtERPn = $_REQUEST['txt_ERPn'];
        

                    $update_stmt = $db->prepare("UPDATE finance SET $checkERP = :txtERPn WHERE ids = :uids");

                    $update_stmt->bindParam(':txtERPn', $txtERPn);
 
                    $update_stmt->bindParam(':uids', $ids);

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:connectERP.php");
                   
                    }
                }
           
        
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Page</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('../decorate_style.php') ?>
</head>

<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <div class="display-3 text-center">หน้าแก้ไข</div>
 



    
    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="topic" class="col-sm-3 control-label">เลข ERP </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_ERPn" class="form-control" value="<?php  echo $txtERPo ?>">
                    </div>
                </div>
            </div>
           
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยันการแก้ไข">
                    <a href="connectERP.php" class="btn btn-danger">ย้อนกลับ</a>
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