<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['namesubject_id'])) {
       
            $id = $_REQUEST['namesubject_id'];
            $select_stmt = $db->prepare("SELECT * from namesubject WHERE id = :uid");
            $select_stmt->bindParam(":uid", $id);
            $select_stmt->execute();
        
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $ids = $row["ids"];
            $nameSubject = $row["nameSubject"];
           
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
 
        $nameSubject_up = $_REQUEST['txt_nameSubject'];
        $ids_up = $_REQUEST['txt_ids'];
     
        $select_stmt = $db->prepare("SELECT * FROM namesubject WHERE nameSubject = :unameSubject or ids = :ids ");
        $select_stmt->bindParam(":unameSubject", $nameSubject_up);
        $select_stmt->bindParam(":ids", $ids_up);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row['nameSubject'] == $nameSubject_up ) {
            $_SESSION['error'] = "ชื่อวิชานั้นถูกบันทึกแล้ว";
            header("location:addnameSubject.php");
       }else if ($row['ids'] != $ids_up and $row['nameSubject'] != $nameSubject_up) {
        $_SESSION['error'] = "รหัสวิชานั้นถูกบันทึกแล้ว";
        header("location:addnameSubject.php");
   } 
       else{
                    $update_stmt = $db->prepare("UPDATE namesubject SET nameSubject = :nameSubject_up , ids = :ids_up WHERE id = :uid");
                    $update_stmt->bindParam(':nameSubject_up', $nameSubject_up);
                    $update_stmt->bindParam(':ids_up', $ids_up);
                    $update_stmt->bindParam(':uid', $id);
                  

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:addnameSubject.php");
                   
                    }
                }
            }

        
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขภาควิชา</title>

    
  

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
                    <label for="date" class="col-sm-3 control-label">รหัสวิชา </label>
                    <div class="col-sm-3">
                        <input type="text" name="txt_ids" maxlength="11" class="form-control" value="<?php  echo $ids ?>">
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <div class="row">
                    <label for="date" class="col-sm-3 control-label">ชื่อวิชา </label>
                    <div class="col-sm-3">
                        <input type="text" name="txt_nameSubject" class="form-control" value="<?php  echo $nameSubject ?>">
                    </div>
                </div>
            </div>


           
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยันการแก้ไข">
                    <a href="addnameSubject.php" class="btn btn-danger">ย้อนกลับ</a>
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