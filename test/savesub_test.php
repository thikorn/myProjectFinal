<?php
    session_start();
    if(!isset($_SESSION['finance_login'])) {
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกวิชาเข้าสู่ระบบ</title>

    
  

    <link rel="stylesheet" type="text/css" href="savesub_test.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
</head>
<body>
<div class="body">
<div class="h1">
    บันทึกรายวิชาเข้าสู่ระบบ
</div>
<div class="line1"></div>
<div class="reg23"></div>

<a href="../finance/finance_home.php" class="inreg23">ย้อนกลับ</a>
<div class="reg39"></div>
<div class="image10"></div>

<div class="line2"></div>
<div class="depart">
โครงการหลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาวิทยาการคอมพิวเตอร์ ภาคพิเศษ โทร.7328
</div>
<form action="../finance/addsubject_db.php" method="post">
          <button type="submit" name="add_subject" class="h2"  >บันทึกข้อมูลรายวิชาเข้าสู่ระบบ</button>
          </form>
          

<div class="e1"></div>
<div class="e2"></div>
<div class="e3"></div>
<div class="e4"></div>
<div class="h3">
 ตรวจสอบรายวิชาที่บันทึกเข้าสู่ระบบ 
</div>
<div class="h4">
รายวิชาที่เข้าสู่ระบบ 
</div>
<div class="h5">
ตารางประมาณการค่า
</div>
<div class="reg32"></div>
<div class="image20"></div>
<div class="image17"></div>
<div class="image16"></div>
<div class="reg62"></div>
<div class="h6">
สร้างบันทึกข้อความขอเปิดรายวิชา
</div>
<div class="h7">
เจ้าหน้าที่การเงินและบัญชี
</div>
<div class="h8">
    ยินดีต้อนรับ คุณ จักรพรรดิ์
</div>
<div class="image3"></div>
<div class="h9">
    บันทึกวิชาเข้าสู่ระบบ
</div>
<div class="h10">
    ข้อมูลส่วนตัว
</div>
<div class="h11">
    สร้างข้อความขออนุมัติหลักการเบิกค่าสอน
</div>
<div class="h12">
    สร้างบันทึกข้อความขอเบิกค่าตอบแทน
</div>
<div class="h13">
    กรอกบันทึกข้อความขอสอนชดเชย 
</div>
<div class="line3"></div>
<div class="image11"></div>
<div class="image13"></div>
<div class="h14">
    พิมพ์ข้อมูลเอกสารหลักฐานการเบิกจ่าย
</div>
<div class="h15">
รายงานค่าตอบแทนการสอนประจำเดือน
</div>
<div class="image14"></div>
<div class="image15"></div>
<div class="image18"></div>
<div class="image19"></div>

</div>




</body>
</html>