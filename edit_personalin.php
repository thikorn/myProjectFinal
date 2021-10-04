<?php 
    require_once('connection.php');
    session_start();
    if (isset($_REQUEST['member_id'])) {
       
            $id = $_REQUEST['member_id'];
            $select_stmt = $db->prepare("SELECT * from member WHERE id = :uid");
            $select_stmt->bindParam(":uid", $id);
            $select_stmt->execute();
        
            while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
            $password = $row["password"];
            $qualification = $row["qualification"];
            $affiliation = $row["affiliation"];
            $position = $row["position"];
            $role = $row["role"];
           
            }
          
        
            
    }

    if (isset($_REQUEST['btn_update'])) {
      
 
        $firstname_up = $_REQUEST['txt_firstname'];
        $lastname_up = $_REQUEST['txt_lastname'];
        $email_up = $_REQUEST['txt_email'];
        $qualification_up = $_REQUEST['txt_qualification'];
        $affiliation_up = $_REQUEST['txt_affiliation'];
        $position_up = $_REQUEST['txt_position'];
        $role_up = $_REQUEST['txt_role'];

                    $update_stmt = $db->prepare("UPDATE member SET position = :position_up,affiliation = :affiliation_up,qualification = :qualification_up,email = :email_up,lastname = :lastname_up, firstname = :firstname_up,  role = :role_up WHERE id = :uid");
                    $update_stmt->bindParam(':firstname_up', $firstname_up);
                    $update_stmt->bindParam(':lastname_up', $lastname_up);
                    $update_stmt->bindParam(':email_up', $email_up);
                     
                    $update_stmt->bindParam(':qualification_up', $qualification_up);
                    $update_stmt->bindParam(':affiliation_up', $affiliation_up);
                    $update_stmt->bindParam(':position_up', $position_up); 
                    $update_stmt->bindParam(':role_up', $role_up);
                    $update_stmt->bindParam(':uid', $id);
                  

                    if ($update_stmt->execute()) {
                       
                        $_SESSION['success'] = "แก้ไขสำเร็จ";
                        header("location:personalin.php");
                   
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
    <?php include('decorate_style.php') ?>
</head>

<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <div class="display-3 text-center">หน้าแก้ไข</div>
 
    
    <form method="post" class="form-horizontal mt-5">
            
            
   
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
            <label for="email" class="col-sm-3 control-label">อีเมล</label>
            <div class="col-sm-4">
                <input type="email" name="txt_email" class="form-control"  value="<?php echo $email ?>">
            </div>
            </div>
            </div>
        
          

        <div class="form-group text-center">
                <div class="row">
            <label for="type" class="col-sm-3 control-label mt-2">ตำแหน่ง</label>
            <div class="col-sm-4">
            <select name="txt_position" class="form-control">
            <option value="<?php echo $position ?>" selected="selected" ><?php echo $position ?></option>
                <option value="เจ้าหน้าที่การเงินและบัญชี">เจ้าหน้าที่การเงินและบัญชี</option>
                <option value="อาจารย์">อาจารย์</option>
                <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                <option value="ศาสตราจารย์">ศาสตราจารย์</option>
            </select>
            </div>
        </div>
        </div>

        <div class="form-group text-center">
                <div class="row">
        <label for="firstname" class="col-sm-3 control-label">ชื่อจริง</label>
        <div class="col-sm-4">
            <input type="text" name="txt_firstname" class="form-control" value="<?php echo $firstname ?>">
            </div>
        </div>
        </div>

        <div class="form-group text-center">
                <div class="row">
        <label for="lastname" class="col-sm-3 control-label">นามสกุล</label>
        <div class="col-sm-4">
            <input type="text" name="txt_lastname" class="form-control" value="<?php echo $lastname ?>">
            </div>
        </div>
        </div>

        <div class="form-group text-center">
                <div class="row">
        <label for="qualification" class="col-sm-3 control-label">วุฒิ</label>
        <div class="col-sm-4">
            <input type="text" name="txt_qualification" class="form-control"  value="<?php echo $qualification ?>">
            </div>
        </div>
        </div>

        <div class="form-group text-center">
                <div class="row">
        <label for="affiliation" class="col-sm-3 control-label">สังกัด</label>
        <div class="col-sm-4">
            <input type="text" name="txt_affiliation" class="form-control"  value="<?php echo $affiliation ?>">
            </div>
        </div>
        </div>

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
                    <a href="personalin.php" class="btn btn-danger">ย้อนกลับ</a>
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