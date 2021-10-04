<? $html .= '<div style="text-align:center;position:absolute;top:354px;left:68px;"><p> '. 7 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[6]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:354px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[6]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[6]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:354px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:354px;left:300px;"><p> '. $resultarray[6]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:354px;left:615px;"><p> '. $resultarray[6]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:354px;left:800px;"><p> '. $resultarray[6]["notelab"] .'</p></div>';
    ?>