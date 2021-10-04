<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]); ?>

<?php include('../connection.php');
session_start();
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
$date1 = $_SESSION['date1'];
$dateOv2 = $_SESSION['dateOv2'];
$numberOv2 = $_SESSION['numberOv2'];
$Dapartmentreq = $_SESSION['Dapartmentreq'];
$subname = $_SESSION['subname'];
$numnisit = $_SESSION['numnisit'];
$time11 = $_SESSION['time11'];
$nameTeacher =$_SESSION['nameTeacher'];
$time1 = $_SESSION['time1'];
$datelab1 = $_SESSION['datelab1'];
$timelab1 = $_SESSION['timelab1'];
$timelab11 = $_SESSION['timelab11'];
$datelab2 = $_SESSION['datelab2'];
$timelab2 = $_SESSION['timelab2'];
$timelab22 = $_SESSION['timelab22'];
$datelab3 = $_SESSION['datelab3'];
$timelab3 = $_SESSION['timelab3'];
$timelab33 = $_SESSION['timelab33'];


$var_date = $dateOv2; // Query date format --> Ex. 19 ตุลาคม 2563

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

$time1 = date("H.i", strtotime($time1));
$time11 = date("H.i", strtotime($time11));
$timelab1 = date("H.i", strtotime($timelab1));
$timelab11 = date("H.i", strtotime($timelab11));
$timelab2 = date("H.i", strtotime($timelab2));
$timelab22 = date("H.i", strtotime($timelab22));
$timelab3 = date("H.i", strtotime($timelab3));
$timelab33 = date("H.i", strtotime($timelab33));

//ส่วนเนื้อหาในฟอร์ม
$html .= '<div style="position:absolute;top:164.5px;left:257px;width:300px;"><p> '. $numberOv2 .' </p></div>';
$html .= '<div style="position:absolute;top:164.5px;left:440px;width:300px;"><p> '. $var_date .' </p></div>';
$html .= '<div style="position:absolute;top:193px;left:365px;width:300px;"><p>ภาค'. $semeter .' ปีการศึกษา '. $year .'</p></div>';
$html .= '<div style="position:absolute;top:249px;left:258px;width:300px;"><p> '. $Dapartmentreq .'</p></div>';
$html .= '<div style="position:absolute;top:360.5px;left:198px;"><p>'. $Dapartmentreq .' เปิดรายวิชาใน ภาค'. $semeter .' ปีการศึกษา '. $year .' สำหรับนิสิตโครงการฯ</p></div>';
$html .= '<div style="position:absolute;top:443;left:160px;width:300px;"><p>'. $ids .' '. $subname .'</p></div>';
$html .= '<div style="position:absolute;top:443px;left:605px;width:205px;"><p>จำนวน '. $numnisit .' คน</p></div>';

//ส่วนชื่อประธานโครงการ
$html .= '<div style="position:absolute;top:887px;left:480px;width:205px;"><p>'.$postnamePresident.' '. $firstNamePresident .' '. $lastNamePresident .' </p></div>';

//ส่วนเงื่อนไขกำหนดฟอร์มตามจำนวนคาบเรียน
if($date1 != NULL AND $datelab1 == NULL)
{	$html .= '<div style="position:absolute;top:443px;left:470px;width:205px;"><p>'. $date1 .''. $time1 .'-'. $time11 .'</p></div>';
	$html .= '<div style="position:absolute;top:500.4px;left:330px;"><p> อาจารย์'. $nameTeacher .' เรียบร้อยแล้ว และโปรดแจ้งข้อมูลกลับมาที่ทาง</p></div>';
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_open1.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}

else if($date1 != NULL AND $datelab1 != NULL AND $datelab2 == NULL)
{  	$html .= '<div style="position:absolute;top:443px;left:470px;width:205px;"><p>'. $date1 .''. $time1 .'-'. $time11 .'</p></div>';
	$html .= '<div style="position:absolute;top:463px;left:470px;width:205px;"><p>'. $datelab1 .''. $timelab1 .'-'. $timelab11 .'</p></div>';
	$html .= '<div style="position:absolute;top:523px;left:330px;"><p> อาจารย์'. $nameTeacher .' เรียบร้อยแล้ว และโปรดแจ้งข้อมูลกลับมาที่ทาง</p></div>';
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_open2.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}

else if($date1 != NULL AND $datelab1 != NULL AND $datelab2 != NULL AND $datelab3 == NULL)
{	$html .= '<div style="position:absolute;top:443px;left:470px;width:205px;"><p>'. $date1 .''. $time1 .'-'. $time11 .'</p></div>';
	$html .= '<div style="position:absolute;top:463px;left:470px;width:205px;"><p>'. $datelab1 .''. $timelab1 .'-'. $timelab11 .'</p></div>';
	$html .= '<div style="position:absolute;top:483px;left:470px;width:205px;"><p>'. $datelab2 .''. $timelab2 .'-'. $timelab22 .'</p></div>';
	$html .= '<div style="position:absolute;top:547.5px;left:330px;"><p> อาจารย์'. $nameTeacher .' เรียบร้อยแล้ว และโปรดแจ้งข้อมูลกลับมาที่ทาง</p></div>';
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_open3.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}

else if($date1 != NULL AND $datelab1 != NULL AND $datelab2 != NULL AND $datelab3 != NULL)
{   $html .= '<div style="position:absolute;top:443px;left:470px;width:205px;"><p>'. $date1 .''. $time1 .'-'. $time11 .'</p></div>';
	$html .= '<div style="position:absolute;top:468px;left:470px;width:205px;"><p>'. $datelab1 .''. $timelab1 .'-'. $timelab11 .'</p></div>';
	$html .= '<div style="position:absolute;top:493px;left:470px;width:205px;"><p>'. $datelab2 .''. $timelab2 .'-'. $timelab22 .'</p></div>';
	$html .= '<div style="position:absolute;top:518px;left:470px;width:205px;"><p>'. $datelab3 .''. $timelab3 .'-'. $timelab33 .'</p></div>';
	$html .= '<div style="position:absolute;top:572px;left:330px;"><p> อาจารย์'. $nameTeacher .' เรียบร้อยแล้ว และโปรดแจ้งข้อมูลกลับมาที่ทาง</p></div>';
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_open4.pdf',true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}
?>