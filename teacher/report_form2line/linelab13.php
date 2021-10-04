<? $html .= '<div style="text-align:center;position:absolute;top:528px;left:-30px;width:205px;"><p> '. 13 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[12]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[12]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[12]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:300px;"><p> '. $resultarray[12]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:615px;"><p> '. $resultarray[12]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:800px;"><p> '. $resultarray[12]["notelab"] .'</p></div>';
    ?>