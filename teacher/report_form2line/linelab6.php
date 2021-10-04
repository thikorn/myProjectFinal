<? $html .= '<div style="text-align:center;position:absolute;top:326px;left:68px;"><p> '. 6 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[5]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:326px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[5]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[5]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:326px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:326px;left:300px;"><p> '. $resultarray[5]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:326px;left:615px;"><p> '. $resultarray[5]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:326px;left:800px;"><p> '. $resultarray[5]["notelab"] .'</p></div>';
?>