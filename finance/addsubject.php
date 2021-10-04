<?php
    session_start();
    require_once '../connection.php';
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

    
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
   
    <form action="addsubject1_db.php" method="post">
    <div class="container">

        <h1 class="mt-3">บันทึกข้อมูลรายวิชาเข้าสู่ระบบ </h1>
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

            <?php 
            $stmt = $db->prepare("SELECT * from namesubject");
            $stmt->execute();
            $resultarray=$stmt->fetchAll();

            
        ?>

        
        
        <div class="form-group row">
            <label for="s_code" style = "margin-left:100px; margin-top:20px">เลือกวิชา*</label>
            <div class="col-sm-3">
            <select name="s_code" style = "margin-top:15px" class="form-control"required>
            <option value="" selected="selected" >เลือกวิชา</option>
            <?php for($i=0;$i<count($resultarray);$i++){ ?>
                <option value="<?=$resultarray[$i]["id"]?>"><?=$resultarray[$i]["ids"]?>  <?=$resultarray[$i]["nameSubject"]?> </option>
        
            <?php } ?>
            </select>
            </div>
        </div>

      
        
    
       


    


        <div class="form-group row ">
            <label for="yearnisit"  style = "margin-left:100px; margin-top:20px">ปีที่นิสิตสามารถลงได้*</label>
           
        <label for="myCheck"  style = "margin-left:45px; margin-top:20px">ปี <?php echo date("Y")+543;?> </label>
        <input type="checkbox" id="myCheck" style = "margin-left:10px; margin-top:25px"  onclick="myFunction()">
        
        <div class="col-sm-4 " style = "margin-left:10px; margin-top:25px">
        <input class="form-control" type="number" id="input" name="input" style="display:none" placeholder="จำนวนนิสิตปี <?php echo date("Y")+543;?>"  min=0>
   
        </div>
        </div>
        
        <script>
        function myFunction(){
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("input");
            if (checkBox.checked == true){
                input.style.display = "block";
            }else {
                input.style.display = "none";
            }
        }
        </script>

        
        <div class="from-group row">
        <label for="myCheck1" style = "margin-left:288px; margin-top:-5px">ปี <?php echo date("Y")-1+543;?> </label>
        <input type="checkbox" id="myCheck1" style = "margin-left:10px; margin-top:-3px" onclick="myFunction1()">
        <div class="col-sm-4 " style = "margin-left:10px; ">
        <input class="form-control" type="number" id="input1" name="input1" style="display:none"placeholder="จำนวนนิสิตปี <?php echo date("Y")-1+543;?>"  min=0>
        </div>
        </div>
        <script>
        function myFunction1(){
            var checkBox = document.getElementById("myCheck1");
            var text = document.getElementById("input1");
            if (checkBox.checked == true){
                input1.style.display = "block";
            }else {
                input1.style.display = "none";
            }
        }
        </script>
                
        <br>
        <div class="from-group row">
        <label for="myCheck2" style = "margin-left:288px; margin-top:-5px">ปี <?php echo date("Y")-2+543;?> </label>
        <input type="checkbox" id="myCheck2" style = "margin-left:10px; margin-top:-3px" onclick="myFunction2()">
        <div class="col-sm-4 " style = "margin-left:10px; ">
        <input class="form-control" type="number" id="input2" name="input2" style="display:none" placeholder="จำนวนนิสิตปี <?php echo date("Y")-2+543;?>" min=0>
        </div>
        </div>
        <script>
        function myFunction2(){
            var checkBox = document.getElementById("myCheck2");
            var text = document.getElementById("input2");
            if (checkBox.checked == true){
                input2.style.display = "block";
            }else {
                input2.style.display = "none";
            }
        }
        </script>

         <br>
         <div class="from-group row">
        <label for="myCheck3" style = "margin-left:288px; margin-top:-5px">ปี <?php echo date("Y")-3+543;?> </label>
        <input type="checkbox" id="myCheck3"  style = "margin-left:10px; margin-top:-3px" onclick="myFunction3()">
        <div class="col-sm-4 " style = "margin-left:10px; ">
        <input class="form-control" type="number" id="input3" name="input3" style="display:none" placeholder="จำนวนนิสิตปี <?php echo date("Y")-3+543;?>" min=0>
        </div>
        </div>
        <script>
        function myFunction3(){
            var checkBox = document.getElementById("myCheck3");
            var text = document.getElementById("input3");
            if (checkBox.checked == true){
                input3.style.display = "block";
            }else {
                input3.style.display = "none";
            }
        }
        </script>

         <br>
         <div class="from-group row">
        <label for="myCheck4" style = "margin-left:288px; margin-top:-5px">ปี <?php echo date("Y")-4+543;?> </label>
        <input type="checkbox" id="myCheck4" style = "margin-left:10px; margin-top:-3px" onclick="myFunction4()">
        <div class="col-sm-4 " style = "margin-left:10px; ">
        <input class="form-control" type="number" id="input4" name="input4" style="display:none" placeholder="จำนวนนิสิตปี <?php echo date("Y")-4+543;?>" min=0>
        </div>
        </div>
        <script>
        function myFunction4(){
            var checkBox = document.getElementById("myCheck4");
            var text = document.getElementById("input4");
            if (checkBox.checked == true){
                input4.style.display = "block";
            }else {
                input4.style.display = "none";
            }
        }
        </script>
            </div>
      


        <?php 
            $stmt = $db->prepare("SELECT firstname,lastname,id from member WHERE role='teacher'");
            $stmt->execute();
            $resultarray=$stmt->fetchAll();
        ?>
        
        <div class="form-group row">
            <label for="s_nameteacher" style = "margin-left:146px; margin-top:20px">ชื่ออาจารย์ที่สอน*</label>
            <div class="col-sm-3">
            <select name="s_nameteacher" style = "margin-top:15px" class="form-control"required>
            <option value="" selected="selected" >เลือกอาจารย์</option>
            <?php for($i=0;$i<count($resultarray);$i++){ ?>
                <option value="<?=$resultarray[$i]["id"]?>"><?=$resultarray[$i]["firstname"]?>  <?=$resultarray[$i]["lastname"]?> </option>
        
            <?php } ?>
            </select>
            </div>
        </div>
       
        


        <div class="form-group row">
        <label for="ov1" style = "margin-left:75px; margin-top:20px">เลข อว(ขอเบิกค่าตอบแทน)*</label>
        <div class="col-sm-2">
            <input type="text" name="s_ov1" style = "margin-top:15px" class="form-control" maxlength="4" required placeholder="Enter number">
        </div>
        

   
            <label for="semeter" style = "margin-left:50px; margin-top:20px">ภาคการศึกษา*</label>
            <div class="col-sm-2">
            <select name="s_semeter" style = "margin-top:15px" class="form-control"required>
            <option value="" selected="selected" >เลือกภาค</option>
                <option value="ต้น">ต้น</option>
                <option value="ปลาย">ปลาย</option>
                <option value="ฤดูร้อน">ฤดูร้อน</option>
            </select>
            </div>
      
        </div>

        <div class="form-group row">
            <label for="s_year" style = "margin-left:180px; margin-top:20px">ปีการศึกษา*</label>
            <div class="col-sm-2">
            <select name="s_year" style = "margin-top:15px" class="form-control" required>
            <option value=""  selected="selected" >เลือกปี</option>
            <option value="<?php echo date("Y")+543;?>"> <?php echo date("Y")+543;?></option>
                <option value="<?php echo date("Y")-1+543;?>"> <?php echo date("Y")-1+543;?></option>
                <option value="<?php echo date("Y")-2+543;?>"> <?php echo date("Y")-2+543;?></option>
                <option value="<?php echo date("Y")-3+543;?>"> <?php echo date("Y")-3+543;?></option>
                <option value="<?php echo date("Y")-4+543;?>"> <?php echo date("Y")-4+543;?></option>
                <option value="<?php echo date("Y")-5+543;?>"> <?php echo date("Y")-5+543;?></option>
            </select>
            </div>
        

   
            <label for="credit" style = "margin-left:85px; margin-top:20px">หน่วยกิต*</label>
            <div class="col-sm-3">
            <select name="s_credit" style = "margin-top:15px" class="form-control">
            <option value="" selected="selected" required>เลือกจำนวนหน่วยกิต</option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
            </div>
            </div>
        
            <div class="form-group row">
            <label for="s_hweekhe" style = "margin-left:95px; margin-top:20px">ชั่วโมง/สัปดาห์(บรรยาย)*</label>
            <div class="col-sm-3">
            <select name="s_hweekhe" style = "margin-top:15px" class="form-control" id="myCheck10" onclick="myFunction10()">
            <option value="" selected="selected">เลือกจำนวนชั่วโมง</option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
            </div>
        </div>
        


        <div class="form-group row" >
      
            <label for="compensation" style=" margin-left:80px; margin-top:20px; display:none"  id="namecompensation">อัตราค่าตอบแทน(บรรยาย)*</label>
            <div class="col-sm-3">
            <input type="number" style="display:none; margin-top:10px;"  name="s_compensationlec" class="form-control" id="scompensation" min="0"  placeholder="Enter Compensation">
            </div>
        </div>
            
        <div class="form-group row" >
            <label for="classe" class="control-label mt-2" style="display:none; margin-left:180px; margin-top:20px;" id="nameclass5">หมู่บรรยาย*</label>
            <div class="col-sm-2">
            <select name="s_classe" class="form-control" style="display:none" id="snameclass5">
            <option value="" selected="selected">เลือกหมู่บรรยาย</option>
                <option value="800">800</option>
                <option value="801">801</option>
                <option value="802">802</option>
                <option value="803">803</option>
                <option value="804">804</option>
                <option value="805">805</option>
                <option value="806">806</option>
                <option value="807">807</option>
                <option value="808">808</option>
                <option value="809">809</option>
            </select>
            </div>
            </div>
           
            
          

        <div class="form-group row" >
          
                    <label for="myCheck5" class="control-label mt-2" id="namenumdate2" style="display:none; margin-left:17px; margin-top:20px;">จำนวนวันที่สอนต่อสัปดาห์(บรรายาย)</label>
                    
                    <div class="col-sm-2">
                        <select name="s_classp8"  class=" form-control " style="display:none;margin-left:3px"  id="myCheck5" onclick="myFunction5()" >
                        <option value="" selected="selected">เลือกจำนวน</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          
                    </select>
                    </div>
       
        </div>
        

        <script>
        function myFunction10(){
            var checkBox = document.getElementById("myCheck10");
            var myCheck5 = document.getElementById("myCheck5");
     
            var nameclass5 = document.getElementById("namenumdate2");
            var nameclass5 = document.getElementById("nameclass5");
            var snameclass5 = document.getElementById("snameclass5");

            var namecompensation = document.getElementById("namecompensation");
            var scompensation = document.getElementById("scompensation");
            
            if (checkBox.value != ""){
                myCheck5.style.display = "block";
                nameclass5.style.display = "block";
                snameclass5.style.display = "block";
                namenumdate2.style.display = "block";
                namecompensation.style.display = "block";
                scompensation.style.display = "block";
            }else {
                myCheck5.style.display = "none";
                nameclass5.style.display = "none";
                snameclass5.style.display = "none";
                namenumdate2.style.display = "none";
                namecompensation.style.display = "none";
                scompensation.style.display = "none";

                namedate5.style.display = "none";
                                    date5.style.display = "none";
                                    nametime5.style.display = "none";
                                    nametimeb5.style.display = "none";
                                    nametimea5.style.display = "none";
                                    time5.style.display = "none";
                                    time55.style.display = "none";

                                    namedate6.style.display = "none";
                                    date6.style.display = "none";
                                    nametime6.style.display = "none";
                                    nametimeb6.style.display = "none";
                                    nametimea6.style.display = "none";
                                    time6.style.display = "none";
                                    time66.style.display = "none";

                                    namedate7.style.display = "none";
                                    date7.style.display = "none";
                                    nametime7.style.display = "none";
                                    nametimeb7.style.display = "none";
                                    nametimea7.style.display = "none";
                                    time7.style.display = "none";
                                    time77.style.display = "none";
            }
        }
        </script>

                   
                    <div class="row"style="margin-left:165px">
                    <div class="form-group row ">
                        <label for="date" class="control-label mt-3"style="display:none" id="namedate5">วันที่สอน(1)*</label>
                    <div class="form-group ">
                            <select name="s_date1" id="date5" class="col-sl-2 control-label ml-4 mt-2 form-control" style="display:none"  >
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>  
                    </div>  

                    <div class="form-group">
                        <label for="date" id="nametime5" class="control-label mt-3 ml-5"  style="display:none">เวลาที่สอน(1)*</label>
                    </div>
                       
                            <label for="s_time1" class="control-label mt-3 ml-2" id="nametimeb5"  style="display:none">ตั้งแต่*</label>
                            <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
                            <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
                                <div class="col-sm-2">
                                    <input type="time" name="s_time1" class="form-control mt-2" id="time5"  style="display:none">
                                    
                                </div>
                            <label for="s_time11" class="control-label mt-3 ml-2" id="nametimea5" style="display:none" >ถึง*</label>
                                <div class="col-sm-2">
                                    <input type="time" name="s_time11" class="form-control mt-2" id="time55" style="display:none">
                                </div>
                        </div>

                <div class="row"style="margin-left:165px">
                    <div class="form-group row">
                        <label for="date" class="control-label mt-3" style="display:none"id="namedate6">วันที่สอน(2)*</label>
                        <div class="form-group">
                            <select name="s_date2" class="col-sl-2 control-label ml-4 mt-2 form-control" style="display:none" id="date6">
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>
                        </div>
                  
        
                    <div class="form-group">
                        <label for="date" class="control-label mt-3 ml-5" style="display:none"id="nametime6">เวลาที่สอน(2)*</label>
                    </div>
                    
                        <label for="s_time2" class="control-label mt-3 ml-2 " style="display:none" id="nametimeb6">ตั้งแต่*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_time2" class="form-control mt-2" id="time6"style="display:none">
                            </div>
                        <label for="s_time22" class="control-label mt-3 ml-2" style="display:none"id="nametimea6">ถึง*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_time22" class="form-control mt-2"  style="display:none" id="time66">
                            </div>
                    </div>

                    <div class="row"style="margin-left:165px">
                    <div class="form-group row">
                        <label for="date" class="control-label mt-3" style="display:none"id="namedate7">วันที่สอน(3)*</label>
                        <div class="form-group">
                            <select name="s_date3" class="col-sl-2 control-label ml-4 mt-2 form-control" style="display:none" id="date7">
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>
                    </div>
        
                    <div class="form-group">
                        <label for="date" class="control-label mt-3 ml-5" style="display:none"id="nametime7">เวลาที่สอน(3)*</label>
                    </div>
                  
                        <label for="s_time3" class="control-label mt-3 ml-2" style="display:none" id="nametimeb7">ตั้งแต่*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_time3" class="form-control mt-2" id="time7"style="display:none">
                            </div>
                        <label for="s_time33" class="control-label mt-3 ml-2" style="display:none"id="nametimea7">ถึง*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_time33" class="form-control mt-2"  style="display:none" id="time77">
                            </div>
                    </div>


                    <script>
                        function myFunction5(){
                            var checkBox = document.getElementById("myCheck5");
                            var date5 = document.getElementById("date5");
                            var nametime5 = document.getElementById("nametime5");
                            var nametimeb5 = document.getElementById("nametimeb5");
                            var time5 = document.getElementById("time5");
                            var nametimea5 = document.getElementById("nametimea5");
                            var time55 = document.getElementById("time55");

                            var date6 = document.getElementById("date6");
                            var nametime6 = document.getElementById("nametime6");
                            var nametimeb6 = document.getElementById("nametimeb6");
                            var time6 = document.getElementById("time6");
                            var nametimea6 = document.getElementById("nametimea6");
                            var time66 = document.getElementById("time66");

                            var date7 = document.getElementById("date7");
                            var nametime7 = document.getElementById("nametime7");
                            var nametimeb7 = document.getElementById("nametimeb7");
                            var time7 = document.getElementById("time7");
                            var nametimea7 = document.getElementById("nametimea7");
                            var time77 = document.getElementById("time77");
                            
                                if (checkBox.value == 1){
                                    namedate5.style.display = "block";
                                    date5.style.display = "block";
                                    nametime5.style.display = "block";
                                    nametimeb5.style.display = "block";
                                    nametimea5.style.display = "block";
                                    time5.style.display = "block";
                                    time55.style.display = "block";

                                    namedate6.style.display = "none";
                                    date6.style.display = "none";
                                    nametime6.style.display = "none";
                                    nametimeb6.style.display = "none";
                                    nametimea6.style.display = "none";
                                    time6.style.display = "none";
                                    time66.style.display = "none";

                                    namedate7.style.display = "none";
                                    date7.style.display = "none";
                                    nametime7.style.display = "none";
                                    nametimeb7.style.display = "none";
                                    nametimea7.style.display = "none";
                                    time7.style.display = "none";
                                    time77.style.display = "none";
                     
                                }else if (checkBox.value == 2) {
                                    namedate5.style.display = "block";
                                    date5.style.display = "block";
                                    nametime5.style.display = "block";
                                    nametimeb5.style.display = "block";
                                    nametimea5.style.display = "block";
                                    time5.style.display = "block";
                                    time55.style.display = "block";

                                    namedate6.style.display = "block";
                                    date6.style.display = "block";
                                    nametime6.style.display = "block";
                                    nametimeb6.style.display = "block";
                                    nametimea6.style.display = "block";
                                    time6.style.display = "block";
                                    time66.style.display = "block";

                                    namedate7.style.display = "none";
                                    date7.style.display = "none";
                                    nametime7.style.display = "none";
                                    nametimeb7.style.display = "none";
                                    nametimea7.style.display = "none";
                                    time7.style.display = "none";
                                    time77.style.display = "none";
                                }else if (checkBox.value == 3){
                                    namedate5.style.display = "block";
                                    date5.style.display = "block";
                                    nametime5.style.display = "block";
                                    nametimeb5.style.display = "block";
                                    nametimea5.style.display = "block";
                                    time5.style.display = "block";
                                    time55.style.display = "block";

                                    namedate6.style.display = "block";
                                    date6.style.display = "block";
                                    nametime6.style.display = "block";
                                    nametimeb6.style.display = "block";
                                    nametimea6.style.display = "block";
                                    time6.style.display = "block";
                                    time66.style.display = "block";

                                    namedate7.style.display = "block";
                                    date7.style.display = "block";
                                    nametime7.style.display = "block";
                                    nametimeb7.style.display = "block";
                                    nametimea7.style.display = "block";
                                    time7.style.display = "block";
                                    time77.style.display = "block";
                                }else {
                                    namedate5.style.display = "none";
                                    date5.style.display = "none";
                                    nametime5.style.display = "none";
                                    nametimeb5.style.display = "none";
                                    nametimea5.style.display = "none";
                                    time5.style.display = "none";
                                    time55.style.display = "none";

                                    namedate6.style.display = "none";
                                    date6.style.display = "none";
                                    nametime6.style.display = "none";
                                    nametimeb6.style.display = "none";
                                    nametimea6.style.display = "none";
                                    time6.style.display = "none";
                                    time66.style.display = "none";

                                    namedate7.style.display = "none";
                                    date7.style.display = "none";
                                    nametime7.style.display = "none";
                                    nametimeb7.style.display = "none";
                                    nametimea7.style.display = "none";
                                    time7.style.display = "none";
                                    time77.style.display = "none";
                                }

                            
                        }   
        </script>
            
          

        

        <div class="form-group row">
            <label for="s_hweekhp" style="margin-left:108px;">ชั่วโมง/สัปดาห์(ปฏิบัติ)*</label>
            <div class="col-sm-3">
            <select name="s_hweekhp" class="form-control" id="myCheck8"  onclick="myFunction8()">
            <option value="" selected="selected">เลือกจำนวนชั่วโมง</option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
            </div>
        </div>

        <div class="form-group row">
        <label for="compensation"  style="display:none ;margin-left:93px; margin-top:20px;" id ="namecompensationlab">อัตราค่าตอบแทน(ปฏิบัติ)*</label>
        <div class="col-sm-3">
            <input type="number" name="s_compensationlab" style="display:none;margin-top:5px;" id ="scompensationlab" class="form-control" min="0"  placeholder="Enter Compensation">
        </div>
        </div>  

      
        <div class="form-group row">
            <label for="classp"  id="nameselectlab"style="display:none;margin-left:120px;">เลือกจำนวนหมู่ปฎิบัติ</label>
            <div class="col-sm-2">
            <select name="s_numclassp" class="form-control"style="display:none;margin-left:3px;"id="numselectlab"onclick="myFunction9()">
            <option value="" selected="selected">เลือกจำนวน</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              
            </select>
            </div>
        </div>

        
        <div class="form-group row"style="margin-left:168px">
            <label for="classp" class="mt-2" id="nameclasslab1"style="display:none;">หมู่ปฏิบัติ(1)</label>
            <div class="col-sm-3">
            <select name="s_classp" class="form-control"style="display:none"id="numclasslab1">
            <option value="" selected="selected">เลือกหมู่ปฏิบัติ</option>
                <option value="800">800</option>
                <option value="801">801</option>
                <option value="802">802</option>
                <option value="803">803</option>
                <option value="804">804</option>
                <option value="805">805</option>
                <option value="806">806</option>
                <option value="807">807</option>
                <option value="808">808</option>
                <option value="809">809</option>
            </select>
            </div>
        </div>

        <div class="row"style="margin-left:110px">
        <div class="form-group row">
                        <label for="date" class=" control-label" style="display:none"id="namedatelab1">วันที่สอนหมู่ปฏิบัติ(1)*</label>
                        <div class="form-group"> 
                            <select name="s_datelab1" class="col-sl-3 control-label ml-4  form-control" style="display:none" id="datelab1">
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>
                    </div>
        
                    <div class="form-group">
                        <label for="date" class="control-label ml-5 " style="display:none"id="nametimelab1">เวลาที่สอนหมู่ปฏิบัติ(1)*</label>
                    </div>
                   
                        <label for="s_timelab1" class="col-ss-3 ml-3" style="display:none" id="nametimeblab1">ตั้งแต่*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab1" class="form-control mt-1" id="timelab1"style="display:none">
                            </div>
                        <label for="s_timelab11" class="col-ss-3 " style="display:none"id="nametimealab11">ถึง*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab11" class="form-control mt-1"  style="display:none" id="timelab11">
                            </div>
                    </div>

        <div class="form-group row"style="margin-left:168px">
            <label for="classp" class="control-label mt-2" id="nameclasslab2"style="display:none">หมู่ปฏิบัติ(2)</label>
            <div class="col-sm-3">
            <select name="s_classp2" class="form-control"style="display:none"id="numclasslab2">
            <option value="" selected="selected">เลือกหมู่ปฏิบัติ</option>
                <option value="800">800</option>
                <option value="801">801</option>
                <option value="802">802</option>
                <option value="803">803</option>
                <option value="804">804</option>
                <option value="805">805</option>
                <option value="806">806</option>
                <option value="807">807</option>
                <option value="808">808</option>
                <option value="809">809</option>
            </select>
            </div>
        </div>
        <div class="row"style="margin-left:110px">
        <div class="form-group row">
                        <label for="date" class="control-label" style="display:none"id="namedatelab2">วันที่สอนหมู่ปฏิบัติ(2)*</label>
                        <div class="form-group">
                            <select name="s_datelab2" class="col-sl-3 control-label ml-4 mt-2 form-control" style="display:none" id="datelab2">
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>
                    </div>
        
                    <div class="form-group">
                        <label for="date" class="control-label ml-5" style="display:none"id="nametimelab2">เวลาที่สอนหมู่ปฏิบัติ(2)*</label>
                    </div>
                   
                        <label for="s_timelab2" class="col-ss-3 ml-3 " style="display:none" id="nametimeblab2">ตั้งแต่*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab2" class="form-control mt-1" id="timelab2"style="display:none">
                            </div>
                        <label for="s_timelab2" class="col-ss-3  " style="display:none"id="nametimealab22">ถึง*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab22" class="form-control mt-1"  style="display:none" id="timelab22">
                            </div>
                    </div>
   
            <div class="form-group row"style="margin-left:168px">
            <label for="classp" class=" control-label mt-2" id="nameclasslab3"style="display:none">หมู่ปฏิบัติ(3)</label>
            <div class="col-sm-3">
            <select name="s_classp3" class="form-control"style="display:none"id="numclasslab3">
            <option value="" selected="selected">เลือกหมู่ปฏิบัติ</option>
                <option value="800">800</option>
                <option value="801">801</option>
                <option value="802">802</option>
                <option value="803">803</option>
                <option value="804">804</option>
                <option value="805">805</option>
                <option value="806">806</option>
                <option value="807">807</option>
                <option value="808">808</option>
                <option value="809">809</option>
            </select>
            </div>
        </div>
       
        <div class="row"style="margin-left:110px">
        <div class="form-group row">
                        <label for="date" class="control-label" style="display:none"id="namedatelab3">วันที่สอนหมู่ปฏิบัติ(3)*</label>
                        <div class="form-group">
                            <select name="s_datelab3" class="col-sl-3 control-label ml-4 mt-2 form-control" style="display:none" id="datelab3">
                                <option value="" selected="selected">เลือกวัน</option>
                                    <option value="จ.">จันทร์</option>
                                    <option value="อ.">อังคาร</option>
                                    <option value="พ.">พุธ</option>
                                    <option value="พฤ.">พฤหัสบดี</option>
                                    <option value="ศ.">ศุกร์</option>
                                    <option value="ส.">เสาร์</option>
                                    <option value="อา.">อาทิตย์</option>
                            </select>
                            </div>
                    </div>
        
                    <div class="form-group">
                        <label for="date" class="control-label ml-5" style="display:none"id="nametimelab3">เวลาที่สอนหมู่ปฏิบัติ(3)*</label>
                    </div>
                   
                        <label for="s_timelab3" class="col-ss-3 ml-3 " style="display:none" id="nametimeblab3">ตั้งแต่*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab3" class="form-control mt-1" id="timelab3"style="display:none">
                            </div>
                        <label for="s_timelab3" class="col-ss-3  " style="display:none"id="nametimealab33">ถึง*</label>
                            <div class="col-sm-2">
                                <input type="time" name="s_timelab33" class="form-control mt-1"  style="display:none" id="timelab33">
                            </div>
                    </div>
   

        <script>
        function myFunction8(){
            var checkBox = document.getElementById("myCheck8");
            var nameclasslab= document.getElementById("nameselectlab");
            var numclasslab = document.getElementById("numselectlab");

            var namecompensationlab = document.getElementById("namecompensationlab");
            var scompensationlab = document.getElementById("scompensationlab");

           
            if (checkBox.value != ""){
                nameselectlab.style.display = "block";
                numselectlab.style.display = "block";
                namecompensationlab.style.display = "block";
                scompensationlab.style.display = "block";
            }else {
                nameselectlab.style.display = "none";
                numselectlab.style.display = "none";
                namecompensationlab.style.display = "none";
                scompensationlab.style.display = "none";

                nameclasslab1.style.display = "none";
                numclasslab1.style.display = "none";
                namedatelab1.style.display = "none";
                datelab1.style.display = "none";
                nametimeblab1.style.display = "none";
                timelab1.style.display = "none";
                nametimealab11.style.display = "none";
                timelab11.style.display = "none";
                nametimelab1.style.display = "none";

                nameclasslab2.style.display = "none";
                numclasslab2.style.display = "none";
                namedatelab2.style.display = "none";
                datelab2.style.display = "none";
                nametimeblab2.style.display = "none";
                timelab2.style.display = "none";
                nametimealab22.style.display = "none";
                timelab22.style.display = "none";
                nametimelab2.style.display = "none";

                nameclasslab3.style.display = "none";
                numclasslab3.style.display = "none";
                namedatelab3.style.display = "none";
                datelab3.style.display = "none";
                nametimeblab3.style.display = "none";
                timelab3.style.display = "none";
                nametimealab33.style.display = "none";
                timelab33.style.display = "none";
                nametimelab3.style.display = "none";
            }
        }
        </script>

        <script>
        function myFunction9(){
            var checkBox = document.getElementById("numselectlab");

            var nameclasslab1= document.getElementById("nameclasslab1");
            var numclasslab1 = document.getElementById("numclasslab1");
            var namedatelab1 = document.getElementById("namedatelab1");
            var nametimelab1 = document.getElementById("nametimelab1");
            
            var datelab1 = document.getElementById("datelab1");
            var nametimeblab1 = document.getElementById("nametimeblab1");
            var timelab1 = document.getElementById("timelab1");
            var nametimealab11 = document.getElementById("nametimealab11");
            var timelab11 = document.getElementById("timelab11");

            var nameclasslab2= document.getElementById("nameclasslab2");
            var numclasslab2 = document.getElementById("numclasslab2");
            var namedatelab2 = document.getElementById("namedatelab2");
            var nametimelab2 = document.getElementById("nametimelab2");
         
            var datelab2 = document.getElementById("datelab2");
            var nametimeblab2 = document.getElementById("nametimeblab2");
            var timelab2 = document.getElementById("timelab2");
            var nametimealab22 = document.getElementById("nametimealab22");
            var timelab22 = document.getElementById("timelab22");

            var nameclasslab3= document.getElementById("nameclasslab3");
            var numclasslab3 = document.getElementById("numclasslab3");
            var namedatelab3 = document.getElementById("namedatelab3");
            var nametimelab3 = document.getElementById("nametimelab3");
            var datelab3 = document.getElementById("datelab3");
            var nametimeblab3 = document.getElementById("nametimeblab3");
            var timelab3 = document.getElementById("timelab3");
            var nametimealab33 = document.getElementById("nametimealab33");
            var timelab33 = document.getElementById("timelab33");

            if (checkBox.value == 1){
                nameclasslab1.style.display = "block";
                numclasslab1.style.display = "block";
                namedatelab1.style.display = "block";
                datelab1.style.display = "block";
                nametimeblab1.style.display = "block";
                timelab1.style.display = "block";
                nametimealab11.style.display = "block";
                timelab11.style.display = "block";
                nametimelab1.style.display = "block";


                nameclasslab2.style.display = "none";
                numclasslab2.style.display = "none";
                namedatelab2.style.display = "none";
                datelab2.style.display = "none";
                nametimeblab2.style.display = "none";
                timelab2.style.display = "none";
                nametimealab22.style.display = "none";
                timelab22.style.display = "none";
                nametimelab2.style.display = "none";

                nameclasslab3.style.display = "none";
                numclasslab3.style.display = "none";
                namedatelab3.style.display = "none";
                datelab3.style.display = "none";
                nametimeblab3.style.display = "none";
                timelab3.style.display = "none";
                nametimealab33.style.display = "none";
                timelab33.style.display = "none";
                nametimelab3.style.display = "none";
              
            }else if (checkBox.value == 2){
                nameclasslab1.style.display = "block";
                numclasslab1.style.display = "block";
                namedatelab1.style.display = "block";
                datelab1.style.display = "block";
                nametimeblab1.style.display = "block";
                timelab1.style.display = "block";
                nametimealab11.style.display = "block";
                timelab11.style.display = "block";
                nametimelab1.style.display = "block";

                nameclasslab2.style.display = "block";
                numclasslab2.style.display = "block";
                namedatelab2.style.display = "block";
                datelab2.style.display = "block";
                nametimeblab2.style.display = "block";
                timelab2.style.display = "block";
                nametimealab22.style.display = "block";
                timelab22.style.display = "block";
                nametimelab2.style.display = "block";

                nameclasslab3.style.display = "none";
                numclasslab3.style.display = "none";
                namedatelab3.style.display = "none";
                datelab3.style.display = "none";
                nametimeblab3.style.display = "none";
                timelab3.style.display = "none";
                nametimealab33.style.display = "none";
                timelab33.style.display = "none";
                nametimelab3.style.display = "none";
            }else if (checkBox.value == 3) {
                nameclasslab1.style.display = "block";
                numclasslab1.style.display = "block";
                namedatelab1.style.display = "block";
                datelab1.style.display = "block";
                nametimeblab1.style.display = "block";
                timelab1.style.display = "block";
                nametimealab11.style.display = "block";
                timelab11.style.display = "block";
                nametimelab1.style.display = "block";

                nameclasslab2.style.display = "block";
                numclasslab2.style.display = "block";
                namedatelab2.style.display = "block";
                datelab2.style.display = "block";
                nametimeblab2.style.display = "block";
                timelab2.style.display = "block";
                nametimealab22.style.display = "block";
                timelab22.style.display = "block";
                nametimelab2.style.display = "block";

                nameclasslab3.style.display = "block";
                numclasslab3.style.display = "block";
                namedatelab3.style.display = "block";
                datelab3.style.display = "block";
                nametimeblab3.style.display = "block";
                timelab3.style.display = "block";
                nametimealab33.style.display = "block";
                timelab33.style.display = "block";
                nametimelab3.style.display = "block";
            }else {
                nameclasslab1.style.display = "none";
                numclasslab1.style.display = "none";
                namedatelab1.style.display = "none";
                datelab1.style.display = "none";
                nametimeblab1.style.display = "none";
                timelab1.style.display = "none";
                nametimealab11.style.display = "none";
                timelab11.style.display = "none";
                nametimelab1.style.display = "none";

                nameclasslab2.style.display = "none";
                numclasslab2.style.display = "none";
                namedatelab2.style.display = "none";
                datelab2.style.display = "none";
                nametimeblab2.style.display = "none";
                timelab2.style.display = "none";
                nametimealab22.style.display = "none";
                timelab22.style.display = "none";
                nametimelab2.style.display = "none";

                nameclasslab3.style.display = "none";
                numclasslab3.style.display = "none";
                namedatelab3.style.display = "none";
                datelab3.style.display = "none";
                nametimeblab3.style.display = "none";
                timelab3.style.display = "none";
                nametimealab33.style.display = "none";
                timelab33.style.display = "none";
                nametimelab3.style.display = "none";
            }
        }
        </script>


           
        

     

       
        <div class="form-group row" style="margin-left:155px;">
            <label for="s_fiscaly" class="control-label mt-2">ปีงบประมาณ*</label>
                <div class="col-sm-3">
                    <input type="text" name="s_fiscaly" class="form-control"  required placeholder="Enter fiscaly">
                </div>
        </div>        
        
       
       
       <br>
       <br>
            <div class="col-sm-5" style="margin-left:245    px;">
            <input type="submit" name="btn_addsubject" class="btn btn-primary" style="width:100%" value="บันทึกข้อมูลวิชา">
           
 
        <div class="form-group text-center">
           
            <p><a href="savesub_home.php">ยกเลิกการลงทะเบียน</a></p>
        </div>

        </form>
    
    </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



</body>
</html>