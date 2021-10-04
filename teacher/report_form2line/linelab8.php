<? $html .= '<div style="text-align:center;position:absolute;top:385px;left:68px;"><p> '. 8 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[7]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:385px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[7]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[7]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:385px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:385px;left:300px;"><p> '. $resultarray[7]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:385px;left:615px;"><p> '. $resultarray[7]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:385px;left:800px;"><p> '. $resultarray[7]["notelab"] .'</p></div>';
    ?>