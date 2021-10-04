<?php 
    session_start();
    if (isset($_SESSION['admin_login'])) {
        header("location: admin/admin_home.php");
    }
    if (isset($_SESSION['finance_login'])) {
        header("location: finance/finance_home.php");
    }
    if (isset($_SESSION['president_login'])) {
        header("location: president/president_home.php");
    }
    if (isset($_SESSION['secretary_login'])) {
        header("location: secretary/secretary_home.php");
    }
    if (isset($_SESSION['teacher_login'])) {
        header("location: teacher/teacher_home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Compensation Management System</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<body>
<div class="bg">


<div class="container">



   <br>
	<h1 class ="mt-5 text-center">ระบบการจัดการค่าตอบแทนบุคลากร</h1>
        <hr>
    <h2 class ="mt-5 text-center">เข้าสู่ระบบ</h2>
      
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
            
            <form action="login_db.php" method="post" class ="form-horizotal my-5">
        
            <div class="row">
                <div class="col-6 col-md-4"></div>
                <div class="col-6 col-md-4">
                    <label for="email" class="col-sm-3 control-label mt-2">อีเมล</label>
                        <div class="col-sm-20">
                             <input type="text" name="txt_email" class="form-control" required placeholder="Enter email">
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4"></div>
                    <div class="col-6 col-md-4">
                        <label for="password" class="col-sm-3 control-label mt-2">รหัสผ่าน</label>
                            <div class="col-sm-20">
                                <input type="password" name="txt_password" class="form-control" required placeholder="Enter password">
                            </div>
                </div>
            </div>
           
            <br>
            <div class="row">
                <div class="col-6 col-md-4"></div>
                    <div class="col-6 col-md-4">
                    <input type="submit" name="btn_login" class="btn btn-success" style="width:100%" value="เข้าสู่ระบบ">
                           
                </div>
            </div>
            <div class="form-group text-center mt-4">
                <p>คุณมีบัญชีแล้วหรือยัง ถ้ายัง? </p>
                <p><a href="register.php">สมัครสมาชิก</a></p>
				
             </div>
		
			
         
 

</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>