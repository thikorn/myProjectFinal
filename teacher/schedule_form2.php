<?php 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 8,
    'default_font' => 'sarabun'
]); 

?>

<?php include('../connection.php');
session_start();
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











$html .= '<div style="text-align:center;position:absolute;top:118px;left:230px;"><h1> '. $nameTeacher .'</h1></div>';

$mpdf->SetImportUse();
$mpdf->SetDocTemplate('forform_2.pdf',true);
$mpdf->AddPage('L'); //เซตหน้า pdf บนเว็บเป็นแนวนอน
$mpdf->WriteHTML($html);
$mpdf->Output();
?>