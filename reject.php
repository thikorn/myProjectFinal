<?php
    session_start();
    require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ทบทวน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>


    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>กรอกสิ่งที่ต้องทบทวน</h1> 
              
              <hr>
         
            <h3>ตำแหน่งของคุณ คือ <?php echo$_SESSION['namelevel']; ?> </h3>
       
      <form action="rejected1_db.php" method="post">               
          <div class="from-group">
          <label for="reject" class="col-sm-3 control-label">สิ่งที่ต้องทบทวน</label>
          <div class="col-sm-5">
              <input type="text" name="txt_reject" class="form-control" required placeholder="Enter Something to adjust">
          </div>
      </div>
                               
       

        <br>
          
          <button type="submit" name="<?php echo $_SESSION['namegreject'];?>" class="btn btn-warning">ทบทวน</button>
         
          </form>
          <br>
          <a href="<?php echo $_SESSION['breject'];?>" class="btn btn-danger">ย้อนกลับ</a>
      
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>