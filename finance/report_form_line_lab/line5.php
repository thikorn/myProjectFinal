<?php
 $html .= '<div style="text-align:center;position:absolute;top:299px;left:68px;"><p> '. 5 .'</p></div>';
 $html .= '<div style="position:absolute;top:299px;left:300px;width:800px;"><p> '. $resultarray[4]["topiclab"] .'</p></div>';
 $html .= '<div style="text-align:center;position:absolute;top:299px;left:615px;"><p> '. $resultarray[4]["classroomlab"] .'</p></div>';
 $html .= '<div style="position:absolute;top:299px;left:800px;width:800px;"><p> '. $resultarray[4]["notelab"] .'</p></div>';

 if($resultarray[4]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[4]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[4]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[4]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
}else if ($resultarray[4]["datenlab"] != NULL){
    $date = date("d/m/Y", strtotime($resultarray[4]["datenlab"]));
    $html .= '<div style="text-align:center;position:absolute;top:299px;left:106px;"><p> '. $date .'</p></div>';
    $time1 = date("H.i", strtotime($resultarray[4]["timenlab1"]));
    $time11 = date("H.i", strtotime($resultarray[4]["timenlab11"]));
    $html .= '<div style="text-align:center;position:absolute;top:299px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
}
?>