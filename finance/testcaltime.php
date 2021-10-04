<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 14,
	'default_font' => 'sarabun'
]); ?>

<?php include('../connection.php');
session_start();
?>

<?php
$ids = $_SESSION['code'];



$year = $_SESSION['year'];
$semeter = $_SESSION['semeter'];
$dateOv3 = $_SESSION['dateOv3'];
$numberOv3 = $_SESSION['numberOv3'];
$Dapartmentreq = $_SESSION['Dapartmentreq'];
$subname = $_SESSION['subname'];
$numnisit = $_SESSION['numnisit'];
$time1 = $_SESSION['time1'];
$time11 = $_SESSION['time11'];
$nameTeacher =$_SESSION['nameTeacher'];
$fiscaYear =$_SESSION['fiscaYear'];
$nameTeacher =$_SESSION['nameTeacher'];
$credit =$_SESSION['credit'];
$hourLec =$_SESSION['hourLec'];
$hourLab =$_SESSION['hourLab'];
$compensationlec =$_SESSION['compensationlec'];
$compensationlab =$_SESSION['compensationlab'];
$amountwithdraw1 =  $_SESSION['amountwithdraw1'];
$amountwithdraw2 =  $_SESSION['amountwithdraw2'];
$amountwithdraw3 =  $_SESSION['amountwithdraw3'];
$amountwithdraw4 =  $_SESSION['amountwithdraw4'];
$amountwithdraw5 =  $_SESSION['amountwithdraw5'];

$selectmonth = $_SESSION['selectmonth'];

$a = $amountwithdraw1 + $amountwithdraw2 + $amountwithdraw3 + $amountwithdraw4 + $amountwithdraw5;

function caltime($time11 , $time1){
    $current_date_time_sec=strtotime($time1);
    $future_date_time_sec=strtotime($time11);
    $difference=$future_date_time_sec-$current_date_time_sec;
    $hours=($difference / 3600);
    return $hours;
}

function caltimelab($time11 , $time1){
    $current_date_time_sec=strtotime($time1);
    $future_date_time_sec=strtotime($time11);
    $difference=$future_date_time_sec-$current_date_time_sec;
    $hours=($difference / 3600);
    return $hours/2;
}

function caltotime($time11 , $time1){
    $current_date_time_sec=strtotime($time1);
    $future_date_time_sec=strtotime($time11);
    $difference=$future_date_time_sec-$current_date_time_sec;
    $hours=($difference / 3600);
    $tohours = $tohours + $hours;
    return $tohours;
}


$var_date = $dateOv3; // Query ว/ด/ปี หัวตาราง

$thai_month_arr=array(
 "0"=>"",
 "1"=>"มกราคม",
 "2"=>"กุมภาพันธ์",
 "3"=>"มีนาคม",
 "4"=>"เมษายน",
 "5"=>"พฤษภาคม",
 "6"=>"มิถุนายน", 
 "7"=>"กรกฎาคม",
 "8"=>"สิงหาคม",
 "9"=>"กันยายน",
 "10"=>"ตุลาคม",
 "11"=>"พฤศจิกายน",
 "12"=>"ธันวาคม"     
);
function thai_date($time){
 global $thai_month_arr;
 $thai_date_return.= " ".$thai_month_arr[date("n",$time)];
 $thai_date_return.= " ".(date("Y",$time)+543);
 return $thai_date_return;
}
$var_date=strtotime("$var_date"); 
$var_date= thai_date($var_date);

    //ส่วนแปลงเงินเป็นภาษาไทย
function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    
    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else 
        $ret .= "ถ้วน";
    return $ret;
}
 
function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
## เรียกใช้งาน
$num1 = $a ; 
$a = number_format($a);

// ส่วนหัวตาราง
$html .= '<div style="position:absolute;top:93px;left:385px;width:300px;"><p> '. $thai_month_arr[$selectmonth] .' </p></div>';
$html .= '<div style="position:absolute;top:330px;left:35px;width:300px;"><p> 1 </p></div>';
$html .= '<div style="position:absolute;top:330px;left:65px;width:300px;"><p> '. $nameTeacher .' </p></div>';

//ส่วนล่างตาราง
$html .= '<div style="position:absolute;top:780px;left:478px;width:300px;"><p> '. $compensationlec .' </p></div>';

function DateThai($strDate)
{       $strYear = date("Y",strtotime($strDate))+543-2500;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}

