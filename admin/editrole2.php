<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['member_id'])) {
       
            $id = $_REQUEST['member_id'];
            $select_stmt = $db->prepare("SELECT * from member WHERE id = :uid");
            $select_stmt->bindParam(":uid", $id);
            $select_stmt->execute();
        
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = $row["firstname"] ."  ". $row["lastname"];
            $role = $row["role"];
           
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
 
        $role_up = $_REQUEST['txt_role'];
       
                    $update_stmt = $db->prepare("UPDATE member SET role = :role_up WHERE id = :uid");
                       
                    $update_stmt->bindParam(':role_up', $role_up);
                    $update_stmt->bindParam(':uid', $id);
                  

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:editrole.php");
                   
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
            
            
    ชื่อ - นามสกุล : <?php echo $name ?>
    <br>
    <br>

    <?php
      $role_arr=array(
        "finance"=>"เจ้าหน้าที่การเงินและบัญชี",
        "secretary"=>"เลขานุการคณะกรรมการ",
        "board"=>"กรรมการตรวจสอบ",
        "president"=>"ประธานคณะกรรมการ",
        "teacher"=>"อาจารย์",
       ); 
    ?>

            <div class="form-group text-center">
                <div class="row">
            <label for="type" class="col-sm-3 control-label mt-2">เลือกหน้าที่</label>
            <div class="col-sm-4">
            <select name="txt_role" class="form-control">
            <option value="<?php echo $role ?>" selected="selected" ><?php echo $role_arr[$role] ?></option>
                <option value="teacher">อาจารย์</option>
                <option value="finance">เจ้าหน้าที่การเงินและบัญชี</option>
                <option value="secretary">เลขานุการคณะกรรมการดำเนินงาน</option>
                <option value="president">ประธานคณะกรรมการดำเนินงาน</option>
                <option value="admin">ผู้ดูแลระบบ</option>
                <option value="board">กรรมการตรวจสอบ</option>
            </select>
            </div>
                </div>
            </div>

           
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยันการแก้ไข">
                    <a href="editrole.php" class="btn btn-danger">ย้อนกลับ</a>
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