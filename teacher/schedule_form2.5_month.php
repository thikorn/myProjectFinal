<?php 
session_start();
require_once("../connection.php");  
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">   
    <title>Document</title>
    <style type="text/css">
    div.table-responsive::-webkit-scrollbar,
    div.table-responsive::-webkit-scrollbar {
      width: 10px;
      height: 2px;
    }
    ::-webkit-scrollbar {
      width: 10px;
      height: 7px;
    }
    ::-webkit-scrollbar-button {
      width: 0px;
      height: 0px;
    }
    ::-webkit-scrollbar-thumb {
      background: #CACACA;
      border: 0px none #CACACA;
      border-radius: 50px;
    }
    ::-webkit-scrollbar-thumb:active {
      background: #000000;
    }
    .wrap_schedule_control{
        margin: 25px 50px 75px 100px;
        width:800px;    
    }
    .wrap_schedule{
        cursor: grab;
        margin:auto;
        width:800px;    
    }
    .time_schedule{
        font-size:12px; 
    }
    .day_schedule{
        font-size:12px; 
    }
    .time_schedule_text{
 
    }
    .day_schedule_text{
        width:80px;
        font-size: 12px;
        padding: 10px 5px;
    }
    .day-head-label{
        position: relative;
        right: 10px;
        top: 0; 
    }
    .time-head-label{
        position: relative;
        left: 10px;
        bottom: 0;  
    }
    .diagonal-cross{
    border-bottom: 2px solid #dee2e6;
        /* -webkit-transform: translateY(20px) translateX(5px) rotate(26deg); */
        position: relative;
        top: -20px;
        left: 0;
        transform: translateY(20px) translateX(5px) rotate(20deg);
    }
    .sc-detail{
        font-size: 11px;
        background-color: #000000;
        color: #FFFFFF;
    }
    .sc-detail a{
        color: #FF4F00;
        font-size: 14px;
    }
    </style>  
<?php
    ////////////////////// ส่วนของการจัดการตารางเวลา /////////////////////
$sc_startTime=date("Y-m-d 08:00:00");  // กำหนดเวลาเริ่มต้ม เปลี่ยนเฉพาะเลขเวลา
$sc_endtTime=date("Y-m-d 21:00:00");  // กำหนดเวลาสื้นสุด เปลี่ยนเฉพาะเลขเวลา
$sc_t_startTime=strtotime($sc_startTime);
$sc_t_endTime=strtotime($sc_endtTime);
$sc_numStep="60"; // ช่วงช่องว่างเวลา หน่ายนาที 60 นาที = 1 ชั่วโมง
$num_dayShow=7;  // จำนวนวันที่โชว์ 1 - 7
$sc_timeStep=array();
$sc_numCol=0;
$hour_block_width = 90;
////////////////////// ส่วนของการจัดการตารางเวลา /////////////////////
  
      


while($sc_t_startTime<=$sc_t_endTime){
    $sc_timeStep[$sc_numCol]=date("H:i",$sc_t_startTime);    
    $sc_t_startTime=$sc_t_startTime+($sc_numStep*60); 
    $sc_numCol++;    // ได้จำนวนคอลัมน์ที่จะแสดง
} 

function getduration($datetime1, $datetime2){
    $datetime1 = (preg_match('/-/',$datetime1))?(int)strtotime($datetime1):(int)$datetime1;
    $datetime2 = (preg_match('/-/',$datetime2))?(int)strtotime($datetime2):(int)$datetime2;
    $duration = ($datetime2 >= $datetime1)?$datetime2 - $datetime1:$datetime1 - $datetime2;
    return $duration;
}       
function timeblock($time,$sc_numCol,$sc_timeStep){
global $sc_numStep;
$time = (preg_match('/:/',$time))?(int)strtotime($time):(int)$time;
for($i_time=0;$i_time<$sc_numCol-1;$i_time++){
    if($time>=strtotime($sc_timeStep[$i_time]) && $time<strtotime($sc_timeStep[$i_time+1])){
        if($time>strtotime($sc_timeStep[$i_time]) ){
            $duation = getduration($time,strtotime($sc_timeStep[$i_time]));
            $float_duration = ((($duation/60)*100)/$sc_numStep)*0.01;
            return $i_time+$float_duration;
        }{
            return $i_time;
        }           
    }       
}
}

// ส่วนของตัวแปรสำหรับกำหนด
$dayTH=array("จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์");     
$monthTH=array(
"","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"        
);     
$monthTH_brev=array(     
"","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."                                        
);   

?>
</head>

<body>

<div class="wrap_schedule_control">

<br>

