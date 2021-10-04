<? $html .= '<div style="text-align:center;position:absolute;top:582px;left:-30px;width:205px;"><p> '. 15 .'</p></div>';
    $datelab = date("d/m/Y", strtotime($resultarray[14]["datelab"]));
    $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $datelab .'</p></div>';
    $timelab1 = date("H.i", strtotime($resultarray[14]["timelab1"]));
    $timelab11 = date("H.i", strtotime($resultarray[14]["timelab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $timelab1 .' - '. $timelab11 .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:582px;left:300px;"><p> '. $resultarray[14]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:582px;left:615px;"><p> '. $resultarray[14]["classroomlab"] .'</p></div>';
    $html .= '<div style="text-align:left;position:absolute;top:582px;left:800px;"><p> '. $resultarray[14]["notelab"] .'</p></div>';
    ?>