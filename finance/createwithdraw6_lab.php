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
$year = $_SESSION['year'];
$semeter = $_SESSION['semeter'];
$ids = $_SESSION['code'];
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
$hourLab =$_SESSION['hourLab'];
$compensationlab =$_SESSION['compensationlab'];
$amountwithdraw1 =  $_SESSION['amountwithdraw1'];
$amountwithdraw2 =  $_SESSION['amountwithdraw2'];
$amountwithdraw3 =  $_SESSION['amountwithdraw3'];
$amountwithdraw4 =  $_SESSION['amountwithdraw4'];
$amountwithdraw5 =  $_SESSION['amountwithdraw5'];

$selectmonth = $_SESSION['selectmonth'];

$a = $amountwithdraw1 + $amountwithdraw2 + $amountwithdraw3 + $amountwithdraw4 + $amountwithdraw5;


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
function caltimelab($time11 , $time1){
  $current_date_time_sec=strtotime($time1);
  $future_date_time_sec=strtotime($time11);
  $difference=$future_date_time_sec-$current_date_time_sec;
  $hours=($difference / 3600);

  return $hours/2;

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
$html .= '<div style="position:absolute;top:780px;left:478px;width:300px;"><p> '. $compensationlab .' </p></div>';

function DateThai($strDate)
{       $strYear = date("Y",strtotime($strDate))+543-2500;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}

//ส่วนในตาราง
$select_stmt = $db->prepare("SELECT * from teaching_informationlab WHERE ids = :ids AND MONTH(datelab) = :uselectmonth" );
$select_stmt->bindParam(":uselectmonth", $selectmonth);
$select_stmt->bindParam(":ids", $ids);
$select_stmt->execute();
$resultarray1=$select_stmt->fetchAll();

$tohoursin = 0;
$tohoursout = 0;
$line = 330;
$leftdate = 275;
$lefttime1in = 375;
$leftcount1in = 540;
$lefttime1out = 579;
$leftcount1out = 745;
$lefttime1inlab = 455;
$leftcount1in = 540;
$lefttime1outlab = 652;
$leftcount1out = 745;

if(count($resultarray1)==0){
  $_SESSION["error"] = "เดือนนั้นยังไม่บันทึกการสอน";
  header("location:createwithdraw5.php");
}else if(count($resultarray1)== 1) {
        include('linecreatewithdraw6lab/l1.php');
    }else if(count($resultarray1)== 2) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
    }else if(count($resultarray1)== 3) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
    }else if(count($resultarray1)== 4) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
    }else if(count($resultarray1)== 5) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
    }else if(count($resultarray1)== 6) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
    }else if(count($resultarray1)== 7) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
    }else if(count($resultarray1)== 8) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
    }else if(count($resultarray1)== 9) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
    }else if(count($resultarray1)== 10) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
    }else if(count($resultarray1)== 11) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
        include('linecreatewithdraw6lab/l11.php');
    }else if(count($resultarray1)== 12) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
        include('linecreatewithdraw6lab/l11.php');
        include('linecreatewithdraw6lab/l12.php');
    }else if(count($resultarray1)== 13) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
        include('linecreatewithdraw6lab/l11.php');
        include('linecreatewithdraw6lab/l12.php');
        include('linecreatewithdraw6lab/l13.php');
    }else if(count($resultarray1)== 14) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
        include('linecreatewithdraw6lab/l11.php');
        include('linecreatewithdraw6lab/l12.php');
        include('linecreatewithdraw6lab/l13.php');
        include('linecreatewithdraw6lab/l14.php');

    }else if(count($resultarray1)== 15) {
        include('linecreatewithdraw6lab/l1.php');
        include('linecreatewithdraw6lab/l2.php');
        include('linecreatewithdraw6lab/l3.php');
        include('linecreatewithdraw6lab/l4.php');
        include('linecreatewithdraw6lab/l5.php');
        include('linecreatewithdraw6lab/l6.php');
        include('linecreatewithdraw6lab/l7.php');
        include('linecreatewithdraw6lab/l8.php');
        include('linecreatewithdraw6lab/l9.php');
        include('linecreatewithdraw6lab/l10.php');
        include('linecreatewithdraw6lab/l11.php');
        include('linecreatewithdraw6lab/l12.php');
        include('linecreatewithdraw6lab/l13.php');
        include('linecreatewithdraw6lab/l14.php');
        include('linecreatewithdraw6lab/l15.php');
    }

    $html .= '<div style="position:absolute;top:720px;left:535px;width:300px;"><p> '.number_format(  $tohoursin , 2 ) .' </p></div>';
    $html .= '<div style="position:absolute;top:720px;left:745px;width:300px;"><p> '.number_format(  $tohoursout , 2 ) .' </p></div>';
    $html .= '<div style="position:absolute;top:780px;left:155px;width:300px;"><p> '.number_format(  $tohoursin+$tohoursout , 2 ) .' </p></div>';

    $html .= '<div style="position:absolute;top:780px;left:660px;width:300px;"><p> '. $compensationlab *($tohoursin+$tohoursout) .' </p></div>';




$mpdf->SetImportUse();
if($_SESSION['selectteacher'] == "teacher1"){
    $mpdf->SetDocTemplate('forform_withdraw2.1.pdf',true);
}else{
    $mpdf->SetDocTemplate('forform_withdraw2.2.pdf',true);
}
$mpdf->WriteHTML($html);
$mpdf->Output();
?>