<?php 
    require_once('../connection.php');
    session_start();
    if (isset($_REQUEST['check_ids'])) {
        try {
            $ids = $_REQUEST['check_ids'];
            $nameback = $_REQUEST['nameback'];
            $select_stmt = $db->prepare("SELECT * FROM subject WHERE ids = :ids");
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
        

        $idSubject_up = $_REQUEST['idSubject'];
        

        $credit_up = $_REQUEST['credit'];
        $s_semeter_up = $_REQUEST['s_semeter'];
        $s_year_up = $_REQUEST['s_year'];
        $numnisit1_up = $_REQUEST['numnisit1'];
        $numnisit2_up = $_REQUEST['numnisit2'];
        $numnisit3_up = $_REQUEST['numnisit3'];
        $numnisit4_up = $_REQUEST['numnisit4'];
        $numnisit5_up = $_REQUEST['numnisit5'];
        $s_hweekhe_up = $_REQUEST['s_hweekhe'];
        $s_hweekhp_up = $_REQUEST['s_hweekhp'];

        $classLec_up = $_REQUEST['classLec'];
        $date1_up = $_REQUEST['date1'];
        $time1_up = $_REQUEST['time1'];
        $time11_up = $_REQUEST['time11'];

        $classLab_up = $_REQUEST['classLab'];
        $datelab1_up = $_REQUEST['datelab1'];
        $timelab1_up = $_REQUEST['timelab1'];
        $timelab11_up = $_REQUEST['timelab11'];

        $classLab2_up = $_REQUEST['classLab2'];
        $datelab2_up = $_REQUEST['datelab2'];
        $timelab2_up = $_REQUEST['timelab2'];
        $timelab22_up = $_REQUEST['timelab22'];

        $classLab3_up = $_REQUEST['classLab3'];
        $datelab3_up = $_REQUEST['datelab3'];
        $timelab3_up = $_REQUEST['timelab3'];
        $timelab3_up = $_REQUEST['timelab33'];

        $compensationlec_up = $_REQUEST['compensationlec'];
        $compensationlab_up = $_REQUEST['compensationlab'];

        $fiscaYear_up = $_REQUEST['fiscaYear'];

        $Totalnisit_up =  $numnisit1_up +  $numnisit2_up +  $numnisit3_up +  $numnisit4_up +  $numnisit5_up;

        if (empty($nameSubject_up)) {
            $errorMsg = "กรุณากรอกชื่อวิชา";
        } else {
            try {
                if (!isset($errorMsg)) {
                  
                    $update_stmt = $db->prepare("UPDATE subject SET nameSubject = :nameSubject_up, ids = :idSubject_up, credit = :credit_up, semester = :s_semeter_up
                    ,yearSubject = :s_year_up, Numnisit1 = :numnisit1_up , Numnisit2 = :numnisit2_up, Numnisit3 = :numnisit3_up , Numnisit4 = :numnisit4_up , Numnisit5 = :numnisit5_up
                    , Totalnisit = :Totalnisit_up, hourLec = :s_hweekhe_up, hourLab = :s_hweekhp_up ,date1 = :date1_up, time1 = :time1_up , time11 = :time11_up
                    , classLab = :classLab_up, datelab1 = :datelab1_up, timelab1 = :timelab1_up, timelab11 = :timelab11_up 
                    , classLab2 = :classLab2_up, datelab2 = :datelab2_up, timelab2 = :timelab2_up, timelab22 = :timelab22_up 
                    , classLab3 = :classLab3_up, datelab3 = :datelab3_up, timelab3 = :timelab3_up, timelab33 = :timelab33_up 
                    ,compensationlec = :compensationlec_up ,compensationlab = :compensationlab_up ,fiscaYear = :fiscaYear_up
                     WHERE ids = :ids");
                    $update_stmt->bindParam(':nameSubject_up', $nameSubject_up);

                    $update_stmt->bindParam(':credit_up', $credit_up);
                    $update_stmt->bindParam(':s_semeter_up', $s_semeter_up);
                    $update_stmt->bindParam(':s_year_up', $s_year_up);
                    $update_stmt->bindParam(':numnisit1_up', $numnisit1_up);
                    $update_stmt->bindParam(':numnisit2_up', $numnisit2_up);
                    $update_stmt->bindParam(':numnisit3_up', $numnisit3_up);
                    $update_stmt->bindParam(':numnisit4_up', $numnisit4_up);
                    $update_stmt->bindParam(':numnisit5_up', $numnisit5_up);
                    
                    $update_stmt->bindParam(':Totalnisit_up', $Totalnisit_up);

                    $update_stmt->bindParam(':s_hweekhe_up', $s_hweekhe_up);
                    $update_stmt->bindParam(':s_hweekhp_up', $s_hweekhp_up);

                    $update_stmt->bindParam(':date1_up', $date1_up);
                    $update_stmt->bindParam(':time1_up', $time1_up);
                    $update_stmt->bindParam(':time11_up', $time11_up);


                    $update_stmt->bindParam(':classLab_up', $classLab_up);
                    $update_stmt->bindParam(':datelab1_up', $datelab1_up);
                    $update_stmt->bindParam(':timelab1_up', $timelab1_up);
                    $update_stmt->bindParam(':timelab11_up', $timelab11_up);

                    $update_stmt->bindParam(':classLab2_up', $classLab2_up);
                    $update_stmt->bindParam(':datelab2_up', $datelab2_up);
                    $update_stmt->bindParam(':timelab2_up', $timelab2_up);
                    $update_stmt->bindParam(':timelab22_up', $timelab22_up);

                    $update_stmt->bindParam(':classLab3_up', $classLab3_up);
                    $update_stmt->bindParam(':datelab3_up', $datelab3_up);
                    $update_stmt->bindParam(':timelab3_up', $timelab3_up);
                    $update_stmt->bindParam(':timelab33_up', $timelab33_up);

                    $update_stmt->bindParam(':compensationlec_up', $compensationlec_up);
                    $update_stmt->bindParam(':compensationlab_up', $compensationlab_up);
                    $update_stmt->bindParam(':fiscaYear_up', $fiscaYear_up);



                    $update_stmt->bindParam(':idSubject_up', $idSubject_up);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>

<body>
<!DOCTYPE html>
<html>
<head>
<?php include('../decorate_style.php') ?>
</head>
<body>
<?php include('decorate_infinance.php') ?>

<?php include('../decorate_department.php') ?> 


    <div style="margin-left:28%;height:1000px;padding-top:2%">
<div class="container">
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
   
    <br>
            <<div class="form-group text-center">
                <div class="row">
                    <label for="namesub" class="col-sm-3 control-label">ชื่อวิชา</label>
                    <div class="col-sm-3">
                        <input type="text" name="nameSubject" class="form-control" value="<?php echo $nameSubject; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="yearsub" class="col-sm-3 control-label">รหัสวิชา</label>
                    <div class="col-sm-3">
                        <input type="text" name="idSubject" class="form-control" value="<?php echo $ids ?>">
                    </div>
                </div>
            </div>
           
                <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">หน่วยกิต</label>
                    <div class="col-sm-3">
                        <input type="number" name="credit" class="form-control" min=0 value="<?php echo $credit;?>">
                    </div>
                </div>
            </div>
                <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ภาค</label>
                    <div class="col-sm-3">
                    <select name="s_semeter" class="form-control">
            <option value="<?php echo $semester ?>" selected="selected" ><?php echo $semester ?></option>
                <option value="ต้น">ต้น</option>
                <option value="ปลาย">ปลาย</option>
                <option value="ฤดูร้อน">ฤดูร้อน</option>
            </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ปีการศึกษา</label>
                    <div class="col-sm-3">
                    <select name="s_year" class="form-control" >
            <option value="<?php echo $yearSubject ?>" selected="selected" ><?php echo $yearSubject ?></option>
            <option value="<?php echo date("Y")+543;?>"> <?php echo date("Y")+543;?></option>
                <option value="<?php echo date("Y")-1+543;?>"> <?php echo date("Y")-1+543;?></option>
                <option value="<?php echo date("Y")-2+543;?>"> <?php echo date("Y")-2+543;?></option>
                <option value="<?php echo date("Y")-3+543;?>"> <?php echo date("Y")-3+543;?></option>
                <option value="<?php echo date("Y")-4+543;?>"> <?php echo date("Y")-4+543;?></option>
                <option value="<?php echo date("Y")-5+543;?>"> <?php echo date("Y")-5+543;?></option>
            </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ปี <?php echo date("Y")+543;?></label>
                    <div class="col-sm-3">
                        <input type="number" name="numnisit1" class="form-control" min=0 value="<?php echo $Numnisit1 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">นิสิตปี <?php echo date("Y")-1+543;?></label>
                    <div class="col-sm-3">
                        <input type="number" name="numnisit2" class="form-control" min=0 value="<?php echo $Numnisit2 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">นิสิตปี <?php echo date("Y")-2+543;?></label>
                    <div class="col-sm-3">
                        <input type="number" name="numnisit3" class="form-control"min=0 value="<?php echo $Numnisit3 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">นิสิตปี <?php echo date("Y")-3+543;?></label>
                    <div class="col-sm-3">
                        <input type="number" name="numnisit4" class="form-control"min=0 value="<?php echo $Numnisit4 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">นิสิตปี <?php echo date("Y")-4+543;?></label>
                    <div class="col-sm-3">
                        <input type="number" name="numnisit5" class="form-control"min=0 value="<?php echo $Numnisit5 ?>">
                    </div>
                </div>
            </div>
         
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ชั่วโมงบรรยาย/สัปดาห์</label>
                    <div class="col-sm-3">
                    <select name="s_hweekhe" class="form-control"  >
            <option value="<?php echo $hourLec ?>" selected="selected"><?php echo $hourLec ?></option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ชั่วโมงปฏิบัติ/สัปดาห์</label>
                    <div class="col-sm-3">
                    <select name="s_hweekhp" class="form-control"  >
            <option value="<?php echo $hourLab ?>" selected="selected"><?php echo $hourLab ?></option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">หมู่บรรยาย</label>
                    <div class="col-sm-3">
                        <input type="text" name="classLec" class="form-control" value="<?php echo $classLec ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอน</label>
                     <div class="col-sm-1">
                        <input type="text" name="date1" class="form-control" value="<?php echo $date1 ?>"> 
                     </div>
                     <label>เวลา</label>
                        <div class="col-sm-2">    
                              <input type="time" name="time1" class="form-control" value="<?php echo $time1 ?>">
                        </div>  
                           <label>-</label>
                            <div class="col-sm-2"> 
                               <input type="time" name="time11" class="form-control" value="<?php echo $time11 ?>">
                            </div>  
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">หมู่ปฏิบัติ</label>
                    <div class="col-sm-3">
                        <input type="text" name="classLab" class="form-control" value="<?php echo $classLab ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอน</label>
                     <div class="col-sm-1">
                        <input type="text" name="datelab1" class="form-control" value="<?php echo $datelab1 ?>"> 
                     </div>
                     <label>เวลา</label>
                        <div class="col-sm-2">    
                              <input type="time" name="timelab1" class="form-control" value="<?php echo $timelab1 ?>">
                        </div>  
                           <label>-</label>
                            <div class="col-sm-2"> 
                               <input type="time" name="timelab11" class="form-control" value="<?php echo $timelab11 ?>">
                            </div>  
                </div>
            </div>

            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">หมู่ปฏิบัติ2</label>
                    <div class="col-sm-3">
                        <input type="text" name="classLab2" class="form-control" value="<?php echo $classLab2 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอน</label>
                     <div class="col-sm-1">
                        <input type="text" name="datelab2" class="form-control" value="<?php echo $datelab2 ?>"> 
                     </div>
                     <label>เวลา</label>
                        <div class="col-sm-2">    
                              <input type="time" name="timelab2" class="form-control" value="<?php echo $timelab2 ?>">
                        </div>  
                           <label>-</label>
                            <div class="col-sm-2"> 
                               <input type="time" name="timelab22" class="form-control" value="<?php echo $timelab22 ?>">
                            </div>  
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">หมู่ปฏิบัติ3</label>
                    <div class="col-sm-3">
                        <input type="text" name="classLab3" class="form-control" value="<?php echo $classLab3 ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">วันที่สอน</label>
                     <div class="col-sm-1">
                        <input type="text" name="datelab3" class="form-control" value="<?php echo $datelab3 ?>"> 
                     </div>
                     <label>เวลา</label>
                        <div class="col-sm-2">    
                              <input type="time" name="timelab3" class="form-control" value="<?php echo $timelab3 ?>">
                        </div>  
                           <label>-</label>
                            <div class="col-sm-2"> 
                               <input type="time" name="timelab33" class="form-control" value="<?php echo $timelab33 ?>">
                            </div>  
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">อัตราค่าตอบแทนบรรยาย</label>
                    <div class="col-sm-3">
                        <input type="number" name="compensationlec" class="form-control" min=0 value="<?php echo $compensationlec ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">อัตราค่าตอบแทนปฏิบัติ</label>
                    <div class="col-sm-3">
                        <input type="number" name="compensationlab" class="form-control" min=0 value="<?php echo $compensationlab ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">ปีงบประมาณ</label>
                    <div class="col-sm-3">
                        <input type="text" name="fiscaYear" class="form-control" value="<?php echo $fiscaYear ?>">
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>
</body>
</html>