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
$classLec =$_SESSION['classLec'];



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

 $thai_date_return.= " ".$thai_month_arr[date("n",$time)];

 return $thai_date_return;
}
$var_date=strtotime("$var_date"); 
$var_date= thai_date($var_date);

$time1 = date("H.i", strtotime($time1));
$time11 = date("H.i", strtotime($time11));







//ส่วนหัวรายงานการสอน
$html .= '<div style="text-align:center;position:absolute;top:22px;left:550px;"><p> '. $var_date .' </p></div>';
$html .= '<div style="text-align:center;position:absolute;top:62px;left:620px;width:205px;"><p>'. $semeter .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:62px;left:750px;width:205px;"><p>'. $year .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:280px;"><p> '. $ids .' '. $subname .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:550px;width:205px;"><p> '. $classLec .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:103px;left:700px;width:205px;"><p> - </p></div>';



//ส่วนข้อมูลในตาราง

$select_stmt = $db->prepare("SELECT * from teaching_information WHERE ids = :ids AND MONTH(date) = 11" );
$select_stmt->bindParam(":ids", $ids);
$select_stmt->execute();
$rows = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row){
    if($row['numberhour']==1){
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:68px;"><p> '. 1 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:184px;left:300;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:184px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==2){
        $html .= '<div style="text-align:center;position:absolute;top:212px;left:68px;"><p> '. 2 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:212px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:212px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:212px;left:300;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:212px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:212px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }

    if($row['numberhour']==3){
        $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:240px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:240px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==4){
        $html .= '<div style="text-align:center;position:absolute;top:270px;left:68px;"><p> '. 4 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:270px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:270px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:270px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:270px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:270px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==5){
        $html .= '<div style="text-align:center;position:absolute;top:299px;left:68px;"><p> '. 5 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:299px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:299px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:299px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==6){
        $html .= '<div style="text-align:center;position:absolute;top:326px;left:68px;"><p> '. 6 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:326px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:326px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:326px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:326px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:326px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }

    if($row['numberhour']==7){
        $html .= '<div style="text-align:center;position:absolute;top:354px;left:68px;"><p> '. 7 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:354px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:354px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:354px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:354px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:354px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==8){
        $html .= '<div style="text-align:center;position:absolute;top:385px;left:68px;"><p> '. 8 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:385px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:385px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:385px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:385px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:385px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==9){
        $html .= '<div style="text-align:center;position:absolute;top:414px;left:68px;"><p> '. 9 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:414px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:414px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:414px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:414px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:414px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==10){
        $html .= '<div style="text-align:center;position:absolute;top:440px;left:-30px;width:205px;"><p> '. 10 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:440px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:440px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:440px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==11){
        $html .= '<div style="text-align:center;position:absolute;top:470px;left:-30px;width:205px;"><p> '. 11 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:470px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:470px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:470px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:470px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:470px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==12){
        $html .= '<div style="text-align:center;position:absolute;top:499px;left:-30px;width:205px;"><p> '. 12 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:499px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:499px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:499px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:499px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:499px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==13){
        $html .= '<div style="text-align:center;position:absolute;top:528px;left:-30px;width:205px;"><p> '. 13 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:528px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:528px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:528px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:528px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:528px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==14){
        $html .= '<div style="text-align:center;position:absolute;top:556px;left:-30px;width:205px;"><p> '. 14 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:556px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:556px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:556px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:556px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:556px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
    if($row['numberhour']==15){
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:-30px;width:205px;"><p> '. 15 .'</p></div>';
        $date = date("d/m/Y", strtotime($row["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($row["time1"]));
        $time11 = date("H.i", strtotime($row["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:582px;left:300px;"><p> '. $row["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:615px;"><p> '. $row["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:582px;left:800px;"><p> '. $row["note"] .'</p></div>';
    }
         
}









$mpdf->SetImportUse();
$mpdf->SetDocTemplate('foform1.pdf',true);
$mpdf->AddPage('L'); //เซตหน้า pdf บนเว็บเป็นแนวนอน
$mpdf->WriteHTML($html);
$mpdf->Output();
?>


