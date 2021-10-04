<?php  
require_once("dbconnect.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
 
<style type="text/css">
.wrap_schedule{
    margin:auto;
    width:800px;    
}
.activity{
    background-color:#C6EEC3;   
    font-size:12px;
}
.time_schedule{
    font-size:12px; 
}
.day_schedule{
    font-size:12px; 
}
.time_schedule_text{
    width:60px;
}
.day_schedule_text{
    width:80px;
}
</style>
 
<?php
// ส่วนของตัวแปรสำหรับกำหนด
$thai_day_arr=array("จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์");     
$thai_month_arr=array(
"","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"         
);     
$thai_month_arr_short=array(     
"","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."                                         
);    
 
 
////////////////////// ส่วนของการจัดการตารางเวลา /////////////////////
$sc_startTime=date("Y-m-d 08:00:00");  // กำหนดเวลาเริ่มต้ม เปลี่ยนเฉพาะเลขเวลา
$sc_endtTime=date("Y-m-d 18:00:00");  // กำหนดเวลาสื้นสุด เปลี่ยนเฉพาะเลขเวลา
$sc_t_startTime=strtotime($sc_startTime);
$sc_t_endTime=strtotime($sc_endtTime);
$sc_numStep="60"; // ช่วงช่องว่างเวลา หน่ายนาที 60 นาที = 1 ชั่วโมง
$num_dayShow=5;  // จำนวนวันที่โชว์ 1 - 7
$sc_timeStep=array();
$sc_numCol=0;
////////////////////// ส่วนของการจัดการตารางเวลา /////////////////////
 
     
// ส่วนของการกำหนดวัน สามารถนำไปประยุกต์กรณีทำตารางเวลาแบบ เลื่อนดูแต่ละสัปดาห์ได้
$now_day=date("Y-m-d"); // วันปัจจุบัน ให้แสดงตารางที่มีวันปัจจุบัน เมื่อแสดงครั้งแรก
if(isset($_GET['uts']) && $_GET['uts']!=""){ // เมื่อมีการเปลี่ยนสัปดาห์
    $now_day=date("Y-m-d",trim($_GET['uts'])); // เปลี่ยนวันที่ แปลงจากค่าวันจันทร์ที่ส่งมา
}
// หาตัวบวก หรือลบ เพื่อหาวันที่ของวันจันทร์ในสัปดาห์
$startWeekDay_back=(date("w",strtotime($now_day))!=0)?-(date("w",strtotime($now_day))):-6;
$start_weekDay=date("Y-m-d",strtotime("+$startWeekDay_back day")); // หาวันที่ของวันจันทร์ของสัปดาห์
if(isset($_GET['uts']) && $_GET['uts']!=""){ // ถ้ามีส่งค่าเปลี่ยนสัปดาห์มา
    $start_weekDay=$now_day; // ให้ใช้วันแรก เป็นวันที่ส่งมา
}
// หววันที่วันอาทิตย์ของสัปดาห์นั้นๆ
$end_weekDay=date("Y-m-d",strtotime($start_weekDay." +7 day"));
$timestamp_prev=strtotime($start_weekDay." -7 day");// ค่าวันจันทร์ของอาทิตย์ก่อหน้า
$timestamp_next=strtotime($start_weekDay." +7 day"); // ค่าวันจันทร์ของอาทิตย์ถัดไป
while($sc_t_startTime<=$sc_t_endTime){
    $sc_timeStep[$sc_numCol]=date("H:i",$sc_t_startTime);    
    $sc_t_startTime=$sc_t_startTime+($sc_numStep*60); 
    $sc_numCol++;    // ได้จำนวนคอลัมน์ที่จะแสดง
}
 
///////////////// ส่วนของข้อมูล ที่ดึงจากฐานข้อมูบ ////////////////////////
$data_schedule=array();
$sql="
    SELECT * FROM tbl_schedule  WHERE 
    course_date BETWEEN '".$start_weekDay."' AND '".$end_weekDay."'
    ORDER BY course_date
";
$result = $mysqli->query($sql);
if($result){
    while($row = $result->fetch_assoc()){
        $data_schedule[$row['course_date']][] = array(
            "start_time"=>$row['course_start_time'],
            "end_time"=>$row['course_end_time'],
            "detail"=>$row['course_title']       
        );
    }
}
///////////////// ส่วนของข้อมูล ที่ดึงจากฐานข้อมูบ ////////////////////////
 
 
///////////////// ตัวอย่างรูปแบบข้อมูล //////////////////
/*$data_schedule=array(
  "2016-10-30"=>array(
    "0"=>array(
        "start_time"=>"08:00:00",
        "end_time"=>"10:00:00",
        "detail"=>"test data1"
    )
  ),
  "2016-04-05"=>array(
    "0"=>array(
        "start_time"=>"10:00:00",
        "end_time"=>"12:00:00",
        "detail"=>"test data2"
    ),      
    "1"=>array(
        "start_time"=>"13:00:00",
        "end_time"=>"15:00:00",
        "detail"=>"test data3"
    ),
    "3"=>array(
        "start_time"=>"17:00:00",
        "end_time"=>"18:00:00",
        "detail"=>"test data4"
    ),        
  ),
  "2016-04-07"=>array(
    "0"=>array(
        "start_time"=>"09:00:00",
        "end_time"=>"12:00:00",
        "detail"=>"test data5"
    ),      
    "1"=>array(
        "start_time"=>"13:00:00",
        "end_time"=>"16:00:00",
        "detail"=>"test data6"
    ),
    "3"=>array(
        "start_time"=>"16:00:00",
        "end_time"=>"18:00:00",
        "detail"=>"test data7"
    ),     
  )
);
*/
///////////////// ตัวอย่างรูปแบบข้อมูล //////////////////
 
 
?>
 
<div class="wrap_schedule">
    <button type="button" onClick="window.location='demo_schedule.php?uts=<?=$timestamp_prev?>'">< Prev</button>
    &nbsp;&nbsp;&nbsp;
    <button type="button" onClick="window.location='demo_schedule.php?uts=<?=$timestamp_next?>'">Next ></button>
</div>
<br>
<div class="wrap_schedule">
 
<table  align="center" border="1" cellspacing="2" cellpadding="2"style="border-collapse:collapse;" >
  <tr class="time_schedule">
    <td align="center" valign="middle" height="50">
    &nbsp;</td>
<?php
for($i_time=0;$i_time<$sc_numCol-1;$i_time++){
?>
    <td align="center" valign="middle" height="50">
    <div class="time_schedule_text">
        <?=$sc_timeStep[$i_time]?> - <?=$sc_timeStep[$i_time+1]?> 
    </div>
    </td>
<?php }?>
  </tr>
<?php
// วนลูปแสดงจำนวนวันตามที่กำหนด
for($i_day=0;$i_day<$num_dayShow;$i_day++){
    $dayInSchedule_chk=date("Y-m-d",strtotime($start_weekDay." +".$i_day." day"));
    $dayInSchedule_show=date("d-m-Y",strtotime($start_weekDay." +".$i_day." day"));
?>
  <tr>
    <td align="center" valign="middle" height="50" class="day_schedule">
    <div class="day_schedule_text">
        <?=$thai_day_arr[$i_day]?> 
        <br>
        <?=$dayInSchedule_show?>    
    </div>
    </td>
<?php
// ตรวจสอบและกำหนดช่วงเวลาให้สอดคล้องกับช้อมูล        
if(isset($data_schedule[$dayInSchedule_chk])){
    $num_data=count($data_schedule[$dayInSchedule_chk]);
}else{
    $num_data=0;
}
$arr_checkSpan=array();
$arr_detailShow=array();
$real_sc_numCol=$sc_numCol;
for($i_time=0;$i_time<$sc_numCol-1;$i_time++){    
    if($num_data>0){
        $haveIN=0;
        $dataShow="";
        foreach($data_schedule[$dayInSchedule_chk] as $k=>$v){
            if(strtotime($dayInSchedule_chk." ".$sc_timeStep[$i_time].":00") == 
            strtotime($dayInSchedule_chk." ".$v['start_time'])){
                $haveIN++; 
                $dataShow=$v['detail'];
                $add=1;
                while(strtotime($dayInSchedule_chk." ".$sc_timeStep[$i_time+$add].":00") < 
                strtotime($dayInSchedule_chk." ".$v['end_time'])){
                    $haveIN++; 
                    $dataShow=$v['detail'];      
                    $add++;
                }
            }
        }
        $arr_checkSpan[$i_time]=$haveIN;
        $arr_detailShow[$i_time]=$dataShow;
    }  
}
for($i_time=0;$i_time<$sc_numCol-1;$i_time++){
    $colspan="";
    $css_use="";
    $dataShowIN="";
    if(isset($arr_checkSpan[$i_time])){
        if($arr_checkSpan[$i_time]>0){
            $dataShowIN=$arr_detailShow[$i_time]; 
            $css_use="class=\"activity\"";
        }
         if($arr_checkSpan[$i_time]>1){
            $colspan="colspan=\"".$arr_checkSpan[$i_time]."\"";
            $step_add=$arr_checkSpan[$i_time]-1;
            $i_time+=$step_add;
        }       
    }
?>
    <td <?=$css_use?> <?=$colspan?> align="center" valign="middle" height="50">
    <?php
    echo $dataShowIN;                                   
    ?>
    </td>
<?php  }?>
  </tr>  
<?php }?>
</table>       
     
</div>            
</body>
</html>