//ส่วนในตาราง
$select_stmt = $db->prepare("SELECT * from teaching_information WHERE ids = :ids AND MONTH(date) = :uselectmonth" );
$select_stmt->bindParam(":uselectmonth", $selectmonth);
$select_stmt->bindParam(":ids", $ids);
$select_stmt->execute();
$resultarray=$select_stmt->fetchAll();



$select_stmt1 = $db->prepare("SELECT * from teaching_informationlab WHERE ids = :ids AND MONTH(datelab) = :uselectmonth" );
$select_stmt1->bindParam(":uselectmonth", $selectmonth);
$select_stmt1->bindParam(":ids", $ids);
$select_stmt1->execute();
$resultarray1=$select_stmt1->fetchAll();

$html .= '<div style="position:absolute;top:780px;left:678px;width:300px;"><p>dd '. count($resultarray) .' </p></div>';

$line = 330;
if(count($resultarray)>0 and count($resultarray1)>0){
    if(count($resultarray)==14 ){
        
    if($resultarray[0]["date"] == $resultarray1[0]["datelab"]){
        $linelab = $line;
        if($resultarray[0]["daten"]==null){
            $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["date"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["time11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p> '. $time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p> '. number_format( $hours , 2 ) .'</p></div>';
          }else{
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["daten"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["timen1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["timen11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( $hours , 2 ) .'</p></div>';
          }
          if($resultarray1[0]["datenlab"]==null){
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:275px;width:300px;"><p> '. DateThai($resultarray1[0]["datelab"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray1[0]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray1[0]["timelab11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:455px;width:300px;"><p> '. $time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:540px;width:300px;"><p> '. number_format( $hours , 2 ) .'</p></div>';
          }else{
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:275px;width:300px;"><p> '. DateThai($resultarray1[0]["datenlab"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray1[0]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray1[0]["timenlab11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:652px;width:300px;"><p>'.$time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:745px;width:300px;"><p> '. number_format( $hours , 2 ) .'</p></div>';
          }
        $linenext = $linelab+25;
    }else if($resultarray[0]["date"] != $resultarray1[0]["datelab"]){
        $linelab = $line+25;
        if($resultarray1[0]["datenlab"]==null){
            $nametime1 = "time1";
            $nametime11 = "time11";
            $namedate = "date";
        }else {
            $nametime1 = "timen1";
            $nametime1 = "timen11";
            $namedate = "daten";
        }
        if($resultarray[0]["time1"]<="08:30:00" and $resultarray[0]["time11"]<="08:30:00"){
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
        }  
        else if($resultarray[0]["time1"]<"08:30:00" and $resultarray[0]["time11"]>"16:00:00"){
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("08:30:00"));            
            $time1111 = date("H.i", strtotime("12:00:00"));   
            $time11111 = date("H.i", strtotime("13:00:00"));    
            $time111111 = date("H.i", strtotime("16:00:00"));            
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p> '. $time111 .'-'. $time1111 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
            $line = $line + 25;
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p> '. $time11111 .'-'. $time111111 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p> '. number_format( caltime($time111111,$time11111) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time111111 .'- '.$time11.'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time11,$time111111) , 2 ) .'</p></div>';
            $linelab = $linelab+25;
            
        }
        else if($resultarray[0]["time1"]<"08:30:00" and $resultarray[0]["time11"]>"12:30:00"){
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("08:30:00"));            
            $time1111 = date("H.i", strtotime("12:00:00"));   
            $time11111 = date("H.i", strtotime("13:00:00"));    
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p> '. $time111 .'-'. $time1111 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
            $line = $line + 25;

            $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time1111 .'- '.$time11.'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
            $linelab = $linelab+25;
            
        }
      
        else if($resultarray[0]["time1"]<"08:30:00" and $resultarray[0]["time11"]>"08:30:00"){
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("08:30:00"));            
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p> '. number_format( caltime($time11,$time111) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
        }
        else if($resultarray[0]["time1"]<"12:30:00" and $resultarray[0]["time11"]>"16:00:00"){
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("12:00:00"));   
            $time1111 = date("H.i", strtotime("13:00:00"));         
            $time11111 = date("H.i", strtotime("16:00:00"));            
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
            $line = $line + 25;
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1111.'-'. "$time11111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11111,$time1111) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time11111 .'- '.$time11.'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time11,$time11111) , 2 ) .'</p></div>';
            $linelab = $linelab+25;
        }
        else if($resultarray[0]["time1"]<"16:00:00" and $resultarray[0]["time11"]>"16:00:00"){
            $html .= '<div style="position:absolute;top: '.$line.'px;left:275px;width:300px;"><p> '. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("16:00:00"));            
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p> '. $time111 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time11,$time111) , 2 ) .'</p></div>';
        }
        else if($resultarray[0]["time1"]>="16:00:00" and $resultarray[0]["time11"]>="16:00:00"){
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';

        }else if($resultarray[0]["time1"]>="08:30:00" and $resultarray[0]["time11"]<="12:00:00"){
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
        }else if($resultarray[0]["time1"]>="13:00:00" and $resultarray[0]["time11"]<="16:00:00"){
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:581px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
            $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';
        }
        
        else{
            $time1 = date("H.i", strtotime($resultarray[0]["$nametime1"]));
            $time11 = date("H.i", strtotime($resultarray[0]["$nametime11"]));
            $time111 = date("H.i", strtotime("12:00:00"));   
            $time1111 = date("H.i", strtotime("13:00:00"));         
            $totime = caltime($time11,$time1);
            $hour1 = 60;
            for($i=1;$i<=$totime;$i++){
                $timecal12 = date("H.i", strtotime($resultarray[0]["$nametime1"])+$hour1*60);
                //10.00-14.00
                if($timecal12 == "12.00" and $time11 > "12.30" ){
                    $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time111 .'- '.$time1111.'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time1111,$time111) , 2 ) .'</p></div>';
                    $line = $line + 25;
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1111.'-'. "$time11" .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
                    $linelab = $linelab+25;
                //10.00-12.30
                }else if($timecal12 == "12.00" and $time11 == "12.30" ){
                    $time11111 = date("H.i", strtotime("12:30:00"));  
                    $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time111" .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time111,$time1) , 2 ) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time111 .'- '.$time11111.'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time11111,$time111) , 2 ) .'</p></div>';
                //12.30-14.00
                }else if($time1 == "12.30"){
                    $time11111 = date("H.i", strtotime("12:30:00"));  
                    $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1111 .'-'. "$time11" .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11,$time1111) , 2 ) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:579px;width:300px;"><p> '. $time11111 .'- '.$time1111.'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:745px;width:300px;"><p> '. number_format( caltime($time1111,$time11111) , 2 ) .'</p></div>';
                }else{
                  /*
                    $html .= '<div style="position:absolute;top:'.$line.'px;left:275px;width:300px;"><p>'. DateThai($resultarray[0]["$namedate"]) .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:375px;width:300px;"><p>'.$time1 .'-'. "$time11" .'</p></div>';
                    $html .= '<div style="position:absolute;top: '.$line.'px;left:540px;width:300px;"><p>'. number_format( caltime($time11,$time1) , 2 ) .'</p></div>';*/

                }
                $hour1 = $hour1 + 60;
            }

          }

          if($resultarray1[0]["datenlab"]==null){
            
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:275px;width:300px;"><p> '. DateThai($resultarray1[0]["datelab"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray1[0]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray1[0]["timelab11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:455px;width:300px;"><p> '. $time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:540px;width:300px;"><p> '. number_format( caltimelab($time11,$time1) , 2 ) .'</p></div>';
          }else{
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:275px;width:300px;"><p> '. DateThai($resultarray1[0]["datenlab"]) .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray1[0]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray1[0]["timenlab11"]));
            $current_date_time_sec=strtotime($time1);
            $future_date_time_sec=strtotime($time11);
            $difference=$future_date_time_sec-$current_date_time_sec;
            $hours=($difference / 3600);
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:652px;width:300px;"><p>'.$time1 .'-'. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:'.$linelab.'px;left:745px;width:300px;"><p> '. number_format( $hours , 2 ) .'</p></div>';
          }
        $linenext = $linelab+25;
    }



}
}
    







$mpdf->SetImportUse();
if($_SESSION['selectteacher'] == "teacher1"){
    $mpdf->SetDocTemplate('forform_withdraw2.1.pdf',true);
}else{
    $mpdf->SetDocTemplate('forform_withdraw2.2.pdf',true);
}

$mpdf->WriteHTML($html);
$mpdf->Output();
?>