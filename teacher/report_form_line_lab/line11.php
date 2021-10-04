<?php 
    $html .= '<div style="text-align:center;position:absolute;top:470px;left:-30px;width:205px;"><p> '. 11 .'</p></div>';
            $date = date("d/m/Y", strtotime($resultarray[10]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[10]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[10]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
            $html .= '<div style="position:absolute;top:470px;left:300px;"><p> '. $resultarray[10]["topiclab"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:470px;left:615px;"><p> '. $resultarray[10]["classroomlab"] .'</p></div>';
            $html .= '<div style="position:absolute;top:470px;left:800px;"><p> '. $resultarray[10]["notelab"] .'</p></div>';
?>