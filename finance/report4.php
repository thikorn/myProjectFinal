<?php 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
    'default_font' => 'sarabun'
]); 

?>

<?php 
include('../connection.php');
session_start();
?>

<?php
$year = $_SESSION['year'];
$semeter = $_SESSION['semeter'];
$ids = $_SESSION['code'];
$dateOv2 = $_SESSION['dateOv2'];
$numberOv2 = $_SESSION['numberOv2'];
$Dapartmentreq = $_SESSION['Dapartmentreq'];
$subname = $_SESSION['subname'];
$numnisit = $_SESSION['numnisit'];
$nameTeacher =$_SESSION['nameTeacher'];
$classLab =$_SESSION['classLab'];
$timelab1 = $_SESSION['timelab1'];
$timelab11 = $_SESSION['timelab11'];
$selectmonth = $_SESSION['selectmonth'];


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




//ส่วนหัวรายงานการสอน
$html .= '<div style="text-align:center;position:absolute;top:22px;left:550px;"><p> '. $thai_month_arr[$selectmonth] .' </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:62px;left:620px;width:205px;"><p>'. $semeter .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:62px;left:750px;width:205px;"><p>'. $year .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:280px;"><p> '. $ids .' '. $subname .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:550px;width:205px;"><p> - </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:700px;width:205px;"><p> '. $classLab .' </p></div>';

//ส่วนข้อมูลในตาราง

$select_stmt = $db->prepare("SELECT * from teaching_informationlab WHERE ids = :ids AND MONTH(datelab) = :uselectmonth" );
$select_stmt->bindParam(":uselectmonth", $selectmonth);
$select_stmt->bindParam(":ids", $ids);
$select_stmt->execute();
$resultarray=$select_stmt->fetchAll();

if(count($resultarray)==0){
$_SESSION["error"] = "เดือนนั้นยังไม่บันทึกการสอน";
header("location:report_form3.php");
  
}else if(count($resultarray)==1){
    include("report_form_line_lab/line1.php");
}else if(count($resultarray)==2){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
}else if(count($resultarray)==3){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
}else if(count($resultarray)==4){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
}else if(count($resultarray)==5){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
}else if(count($resultarray)==6){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
}else if(count($resultarray)==7){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
}else if(count($resultarray)==8){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
}else if(count($resultarray)==9){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
}else if(count($resultarray)==10){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
}else if(count($resultarray)==11){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
    include("report_form_line_lab/line11.php");
}else if(count($resultarray)==12){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
    include("report_form_line_lab/line11.php");
    include("report_form_line_lab/line12.php");
}else if(count($resultarray)==13){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
    include("report_form_line_lab/line11.php");
    include("report_form_line_lab/line12.php");
    include("report_form_line_lab/line13.php");
}else if(count($resultarray)==14){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
    include("report_form_line_lab/line11.php");
    include("report_form_line_lab/line12.php");
    include("report_form_line_lab/line13.php");
    include("report_form_line_lab/line14.php");
}else if(count($resultarray)==15){
    include("report_form_line_lab/line1.php");
    include("report_form_line_lab/line2.php");
    include("report_form_line_lab/line3.php");
    include("report_form_line_lab/line4.php");
    include("report_form_line_lab/line5.php");
    include("report_form_line_lab/line6.php");
    include("report_form_line_lab/line7.php");
    include("report_form_line_lab/line8.php");
    include("report_form_line_lab/line9.php");
    include("report_form_line_lab/line10.php");
    include("report_form_line_lab/line11.php");
    include("report_form_line_lab/line12.php");
    include("report_form_line_lab/line13.php");
    include("report_form_line_lab/line14.php");
    include("report_form_line_lab/line15.php");
}








$mpdf->SetImportUse();
$mpdf->SetDocTemplate('foform1.pdf',true);
$mpdf->AddPage('L'); //เซตหน้า pdf บนเว็บเป็นแนวนอน
$mpdf->WriteHTML($html);
$mpdf->Output();
?>


