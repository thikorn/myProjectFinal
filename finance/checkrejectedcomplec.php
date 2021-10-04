<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['update_ids'])) {
        try {
            $ids = $_REQUEST['update_ids'];
            $nameback = $_REQUEST['nameback'];
            $check = $_REQUEST['check'];
            $idteaching = $_REQUEST['idteaching'];

            $select_stmt = $db->prepare("SELECT * FROM teaching_information WHERE ids = :ids AND id = $idteaching");
            $select_stmt->bindParam(':ids', $ids);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $nameSubject_up = $_REQUEST['nameSubject'];
        $nameTeacher_up = $_REQUEST['nameTeacher'];

        $date_up = $_REQUEST['date'];
        $time1_up = $_REQUEST['time1'];
        $time11_up = $_REQUEST['time11'];
        $daten_up = $_REQUEST['daten'];
        $timen1_up = $_REQUEST['timen1'];
        $timen11_up = $_REQUEST['timen11'];
     
        if (empty($nameSubject_up)) {
            $errorMsg = "กรุณากรอกชื่อวิชา";
        } else if (empty($nameTeacher_up)) {
            $errorMsg = "กรุณากรอกชื่อผู้สอน";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $successcheck = $_REQUEST['checksuccess'];
                    $update_stmt = $db->prepare("UPDATE teaching_information SET nameSubject = :nameSubject_up, nameTeacher = :nameTeacher_up, $check = :check1 
                    ,date = :date_up, time1 = :time1_up, time11 = :time11_up, daten = :daten_up ,timen1 = :timen1_up, timen11 = :timen11_up
                    WHERE ids = :ids AND id = $idteaching");
                    $update_stmt->bindParam(':nameSubject_up', $nameSubject_up);
                    $update_stmt->bindParam(':nameTeacher_up', $nameTeacher_up);

                    $update_stmt->bindParam(':date_up', $date_up);
                    $update_stmt->bindParam(':time1_up', $time1_up);
                    $update_stmt->bindParam(':time11_up', $time11_up);
                    $update_stmt->bindParam(':daten_up', $daten_up);
                    $update_stmt->bindParam(':timen1_up', $timen1_up);
                    $update_stmt->bindParam(':timen11_up', $timen11_up);
             




                    $update_stmt->bindParam(':check1', $successcheck);
                    $update_stmt->bindParam(':ids', $ids);

                    if ($update_stmt->execute()) {
                        $updateMsg = "แก้ไขสำเร็จ";
                        header("refresh:2; $nameback");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../decorate_style.php') ?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 

<div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
<div class="display-3 text-center">หน้าทบทวน</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
    <table cellspacing="8" cellpadding="8" style=" border:2px DASHED #8ABB39;background-color: #8ABB39" width=470><tbody><tr><td align="center" valign="middle" style="background-color: #A2CD5A"><table border="0" cellspacing="8" cellpadding="8" width=470 style=" background-color: #BCEE68"><tbody><tr><td align="center" style=" border:2px DASHED #CAFF70;background-color: #CAFF70"><font size=2>
    <h4>สิ่งที่ต้องทบทวน คือ <?php echo $rejectedchecklec1 ?></h4>
    </td></tr></tbody></table></td></tr></tbody></table>
    <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">ชื่อวิชา</label>
                    <div class="col-sm-9">
                        <input type="text" name="nameSubject" class="form-control" value="<?php echo $nameSubject; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ชื่ออาจารย์ผู้สอน</label>
                    <div class="col-sm-9">
                        <input type="text" name="nameTeacher" class="form-control" value="<?php echo $nameTeacher; ?>">
                    </div>
                </div>
            </div>
                <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอน</label>
                    <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                    </div>
                </div>
            </div>
                <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">เวลาที่สอน</label>
                    <div class="col-sm-9">
                        <input type="time" name="time1" class="form-control" value="<?php echo $time1 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ถึงเวลา</label>
                    <div class="col-sm-9">
                        <input type="time" name="time11" class="form-control" value="<?php echo $time11 ?>">
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอนชด</label>
                    <div class="col-sm-9">
                        <input type="date" name="daten" class="form-control" value="<?php echo $daten; ?>">
                    </div>
                </div>
            </div>
                <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">เวลาที่สอนชด</label>
                    <div class="col-sm-9">
                        <input type="time" name="timen1" class="form-control" value="<?php echo $timen1 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ถึงเวลาชด</label>
                    <div class="col-sm-9">
                        <input type="time" name="timen11" class="form-control" value="<?php echo $timen11 ?>">
                    </div>
                </div>
            </div>
           
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="ยืนยัน">
                    <a href="<?php echo $nameback ?>" class="btn btn-danger">ยกเลิก</a>
                </div>
            </div>
           
          
    </form>
    </div>
 </div>
    </div>

</body>
</html>