<?php 
    $html .= '<div style="text-align:center;position:absolute;top:440px;left:-30px;width:205px;"><p> '. 10 .'</p></div>';
    $html .= '<div style="position:absolute;top:440px;left:300px;width:800px;"><p> '. $resultarray[9]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:440px;left:615px;"><p> '. $resultarray[9]["classroomlab"] .'</p></div>';
    $html .= '<div style="position:absolute;top:440px;left:800px;width:800px;"><p> '. $resultarray[9]["notelab"] .'</p></div>';

    if($resultarray[9]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[9]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[9]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[9]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }else if ($resultarray[9]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[9]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[9]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[9]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:440px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }
?>