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



$html .= '<div style="position:absolute;top:90px;left:678px;width:300px;"><p>dd '. count($resultarray) .' </p></div>';










$mpdf->SetImportUse();
if($_SESSION['selectteacher'] == "teacher1"){
    $mpdf->SetDocTemplate('forform_withdraw2.1.pdf',true);
}else{
    $mpdf->SetDocTemplate('forform_withdraw2.2.pdf',true);
}

$mpdf->WriteHTML($html);
$mpdf->Output();
?>