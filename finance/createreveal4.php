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
$hourLec =$_SESSION['hourLec'];
$hourLab =$_SESSION['hourLab'];
$compensationlec =$_SESSION['compensationlec'];
$compensationlab =$_SESSION['compensationlab'];


//คำนวณ

$u = $hourLec*15;
$uu = $hourLab*15;
$y = $u*$compensationlec;
$yy = $uu*$compensationlab;
$a = $y+$yy;


$var_date = $dateOv3; // Query 

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
 $thai_date_return.= date("j",$time);
 $thai_date_return.= " ".$thai_month_arr[date("n",$time)];
 $thai_date_return.= " ".(date("Y",$time)+543);
 return $thai_date_return;
}
$var_date=strtotime("$var_date"); 
$var_date= thai_date($var_date);
//แปลง 1000 เป็น หนึ่งพันบาทถ้วน
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

//จัดเลขต้องอยู่หลังแปลงเลขเป็นภาษา
$a = number_format($a);
$y = number_format($y);
$yy = number_format($yy);


$html .= '<div style="text-align:center;position:absolute;top:135px;left:220px;width:50;"><p> '. $numberOv3 .' </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:135px;left:460px;"><p> '. $var_date .' </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:188px;left:355px;"><p> '. $ids .' '. $subname .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:188px;left:272px;"><p> '. $year .' </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:188px;left:75px;width:205px;"><p> ภาค'. $semeter .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:290px;left:161px;"><p> '. $ids .' '. $subname .' ภาค'.$semeter.' ปีการศึกษา '.$year.' แล้วนั้น จึงขออนุมัติหลักการเพื่อเบิกจ่ายค่า</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:338px;left:161px;"><p> '. $ids .' '. $subname .' ภาค'.$semeter.' ปีการศึกษา '.$year.'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:363px;left:215px;"><p> '. $a .' บาท ('. Convert($num1) .')</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:414px;left:392px;"><p> '. $fiscaYear .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:118px;"><p> '. $nameTeacher .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:312px;"><p> '. $ids .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:393px;"><p> '. $credit .'('. $hourLec .'-'. $hourLab .')</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:455px;"><p> '. $hourLec .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:547px;left:510px;"><p> '. 0 .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:520px;width:205px;"><p> '. $compensationlec .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:457px;width:205px;"><p> '. $hourLec*15 .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:550px;left:590px;width:205px;"><p> '. $y .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:645px;left:590px;width:205px;"><p> '. $a .'</p></div>';
if($hourLab == 0 ){ //ถ้าไม่มีแล็ปจะไม่แสดง
}else{
$html .= '<div style="text-align:center;position:absolute;top:568px;left:455px;"><p> '. 0 .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:570px;left:510px;"><p> '. $hourLab .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:570px;left:457px;width:205px;"><p> '. $hourLab*15 .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:570px;left:520px;width:205px;"><p> '. $compensationlab .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:570px;left:590px;width:205px;"><p> '. $yy .'</p></div>';
}


$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_reveal.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>