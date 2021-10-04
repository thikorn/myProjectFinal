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

<?php //ดึงชื่อ-สกุล ประธานคณะกรรมการ
                  $namerole = "board";
                  $select_stmt = $db->prepare("SELECT * from member WHERE role = :urole");
                  $select_stmt->bindParam(":urole", $namerole);
                  $select_stmt->execute();
              while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                $postnameBoard = $row['postname'];
                $firstNameBoard = $row['firstname'];
                $lastNameBoard = $row['lastname'];
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
$position = $_SESSION['position'];
$amountwithdraw1 =  $_SESSION['amountwithdraw1'];
$amountwithdraw2 =  $_SESSION['amountwithdraw2'];
$amountwithdraw3 =  $_SESSION['amountwithdraw3'];
$amountwithdraw4 =  $_SESSION['amountwithdraw4'];
$amountwithdraw5 =  $_SESSION['amountwithdraw5'];

$postnameTeacher = $_SESSION['postname'];


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

$b = $hourLec*15 ;



$html .= '<div style="position:absolute;top:68px;left:755px;"><p> '. $var_date .' </p></div>';
$html .= '<div style="position:absolute;top:278px;left:120px;"><p> '. $nameTeacher .' </p></div>';
$html .= '<div style="position:absolute;top:278px;left:250px;"><p> '. $position .' </p></div>';
$html .= '<div style="position:absolute;top:278px;left:310px;"><p> '. $ids .' </p></div>';
$html .= '<div style="position:absolute;top:278px;left:70px;"><p> 1 </p></div>';
$html .= '<div style="position:absolute;top:278px;left:500px;width:300px;"><p> '. $b .' </p></div>';
$html .= '<div style="position:absolute;top:278px;left:570px;width:300px;"><p> '. $a .' </p></div>';
$html .= '<div style="position:absolute;top:528px;left:300px;width:400px;"><p> '. $a .' บาท </p></div>';
$html .= '<div style="position:absolute;top:528px;left:590px;width:300px;"><p> '. Convert($num1) .' </p></div>';
$html .= '<div style="position:absolute;top:625px;left:860px;width:300px;"><p>'. $postnamePresident .' '. $firstNamePresident .' '. $lastNamePresident .' </p></div>';
$html .= '<div style="position:absolute;top:625px;left:370px;width:300px;"><p>'. $postnameSecretary .' '. $firstNameSecretary .' '. $lastNameSecretary .' </p></div>';
$html .= '<div style="position:absolute;top:625px;left:610px;width:300px;"><p>'. $postnameBoard.' '. $firstNameBoard .' '. $lastNameBoard .' </p></div>';
$html .= '<div style="position:absolute;top:625px;left:120px;width:300px;"><p>'. $postnameTeacher.' '. $nameTeacher .' </p></div>';

$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_withdraw4.pdf',true);
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
