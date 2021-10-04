<? $html .= '<div style="text-align:center;position:absolute;top:212px;left:68px;"><p> '. 2 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[1]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:212px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[1]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[1]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:212px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:212px;left:300;"><p> '. $resultarray[1]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:212px;left:615px;"><p> '. $resultarray[1]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:212px;left:800px;"><p> '. $resultarray[1]["notelab"] .'</p></div>';
?>