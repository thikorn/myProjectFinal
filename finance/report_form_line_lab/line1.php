
<?php 
$html .= '<div style="text-align:center;position:absolute;top:184px;left:68px;"><p> '. 1 .'</p></div>';
$html .= '<div style="position:absolute;top:184px;left:300;width:800px;"><p> '. $resultarray[0]["topiclab"] .'</p></div>';
$html .= '<div style="text-align:center;position:absolute;top:184px;left:615px;"><p> '. $resultarray[0]["classroomlab"] .'</p></div>';
$html .= '<div style="position:absolute;top:184px;left:800px;width:800px;"><p> '. $resultarray[0]["notelab"] .'</p></div>';

if($resultarray[0]["datenlab"] == NULL){
    $date = date("d/m/Y", strtotime($resultarray[0]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[0]["timelab1"]));
    $time11 = date("H.i", strtotime($resultarray[0]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
}else if ($resultarray[0]["datenlab"] != NULL){
    $date = date("d/m/Y", strtotime($resultarray[0]["datenlab"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[0]["timenlab1"]));
    $time11 = date("H.i", strtotime($resultarray[0]["timenlab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
}

?>