<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 7,
	'default_font' => 'sarabun'
]); ?>

<?php include('../connection.php');
session_start();
?>

<?php

$dateOv4 = $_SESSION['dateOv4lab'];

$numberov4 = $_SESSION['numberov4lab'];
$classLec = $_SESSION['classLec'];
$nameTeacher = $_SESSION['nameTeacher'];
$nameSubject = $_SESSION['subname'];
$affiliation = $_SESSION['affiliation'];
$position = $_SESSION['position'];
$date = $_SESSION['datelab'];
$time1 = $_SESSION['timelab1'];
$time11 = $_SESSION['timelab11'];
$daten = $_SESSION['datenlab'];
$timen1 = $_SESSION['timenlab1'];
$timen11 = $_SESSION['timenlab11'];
$note = $_SESSION['notelab'];
$classLec = $_SESSION['classLec'];
$classLab = $_SESSION['classLab'];

$var_date = $dateOv4; // Query 
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

$date = date("d-m-Y", strtotime($date));
$time1 = date("H.i", strtotime($time1));
$time11 = date("H.i", strtotime($time11));
$daten = date("d-m-Y", strtotime($daten));
$timen1 = date("H.i", strtotime($timen1));
$timen11 = date("H.i", strtotime($timen11));



$html .= '<div style="text-align:center;position:absolute;top:150px;left:160px;width:205px;"><h1> '. $numberov4 .' </h1></div>';


$html .= '<div style="text-align:center;position:absolute;top:150px;left:160px;width:205px;"><h1> '. $numberov4 .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:150px;left:500px;"><h1> '. $var_date .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:246px;left:232px;"><h1> '. $nameTeacher .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:246px;left:560px;"><h1> '. $position .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:300px;left:110px;width:205px;"><h1> '. $classLec .'  </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:300px;left:330px;width:205px;"><h1> '. $classLab .'  </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:273px;left:530px;"><h1> '. $nameSubject .' </h1></div>';


$html .= '<div style="text-align:center;position:absolute;top:273px;left:250px;"><h1> '. $affiliation .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:357px;left:220px;"><h1> '. $date .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:357px;left:350px;"><h1> '. $time1 .' - '. $time11 .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:357px;left:540px;"><h1> '. $daten .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:357px;left:650px;"><h1> '. $timen1 .' - '. $timen11 .' </h1></div>';
$html .= '<div style="text-align:center;position:absolute;top:469px;left:100px;width:300px;"><h1> '. $note .' </h1></div>';



$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_comp.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>