<? $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[2]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[2]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[2]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:240px;left:300px;"><p> '. $resultarray[2]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $resultarray[2]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:240px;left:800px;"><p> '. $resultarray[2]["notelab"] .'</p></div>';
    ?>