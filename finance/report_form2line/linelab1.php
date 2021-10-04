<? 
$html .= '<div style="text-align:center;position:absolute;top:184px;left:68px;"><p> '. 1 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[0]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[0]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[0]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="position:absolute;top:184px;left:300;"><p> '. $resultarray[0]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:184px;left:615px;"><p> '. $resultarray[0]["classroomlab"] .'</p></div>';
    $html .= '<div style="position:absolute;top:184px;left:800px;"><p> '. $resultarray[0]["notelab"] .'</p></div>';
?>