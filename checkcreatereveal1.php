<?php
    session_start();
    require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบบันทึกข้อความขออนุมัติหลักการเบิกค่าสอน</title>

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php include('decorate_style.php') ?>
</head>


<body>
<?php include('decorate_outfolder.php') ?>

<?php include('decorate_department.php')?>



    <div style="margin-left:28%;height:1000px;padding-top:2%">
    <div class="container">

    <h1>บันทึกข้อความ</h1>
          
          <hr>

      <p>รหัสวิชา : <?php     echo $_SESSION['code'];?> </p>
      <p>ชื่อวิชา : <?php     echo $_SESSION['subname'];?> </p>
      <p>เลข อว(ขออนุมัติหลักการเบิก) : <?php   echo $_SESSION['numberOv3'];?> </p>
      <?php
        $dateov3 = $_SESSION['DateOv3'];
       
        function DateThai($strDate)
        {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
        }
    
        $strDate =  $dateov3;
        
          ?>

      <p>วันที่สร้างบันทึกข้อความขอเปิดรายวิชา : <?php   echo  DateThai($strDate)?>  </p>
      <p>ภาคการศึกษา : <?php     echo $_SESSION['semeter'];?> </p>
      <p>ปีการศึกษา : <?php     echo $_SESSION['year'];?> </p>
      <p>หน่วยกิต : <?php     echo $_SESSION['credit'];?> ( <?php     echo $_SESSION['hourlec'];?>-<?php     echo $_SESSION['hourlab'];?> ) </p>
      <p>ชั่วโมงบรรยายต่อสัปดาห์ : <?php     echo $_SESSION['hourlec'];?> ชั่วโมง</p>
      <p>ชั่วโมงบรรยายต่อภาคการศึกษา : <?php     echo $_SESSION['hourlec']*15;?> ชั่วโมง</p>
      <p>ชั่วโมงปฏิบัติต่อสัปดาห์ : <?php     echo $_SESSION['hourlab'];?> ชั่วโมง</p>
      <p>ชั่วโมงปฏิบัติต่อภาคการศึกษา : <?php     echo $_SESSION['hourlab']*15;?> ชั่วโมง</p>
      <p>อัตราตอบแทนบรรยาย : <?php     echo $_SESSION['compensationlec'];?> บาท/ชั่วโมง </p>
      <p>ค่าตอบแทนบรรยาย : <?php     echo $_SESSION['compensationlec']*($_SESSION['hourlec']*15);?> บาท </p>
      <p>อัตราค่าตอบแทนปฏิบัติ : <?php     echo $_SESSION['compensationlec'];?> บาท/ชั่วโมง </p>
      <?php if($_SESSION['compensationlab'] == 0 ){

}else {  ?>
  <p>ค่าตอบแทนปฏิบัติ : <?php     echo $_SESSION['compensationlab']*($_SESSION['hourlab']*15);?> บาท </p>
<?php } ?>
      
      <p>ปีงบประมาณ : <?php     echo $_SESSION['fiscayear'];?> </p>
      

      <form action="approve2_db.php" method="post">
      <button type="submit" name="<?php echo $_SESSION['btn_name'];?>" class="btn btn-primary">
      <?php 
      $btn_name = $_SESSION['btn_name'];
      if($btn_name =="btn_approvef"){
          echo "ตรวจสอบ";
      }else{ echo "อนุมัติ";}
      ?>
      </button>
      </form>
    <br>
    
      <form action="rejected_db.php" method="post">
      <button type="submit" name="submit_rejectedcreatereveal" class="btn btn-warning">ทบทวน</button>
      </form>
      <br>
      <a href="checkcreatereveal.php" class="btn btn-danger">ย้อนกลับ</a>
      
     
</div>
    </div>
        </div>

            
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>