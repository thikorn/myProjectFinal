<?$html .= '<div style="text-align:center;position:absolute;top:299px;left:68px;"><p> '. 5 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[4]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[4]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[4]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:299px;left:300px;"><p> '. $resultarray[4]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:299px;left:615px;"><p> '. $resultarray[4]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:299px;left:800px;"><p> '. $resultarray[4]["notelab"] .'</p></div>';
?>