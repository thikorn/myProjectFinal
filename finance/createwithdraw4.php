<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 14,
	'default_font' => 'sarabun'
]); ?>

<?php include('../connection.php');
session_start();
?>

<?php //ดึงชื่อ-สกุล เลขานุการ
                  $namerole = "secretary";
                  $select_stmt = $db->prepare("SELECT * from member WHERE role = :urole");
                  $select_stmt->bindParam(":urole", $namerole);
                  $select_stmt->execute();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                $postnameSecretary = $row['postname'];
                $firstNameSecretary = $row['firstname'];
                $lastNameSecretary = $row['lastname'];
              }
?>

<?php //ดึงชื่อ-สกุล ประธานคณะกรรมการ
                  $namerole = "president";
                  $select_stmt = $db->prepare("SELECT * from member WHERE role = :urole");
                  $select_stmt->bindParam(":urole", $namerole);
                  $select_stmt->execute();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                $postnamePresident = $row['postname'];
                $firstNamePresident = $row['firstname'];
                $lastNamePresident = $row['lastname'];
              }
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

$amountwithdraw1 =  $_SESSION['amountwithdraw1'];
$amountwithdraw2 =  $_SESSION['amountwithdraw2'];
$amountwithdraw3 =  $_SESSION['amountwithdraw3'];
$amountwithdraw4 =  $_SESSION['amountwithdraw4'];
$amountwithdraw5 =  $_SESSION['amountwithdraw5'];


$a = $amountwithdraw1 + $amountwithdraw2 + $amountwithdraw3 + $amountwithdraw4 + $amountwithdraw5;


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

$html .= '<div style="position:absolute;top:188.5px;left:232px;width:400px;"><p> '. $numberOv3 .' </p></div>';

$html .= '<div style="position:absolute;top:188.5px;left:420px;width:400px;"><p> '. $var_date .' </p></div>';
$html .= '<div style="position:absolute;top:294.5px;left:361px;:400px;"><p> '. $numberOv3 .' ลงวันที่ '. $var_date .' เรื่อง ขออนุมัติหลักการเบิกค่าสอน  </p></div>';
$html .= '<div style="position:absolute;top:358.8px;left:150px;:400px;"><p>ในภาค'. $semeter .' ปีการศึกษา '. $year .'</p></div>';
$html .= '<div style="position:absolute;top:383px;left:320px;:400px;"><p>( '. $nameTeacher .' )</p></div>';
$html .= '<div style="position:absolute;top:213px;left:299px;:400px;"><p> '. $ids .' '. $subname .' ภาค'. $semeter .' ปีการศึกษา '. $year .'</p></div>';
$html .= '<div style="position:absolute;top:318.5px;left:155px;:400px;"><p> '. $ids .' '. $subname .' ภาค'.$semeter.' ปีการศึกษา '.$year.'</p></div>';
$html .= '<div style="position:absolute;top:407.5px;left:155px;:400px;"><p> '. $ids .' '. $subname .' ภาค'.$semeter.' ปีการศึกษา '.$year.' จำนวนเงิน '. $a .' บาท ('. Convert($num1) .')</p></div>';
$html .= '<div style="position:absolute;top:432px;left:240px;"><p> โดยใช้จ่ายเงินรายได้คณะศิลปศาสตร์และวิทยาศาสตร์ ปีงบประมาณ '. $fiscaYear .'</p></div>';
$html .= '<div style="position:absolute;top:896px;left:200px;width:400px;"><p>'. $postnamePresident .' '. $firstNamePresident .' '. $lastNamePresident .' </p></div>';
$html .= '<div style="position:absolute;top:693px;left:460px;"><p> '.$postnameSecretary.' '. $firstNameSecretary .' '. $lastNameSecretary .' </p></div>';




$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_withdraw.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>