<?php     session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <div class="container">

        <h1 class="mt-3 text-center">สมัครสมาชิก</h1>
        <hr>

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


        <form action="register_db.php" method="post" class ="form-horizotal my-5">

        <div class="from-group">
            <label for="username" class="col-sm-3 control-label mt-2">ชื่อบัญชี</label>
            <div class="col-6 col-md-4">
                <input type="text" name="txt_username" class="form-control" required placeholder="Enter username" >
            </div>
        </div>

        <div class="from-group">
            <label for="email" class="col-sm-3 control-label">อีเมล</label>
            <div class="col-6 col-md-4">
                <input type="email" name="txt_email" class="form-control" required placeholder="Enter email">
            </div>
        </div>
        
        <label for="password" class="col-sm-3 control-label">รหัสผ่าน</label>
        <div class="col-6 col-md-4">
            <input type="password" name="txt_password" size="10"  class="form-control"   required placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="type" class="col-sm-3 control-label mt-2">คำนำหน้าชื่อ</label>
            <div class="col-6 col-md-4">
            <select name="txt_postname" class="form-control">
            <option value="" selected="selected" required>- Select -</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>
            </div>
        </div>

        <div class="form-group">
            <label for="type" class="col-sm-3 control-label mt-2">ตำแหน่ง</label>
            <div class="col-6 col-md-4">
            <select name="txt_position" class="form-control">
            <option value="" selected="selected" required>- Select Position -</option>
                <option value="เจ้าหน้าที่การเงินและบัญชี">เจ้าหน้าที่การเงินและบัญชี</option>
                <option value="อาจารย์">อาจารย์</option>
                <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                <option value="ศาสตราจารย์">ศาสตราจารย์</option>
            </select>
            </div>
        </div>

        <label for="firstname" class="col-sm-3 control-label">ชื่อจริง</label>
        <div class="col-6 col-md-4">
            <input type="text" name="txt_firstname" class="form-control" required placeholder="Enter firstname">
        </div>

        <label for="lastname" class="col-sm-3 control-label">นามสกุล</label>
        <div class="col-6 col-md-4">
            <input type="text" name="txt_lastname" class="form-control" required placeholder="Enter lastname">
        </div>

        <label for="qualification" class="col-sm-3 control-label">วุฒิ</label>
        <div class="col-6 col-md-4">
            <input type="text" name="txt_qualification" class="form-control" required placeholder="Enter Qualification">
        </div>

        <label for="affiliation" class="col-sm-3 control-label">สังกัด</label>
        <div class="col-6 col-md-4">
            <input type="text" name="txt_affiliation" class="form-control" required placeholder="Enter affiliation">
        </div>


        <div class="form-group">
            <label for="type" class="col-sm-3 control-label mt-2">เลือกหน้าที่</label>
            <div class="col-6 col-md-4">
            <select name="txt_role" class="form-control">
            <option value="" selected="selected" required>- Select Role -</option>
                <option value="teacher">อาจารย์</option>
                <option value="finance">เจ้าหน้าที่การเงินและบัญชี</option>
                <option value="secretary">เลขานุการคณะกรรมการดำเนินงาน</option>
                <option value="president">ประธานคณะกรรมการดำเนินงาน</option>
                <option value="admin">ผู้ดูแลระบบ</option>
                <option value="board">กรรมการตรวจสอบ</option>
            </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-6 col-md-4 mt-4">
            <input type="submit" name="btn_register" class="btn btn-primary" style="width:100%" value="สมัครสมาชิก">
            </div>
 
        <div class="form-group  col-6 col-md-4 mt-4">
            <p>ถ้าหากคุณมี บัญชี แล้ว <a href="index.php">เข้าสู่ระบบ</a> </p>
          
        </div>

        </form>
    
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>