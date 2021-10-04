<?php
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:-30px;width:205px;"><p> '. 15 .'</p></div>';
        $html .= '<div style="position:absolute;top:582px;left:300px;width:800px;"><p> '. $resultarray[14]["topiclab"] .'</p></div>';
        $html .= '<div style="text-align:center;position:absolute;top:582px;left:615px;"><p> '. $resultarray[14]["classroomlab"] .'</p></div>';
        $html .= '<div style="position:absolute;top:582px;left:800px;width:800px;"><p> '. $resultarray[14]["notelab"] .'</p></div>';

        if($resultarray[14]["datenlab"] == NULL){
            $date = date("d/m/Y", strtotime($resultarray[14]["datelab"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[14]["timelab1"]));
            $time11 = date("H.i", strtotime($resultarray[14]["timelab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }else if ($resultarray[14]["datenlab"] != NULL){
            $date = date("d/m/Y", strtotime($resultarray[14]["datenlab"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:106px;"><p> '. $date .'</p></div>';
            $time1 = date("H.i", strtotime($resultarray[14]["timenlab1"]));
            $time11 = date("H.i", strtotime($resultarray[14]["timenlab11"]));
            $html .= '<div style="text-align:center;position:absolute;top:582px;left:198px;"><p> '. $time1 .' - '. $time11 .'</p></div>';
        }
?>