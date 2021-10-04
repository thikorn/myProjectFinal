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
$resultarray=$select_stmt->fetchAll();
  
      if($resultarray[0] != ""){
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:68px;"><p> '. 1 .'</p></div>';
        $date = date("d/m/Y", strtotime($resultarray[0]["date"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
        $time1 = date("H.i", strtotime($resultarray[0]["time1"]));
        $time11 = date("H.i", strtotime($resultarray[0]["time11"]));
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        $html .= '<div style="position:absolute;top:184px;left:300;"><p> '. $resultarray[0]["topic"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:184px;left:615px;"><p> '. $resultarray[0]["classroom"] .'</p></div>';
        $html .= '<div style="position:absolute;top:184px;left:800px;"><p> '. $resultarray[0]["note"] .'</p></div>';
      }else if($resultarray[0] == ""){
        $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
      header("location:report_form1.php");
    }
           
    if($resultarray[1] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:212px;left:68px;"><p> '. 2 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[1]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:212px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[1]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[1]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:212px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:212px;left:300;"><p> '. $resultarray[1]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:212px;left:615px;"><p> '. $resultarray[1]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:212px;left:800px;"><p> '. $resultarray[1]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[2] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[2]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[2]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[2]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:240px;left:300px;"><p> '. $resultarray[2]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $resultarray[2]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:240px;left:800px;"><p> '. $resultarray[2]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }


        if($resultarray[3] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:68px;"><p> '. 4 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[3]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[3]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[3]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:300px;"><p> '. $resultarray[3]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:615px;"><p> '. $resultarray[3]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:800px;"><p> '. $resultarray[3]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[4] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:68px;"><p> '. 5 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[4]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[4]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[4]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:299px;left:300px;"><p> '. $resultarray[4]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:615px;"><p> '. $resultarray[4]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:299px;left:800px;"><p> '. $resultarray[4]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        
        if($resultarray[5] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:68px;"><p> '. 6 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[5]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[5]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[5]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:326px;left:300px;"><p> '. $resultarray[5]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:326px;left:615px;"><p> '. $resultarray[5]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:326px;left:800px;"><p> '. $resultarray[5]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[6] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:68px;"><p> '. 7 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[6]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[6]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[6]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:354px;left:300px;"><p> '. $resultarray[6]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:354px;left:615px;"><p> '. $resultarray[6]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:354px;left:800px;"><p> '. $resultarray[6]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[7] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:68px;"><p> '. 8 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[7]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[7]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[7]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:385px;left:300px;"><p> '. $resultarray[7]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:385px;left:615px;"><p> '. $resultarray[7]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:385px;left:800px;"><p> '. $resultarray[7]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[8] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:68px;"><p> '. 9 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[8]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[8]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[8]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:414px;left:300px;"><p> '. $resultarray[8]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:414px;left:615px;"><p> '. $resultarray[8]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:414px;left:800px;"><p> '. $resultarray[8]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[9] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:-30px;width:205px;"><p> '. 10 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[9]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[9]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[9]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:440px;left:300px;"><p> '. $resultarray[9]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:615px;"><p> '. $resultarray[9]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:440px;left:800px;"><p> '. $resultarray[9]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[10] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:-30px;width:205px;"><p> '. 11 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[10]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[10]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[10]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:470px;left:300px;"><p> '. $resultarray[10]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:615px;"><p> '. $resultarray[10]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:470px;left:800px;"><p> '. $resultarray[10]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }
         
        if($resultarray[11] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:-30px;width:205px;"><p> '. 12 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[11]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[11]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[11]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:499px;left:300px;"><p> '. $resultarray[11]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:499px;left:615px;"><p> '. $resultarray[11]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:499px;left:800px;"><p> '. $resultarray[11]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[12] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:-30px;width:205px;"><p> '. 13 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[12]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[12]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[12]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:528px;left:300px;"><p> '. $resultarray[12]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:615px;"><p> '. $resultarray[12]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:528px;left:800px;"><p> '. $resultarray[12]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[13] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:-30px;width:205px;"><p> '. 14 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[13]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[13]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[13]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:556px;left:300px;"><p> '. $resultarray[13]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:556px;left:615px;"><p> '. $resultarray[13]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:556px;left:800px;"><p> '. $resultarray[13]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

        if($resultarray[14] != ""){
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:-30px;width:205px;"><p> '. 15 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[14]["date"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[14]["time1"]));
            $time11 = date("H.i", strtotime($resultarray[14]["time11"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:582px;left:300px;"><p> '. $resultarray[14]["topic"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:615px;"><p> '. $resultarray[14]["classroom"] .'</p></div>';
            $html .= '<div style="position:absolute;top:582px;left:800px;"><p> '. $resultarray[14]["note"] .'</p></div>';
        }else if($resultarray[0] == ""){
            $_SESSION['error'] = "ยังไม่ได้บันทึกการสอน";
          header("location:report_form1.php");
        }

      
                  
  
 









$mpdf->SetImportUse();
$mpdf->SetDocTemplate('foform1.pdf',true);
$mpdf->AddPage('L'); //เซตหน้า pdf บนเว็บเป็นแนวนอน
$mpdf->WriteHTML($html);
$mpdf->Output();
?>


