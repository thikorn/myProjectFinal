<?php
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:68px;"><p> '. 3 .'</p></div>';
            $html .= '<div style="position:absolute;top:240px;left:300px;width:800px;"><p> '. $resultarray[2]["topiclab"] .'</p></div>';
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:615px;"><p> '. $resultarray[2]["classroomlab"] .'</p></div>';
            $html .= '<div style="position:absolute;top:240px;left:800px;width:800px;"><p> '. $resultarray[2]["notelab"] .'</p></div>';

        if($resultarray[2]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[2]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[2]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[2]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }else if ($resultarray[2]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[2]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[2]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[2]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:240px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }
?>