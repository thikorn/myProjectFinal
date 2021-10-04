<?php 
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:-30px;width:205px;"><p> '. 13 .'</p></div>';
    $html .= '<div style="position:absolute;top:528px;left:300px;width:800px;"><p> '. $resultarray[12]["topiclab"] .'</p></div>';
    $html .= '<div style="text-align:center;position:absolute;top:528px;left:615px;"><p> '. $resultarray[12]["classroomlab"] .'</p></div>';
    $html .= '<div style="position:absolute;top:528px;left:800px;width:800px;"><p> '. $resultarray[12]["notelab"] .'</p></div>';
            
    if($resultarray[12]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[12]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[12]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[12]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }else if ($resultarray[12]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[12]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[12]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[12]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:528px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
    }
?>