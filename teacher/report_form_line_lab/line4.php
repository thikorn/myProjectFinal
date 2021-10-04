<?php  
$html .= '<div style="text-align:center;position:absolute;top:270px;left:68px;"><p> '. 4 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[3]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[3]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[3]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:300px;"><p> '. $resultarray[3]["topiclab"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:270px;left:615px;"><p> '. $resultarray[3]["classroomlab"] .'</p></div>';
            $html .= '<div style="position:absolute;top:270px;left:800px;"><p> '. $resultarray[3]["notelab"] .'</p></div>';
?>