<table class="table  table-bordered">
<thead class="thead-light">

  <tr class="time_schedule">
    <th class="p-0"  style ="background-color: #FFFFFF;" >
    <div class="day-head-label text-right ml-5">
        เวลา
    </div>
   
    </th>
<?php
for($i_time=0;$i_time<$sc_numCol-1;$i_time++){
?>
    <th class="px-0 text-nowrap th-time"  style ="background-color: #FFFFFF;">
    <div class="time_schedule_text text-center" style="width: <?=$hour_block_width ?>px;">
        <?=$sc_timeStep[$i_time]?> - <?=$sc_timeStep[$i_time+1]?> 
    </div>
    </th>
<?php }?>
  </tr>
</thead>  
<tbody>

<?php
// วนลูปแสดงจำนวนวันตามที่กำหนด
for($i_day=0;$i_day<$num_dayShow;$i_day++){
   
?>
<tr>
<?php //แสดงวัน ?>  
    <td class="p-0 text-center table-active"  style ="background-color: #FFFFFF;"  >
    <div class="day_schedule_text text-nowrap" style="min-height: 60px;">
        <?=$dayTH[$i_day]?> 
        <br>
    
    </div>
    <?php //แสดงเวลา ?>  
    <td class="p-0 position-relative" colspan="13" >
    <div class="position-absolute">
    <div class="d-flex align-content-stretch" style="min-height: 60px; width:3000px">
    <?php //ข้างในตาราง ?>
    <?php        $ids = $_SESSION['ids'];
                 $select_stmt = $db->prepare("SELECT * from subject WHERE ids = :uids  ");
                 $select_stmt->bindParam(":uids", $ids);
                 $select_stmt->execute();
                 $row_count = $select_stmt->rowCount();
             while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                   $duration = getduration(strtotime($row['time1']),strtotime($row['time11']));
                   $timeblock= timeblock($row['time1'],$sc_numCol,$sc_timeStep);

                   $duration2 = getduration(strtotime($row['time2']),strtotime($row['time22']));
                   $timeblock2= timeblock($row['time2'],$sc_numCol,$sc_timeStep);

                   $duration3 = getduration(strtotime($row['time3']),strtotime($row['time33']));
                   $timeblock3= timeblock($row['time3'],$sc_numCol,$sc_timeStep);

                   $duration4 = getduration(strtotime($row['timelab1']),strtotime($row['timelab11']));
                   $timeblock4= timeblock($row['timelab1'],$sc_numCol,$sc_timeStep);

                   $duration5 = getduration(strtotime($row['timelab2']),strtotime($row['timelab22']));
                   $timeblock5= timeblock($row['timelab2'],$sc_numCol,$sc_timeStep);

                   $duration6 = getduration(strtotime($row['timelab3']),strtotime($row['timelab33']));
                   $timeblock6= timeblock($row['timelab3'],$sc_numCol,$sc_timeStep);

                   $sc_width = ($duration/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x = $timeblock*$hour_block_width+(int)$timeblock;
 
                   $sc_width2 = ($duration2/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x2 = $timeblock2*$hour_block_width+(int)$timeblock2;

                   $sc_width3 = ($duration3/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x3 = $timeblock3*$hour_block_width+(int)$timeblock3;

                   $sc_width4 = ($duration4/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x4 = $timeblock4*$hour_block_width+(int)$timeblock4;

                   $sc_width5 = ($duration5/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x5 = $timeblock5*$hour_block_width+(int)$timeblock5;

                   $sc_width6 = ($duration6/60)*($hour_block_width/$sc_numStep);
                   $sc_start_x6 = $timeblock6*$hour_block_width+(int)$timeblock6;
                 
                   $ids = $row['ids'];
                   $date1 = $row['date1'];
                   $date2 = $row['date2'];
                   $date3 = $row['date3'];
                   $date4 = $row['datelab1'];
                   $date5 = $row['datelab2'];
                   $date6 = $row['datelab3'];
                   $hourLec = $row['hourLec'];
                   $hourLab = $row['hourLab'];
                   $hourLecLab = $hourLec+$hourLab;
                   $semester = $row['semester'];
                   $nameTeacher = $row['nameTeacher'];
                   $idt = $row['idteacher'];
                   $yearSubject = $row['yearSubject'];
                   $compensationlec = $row['compensationlec'];
                   $compensationlab = $row['compensationlab'];
                    //คำนวณค่าสอน a = รายสัปดาห์ / b = รายเดือน
                  $a = ($hourLec*$compensationlec) + ($hourLab*$compensationlab);
                   $b = $a*4 ;
 
             } 
             $select_stmt = $db->prepare("SELECT * from member WHERE id = :uidt  ");
             $select_stmt->bindParam(":uidt", $idt);
             $select_stmt->execute();
             $row_count = $select_stmt->rowCount();
         while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  $qualification = $row['qualification'];
                  $position = $row['position'];
                  $affiliation = $row['affiliation'];
         }
                 ?>  
    <?php for($i=1;$i<$sc_numCol;$i++){ ?>
        <div class="bg-white text-center border-right " style="width: <?=$hour_block_width ?>px;margin-right: 1.2px;  ">
        &nbsp;
        </div>
        <?php } ?>

       
        <?php if($i_day==0 and $date1 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lect</p>   
        </div>        
        </div>
      <?php } if($i_day==0 and $date2 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lect</p>       
        </div>
     <?php } if($i_day==0 and $date3 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lect</p>       
        </div>
      <?php } if($i_day==0 and $date4 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lab</p>       
        </div>
        <?php } if($i_day==0 and $date5 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lab</p>      
        </div>
      <?php } if($i_day==0 and $date6 =="จ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lab</p>      
        </div>
      <?php } ?>

      <?php if($i_day==1 and $date1 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lect</p>      
        </div>        
        </div>
      <?php } if($i_day==1 and $date2 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lect</p>   
        </div>
     <?php } if($i_day==1 and $date3 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lect</p>         
        </div>
      <?php } if($i_day==1 and $date4 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lab</p>   
        </div>
      <?php } if($i_day==1 and $date5 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">  
        <p style="margin-top:-10px;font-size:12px">Lab</p>        
        </div>
        <?php } if($i_day==1 and $date6 =="อ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;">  
        <p style="margin-top:-10px;font-size:12px">Lab</p>        
        </div>
      <?php } ?>

      <?php if($i_day==2 and $date1 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">      
        <p style="margin-top:-10px;font-size:12px">Lect</p>    
        </div>        
        </div>
      <?php } if($i_day==2 and $date2 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lect</p>         
        </div>
     <?php } if($i_day==2 and $date3 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">  
        <p style="margin-top:-10px;font-size:12px">Lect</p>        
        </div>
        <?php } if($i_day==2 and $date4 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lab</p>       
        </div>
        <?php } if($i_day==2 and $date5 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lab</p>       
        </div>
        <?php } if($i_day==2 and $date6 =="พ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lab</p>         
        </div>
      <?php } ?>

      <?php if($i_day==3 and $date1 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lect</p>   
        </div>        
        </div>
      <?php } if($i_day==3 and $date2 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lect</p>   
        </div>
     <?php } if($i_day==3 and $date3 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lect</p>      
        </div>
      <?php } if($i_day==3 and $date4 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">
        <p style="margin-top:-10px;font-size:12px">Lab</p>          
        </div>
        <?php } if($i_day==3 and $date5 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lab</p>       
        </div>
        <?php } if($i_day==3 and $date6 =="พฤ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lab</p>         
        </div>
      <?php } ?>
     


      <?php if($i_day==4 and $date1 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">      
        <p style="margin-top:-10px;font-size:12px">Lect</p>    
        </div>        
        </div>
      <?php } if($i_day==4 and $date2 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">      
        <p style="margin-top:-10px;font-size:12px">Lect</p>    
        </div>
     <?php } if($i_day==4 and $date3 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">     
        <p style="margin-top:-10px;font-size:12px">Lect</p>     
        </div>
      <?php } if($i_day==4 and $date4 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lab</p>      
        </div>
        <?php } if($i_day==4 and $date5 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">  
        <p style="margin-top:-10px;font-size:12px">Lab</p>        
        </div>
        <?php } if($i_day==4 and $date6 =="ศ."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lab</p>         
        </div>
      <?php } ?>


      <?php if($i_day==5 and $date1 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lect</p>   
        </div>        
        </div>
      <?php } if($i_day==5 and $date2 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lect</p>       
        </div>
     <?php } if($i_day==5 and $date3 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">      
        <p style="margin-top:-10px;font-size:12px">Lect</p>    
        </div>
      <?php } if($i_day==5 and $date4 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lab</p>      
        </div>
        <?php } if($i_day==5 and $date5 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">       
        <p style="margin-top:-10px;font-size:12px">Lab</p>   
        </div>
        <?php } if($i_day==5 and $date6 =="ส."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;">      
        <p style="margin-top:-10px;font-size:12px">Lab</p>    
        </div>
      <?php } ?>

      <?php if($i_day==6 and $date1 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        " 
        width: <?=$sc_width?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x?>px;
        min-height: 20px;"> 
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width?>px;height:20px;">  
        <p style="margin-top:-10px;font-size:12px">Lect</p>        
        </div>        
        </div>
      <?php } if($i_day==6 and $date2 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width2?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x2?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width2?>px;height:20px;">     
        <p style="margin-top:-10px;font-size:12px">Lect</p>     
        </div>
     <?php } if($i_day==6 and $date3 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width3?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x3?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width3?>px;height:20px;">   
        <p style="margin-top:-10px;font-size:12px">Lect</p>       
        </div>
      <?php } if($i_day==6 and $date4 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width4?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x4?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width4?>px;height:20px;">    
        <p style="margin-top:-10px;font-size:12px">Lab</p>      
        </div>
        <?php } if($i_day==6 and $date5 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width5?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x5?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width5?>px;height:20px;">
        <p style="margin-top:-10px;font-size:12px">Lab</p>          
        </div>
        <?php } if($i_day==6 and $date6 =="อา."){ ?>
        <div class="position-absolute text-center" style = 
        "   
        width: <?=$sc_width6?>px;
        margin-right: 1px;
        margin-left: <?=$sc_start_x6?>px;
        min-height: 20px;">  
        <div style="font-size:12px">
        <?php echo $ids ?>
        </div> 
        <img src="../image/direct.png"style=" width: <?=$sc_width6?>px;height:20px;"> 
        <p style="margin-top:-10px;font-size:12px">Lab</p>         
        </div>
      <?php } ?>


      
        
   
      
    </div>
    </div>
  
    </td>
    </tr>

    <?php }
    ?>  

    <tr>
    <td class =" day_schedule_text text-nowrap" style="min-height: 60px;" colspan=14>
    รวมชั่วโมง <?php echo $hourLecLab?> ชั่วโมง/สัปดาห์
    </td>
    </tr>

    <tr>
    <td class =" day_schedule_text text-nowrap" style="min-height: 60px;" colspan=14>
    รวมหน่วยชั่วโมง <?php $hourLecLabTerm = $hourLecLab*4; echo $hourLecLabTerm?> ชั่วโมง/เดือน
    </td>
    </tr>
    <div style = 'margin-left:-100px; width:1500px;'>
    <p align="center">ตารางสอนรายวิชาโครงการหลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาวิทยาการคอมพิวเตอร์ ภาคพิเศษ</p>
   
    <p align="center">ตารางสอนของ<u>____<?php echo $nameTeacher?>____</u>  &nbsp; วุฒิ<u>____<?php echo $qualification?>____</u> &nbsp; ตำแหน่ง<u>____<?php echo $position?>____</u> &nbsp; สังกัด<u>____<?php echo $affiliation?>____</u></p>
  
    <p align="center"> ภาคการศึกษา &nbsp; <label><input type="checkbox" name="checkbox" value="value" <?php if ( $semester == "ฤดูร้อน" ) echo 'checked="checked" '; ?> > ฤดูร้อน</label> &nbsp; <label><input type="checkbox" name="checkbox" value="value" <?php if ( $semester == "ต้น" ) echo 'checked="checked" '; ?>> ต้น</label> &nbsp; <label><input type="checkbox" name="checkbox" value="value" <?php if ( $semester == "ปลาย" ) echo 'checked="checked" '; ?>> ปลาย</label> &nbsp; ปีการศึกษา <?php echo $yearSubject?> 
    </p> 
    </table>
 
  <style> 
  #main {
  width: 1267px;
  height: 700px;
  display: flex;
  justify-content: space-between;
        }

  #main div {
  width: 580px;
  height: 500px;
            }
  </style>

  <body>
  <div id="main">
  <div><u>หมายเหตุ</u> ให้ใช้ลูกศรแสดงเวลาสอน โดยระบุรหัสวิชา ถ้าเป็นชั่วโมงปฏิบัตการให้ลงว่า Lab ถ้าเป็นการทบทวนให้ระบุแสดงว่าเป็นชั่วโมงบรรยาย</div>
  <div> ได้ตรวจสอบตารางสอนฉบับนี้แล้วถูกต้องถ้าได้สอนตามตารางนี้ครบถ้วนจะได้รับค่าสอน สัปดาห์ละ<u>__<?php echo $a ?>__</u>บาท &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เดือนละ<u>__<?php echo $b ?>__</u>บาท
  <br>  <br>
  <p style="text-align:center">ลงนาม.................................................(ผู้ตรวจเอกสาร)</p>
  <p style="text-align:center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
  <p style="text-align:center">................./................./.................</p>
  <style type="text/css" media="print">
    @page { size: landscape; }
    </style>
    <div class="div_main"> 
    <button id="hid" onclick="window.print();" class="btn btn-primary"> print </button>
    </div>
    
    <style type="text/css">
	@media print{
		#hid{
		   display: none; /* ซ่อน  */
		}
	}
</style>
  </div>
  </div>  
  </body>
  </div>
  
    

<script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>        
<script type="text/javascript">  
  
</body>
</html>
      